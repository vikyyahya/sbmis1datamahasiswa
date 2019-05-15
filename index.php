<!DOCTYPE html>
<html>
<head>
    <title>Dataaa Mahasiswa</title>
    
</head>
<body>

<?php
echo "hallo word";

$koneksi = mysql_connect("https://submis1datamahasiswa.azurewebsites.net","viky","aaaaaatakcodingwebappserverA1","dbMahasiswa");
if ($koneksi)
{
    echo "berhasil";
}else{
    echo "gagal";
}
?>
</body>
</html>
