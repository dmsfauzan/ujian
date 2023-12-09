<?php
session_start();
require 'dbcon.php';

if (isset($_POST['delete'])) {
    $npm_to_delete = $_POST['delete'];

    $query = "DELETE FROM mahasiswa WHERE npm = '$npm_to_delete'";
    $result = mysqli_query($con, $query);

    if ($result) {
        $_SESSION['success'] = "Mahasiswa berhasil dihapus";
    } else {
        $_SESSION['error'] = "Error: " . mysqli_error($con);
    }

    header("Location: index.php"); // Redirect back to the main page
    exit();
}

if(isset($_POST['update_mahasiswa']))
{
    $mhs_npm = mysqli_real_escape_string($con, $_POST['mhs_npm']);

    $npm = mysqli_real_escape_string($con, $_POST['npm']);
    $nama = mysqli_real_escape_string($con, $_POST['nama']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $notelp = mysqli_real_escape_string($con, $_POST['notelp']);
    $jurusan = mysqli_real_escape_string($con, $_POST['jurusan']);

    $query = "UPDATE mahasiswa SET npm =$npm, nama='$nama', email='$email', notelp='$notelp', jurusan='$jurusan' WHERE npm='$mhs_npm'";

    $query_run = mysqli_query($con, $query);
    if($query_run)
    {
        $_SESSION['message'] = "Mahasiswa Updated Successfully";
        header("Location: index.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Mahasiswa Not Updated";
        header("Location: index.php");
        exit(0);
    }

}


if(isset($_POST['save_student']))
{
    $npm = mysqli_real_escape_string($con, $_POST['npm']);
    $nama = mysqli_real_escape_string($con, $_POST['nama']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $notelp = mysqli_real_escape_string($con, $_POST['notelp']);
    $jurusan = mysqli_real_escape_string($con, $_POST['jurusan']);

    $query = "INSERT INTO mahasiswa VALUES ($npm,'$nama','$email','$notelp','$jurusan')";

    $query_run = mysqli_query($con, $query);
    if($query_run)
    {
        $_SESSION['message'] = "Mahasiswa Created Successfully";
        header("Location: mahasiswa_create.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Mahasiswa Not Created";
        header("Location: mahasiswa_create.php");
        exit(0);
    }
}

?>