<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Tambah Data Mata Kuliah</title>
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
<legend>Input Data Matkul</legend>
<div class="card">
	<div class="card-body">
		<form action="pinputmatkul.php" method="POST" class="form-block">	
        <div class="form-group">
				<label>Kode Matkul</label>
				<input type="text" class="input" name="kode_matkul" required="">
			</div>
            <div class="form-group">
				<label>Nama Matkul</label>
				<input type="text" class="input" name="nama_matkul" required="">
			</div>
            <div class="form-group">
				<label>Hari</label>
				<input type="text" class="input" name="hari" required="">
			</div>
            <div class="form-group">
				<label>Jam</label>
				<input type="time" class="input" name="jam" required="">
			</div>
            <div class="form-group">
				<label>Dosen</label>
				<input type="text" class="input" name="dosen" required="">
			</div>
            <div class="form-group">
				<label>Asisten</label>
                <select class="form-control" id="NIM" name="NIM" required>
                    <option value="">-- Pilih Asisten --</option>
                        <?php
                            require 'connect.php';
                                                    
                               $query = "SELECT * FROM aslab";
                                    $result = mysqli_query($connect, $query);
                                                    
                                    	while ($row = mysqli_fetch_array($result)) {
                                            echo '<option value="'.$row['NIM'].'">'.$row['NIM'].' | '.$row['Nama'].' | '.$row['Lab'].'</option>';
                                        }
                             mysqli_close($connect);
                        ?>
                 </select>
			</div>
			<div class="form-group">
				<button type="submit" class="btn btn-success">Tambahkan</button>
				<a href="matkul.php" class="btn btn-danger">Kembali</a>
			</div>
		</form>	
	</div>
</div>
	</div>
</body>
</html>
