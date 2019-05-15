<!DOCTYPE html>
<html>
<head>
    <title>Dataa Mahasiswa</title>
    
</head>
<body>

<?php
echo "hallo word";

    $host = "takcodingwebappserver.database.windows.net";
    $user = "viky";
    $pass = "aaaaaatakcodingwebappserverA1";
    $db = "dbMahasiswa";
    try {
        $conn = new PDO("sqlsrv:server = $host; Database = $db", $user, $pass);
        $conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
    } catch(Exception $e) {
        echo "Failed: " . $e;
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
