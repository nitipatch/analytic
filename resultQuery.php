<?php

function getService() {
  require_once 'google-api-php-client/src/Google/autoload.php';

  $service_account_email = '70076019168-i9dub18qlhceb42eibfltiovd9qsqgi4@developer.gserviceaccount.com';
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
    $client-> getAuth()->refreshTokenWithAssertion($cred);
  }
  return $analytics;
}

function getResults(&$analytics) {
  $getText      = $_POST['textInput'];
  $getTextArray = explode("\n", $getText);
  $countArray   = count($getTextArray);
  $countText    = 0;
  $noText       = " ";
  
  for ($index = 0; $index < $countArray; $index++) {

    if(strlen($getTextArray[$index])>0) {
      $countText++;
      $noText = $noText.",".($index);
    }
  }
  
  if($noText != " ") {
    $noTextArray = explode(",", $noText);
    $no = array_shift($noTextArray);
  } else {
    print "Enter Text in text box"."<br/>";
  }

  for ($index = 0; $index < $countText; $index++) {
    list($firstAccountId, $firstPropertyId, $profileId, $metric, $startDate, $endDate, $dimension ,$filter) 
      = array_pad(explode(",", $getTextArray[(int)$noTextArray[$index]],8),8,null);

    $Index = $index + 1;
    print "<br>".$Index.") - - - - - - - - - - - - - - - - - - - - - - - -"."<br>"
          .$getTextArray[(int)$noTextArray[$index]]."<br>"."<br>";

    if($profileId!=null && $startDate!=null && $endDate!=null) {

      if($dimension == null) {
        $results[$index] = $analytics->data_ga->get(
          'ga:' . $profileId, $startDate, $endDate,'ga:'.$metric
          );
      } else { 
        
        if($filter == null) {
          $optParams = array(
            'dimensions' => 'ga:'.urlencode($dimension),
            'sort'       => '-ga:'.urlencode($metric),
            'max-results'=> '10000'
          );
        } else {
          $optParams = array(
            'filters' => 'ga:'.$dimension.$filter
          );
        }

        $results[$index] = $analytics->data_ga->get(
          'ga:' . $profileId, $startDate, $endDate, 'ga:'.$metric,$optParams
          );
      }
    } else {
      print "Syntax error : Please enter try again";
      break;
    }

    if (count($results[$index]->getRows()) > 0) {
      $profileName = $results[$index]->getProfileInfo()->getProfileName();
      $rows        = $results[$index]->getRows();
      $sessions    = $rows[0][0];
      $rowCount    = count($results[$index]->getRows());

      //print "Account Id  : $firstAccountId"."<br/>"; 
      //print "Property Id : $firstPropertyId"."<br/>"; 
      print "View name   : $profileName"."<br/>"; 

      if($dimension!=null && $filter==null ) {
        print "Dimension total max : $rowCount rows"."<br/>"; 
        for ($row = 0; $row < $rowCount ; $row++) {
            $rowsName   = $rows[$row][0];
            $rowsNumber = $rows[$row][1];
            echo ("Row number : $row Name : $rowsName  = $rowsNumber"."<br/>");
        }
        $totalResults = $results[$index]->getTotalResults();
      } else {
        print("Total $metric : $sessions"."<br/>") ;

      }
    } else {
      print "No results found."."<br/>";
    }
  }
}
$analytics = getService();
$profile   = getResults($analytics);
?>