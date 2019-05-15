<!DOCTYPE html>
<html>
<head>
    <title>Dataaa Mahasiswa</title>
    
</head>
<body>

<?php
echo "hallo word";
try {
    $conn = new PDO("sqlsrv:server = tcp:takcodingwebappserver.database.windows.net,1433; Database = dbMahasiswa", "viky", "{aaaaaatakcodingwebappserverA1}");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch (PDOException $e) {
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
