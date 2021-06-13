<?php
// include database connection file
include_once("config.php");
 
// Check if form is submitted for user update, then redirect to homepage after update
if(isset($_POST['update']))
{	
	$id = $_POST['id_anggota'];
	
	$kode =$_POST['kode'];
	$nama=$_POST['nama'];
	$jk =$_POST['jk_anggota'];
	$jurusan=$_POST['jurusan'];
	$no_telp=$_POST['no_telp'];
	$alamat =$_POST['alamat'];
		
	// update user data
	$sql = "UPDATE anggota SET kode_anggota='$kode',nama_anggota='$nama', jk_anggota='$jk', jurusan_anggota = '$jurusan', no_telp_anggota = '$no_telp', alamat_anggota = '$alamat' WHERE id_anggota='$id' ";
	$result = mysqli_query($conn, $sql );
	
	// Redirect to homepage to display updated user in list
	header("Location: index.php");
}
?>
<?php
// Display selected user data based on id
// Getting id from url
$id = $_GET['id'];
 
// Fetech user data based on id
$sql = "SELECT * FROM anggota WHERE id_anggota = '{$id}'";
$result = mysqli_query($conn, $sql);
 
while($user_data = mysqli_fetch_array($result))
{
	$id = $user_data['id_anggota'];
	$kode = $user_data['kode_anggota'];
	$nama = $user_data['nama_anggota'];
	$jk = $user_data['jk_anggota'];
	$jurusan = $user_data['jurusan_anggota'];
	$no_telp = $user_data['no_telp_anggota'];
	$alamat = $user_data['alamat_anggota'];
}
?>
<html>
<head>	
	<title>Edit User Data</title>
</head>
 
<body>
	<a href="index.php">Home</a>
	<br/><br/>
	
	<form name="update_user" method="post" action="edit.php">
		<table border="0">
			<tr> 
				<td>ID Anggota</td>
				<td><input type="text" name="id_anggota" value=<?php echo $id;?>></td>
			</tr>
			<tr> 
				<td>Kode Anggota</td>
				<td><input type="text" name="kode" value=<?php echo $kode;?>></td>
			</tr>
			<tr> 
				<td>Nama</td>
				<td><input type="text" name="nama" value=<?php echo $nama;?>></td>
			</tr>
			<tr> 
				<td>Jenis kelamin</td>
				<td><input type="radio" name="jk_anggota" value="laki-laki" <?php if($jk=='L') echo 'checked'?>>laki-laki</td>
				<td><input type="radio" name="jk_anggota" value="perempuan" <?php if($jk=='P') echo 'checked'?>>perempuan</td>
			</tr>
			<tr> 
				<td>Jurusan</td>
				<td><input type="text" name="jurusan" value=<?php echo $jurusan;?>></td>
			</tr>
			<tr> 
				<td>No Telp</td>
				<td><input type="text" name="no_telp" value=<?php echo $no_telp;?>></td>
			</tr>
			<tr> 
				<td>Alamat</td>
				<td><input type="text" name="alamat" value=<?php echo $alamat;?>></td>
			</tr>
			<tr>
				<td><input type="hidden" name="id" value="<?php echo $data['id_barang'];?>"></td>
				<td><input type="submit" name="update" value="Update"></td>
			</tr>
		</table>
	</form>
</body>
</html>