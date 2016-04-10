<?php

function getService() {
  //require_once 'C://xampp/htdocs/analytic/google-api-php-client/src/Google/autoload.php';
  require_once 'google-api-php-client/src/Google/autoload.php';

  $service_account_email = '70076019168-i9dub18qlhceb42eibfltiovd9qsqgi4@developer.gserviceaccount.com';
  //$key_file_location = 'C://xampp/htdocs/analytic/client_secrets.p12';
  $key_file_location = 'client_secrets.p12';

  $client = new Google_Client();
  $client->setApplicationName("WongnaiAnalytics");
  $analytics = new Google_Service_Analytics($client);
  $key = file_get_contents($key_file_location);
  $cred = new Google_Auth_AssertionCredentials(
    $service_account_email,
    array(Google_Service_Analytics::ANALYTICS_READONLY),
    $key
  );
  $client->setAssertionCredentials($cred);

  if($client->getAuth()->isAccessTokenExpired()) {
    $client ->getAuth()->refreshTokenWithAssertion($cred);
  }
  return $analytics;
}

function getTotalResults(&$analytics, &$syntax) {
  $optParams = array(
    'dimensions' => 'ga:'.urlencode($syntax['dimension']),
    'sort'       => 'ga:'.urlencode($syntax['dimension'])
  );

  $syntax['totalResults'] = $analytics->data_ga->get(
    'ga:'.$syntax['profileId'], 
          $syntax['startDate'], 
          $syntax['endDate'],
    'ga:'.$syntax['metric'],
          $optParams
  );  

  if (count($syntax['totalResults']->getRows()) > 0) {
    $syntax['profileName']  = $syntax['totalResults']->getProfileInfo()->getProfileName();
    $rows                   = $syntax['totalResults']->getRows();
    $syntax['totalResults'] = $syntax['totalResults']->getTotalResults();    

    return $syntax;
  } 

}

function removeEmoji($text) {
    $clean_text = "";

    $regexEmoticons = '/[\x{1F600}-\x{1F64F}]/u';
    $clean_text     = preg_replace($regexEmoticons, ' ', $text);

    $regexSymbols   = '/[\x{1F300}-\x{1F5FF}]/u';
    $clean_text     = preg_replace($regexSymbols, ' ', $clean_text);

    $regexTransport = '/[\x{1F680}-\x{1F6FF}]/u';
    $clean_text     = preg_replace($regexTransport, ' ', $clean_text);
    $regexTransport = '/[\x{1F1E0}-\x{1F1FF}]/u';
    $clean_text     = preg_replace($regexTransport, ' ', $clean_text);

    $clean_text     = str_replace("=","0x3D",$clean_text);
    return $clean_text;
}

function getResults(&$analytics ,&$file, &$syntax){
  $numdiv = $syntax['totalResults']/10000;
  list($numint, $numdecimal) = explode(".", $numdiv);
  $numint = (int)$numint+1;

  for($index=0; $index< $numint; $index++){
    $startIndex = (10000*$index)+1 ;
    $optParams[$index] = array(
      'dimensions' => 'ga:'.urlencode($syntax['dimension']),
      'sort'       => 'ga:'.urlencode($syntax['dimension']),
      'max-results'=> '10000',
      'start-index'=> (int)$startIndex
    );

    $results[$index]= $analytics->data_ga->get(
      'ga:'.$syntax['profileId'], 
            $syntax['startDate'], 
            $syntax['endDate'], 
      'ga:'.$syntax['metric'],
            $optParams[$index]
    );

    if (count($results[$index]->getRows()) > 0) {
      $syntax['profileName'] = $results[$index]->getProfileInfo()->getProfileName();
      $rows      = $results[$index]->getRows();
      $rowCount  = count($results[$index]->getRows());
      for ($row  = 0; $row < $rowCount ; $row++) {
        $rowsName   = $rows[$row][0];
        $rowsNumber = $rows[$row][1];
        $cleanRowsName  =  removeEmoji($rowsName);
        fwrite($file,($row+$startIndex)."\t\t$cleanRowsName\t\t$rowsNumber\r\n");
      }
    } else {
      print "No results found.";
    }
  }
}

set_time_limit(300);

if(isset($command)) {
  $getText = $command;
} else {
  $getText = $_POST['textInput'];
}

if(empty($getText)) 
{
  print "Enter Text in text box"."<br/>";
} 
else 
{
  print $getText."<br>"."<br>";
  $syntaxList = array_pad(explode(",", $getText,7),7,null);
  $syntax = array("accountId"   => $syntaxList[0],
                  "propertyId"  => $syntaxList[1],
                  "profileId"   => $syntaxList[2],
                  "metric"      => $syntaxList[3],
                  "startDate"   => $syntaxList[4],
                  "endDate"     => $syntaxList[5],
                  "dimension"   => $syntaxList[6],
                  "totalResults"=> 0,
                  "profileName" => null
                  );

  $analytics = getService();
  $getTotalResults = getTotalResults($analytics, $syntax);

  $search  = array("/",":","*","?","<",">","|");
  $syntax['profileName'] = str_replace($search,"-",$syntax['profileName']);

  $filename = $syntax['propertyId']."_"
              .$syntax['profileName']."_"
              .$syntax['metric']."_"
              .date('Y-m-d', strtotime($syntax['startDate']))."_to_"
              .date('Y-m-d',strtotime($syntax['endDate'])).".txt";
  
  $file = fopen("result.txt","w");
  getResults($analytics, $file, $syntax);
  fclose($file);

  if(empty($command)) {
    //print "Account Id  : ".$syntax['accountId']."<br>"; 
    //print "Property Id : ".$syntax['propertyId']."<br>"; 
    print "View name   : ".$syntax['profileName']."<br>";     
    print "Total ".$syntax['metric']." : ".$syntax['totalResults']."<br>";

    $link = 'makeTable.php';    
    echo "<br><br><a target='_blank' href = $link>See Result In Browser</a>";
    $link = 'makeExcel.php?name='.$filename;
    echo "<br><br><a href = $link>Download Total Results Excel File</a>";
    $link = 'downloadFileResults.php?name='.$filename;    
    echo "<br><br><a href = $link>Download total results text file</a>";
  }
}
?>