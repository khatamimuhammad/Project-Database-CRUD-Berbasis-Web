<?php
// menghubungkan dengan connect
include 'connect.php';

$NIM = $_GET['NIM'];

// sql to delete a record
$sql = "DELETE FROM aslab WHERE NIM='".$NIM."'";


if (mysqli_query($connect, $sql)) {
    header("location:aslab.php?pesan=berhasil_hapus_data");
} else {
    echo "Error deleting record: ";
}

// Close connection     
mysqli_close($connect);
?>