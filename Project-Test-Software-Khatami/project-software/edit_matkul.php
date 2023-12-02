<?php
// menghubungkan dengan connect
include 'connect.php';

// Attempt select query execution

$sql = "SELECT * FROM matkul WHERE kode_matkul='".$_GET['kode_matkul']."'";
if($result = mysqli_query($connect, $sql)){
	if(mysqli_num_rows($result) > 0){
		while($row = mysqli_fetch_array($result)){
			$kode_matkul = $row['kode_matkul'];
			$nama_matkul = $row['nama_matkul'];
			$hari        = $row['hari'];
            $jam        = $row['jam'];
            $dosen        = $row['dosen'];
            $Lab = $row['Lab'];
			$NIM = $row['NIM'];
			$Nama = $row['Nama'];
		}
        // Free result set
		mysqli_free_result($result);
	} else{
		echo "No records matching your query were found.";
	}
} else{
	echo "ERROR: Could not able to execute $sql. " . mysqli_error($connect);
}

if (sizeof($_POST)!=0) {
	$kode_matkul = $_POST['kode_matkul'];
	$nama_matkul = $_POST['nama_matkul'];
	$hari        = $_POST['hari'];
    $jam        = $_POST['jam'];
    $dosen        = $_POST['dosen'];
    $NIM        = $_POST['NIM'];


	$sql = "UPDATE matkul SET nama_matkul='$nama_matkul',  hari='$hari', jam='$jam', dosen='$dosen', NIM='$NIM'WHERE kode_matkul='".$_POST['kode_matkul']."'";


	if (mysqli_query($connect, $sql)) {
		echo "Record updated successfully";
	} else {
		echo "Error updating record: " . mysqli_error($connect);
	}


}
// Close connection
mysqli_close($connect);

?>
<!DOCTYPE html>
<html>
<head>
	<title>Edit Data Mata Kuliah</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <legend>Input Data Aslab</legend>
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
<div class="card">
	<div class="card-body">
		<form action="edit_matkul.php?kode_matkul=<?php echo $kode_matkul;?>" method="POST" class="form-block">	
			<div class="form-group">
				<label>kode_matkul</label>
				<input type="text" class="input" name="kode_matkul" value="<?php echo $kode_matkul; ?>" readonly required="">
			</div>
			<div class="form-group">
				<label>nama_matkul</label>
				<input type="text" class="input" name="nama_matkul" value="<?php echo $nama_matkul;?>" required="">
			</div>
			<div class="form-group">
				<label>Hari</label>
				<input type="text" class="input" name="hari" value="<?php echo $hari;?>" required="">
			</div>
            <div class="form-group">
				<label>Jam</label>
				<input type="text" class="input" name="jam" value="<?php echo $jam;?>" required="">
			</div>
            <div class="form-group">
				<label>Dosen</label>
				<input type="text" class="input" name="dosen" value="<?php echo $dosen;?>" required="">
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
				<button type="submit" class="btn btn-success">Edit</button>
				<a href="matkul.php" class="btn btn-danger">Kembali</a>
			</div>
		</form>	
	</div>
</div>
</body>
</html>