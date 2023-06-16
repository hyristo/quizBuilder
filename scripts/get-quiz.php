<?php
	include('connection.php');
    global $mysqli;
    $sql = "SELECT * FROM quizes WHERE status = 'published' AND final_status = 'true' ORDER BY quiz_name ASC";

	$query = $mysqli->query($sql) or die(mysqli_connect_error());
	while($row = $query->fetch_array(MYSQLI_ASSOC))
	{
		extract($row);

		$qualify_quiz = $mysqli->query("SELECT * FROM questions WHERE connection_meta = '$id'") or die(mysqli_connect_error());
		$num_rows = $qualify_quiz->num_rows;
		if($num_rows >= 1)
		{
		echo '<li><input type="hidden" id="quiztorun" value="'.$id.'" /><a href="#" class="quiz_default_to_start">'.$quiz_name.'</a></li>';
		}
	}
?>