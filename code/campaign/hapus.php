<?php
include "../config.php";
$id = $_GET['id'];
mysqli_query($conn, "DELETE FROM campaigns WHERE id=$id");
header("Location: ../index.php");
?>
