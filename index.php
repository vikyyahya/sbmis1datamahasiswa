<!DOCTYPE html>
<html>
<head>
    <title>Dataa Mahasiswa</title>
    
</head>
<body>

<?php
echo "hallo word";
try {
    $conn = mysqli_connect ("https://submis1datamahasiswa.azurewebsites.net","viky","aaaaaatakcodingwebappserverA1","dbMahasiswa") or die(mysqli_error());
    
}
catch (Exception $e) {
    print("Error connecting to SQL Server.");
    die(print_r($e));
}
    
if ($conn)
{
    echo "berhasil";
}else{
    echo "gagal";
}
?>
</body>
</html>
