<?php 
include 'connect.php';

// menampilkan data yang sudah di input di dalam form
$NIM = $_POST['NIM'];
$Nama = $_POST['Nama'];
$Lab = $_POST['Lab'];

$sql = "INSERT INTO aslab (NIM, Nama, Lab) VALUES ('$NIM', '$Nama', '$Lab')";
if(mysqli_query($connect, $sql)) {
	echo "Buku berhasil ditambahkan";	
	header("location:aslab.php");
}
else 
{
	echo "Buku gagal ditambahkan";
}

// Close connection
mysqli_close($connect);
?>