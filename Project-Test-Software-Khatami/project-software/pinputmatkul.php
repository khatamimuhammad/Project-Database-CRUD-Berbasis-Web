<?php 
include 'connect.php';

// menampilkan data yang sudah di input di dalam form
$kode_matkul = $_POST['kode_matkul'];
$nama_matkul = $_POST['nama_matkul'];
$hari = $_POST['hari'];
$jam = $_POST['jam'];
$dosen = $_POST['dosen'];
$Lab = $_POST['Lab'];
$NIM = $_POST['NIM'];
$Nama = $_POST['Nama'];


$sql = "INSERT INTO matkul (kode_matkul, nama_matkul, hari, jam, dosen, Lab, NIM, Nama) VALUES ('$kode_matkul', '$nama_matkul', '$hari', '$jam', '$dosen', '$Lab','$NIM', '$Nama')";
if(mysqli_query($connect, $sql)) {
	echo "Data Matkul berhasil ditambahkan";	
	header("location:matkul.php");
}
else 
{
	echo "Data Matkul gagal ditambahkan";
}

// Close connection
mysqli_close($connect);
?>