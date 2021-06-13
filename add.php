<html>
<head>
	<title>Add Users</title>
</head>
 
<body>
	<a href="index.php">Go to Home</a>
	<br/><br/>
 
	<form action="add.php" method="post" name="form1">
		<table width="35%" border="0">
			<tr> 
				<td>ID Anggota</td>
				<td><input type="test" name="id"></td>
			</tr>
			<tr> 
				<td>Kode Anggota</td>
				<td><input type="text" name="kode"></td>
			</tr>
			<tr> 
				<td>Nama</td>
				<td><input type="text" name="nama"></td>
			</tr>
			<tr> 
				<td>Jenis Kelamin</td>
				<td><input type="radio" name="jk_anggota" value="L" checked> Laki-laki<br></td>
				<td><input type="radio" name="jk_anggota" value="P"> Perempuan<br></td>
			</tr>
			<tr> 
				<td>Jurusan</td>
				<td><input type="text" name="jurusan"></td>
			</tr>
			<tr> 
				<td>No Telp</td>
				<td><input type="text" name="no_telp"></td>
			</tr>
			<tr> 
				<td>Alamat</td>
				<td><input type="text" name="alamat"></td>
			</tr>
			<tr> 
				<td></td>
				<td><input type="submit" name="Submit" value="Add"></td>
			</tr>
		</table>
	</form>
	
	<?php
 
	// Check If form submitted, insert form data into users table.
	if(isset($_POST['Submit'])) {
		$id = $_POST['id'];
		$kode = $_POST['kode'];
		$nama = $_POST['nama'];
		$jk = $_POST['jk_anggota'];
		$jurusan = $_POST['jurusan'];
		$no_telp = $_POST['no_telp'];
		$alamat = $_POST['alamat'];
		
		// include database connection file
		include_once("config.php");
				
		// Insert user data into table
		$sql = 'INSERT INTO anggota (id_anggota, kode_anggota,nama_anggota, jk_anggota, jurusan_anggota, no_telp_anggota, alamat_anggota) ';
		$sql .= "VALUE ('{$id}', '{$kode}','{$nama}','{$jk}', '{$jurusan}', '{$no_telp}', '{$alamat}')";
		$result = mysqli_query($conn, $sql);
		
		// Show message when user added
		echo "User added successfully. <a href='index.php'>View Users</a>";
	}
	?>
</body>
</html>