<?php
	$host='localhost';
	$user='hackGC';
	$password='5AZuXp6Mz9bMKSG%';
	$dbname='crowdvision';

	$dsn='mysql:host='.$host.';dbname='.$dbname;

	$pdo=new PDO($dsn,$user,$password);

	$stmt=$pdo->query('SELECT * FROM tb_data');
	$graphData=$stmt->fetchAll(PDO::FETCH_OBJ);

	header('Content-Type:application/json');
	echo json_encode($graphData);

