<?php
//koneksi ke database mysql 
$con = mysqli_connect("localhost","root","","ujian_pweb"); 

if(!$con){
    die('Connection Failed'. mysqli_connect_error());
}
?>