<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Tambah Data Asisten</title>
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
	<legend>Input Data Aslab</legend>
	<div class="card">
	<div class="card-body">
		<form action="pinputaslab.php" method="POST" class="form-block">	
			<div class="form-group">
				<label>NIM</label>
				<input type="text" class="input" name="NIM" required="">
			</div>
			<div class="form-group">
				<label>Nama</label>
				<input type="text" class="input" name="Nama" required="">
			</div>
			<div class="form-group">
				<label>Lab</label>
				<input type="text" class="input" name="Lab" required="">
			</div>
			<div class="form-group">
				<button type="submit" class="btn btn-success">Tambahkan</button>
				<a href="aslab.php" class="btn btn-danger">Kembali</a>
			</div>
		</form>	
	</div>
</div>
	</div>
</body>
</html>
