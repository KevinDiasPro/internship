<?php
require('../config.php');

$title=$_POST['title'];
$year=$_POST['year'];
$studio=$_POST['studio'];
$imdb_id=$_POST['imdb_id'];

session_start();

$conn = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
$queryS = "SELECT  s.id from studio s where s.name='$studio'";
$queryR = $conn->query($queryS);
$row = mysqli_fetch_assoc($queryR);
$id = $row['id'];
$sql ="CALL insertContent('$title','$year','$id','$imdb_id')";

if(mysqli_query($conn,$sql)){
    header("location:../index.php");
}
