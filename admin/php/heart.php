<?php 
	session_start();
	include_once '../../includes/db.inc.php';
	if (isset($_GET['heart'])) {
	$id = $_GET['heart'];
	$sql = "select * from feed where id='$id'";
	$res = mysqli_query($conn, $sql);
	$rescheck = mysqli_num_rows($res);
	if ($rescheck > 0) {
		while ($row = mysqli_fetch_assoc($res)) {
			$heart = $row['heart'];
			if ($heart == 'far fa-heart') {
				$heartone = 'fas fa-heart';
				$sqlone = "update feed set heart='$heartone' where id='$id';";
				mysqli_query($conn, $sqlone);
				header("Location: ../index.php");
			} else if ($heart == 'fas fa-heart') {
				$sqltwo = "update feed set heart='far fa-heart' where id='$id';";
				mysqli_query($conn, $sqltwo);
				header("Location: ../index.php");
			}
		}
	}
}