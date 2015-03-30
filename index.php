<?php
	//Project One
	//Brad Thele
	$var = "Colleges";
	//echo '<a href="?page=Home">Home</a></br></br>';
	echo '<script src="jquery.min.js"></script>';
	echo '<script src="something.js"></script>';
	echo '<a href="?page='.$var.'">'.$var.'</a></br></br>';

	$obj = new $_REQUEST['page'];

	//$schoolNum = $_REQUEST('school');
	
	echo $schoolNum;

	class page
	{
		function __construct()
		{
			echo 'Welcome to the ' . $_REQUEST['page'] . ' page </br></br>';
		}
	}

	class Colleges extends page
	{
		function __construct()
		{
			parent::__construct();
			
			$collegeList = $this->readCsv();
			//echo $collegeList[1][1];
			$collegeListHeaders = array_shift($collegeList);
			//print_r($collegeListHeaders);
			
			$nameList = $this->readDictionaryCsv();
			$count = 0;
			while (!feof($collegeList))
			{
				$school = $collegeList[$count][1];
				//echo '<a href="?page=school'.$count.'">'.$school.'</a></br></br>';
				echo '<a href="?school='.$count.'&page=CollegeInfo">'.$school.'</a></br></br>';
				/*$name = 'school'.$count;
				eval("class $name extends page{
					public function __construct()
					{
						echo $school;
					}
				}");*/
				$count = $count + 1;
				
			}
		}
		
		public function readCsv()
		{
			
			$collegeList = array();
			$counter = 0;
			
			$collegeCsv = fopen("hd2013.csv","r");
			//$lengthToReach = 0;
			
			while (! feof($collegeCsv))
			{
				$collegeList[$counter] = fgetcsv($collegeCsv);
				$counter = $counter + 1;
				//$lengthToReach = $lengthToReach + 1;
			}
			
			return $collegeList;
		}
		
		public function readDictionaryCsv()
		{
			
			$nameList = array();
			$counter = 0;
			
			$dictionaryCsv = fopen("nameDictionary.csv","r");
			//$lengthToReach = 0;
			
			while (! feof($dictionaryCsv))
			{
				$nameList[$counter] = fgetcsv($dictionaryCsv);
				$counter = $counter + 1;
				//$lengthToReach = $lengthToReach + 1;
			}
			
			return $nameList;
		}
	}

	class CollegeInfo extends page
	{
		function __construct()
		{
			parent::__construct();

			echo $schoolNum; 

			echo '<table style="border: 1px solid grey; height:1000px; width:500px;">
					<tbody id="mytable">
					</tbody>
				</table>';
			
		}
	}
	
/*	class school0 extends page
	{
		function __construct()
		{
			echo 'hello';
		}
	}*/
	
?>
