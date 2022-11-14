<?php

$id = $_GET['id'];

include("config.php");
$result = mysqli_query($mysqli, "DELETE FROM country where id=$id");

header("Location:indexfq.php");

?>