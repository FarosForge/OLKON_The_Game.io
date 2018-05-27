<?php

include("config.php");

$db_conn = mysqli_connect($db_host,$db_user,$db_pass);



if (mysqli_connect_errno()) {
    printf("Не удалось подключиться: %s\n", mysqli_connect_error());
    exit();
}

$db_select = mysqli_select_db($db_conn, $db_name);

if(!$db_select){
	echo "db selection error!";
	exit;
}

mysqli_set_charset($db_conn, "UTF-8");

$method = $_GET["method"];

switch($method)
{
	case "promo1":
		
		$val = mysqli_fetch_array(mysqli_query($db_conn,"SELECT id FROM Promo1 WHERE checking = 'N' LIMIT 1"));
		if(!$val)
		{
			echo "ERROR!";
			exit;
		}
		else
		{
			$val_id = $val["id"];

			$promo = mysqli_fetch_array(mysqli_query($db_conn,"SELECT promo FROM Promo1 WHERE id = $val_id LIMIT 1"));

			$promo_text = $promo["promo"];

			echo $promo_text;
			
			mysqli_query($db_conn, "UPDATE Promo1 SET `checking`= 'Y' WHERE id = $val_id");

			$checks = mysqli_fetch_array(mysqli_query($db_conn,"SELECT checking FROM Promo1 WHERE id = $val_id LIMIT 1"));
			$check_val = $checks["checking"];
		}
		

	break;
	case "promo2":
		
		$val = mysqli_fetch_array(mysqli_query($db_conn,"SELECT id FROM Promo2 WHERE checking = 'N' LIMIT 1"));
		if(!$val)
		{
			echo "ERROR!";
			exit;
		}
		else
		{
			$val_id = $val["id"];

			$promo = mysqli_fetch_array(mysqli_query($db_conn,"SELECT promo FROM Promo2 WHERE id = $val_id LIMIT 1"));

			$promo_text = $promo["promo"];

			echo $promo_text;
			
			mysqli_query($db_conn, "UPDATE Promo2 SET `checking`= 'Y' WHERE id = $val_id");

			$checks = mysqli_fetch_array(mysqli_query($db_conn,"SELECT checking FROM Promo1 WHERE id = $val_id LIMIT 1"));
			$check_val = $checks["checking"];
		}
		

	break;
	case "promo3":
		
		$val = mysqli_fetch_array(mysqli_query($db_conn,"SELECT id FROM Promo3 WHERE checking = 'N' LIMIT 1"));
		if(!$val)
		{
			echo "ERROR!";
			exit;
		}
		else
		{
			$val_id = $val["id"];

			$promo = mysqli_fetch_array(mysqli_query($db_conn,"SELECT promo FROM Promo3 WHERE id = $val_id LIMIT 1"));

			$promo_text = $promo["promo"];

			echo $promo_text;
			
			mysqli_query($db_conn, "UPDATE Promo3 SET `checking`= 'Y' WHERE id = $val_id");

			$checks = mysqli_fetch_array(mysqli_query($db_conn,"SELECT checking FROM Promo1 WHERE id = $val_id LIMIT 1"));
			$check_val = $checks["checking"];
		}
		

	break;
	default:
		echo "method '$method' not exists!";
		break;
}
?>