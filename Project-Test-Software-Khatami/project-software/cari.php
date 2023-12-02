<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cari Asisten</title>
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
    $query = "SELECT * FROM aslab WHERE NIM LIKE '%$search%' OR Nama LIKE '%$search%' OR Lab LIKE '%$search%'";
    $result = mysqli_query($connect, $query);
?>

    <table>
        <thead>
            <tr>
                <th>NIM</th>
                <th>Nama</th>
                <th>Lab</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php
            // Memeriksa apakah ada hasil pencarian
            if (mysqli_num_rows($result) > 0) {
                // Menampilkan hasil pencarian
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td>" .$row['NIM']. "</td>";
                    echo "<td>" .$row['Nama']. "</td>";
                    echo "<td>" .$row['Lab']. "</td>";
                    echo "<td>  
                    <a href='edit_aslab.php?NIM=". $row["NIM"]."'>Edit</a> / <a href='delete_aslab.php?NIM=". $row["NIM"]."'>Delete</a>
                    </td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='4'>Tidak ada hasil yang ditemukan.</td></tr>";
            }
            ?>
            
        </tbody>
    </table>
    <a href="aslab.php" class="btn btn-danger">Kembali</a>
<?php
}

// Menutup koneksi database
mysqli_close($connect);
?>
</body>
</html>