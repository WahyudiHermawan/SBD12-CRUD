<?php
// Create database connection using config file
include("config.php");
 
// Fetch all users data from database
$sql = 'SELECT * FROM anggota';
$result = mysqli_query($conn, $sql);
?>
 
<html>
<head>    
    <title>Homepage</title>
	 <style>
         body {font-family:tahoma, arial}
         table {border-collapse: collapse}
         th, td {font-size: 13px; border: 1px solid #DEDEDE; padding: 3px 5px; color: #303030}
         th {background: #CCCCCC; font-size: 12px; border-color:#B0B0B0}
      </style>
</head>
 
<body>
    <h1> DAFTAR ANGGOTA </h1>
    <a href="add.php">Add New User</a><br/><br/> -->
    
    <table width='60%' border=1>
 
    <tr>
        <th>ID Anggota</th> <th>Kode Anggota</th> <th>Nama</th> <th>Jenis Kelamin</th> <th>Jurusan</th> <th>No Telp</th> <th>Alamat</th> <th>Update</th>
    </tr>
    <?php  
    while($user_data = mysqli_fetch_array($result)) {  
        echo "<tr>";
        echo "<td>".$user_data['id_anggota']."</td>";
        echo "<td>".$user_data['kode_anggota']."</td>";
        echo "<td>".$user_data['nama_anggota']."</td>";  
        echo "<td>".$user_data['jk_anggota']."</td>";
        echo "<td>".$user_data['jurusan_anggota']."</td>";
        echo "<td>".$user_data['no_telp_anggota']."</td>";
        echo "<td>".$user_data['alamat_anggota']."</td>";  
        echo "<td><a href='edit.php?id=$user_data[id_anggota]'>Edit</a> | <a href='delete.php?id=$user_data[id_anggota]'>Delete</a></td></tr>";        
		
    }
    ?>
    </table>
</body>
</html>