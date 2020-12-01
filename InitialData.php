<?php
	$host='localhost';
	$user='root';
	$password='';
	$dbname='crowdvision';
	//$username = mysql_query("SELECT * FROM tb_data,tb_cameras WHERE tb_camearas.username = '".$_SESSION['username']."' GROUP BY tb_data.camera_id;


	$dsn='mysql:host='.$host.';dbname='.$dbname;

	$pdo=new PDO($dsn,$user,$password);

	$stmt=$pdo->query('SELECT * FROM tb_data');
	$graphData=$stmt->fetchAll(PDO::FETCH_OBJ);

	header('Content-Type:application/json');
	echo json_encode($graphData);

