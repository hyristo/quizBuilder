<?php
	
	if($_POST)
	{
		include( 'connection.php');
        global $mysqli;
		$quizeditname =utf8_encode($_POST['quizeditname']);
		$editquizid = $_POST['editquizid'];
		
		if(empty($quizeditname))
		{
			echo 'Quizname cannot be empty';
		}
		else
		{
			$sql = $mysqli->query("UPDATE quizes SET quiz_name = '$quizeditname' WHERE id = '$editquizid' LIMIT 1") or die(mysqli_error());
			$numrows = $mysqli->affected_rows;
			
			if($numrows >= 1)
			{
				$fetch = $mysqli->query("SELECT quiz_name FROM quizes WHERE id = '$editquizid' LIMIT 1");
				$row = $fetch->fetch_array(MYSQLI_ASSOC);
				extract($row);
				
				echo $quiz_name; 
			}
			else
			{
				echo $quizeditname;
			}
		}
	}
	
	

?>