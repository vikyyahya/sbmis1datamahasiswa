<!DOCTYPE html>
<html>
<head>
    <title>Dataa Mahasiswa</title>
    
</head>
<body>

<?php
echo "hallo word";

$koneksi = mysqli_connect("https://submis1datamahasiswa.azurewebsites.net","viky","aaaaaatakcodingwebappserverA1","dbMahasiswa") or die(mysqli_error());
if ($koneksi)
{
    echo "berhasil";
}else{
    echo "gagal";
}
?>
</body>
</html>
