<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Mata Kuliah</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <?php
        include 'connect.php';
        $query = mysqli_query($connect, "SELECT * FROM matkul INNER JOIN aslab USING(NIM)");
        
    ?>

    <div class="navbar">
		<div class="pull-right">
			<li class="loggedAs">Hallo Abang & Kakak</li>
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
        <form action="cari_matkul.php" method="GET">
	        <div class="pull-right" style="margin-bottom:20px;margin-top:20px;">
		        <input type="text" name="search" class="input" placeholder="Cari Kode MK, Nama MK, Dosen, Hari, atau Jam." style="width:300px;" <?php echo isset($_GET['search']) ? "value='".$_GET['search']."'": ''; ?>>
		        <button type="submit" class="btn btn-default">Cari</button>
	        </div>
        </form>
            <table style="border-collapse: collapse;margin-top:20px;" border="1">
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
                <?php
                    while($row = mysqli_fetch_assoc($query)){
                ?>
                <tr>
                    <td><?php echo $row['kode_matkul']; ?></td>
                    <td><?php echo $row['nama_matkul']; ?></td>
                    <td><?php echo $row['hari']; ?></td>
                    <td><?php echo $row['jam']; ?></td>
                    <td><?php echo $row['dosen']; ?></td>
                    <td><?php echo $row['Lab']; ?></td>
                    <td><?php echo $row['NIM']; ?></td>
                    <td><?php echo $row['Nama']; ?></td>
                    <td><a href='edit_matkul.php?kode_matkul=<?php echo $row['kode_matkul']; ?>'>Edit</a> / <a href='delete_matkul.php?kode_matkul=<?php echo $row['kode_matkul']; ?>'>Delete</a></td>
                </tr>
                <?php } 
                    mysqli_free_result($query);
                ?>
            </table>
            <a href="inputmatkul.php" class="button-group">
            <button type="button" class="btn btn-success">Tambah Data</button>
    </div>
</body>
</html>