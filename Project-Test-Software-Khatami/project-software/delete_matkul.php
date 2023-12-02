<?php
// menghubungkan dengan connect
include 'connect.php';

$kode_matkul = $_GET['kode_matkul'];

// sql to delete a record
$sql = "DELETE FROM matkul WHERE kode_matkul='".$kode_matkul."'";


if (mysqli_query($connect, $sql)) {
    header("location:matkul.php?pesan=berhasil_hapus_data");
} else {
    echo "Error deleting record: ";
}

// Close connection
mysqli_close($connect);
?>