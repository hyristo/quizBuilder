<script type="text/javascript" src="js/get-quiz.js"></script>       

<?php
	include('connection.php');
	global $mysqli;
	if($_POST)
	{
		$id = $_POST['id'];
	
		$sql = "SELECT * FROM questions WHERE id = '$id'";

        $query = $mysqli->query($sql) or die(mysqli_connect_error());

		if($query)
		{
			$row = $query->fetch_array(MYSQLI_ASSOC);
			extract($row);
			
				if($answer == $option1)
				{
					$finalanswer1 =  '<li class="answerselected" id="li1">'.utf8_decode($option1).'</li>';
				}
				else
				{
					$finalanswer1 = '<li class="answerdefault" id="li1">'.utf8_decode($option1).'</li>';
				}
				
				if($answer == $option2)
				{
					$finalanswer2 =  '<li class="answerselected" id="li2">'.utf8_decode($option2).'</li>';
				}
				else
				{
					$finalanswer2 = '<li class="answerdefault" id="li2">'.utf8_decode($option2).'</li>';
				}

				if($answer == $option3)
				{
					$finalanswer3 =  '<li class="answerselected" id="li3">'.utf8_decode($option3).'</li>';
				}
				else
				{
					$finalanswer3 = '<li class="answerdefault" id="li3">'.utf8_decode($option3).'</li>';
				}
				
				if($answer == $option4)
				{
					$finalanswer4 =  '<li class="answerselected" id="li4">'.utf8_decode($option4).'</li>';
				}
				else
				{
					$finalanswer4 = '<li class="answerdefault" id="li4">'.utf8_decode($option4).'</li>';
				}
				
				


			echo '<div id="steps">
					<form id="formElem" name="formElem" action="" method="post">
					<fieldset class="step">
					<legend>Edit Question <span class="closepopup"><img src="images/delete.png" width="12" height="12" alt="Close" /></span></legend>
					<p>
								  <label for="username">Question</label>
								  <input id="editquesname" name="questionname" value="'.htmlspecialchars(utf8_decode($question)).'"/>
								</p>
								<p>
								   <label for="option1">Option 1</label>
								   <input id="editoption1" name="option1" type="text" value="'.htmlspecialchars(utf8_decode($option1)).'"/>
								</p>
								<p>
								   <label for="option2">Option 2</label>
								   <input id="editoption2" name="option2" type="text" value="'.htmlspecialchars(utf8_decode($option2)).'"/>
								</p>
								<p>
								   <label for="option3">Option 3</label>
								   <input id="editoption3" name="option3" type="text" value="'.htmlspecialchars(utf8_decode($option3)).'"/>
								</p>
								 <p>
								   <label for="option1">Option 4</label>
								   <input id="editoption4" name="option4" type="text" value="'.htmlspecialchars(utf8_decode($option4)).'"/>
								</p>
								<input type="hidden" id="hiddeneditid" value="'.$id.'" />
							 </fieldset>
							</form>
						</div><!-- end steps -->                     
					 <div id="answeroptions">	
					  <h2>Selected Answer</h2>
					   <ul id="answermenu">
						'.$finalanswer1.''.$finalanswer2.''.$finalanswer3.''.$finalanswer4.'
					   </ul>
					</div>
					<input type="submit" id="editsavequestion" value="Save" class="editsavequestion"/>
					';
		}
	}
?>