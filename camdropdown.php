<?php
error_reporting(E_ERROR | E_PARSE);
session_start();
$link = mysqli_connect("localhost","hackGC","5AZuXp6Mz9bMKSG%","crowdvision");


$username = $_SESSION['username'];
//$username = '$_SESSION('username')';
$sql = ("SELECT *
        FROM tb_cameras 
        WHERE username = '".$username."'");

$result = mysqli_query($link,$sql);
if ($result != 0) {
	echo '<form action = "index.php" method ="post">';
    
    echo '<select name="camSel" onchange="submit();">';

    $num_results = mysqli_num_rows($result);
    for ($i=0;$i<$num_results;$i++) {
        $row = mysqli_fetch_array($result);
        $name = $row['camera_name'];
        $id = $row['camera_id'];
        echo '<option class = "dropdown-item" value="' .$id. '">' .$name. '</option>';
    }

    echo '</select>';
    echo '</label>';
    echo '</form>';
    
    $_SESSION['camSel']=$_POST['camSel'];
  
}

mysqli_close($link);

?>

