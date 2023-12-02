<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Aslab</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <?php
        include 'connect.php';
        $query = "SELECT * FROM aslab";
        $result = mysqli_query($connect, $query);

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
        <form action="cari.php" method="GET">
	        <div class="pull-right" style="margin-bottom:20px;margin-top:5px;">
                <input type="text" name="search" class="input" placeholder="Cari Nama, Nim dan Lab." style="width:300px;" <?php echo isset($_GET['search']) ? "value='".$_GET['search']."'": ''; ?>>
                <button type="submit" class="btn btn-default">Cari</button>
	        </div>
        </form>
            <table style="border-collapse: collapse;margin-top:20px;" border="1">
                <tr>
                    <th>NIM</th>
                    <th>Nama</th>
                    <th>Lab</th>
                    <th>Aksi</th>
                </tr>
                <?php
                    while($row = mysqli_fetch_array($result)){
                ?>
                <tr>
                    <td><?php echo $row['NIM']; ?></td>
                    <td><?php echo $row['Nama']; ?></td>
                    <td><?php echo $row['Lab']; ?></td>
                    <td> <a href='edit_aslab.php?NIM=<?php echo $row['NIM']; ?>'>Edit</a> / <a href='delete_aslab.php?NIM=<?php echo $row['NIM']; ?>'>Delete</a> </td>
                    </tr>
                <?php } 
                mysqli_free_result($result);
                ?>
            </table>
            <a href="input_aslab.php" class="button-group">
            <button type="button" class="btn btn-success">Tambah Data</button>
        </a>
    </div>
</body>
</html>