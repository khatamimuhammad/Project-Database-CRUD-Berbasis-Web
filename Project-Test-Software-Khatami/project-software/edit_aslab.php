<?php
// menghubungkan dengan connect
include 'connect.php';

// Attempt select query execution

$sql = "SELECT * FROM aslab WHERE NIM='".$_GET['NIM']."'";
if($result = mysqli_query($connect, $sql)){
	if(mysqli_num_rows($result) > 0){
		while($row = mysqli_fetch_array($result)){
			$NIM = $row['NIM'];
			$Nama = $row['Nama'];
			$Lab = $row['Lab'];
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
	$NIM = $_POST['NIM'];
	$Nama = $_POST['Nama'];
	$Lab = $_POST['Lab'];


	$sql = "UPDATE aslab SET Nama='$Nama', Lab='$Lab' WHERE NIM='".$_POST['NIM']."'";


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
	<title>Edit Data Asisten</title>
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
		<form action="edit_aslab.php?NIM=<?php echo $NIM;?>" method="POST" class="form-block">	
			<div class="form-group">
				<label>NIM</label>
				<input type="text" class="input" name="NIM" value="<?php echo $NIM; ?>" readonly required="">
			</div>
			<div class="form-group">
				<label>Nama</label>
				<input type="text" class="input" name="Nama" value="<?php echo $Nama;?>" required="">
			</div>
			<div class="form-group">
				<label>Lab</label>
				<input type="text" class="input" name="Lab" value="<?php echo $Lab;?>" required="">
			</div>
			<div class="form-group">
				<button type="submit" class="btn btn-success">Edit</button>
				<a href="aslab.php" class="btn btn-danger">Kembali</a>
			</div>
		</form>	
	</div>
</div>
</body>
</html>