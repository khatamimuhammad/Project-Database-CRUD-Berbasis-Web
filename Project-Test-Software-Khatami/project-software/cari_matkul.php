<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cari Mata Kuliah</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<div class="navbar">
		<div class="pull-right">
			<li class="loggedAs">Halo User</li>
		</div>
	</div>
	<div class="sidebar">
		<li class="brand">
			<a href="">SEPUTAR ASLAB</a>
		</li>
		<li><a href="index.php">Dashboard</a></li>
		<li><a href="aslab.php">Data Asisten </a></li>
        <li><a href="matkul.php">Data Mata Kuliah</a></li>
		
	</div>
    <div class="content">
        <legend>Quick View</legend>
<?php
require 'connect.php';

// Memeriksa apakah form pencarian telah dikirimkan
if (isset($_GET['search'])) {
    $search = $_GET['search'];

    // Mengeksekusi query pencarian
    $query = "SELECT * FROM matkul INNER JOIN aslab USING(NIM) WHERE kode_matkul LIKE '%$search%' OR nama_matkul LIKE '%$search%' OR dosen LIKE '%$search%' OR jam LIKE '%$search%' OR dosen LIKE '%$search%'";
    $result = mysqli_query($connect, $query);
?>

    <table>
        <thead>
            <tr>
                    <th>Kode Matkul</th>
                    <th>Nama Matkul</th>
                    <th>Hari</th>
                    <th>Jam</th>
                    <th>Dosen</th>
                    <th>Lab</th>
                    <th>Nim Aslab</th>
                    <th>Nama Aslab</th>
                    <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php
            // Memeriksa apakah ada hasil pencarian
            if (mysqli_num_rows($result) > 0) {
                // Menampilkan hasil pencarian
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<td>" .$row['kode_matkul']. "</td>";
                    echo "<td>" .$row['nama_matkul']. "</td>";
                    echo "<td>" .$row['hari']. "</td>";
                    echo "<td>" .$row['jam']. "</td>";
                    echo "<td>" .$row['dosen']. "</td>";
                    echo "<td>" .$row['Lab']. "</td>";
                    echo "<td>" .$row['NIM']. "</td>";
                    echo "<td>" .$row['Nama']. "</td>";
                    echo "<td>  
                    <a href='edit_matkul.php?kode_matkul=". $row["kode_matkul"]."'>Edit</a> / <a href='delete_matkul.php?kode_matkul=". $row["kode_matkul"]."'>Delete</a>
                    </td>";
                }
            } else {
                echo "<tr><td colspan='9'>Tidak ada hasil yang ditemukan.</td></tr>";
            }
            ?>
            
        </tbody>
    </table>
    <a href="matkul.php" class="btn btn-danger">Kembali</a>
<?php
}

// Menutup koneksi database
mysqli_close($connect);
?>
</body>
</html>