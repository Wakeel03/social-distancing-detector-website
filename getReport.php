<?php
 include 'config/init.php';
?>

<?php
    session_start();
	//$username = mysql_query("SELECT * FROM tb_data,tb_cameras WHERE tb_camearas.username = '".$_SESSION['username']."' GROUP BY tb_data.camera_id;

    /*
	$pdo=new PDO($dsn,$user,$password);

	$stmt=$pdo->query("SELECT hour, sum(total_violations) as tot_vio FROM tb_data where camera_id = 1 and date = '2020-12-01' group by hour");
    $graphData=$stmt->fetchAll(PDO::FETCH_OBJ);
    */
    
    $data_obj = new Data;

    #echo $_SESSION['date'];
    #echo $_SESSION['cam'];
    $graphData = $data_obj->getRecord($username, $_SESSION["date"], $_SESSION["cam"]);
    
    #echo json_encode($graphData);
    #die;

    header('Content-Type:application/json');
    echo json_encode($graphData);

 
?>