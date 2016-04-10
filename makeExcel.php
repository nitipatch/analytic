<?php
ini_set("memory_limit","1G");
set_time_limit(150);

require_once 'Spreadsheet/Excel/Writer.php';
$workbook = new Spreadsheet_Excel_Writer();
$workbook->setVersion(8);
$workbook->send(str_replace('.txt', '.xls', $_GET['name']));

$center =& $workbook->addFormat();
$center->setAlign('center');
$color =& $workbook->addFormat();
$color->setFgColor('yellow');
$cenCol =& $workbook->addFormat();
$cenCol->setAlign('center');
$cenCol->setFgColor('yellow');

$rowsPerPage = 10000;
$numberOfAllWords = 0;
$numberOfLongWords = 0;
$arrayOfLongWords = array();
$text = file("result.txt");

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
	

	for($i=1;$i<=intval($numberOfLongWords)/intval($rowsPerPage)+1;$i++)
	{
		$worksheet[$i] =& $workbook->addWorksheet('Worksheet '.$i);
		$workSheet = $worksheet[$i];
		$workSheet->setInputEncoding('utf-8');
		$workSheet->write(0,0,'จำนวนครั้ง',$center);
		$workSheet->write(0,1,'คำหลัก',$center);
		$workSheet->write(0,2,'แฟลกคำหลัก',$center);
		$workSheet->write(0,3,'คำย่อย',$center);
		$workSheet->write(0,4,'จำนวนครั้ง',$center);
		$workSheet->setColumn(1,1,70);
		$workSheet->setColumn(2,2,10);
		$workSheet->setColumn(3,3,70);
	}


	$numberOfAllWords = -1;
	foreach($arrayOfLongWords as $key=>$value)
	{ 
		$numberOfAllWords++;
		$word 			= $value['word'];
		$frequency 		= $value['freq'];
		$index 			= $value['index'];
		$childrenNumber	= $value['child'];
		$pageIndex 		= ($numberOfAllWords/$rowsPerPage)+1;
		$rowIndex 		= ($numberOfAllWords%$rowsPerPage)+1;

		$workSheet = $worksheet[$pageIndex];
		$workSheet->write($rowIndex,0,$frequency,$center);
		$workSheet->write($rowIndex,1,$word);
		$workSheet->write($rowIndex,2,1,$center);
		$workSheet->write($rowIndex,3,$word);
		$workSheet->write($rowIndex,4,$frequency,$center);
	
		for($j=$index-1;$j>=$index-$childrenNumber;$j--)		
		{
			$numberOfAllWords++;
			$pageIndex = ($numberOfAllWords/$rowsPerPage)+1;
			$rowIndex = ($numberOfAllWords%$rowsPerPage)+1;
			$workSheet = $worksheet[$pageIndex];
			
			$workSheet->write($rowIndex,0,$frequency,$center);
			$workSheet->write($rowIndex,1,$word);
			$workSheet->write($rowIndex,2,0,$center);

			if(intval($arrayOfAllWords[$j][2])>intval($frequency))
			{
				$workSheet->write($rowIndex,3,$arrayOfAllWords[$j][1],$color);
				$workSheet->write($rowIndex,4,$arrayOfAllWords[$j][2],$cenCol);
			}
			else
			{
				$workSheet->write($rowIndex,3,$arrayOfAllWords[$j][1]);
				$workSheet->write($rowIndex,4,$arrayOfAllWords[$j][2],$center);
			}			

		}
	}

$workbook->close();
?>