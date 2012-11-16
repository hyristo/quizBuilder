<?php
include_once( '../../config.php' );
include_once( '../scripts/connection.php' );


$action = $_REQUEST['action'];


switch ($action){
    case 'import' :
        $file = 'DomandeQUIZ_mariacristina.csv';
        $content = file_get_contents($file);
        $e = explode("\n", utf8_decode($content));

        for ($i = 0; $i < count($e); $i++) {
            if($i==0)
                continue;
            $arr[] = $e[$i];
        }
        
        //$rows = explode('\n',$content);
        $count = 0;
        foreach ($arr as $k => $v){
            $d = explode(';', $v);
            //echo $d[1];
            
            $question = strip_tags($d[1]);
            
            //echo '<br>'.$question;
            
            $question = mysql_real_escape_string($question);
            
            //echo '<br>'.$question; exit;
            
            $option1 = mysql_real_escape_string(strip_tags(trim($d[2])));
            $option2 = mysql_real_escape_string(strip_tags(trim($d[3])));
            $option3 = mysql_real_escape_string(strip_tags(trim($d[4])));
            $option4 = mysql_real_escape_string(strip_tags(trim($d[5])));
            $answer = mysql_real_escape_string(strip_tags(trim($d[6])));
            $quizinfo = 1;
            $session_name = 'Admin';
            
            $sql = mysql_query("INSERT INTO questions (question,option1,option2,option3,option4,answer,connection_meta,created_on,created_by,status)
			VALUES ('$question','$option1','$option2','$option3','$option4','$answer','$quizinfo',now(),'$session_name','published')") or die(mysql_error());
            //echo "<pre>".print_r($d, true)."</pre>";
            //exit();
            $count++;
            
        }
        
        echo 'Operazione terminata con successo. N.'.$count;
        
        //echo "<pre>".print_r($arr, true)."</pre>";
        
        break;
    
}



?>
