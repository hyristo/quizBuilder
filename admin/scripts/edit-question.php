<?php

	include_once( 'connection.php' );
global $mysqli;
	$question = utf8_encode($_POST['question']);
	$option1 = utf8_encode($_POST['option1']);
	$option2 = utf8_encode($_POST['option2']);
	$option3 = utf8_encode($_POST['option3']);
	$option4 = utf8_encode($_POST['option4']);
	$answer = utf8_encode($_POST['answer']);
	$quizinfo = $_POST['quizinfo'];

	if(empty($quizinfo))
	{
		echo 'Unable to process request';
	}
	else
	{
		$question = strip_tags($question);
		$mysqli->real_escape_string($question);

        $sql = sprintf("UPDATE questions SET question = '%s' ,option1 = '%s' ,option2 = '%s' ,option3 = '%s' ,option4 = '%s', answer = '%s' WHERE id = '%s'",
            $mysqli->real_escape_string($question),
            $mysqli->real_escape_string($option1),
            $mysqli->real_escape_string($option2),
            $mysqli->real_escape_string($option3),
            $mysqli->real_escape_string($option4),
            $mysqli->real_escape_string($answer),
            $quizinfo
        );
        //$sql = "UPDATE questions SET question = '$question' ,option1 = '$option1' ,option2 = '$option2' ,option3 = '$option3' ,option4 = '$option4', answer = '$answer' WHERE id = '$quizinfo'";

        $query = $mysqli->query($sql) or die(mysqli_connect_error());


		$num_rows = $mysqli->affected_rows;
		if($num_rows >= 1)
		{
			echo 'Successfully Edited';
		}
		else
		{
			echo 'No updation done';
		}
	}
?>