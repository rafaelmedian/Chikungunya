<?php
session_start();

function log_in() {
	return isset($_SESSION['id_usuario']);
}
function confirmarLogeo() {
	if (!log_in()) {
		header("Location:login.php");
	}
}
?>