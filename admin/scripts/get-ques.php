<script type="text/javascript" src="js/get-quiz.js"></script>
<?php
	include('connection.php');
global $mysqli;
	if($_POST)
	{
		$getid = $_POST['trackid'];

        $sql_questions = "SELECT * FROM questions WHERE connection_meta = '$getid'";
        $query_questions = $mysqli->query($sql_questions) or die(mysqli_connect_error());

		$sql_quiz = "SELECT * FROM quizes WHERE id = '$getid'";
        $query_quiz = $mysqli->query($sql_quiz) or die(mysqli_connect_error());

		$ques_row = $query_quiz->fetch_array(MYSQLI_ASSOC);
		
		extract($ques_row);
		
		echo '<table class="table-normal no-margin"><thead><tr>
				<th scope="col"><b style="float: left;">Quiz Name:- </b><span class="realques"> '.$quiz_name.'</span>
				
				<span class="inputbox"><input type="text" id="onlyquizques" value="'.$quiz_name.'" />
					<input type="hidden" id="editquizid" value="'.$id.'" />
					<img src="images/add.png" width="12" height="12" alt="Add Ques" id="addplusques" title="Add Questions"/>
				</span>
				
				<span class="edit_question"><img src="images/pencil.png" width="12" height="12" alt="Edit" /></span></th>
			  </tr></thead><tbody>';
		
		while($row = $query_questions->fetch_array(MYSQLI_ASSOC))
		{
			extract($row);
			echo '<tr>
				<td><b>Domanda:- </b>'.  htmlspecialchars(utf8_decode($question)).'</td>
				<td><b>Risposta:- </b>'.htmlspecialchars(utf8_decode($answer)).'</td>
				<td><span class="ques_edit"><input type="hidden" id="quesid" value="'.$id.'" /><img src="images/doc_edit.png" width="12" height="12" id="indques"/></span>
				<span class="ques_delete"><input type="hidden" id="hiddendelete" value="'.$id.'" /><img src="images/delete.png" width="12" height="12" id="quesdelete"/></span></td>
			</tr>';
		}
		echo '</tbody>
			</table>';
	}
?>