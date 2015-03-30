<?php
	$schoolNum = $_REQUEST["school"];

	$collegeList = array();
	$counter = 0;
	
	$collegeCsv = fopen("hd2013.csv","r");
	$lengthToReach = 0;
	while (! feof($collegeCsv))
	{
		$collegeList[$counter] = fgetcsv($collegeCsv);
		$counter = $counter + 1;
		//$lengthToReach = $lengthToReach + 1;
	}
	
	$collegeListHeaders = array_shift($collegeList);

	// $readableHeaders = array();
	// $readableCsv = fopen("nameDictionary.csv","r");
	// $readCount = 0;

	// while (! feof($readableCsv))
	// {
	// 	$readableHeaders[$readCount] = fgetcsv($readableCsv);
	// 	// echo $readableHeaders[$readCount][0];
	// 	// echo 'hey';
	// 	$readCount = $readCount + 1;
	// 	// echo $readableHeaders[$readCount];
	// }

	// echo count($readableHeaders);

	// for ($y = 0; $y < count($readableHeaders); $y = $y +1)
	// {
	// 	echo json_encode($readableHeaders[$y][1]);
	// }



	// for ($x = 0; $x < count($collegeList[$x]); $x = $x + 1)
	// {

	// 	echo json_encode($collegeList[$schoolNum][$x]);
	// }
	$array = array();

	for($headerIndex = 0; $headerIndex < count($collegeListHeaders); $headerIndex++){
		$tempArray = array($collegeListHeaders[$headerIndex],$collegeList[$schoolNum][$headerIndex]);
		array_push($array, $tempArray);
	}

	echo json_encode($array);

?>