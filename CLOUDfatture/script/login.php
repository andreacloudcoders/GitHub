<?php	
	include('db_connection.php');
	session_start();
	$c = db_connect();		
			
	if(isset($_GET['action'])){	
	
		switch($_GET['action']){
			case 'login':
				
				if(!$_SESSION['user']['loggato'] && isset($_POST[user], $_POST[password])){
					if(mysql_real_escape_string($_POST[user]) && mysql_real_escape_string($_POST[password])){
						$sql = "SELECT * FROM admin WHERE user=".$_POST[user]."' AND pwd='".$_POST[password]."'";
												
						$result = mysql_query($sql);
												
						if(mysql_num_rows($result) == 0){
							echo '<META HTTP-EQUIV="Refresh" Content="0; URL=../index.php?e=2">';    
				   			exit;
						}
												
						while($row = mysql_fetch_array($result)){
							$id=$row['id'];
							$nome=$row['nome'];
							$_SESSION['user']['loggato'] = true;
							$_SESSION['user']['id'] = $id;
							$_SESSION['user']['nome'] = $nome;	
							//echo '<script>alert('.$id.' '.$nome.')</script>';	
						}
												
						echo '<META HTTP-EQUIV="Refresh" Content="0; URL=../home.php">';    
				   		exit;
						
						
					}else{
						echo '<META HTTP-EQUIV="Refresh" Content="0; URL=../index.php?e=1">';    
				   		exit;
					}
				}
			break;
			case 'logout':
				$_SESSION['user']['loggato'] = false;
				session_unset();
				session_destroy();
				echo "<script>document.location.href = '../../index.php';</script>";
			break;
		}
	}
	
	mysql_close($c);
?>