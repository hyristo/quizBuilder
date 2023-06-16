<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/jquery.playsound.js"></script>
<script type="text/javascript" src="js/animate.js"></script> 

<?php
	include_once( 'conn.php' );
        global $mysqli;
	if($_POST)
	{
		$searchName = $_POST['searchName'];
		
		$sql = "SELECT * FROM questions WHERE connection_meta = '$searchName'";

        $query = $mysqli->query($sql) or die(mysqli_connect_error());

		while($row = $query->fetch_array(MYSQLI_ASSOC))
		{
			extract($row);?>
			<div class="box">
				 <div id="question">
					 <h2><?=utf8_decode($question)?></h2>
				 </div>
				 <ul id="options">
                                <?if(trim($option1)!="" && trim($option1)!="."){?>
                                    <li class="question"><?=utf8_decode(trim($option1))?></li>
                                <?}?>
                                <?if(trim($option2)!="" && trim($option2)!="."){?>
                                    <li class="question"><?=utf8_decode(trim($option2))?></li>
                                <?}?>
                                <?if(trim($option3)!="" && trim($option3)!="."){?>
                                    <li class="question"><?=utf8_decode(trim($option3))?></li>
                                <?}?>
                                <?if(trim($option4)!="" && trim($option4)!="."){?>
                                    <li class="question"><?=utf8_decode(trim($option4))?></li>
                                <?}?>
				 </ul>
				 <input type="hidden" name="answer" value="<?=utf8_decode($answer)?>" id="answer"/>
			 </div>
		<?}
	}
?>