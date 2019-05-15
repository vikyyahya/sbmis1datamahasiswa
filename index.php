<!DOCTYPE html>
<html>
<head>
    <title>Data Mahasiswa</title>
    
</head>
<body>

<?php
echo "hallo word";

    $conn = mysqli_connect ("takcodingwebappserver.database.windows.net","viky","aaaaaatakcodingwebappserverA1","dbMahasiswa") or die(mysqli_error());
    
    
if ($conn)
{
    echo "berhasil";
}else{
    echo "gagal";
}
?>
</body>
</html>
