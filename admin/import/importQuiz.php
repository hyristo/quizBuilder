<?php
include_once( '../../config.php' );
include_once( '../scripts/connection.php' );
 error_reporting(E_ALL);
 ini_set("display_errors", 1);
$action = $_REQUEST['action'];


switch ($action){
    case 'importMariacristina' :
        $file = 'DomandeQUIZ_mariacristina.csv';
        $content = file_get_contents($file);
        $e = explode("\r", $content);
        for ($i = 0; $i < count($e); $i++) {
            if($i==0)
                continue;
            $arr[] = $e[$i];
        }
        $count = 0;
        foreach ($arr as $k => $v){
            $d = explode(';', $v);
            //echo $d[1];
            
            $question = mysql_real_escape_string(strip_tags(trim(($d[1]))));
            $option1 = mysql_real_escape_string(strip_tags(trim(($d[2]))));
            $option2 = mysql_real_escape_string(strip_tags(trim(($d[3]))));
            $option3 = mysql_real_escape_string(strip_tags(trim(($d[4]))));
            $option4 = mysql_real_escape_string(strip_tags(trim(($d[5]))));
            $answer = mysql_real_escape_string(strip_tags(trim($d[$d[6]+1])));
            $quizinfo = 1;
            $session_name = 'Admin';
            $query = "INSERT INTO questions (question,option1,option2,option3,option4,answer,connection_meta,created_on,created_by,status) VALUES ('$question','$option1','$option2','$option3','$option4','$answer','$quizinfo',now(),'$session_name','published')";
            $sql = mysql_query($query) or die(mysql_error());
            $count++;
        }
        
        echo 'Operazione terminata con successo. N.'.$count;
        break;
        case 'importMorena':
        $file = 'DomandeQUIZ_La_Chiesa.csv';
        $content = file_get_contents($file);
        $e = explode("\r", $content);
        for ($i = 0; $i < count($e); $i++) {
            if($i==0)
                continue;
            $arr[] = $e[$i];
        }
        $count = 0;
        foreach ($arr as $k => $v){
            $d = explode(';', $v);
            //echo $d[1];
            
            $question = mysql_real_escape_string(strip_tags(trim(($d[1]))));
            $option1 = mysql_real_escape_string(strip_tags(trim(($d[2]))));
            $option2 = mysql_real_escape_string(strip_tags(trim(($d[3]))));
            $option3 = mysql_real_escape_string(strip_tags(trim(($d[4]))));
            $option4 = mysql_real_escape_string(strip_tags(trim(($d[5]))));
            $answer = mysql_real_escape_string(strip_tags(trim($d[$d[6]+1])));
            $quizinfo = 2;
            $session_name = 'Admin';
            $query = "INSERT INTO questions (question,option1,option2,option3,option4,answer,connection_meta,created_on,created_by,status) VALUES ('$question','$option1','$option2','$option3','$option4','$answer','$quizinfo',now(),'$session_name','published')";
            $sql = mysql_query($query) or die(mysql_error());
            $count++;
        }
        
        echo 'Operazione terminata con successo. N.'.$count;
        
        break;
        case 'importSilvia':
            
        $file = 'DomandeQUIZ_silvia.csv';
        $content = file_get_contents($file);
        $e = explode("\r", $content);
        for ($i = 0; $i < count($e); $i++) {
            if($i==0)
                continue;
            $arr[] = $e[$i];
        }
        $count = 0;
        foreach ($arr as $k => $v){
            $d = explode(';', $v);
            //echo $d[1];
            
            $question = mysql_real_escape_string(strip_tags(trim(($d[1]))));
            $option1 = mysql_real_escape_string(strip_tags(trim(($d[2]))));
            $option2 = mysql_real_escape_string(strip_tags(trim(($d[3]))));
            $option3 = mysql_real_escape_string(strip_tags(trim(($d[4]))));
            $option4 = mysql_real_escape_string(strip_tags(trim(($d[5]))));
            $answer = mysql_real_escape_string(strip_tags(trim($d[$d[6]+1])));
            $quizinfo = 3;
            $session_name = 'Admin';
            $query = "INSERT INTO questions (question,option1,option2,option3,option4,answer,connection_meta,created_on,created_by,status) VALUES ('$question','$option1','$option2','$option3','$option4','$answer','$quizinfo',now(),'$session_name','published')";
            $sql = mysql_query($query) or die(mysql_error());
            $count++;
        }
        
        echo 'Operazione terminata con successo. N.'.$count;
        break;
        case 'importAgnese':
            
        $file = 'DomandeQUIZ_Agnese.csv';
        $content = file_get_contents($file);
        $e = explode("\r", $content);
        for ($i = 0; $i < count($e); $i++) {
            if($i==0)
                continue;
            $arr[] = $e[$i];
        }
        $count = 0;
        foreach ($arr as $k => $v){
            $d = explode(';', $v);
            //echo $d[1];
            
            $question = mysql_real_escape_string(strip_tags(trim(($d[1]))));
            $option1 = mysql_real_escape_string(strip_tags(trim(($d[2]))));
            $option2 = mysql_real_escape_string(strip_tags(trim(($d[3]))));
            $option3 = mysql_real_escape_string(strip_tags(trim(($d[4]))));
            $option4 = mysql_real_escape_string(strip_tags(trim(($d[5]))));
            $answer = mysql_real_escape_string(strip_tags(trim($d[$d[6]+1])));
            $quizinfo = 4;
            $session_name = 'Admin';
            $query = "INSERT INTO questions (question,option1,option2,option3,option4,answer,connection_meta,created_on,created_by,status) VALUES ('$question','$option1','$option2','$option3','$option4','$answer','$quizinfo',now(),'$session_name','published')";
            $sql = mysql_query($query) or die(mysql_error());
            $count++;
        }
        
        echo 'Operazione terminata con successo. N.'.$count;
        break;
}        

?>
