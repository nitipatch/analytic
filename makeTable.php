<html>
<head>
	<script type="text/javascript" src="js/jquery.js" ></script>
	<link href="css/tableStyle.css" rel="stylesheet" type="text/css">
</head>
<body>
</body>
</html>


<?php
ini_set("memory_limit","1G");
set_time_limit(150);

$numberOfAllWords = 0;
$numberOfLongWords = 0;
$arrayOfLongWords = array();
$text = file('result.txt');

	foreach($text as $value)
	{
		$numberOfLongWords++;
	    list($a,$b,$c) = explode("\t\t",$value);
	    $arrayOfAllWords[$numberOfLongWords][1] = $b;
	    $arrayOfAllWords[$numberOfLongWords][2] = $c;
	}

	for($i=1;$i<=$numberOfLongWords;$i++)
	for($j=$i;$j<=$numberOfLongWords;$j++)
	{
		$check=0;

		if($j==$numberOfLongWords)$check=1;
		else if(strlen($arrayOfAllWords[$j][1])>strlen($arrayOfAllWords[$j+1][1]))$check=1;

		if($check==0)
		for($k=0;$k<strlen($arrayOfAllWords[$j][1]);$k++)
		if($arrayOfAllWords[$j][1][$k]!=$arrayOfAllWords[$j+1][1][$k])
		{$check=1;break;}

		if($check==1)
		{
			$arrayOfLongWords[$numberOfAllWords++]=array("word"=>$arrayOfAllWords[$j][1],"freq"=>$arrayOfAllWords[$j][2],"index"=>$j,"child"=>$j-$i);
			$i=$j;break;
		}
	}
	

	usort($arrayOfLongWords, function($a, $b) { return $b['freq'] - $a['freq'];	});


	foreach($arrayOfLongWords as $key=>$value)
	{ 
		$word 			= $value['word'];
		$frequency 		= $value['freq'];
		$index 			= $value['index'];
		$childrenNumber	= $value['child'];
		
		if($childrenNumber==0)echo "<div class='row'><div class='freq'>$frequency</div><div class='word'>$word</div><div></div></div>";		
	
		for($j=$index-1;$j>=$index-$childrenNumber;$j--)
		{
			$text = $arrayOfAllWords[$j][1]."   =".$arrayOfAllWords[$j][2];
			if($j<$index-1)
			{
				if(intval($arrayOfAllWords[$j][2])>intval($frequency))
				echo "<div class='Trow'>
						<div class='Tfreq'></div>
						<div class='Tword'></div>
						<div class='Cword2'>$text</div>
					</div>";
				else 
				echo "<div class='Trow'>
						<div class='Tfreq'></div>
						<div class='Tword'></div>
						<div class='Cword'>$text</div>
					</div>";
			}
			else
			{
				if(intval($arrayOfAllWords[$j][2])>intval($frequency))
				echo "<div class='row'>
						<div class='freq'>$frequency</div>
						<div class='word'>$word</div>		
						<div class='Cword2'>$text</div>
					</div>";
				else 
				echo "<div class='row'>
						<div class='freq'>$frequency</div>
						<div class='word'>$word</div>		
						<div class='Cword'>$text</div>
					</div>";
			} 
		}
	echo "<br>";
	}

?>
