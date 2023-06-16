<?php
	include('connection.php');
global $mysqli;
	if($_POST)
	{
		$sendtype = $_POST['sendtype'];
		$senddelete = $_POST['senddelete'];
		
		if($sendtype == 'quiz')
		{
			$deletequiz = $mysqli->query("DELETE FROM quizes WHERE id = '$senddelete' LIMIT 1") or die(mysqli_connect_error());
			$num_rows = $mysqli->affected_rows;
			
			if($num_rows == 1)
			{
				$deleteques = $mysqli->query("DELETE FROM questions WHERE connection_meta = '$senddelete'") or die(mysqli_connect_error());
				
				if($deleteques)
				{
					echo 'Deleted Successfully';
				}
				else
				{
					echo 'There was an error';
				}
			}
		}
		elseif($sendtype == 'question')
		{
			$deleteques = $mysqli->query("DELETE FROM questions WHERE id = '$senddelete'") or die(mysqli_connect_error());
			$num_rows = $mysqli->affected_rows;
			if($num_rows == 1)
			{
				echo 'Deleted Successfully';
			}
			else
			{
				echo 'Unable to delete';
			}
		}
		
	}
?>