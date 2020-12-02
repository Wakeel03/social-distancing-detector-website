<?php
	
	$host='localhost';
	$user='hackGC';
	$password='5AZuXp6Mz9bMKSG%';
	$dbname='crowdvision';

	session_start();
	(int)$cam_id=(int)$_SESSION['camSel'];
	//var_dump($cam_id);

	/*
	$conn = mysqli_connect("localhost","hackGC","5AZuXp6Mz9bMKSG%","crowdvision");
	$query='SELECT * FROM tb_data WHERE camera_id='.$cam_id;
	$result=mysqli_query($conn,$query);
	$graphData=mysqli_fetch_all($result,MYSQLI_ASSOC);
	mysqli_free_result($result);
	*/
	//$cam_id=5;
	$dsn='mysql:host='.$host.';dbname='.$dbname;

	$pdo=new PDO($dsn,$user,$password);
	$stmt=$pdo->prepare("SELECT * FROM tb_user INNER JOIN tb_cameras ON tb_user.username = tb_cameras.username INNER JOIN tb_data ON tb_cameras.camera_id = tb_data.camera_id  WHERE tb_cameras.camera_id=:cam_id");
	$stmt->execute(['cam_id'=>$cam_id]);
	$newData=$stmt->fetchAll(PDO::FETCH_OBJ);

	header('Content-Type:application/json');
	echo json_encode($newData);

?>

	