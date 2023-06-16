<?php
	session_start();
	if(isset($_POST['submit']))
	{
		include_once( 'conn.php' );
        global $mysqli;
		$username = $_POST['username'];
		$password = $_POST['passwd'];
		
		
		if(empty($username) || empty($password))
		{
			$error =  'Enter your login credentials';
		}
		else
		{
			$username = strip_tags($username);
			$password = strip_tags($password);

			$username = $mysqli->real_escape_string($username);
			$password = $mysqli->real_escape_string($password);
			$password = md5($password);



            $sql = "SELECT * FROM tut_users WHERE username = '$username' && password = '$password' LIMIT 1";

            $result = $mysqli->query("SELECT * FROM tut_users WHERE username = '$username' && password = '$password' LIMIT 1") or die(mysqli_connect_error());

            $row = $result->num_rows;



			if($row == 1)
			{
				$fetch = $result->fetch_array(MYSQLI_NUM);

				extract($fetch);
				
				$_SESSION['username'] = $username;
				if(isset($_SESSION['username']))
				{
					$update = $mysqli->query("UPDATE tut_users SET last_log = now() WHERE user_id = '$user_id'") or die(mysqli_connect_error());
					?>
                                        <script>
                                        document.location.href="index.php";
                                        </script>
                                        <?
                        //                header("location:index.php");
				}
			}
			else
			{
				$error = 'Invalid Credentials';

			}
		}
	}



?>