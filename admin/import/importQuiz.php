<?php
include_once( '../../config.php' );
include_once( '../scripts/connection.php' );
 error_reporting(E_ALL);
 ini_set("display_errors", 1);
$action = $_REQUEST['action'];
global $mysqli;

switch ($action){
    case '12' :
        $file = 'DomandeQUIZ_Chiara2.csv'; // I SACRAMANTI
        $content = file_get_contents($file);
        $e = explode("\r", $content);
        for ($i = 0; $i < count($e); $i++) {
            if($i==0)
                continue;
            $arr[] = $e[$i];
        }
        $count = 0;
        //echo "<pre>".print_r($arr, true)."</pre>";exit();
        foreach ($arr as $k => $v){
            $d = explode(';', $v);
            //echo $d[1];

            $question = $mysqli->real_escape_string(utf8_encode(trim(($d[1]))));
            $option1 = $mysqli->real_escape_string(utf8_encode(trim(($d[2]))));
            $option2 = $mysqli->real_escape_string(utf8_encode(trim(($d[3]))));
            $option3 = $mysqli->real_escape_string(utf8_encode(trim(($d[4]))));
            $option4 = $mysqli->real_escape_string(utf8_encode(trim(($d[5]))));
            $answer = $mysqli->real_escape_string(utf8_encode(trim($d[$d[6]+1])));
            $quizinfo = $action;
            $session_name = 'Admin';
            $query = "INSERT INTO questions (question,option1,option2,option3,option4,answer,connection_meta,created_on,created_by,status) VALUES ('$question','$option1','$option2','$option3','$option4','$answer','$quizinfo',now(),'$session_name','published')";
            $sql = $mysqli->query($query) or die(mysqli_connect_error());
            $count++;
        }
        
        echo 'Operazione terminata con successo. N.'.$count;
        break;

        
}        

?>
