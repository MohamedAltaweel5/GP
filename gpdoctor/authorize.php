<?php 
if(!isset($_SESSION['userlogged'])){
 header('Location:login.php');
		die();
}
?>