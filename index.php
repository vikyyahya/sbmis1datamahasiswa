<!DOCTYPE html>
<html>
<head>
    <title>Data Mahasiswa</title>
    
</head>
<body>

<?php


    $host = "takcodingwebappserver.database.windows.net";
    $user = "viky";
    $pass = "aaaaaatakcodingwebappserverA1";
    $db = "dbMahasiswa";
    try {
        $koneksi = new PDO("sqlsrv:server = $host; Database = $db", $user, $pass);
        $koneksi->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
    } catch(Exception $e) {
        echo "Failed: " . $e;
    }
//     $koneksi = mysqli_connect("takcodingwebappserver.database.windows.net","viky","aaaaaatakcodingwebappserverA1","dbMahasiswa") or die(mysqli_error());
    
function tambah($koneksi){
    
    if (isset($_POST['btn_simpan'])){
        $nim = $_POST['nim'];
        $nama = $_POST['nama'];
        $jenisKelamin = $_POST['jenisKelamin'];
        $alamat = $_POST['alamat'];
        $hobi = $_POST['hobi'];
        
        if(!empty($nama) && !empty($jenisKelamin) && !empty($alamat) && !empty($hobi)){
            $sql = "INSERT INTO mahasiswa (nim,nama,jenisKelamin, alamat,hobi) VALUES(".$nim.",'".$nama."','".$jenisKelamin."','".$alamat."','".$hobi."')";
            
            
            $query = $koneksi->prepare($sql);
            $query -> execute();
            
            
            if($query && isset($_GET['aksi'])){
                if($_GET['aksi'] == 'create'){
                    header('location: index.php');
                }
            }
        } else {
            $pesan = "Tidak dapat menyimpan, data belum lengkap!";
        }
    }

    ?> 
        <form action="" method="POST">
            <fieldset>
                <legend><h2>Tambah data</h2></legend>

                <label>Nim<input type="text" name="nim" /></label> <br>
                <label>Nama <input type="text" name="nama" /> </label> <br>
                <label>jenisKelamin <input type="text" name="jenisKelamin" /> </label><br>
                <label>alamat <input type="text" name="alamat" /> </label> <br>
                <label>Hobi<input type="text" name="hobi" /></label> <br>

                <br>
                <label>
                    <input type="submit" name="btn_simpan" value="Simpan"/>
                    <input type="reset" name="reset" value="Besihkan"/>
                </label>
                <br>
                <p><?php echo isset($pesan) ? $pesan : "" ?></p>
            </fieldset>
        </form>
        
    <?php

}


function tampil_data($koneksi){
    
     $query = $koneksi->prepare("SELECT * FROM mahasiswa");
     $query -> execute();
    
    echo "<fieldset>";
    echo "<legend><h2>Data Mahasiswa</h2></legend>";
    
    echo "<table border='1' cellpadding='10'>";
    echo "<tr>
            <th>Nim</th>
            <th>Nama</th>
            <th>JenisKelamin</th>
            <th>Alamat</th>
            <th>hobi</th>
            <th>Tindakan</th>
          </tr>";
    
    while($data =  $query->fetchObject()){
        ?>
            <tr>
                <td><?php echo $data->nim ?></td>
                <td><?php echo $data->nama ?></td>
                <td><?php echo $data->jenisKelamin ?></td>
                <td><?php echo $data->alamat ?> </td>
                <td><?php echo $data->hobi ?></td>
                <td>
                    <a href="index.php?aksi=update&nim=<?php echo $data->nim ?>&nama=<?php echo $data->nama ?>&jenisKelamin=<?php echo $data->jenisKelamin ?>&alamat=<?php echo $data->alamat ?>&hobi=<?php echo $data->hobi ?>">Ubah</a> |
                    <a href="index.php?aksi=delete&nim=<?php echo $data->nim ?>">Hapus</a>
                </td>
            </tr>
        <?php
    }
    echo "</table>";
    echo "</fieldset>";
}



function ubah($koneksi){

   
   
    if(isset($_POST['btn_ubah'])){
        $nim = $_POST['nim'];
        $nama = $_POST['nama'];
        $jenisKelamin = $_POST['jenisKelamin'];
        $alamat = $_POST['alamat'];
        $hobi = $_POST['hobi'];
        
        if(!empty($nama) && !empty($jenisKelamin) && !empty($alamat) && !empty($hobi)){
            $perubahan = "nama='".$nama."',jenisKelamin='".$jenisKelamin."',alamat='".$alamat."',hobi='".$hobi."'";
            $sql_update = "UPDATE mahasiswa SET ".$perubahan." WHERE nim=$nim";

            $update = $koneksi->prepare($sql_update);
            $update-> execute();

            

            if($update && isset($_GET['aksi'])){
                if($_GET['aksi'] == 'update'){
                    header('location: index.php');
                }
            }
        } else {
            $pesan = "Data tidak lengkap!";
        }
    }
    


    if(isset($_GET['nim'])){
        ?>
            <a href="index.php"> &laquo; Home</a> | 
            <a href="index.php?aksi=create"> (+) Tambah Data</a>
            <hr>
            
            <form action="" method="POST">
            <fieldset>
                <legend><h2>Ubah data</h2></legend>
                <input type="hidden" name="nim" value="<?php echo $_GET['nim'] ?>"/>
                
                <label>nama <input type="text" name="nama" value="<?php echo $_GET['nama'] ?>"/></label> <br>
                <label>jenisKelamin <input type="text" name="jenisKelamin" value="<?php echo $_GET['jenisKelamin'] ?>"/> kg</label><br>
                <label>alamat<input type="text" name="alamat" value="<?php echo $_GET['alamat'] ?>"/> bulan</label> <br>
                <label>hobi <input type="text" name="hobi" value="<?php echo $_GET['hobi'] ?>"/></label> <br>
                <br>
                <label>
                    <input type="submit" name="btn_ubah" value="Simpan Perubahan"/> atau <a href="index.php?aksi=delete&id=<?php echo $_GET['nim'] ?>"> (x) Hapus data ini</a>!
                </label>
                <br>
                <p><?php echo isset($pesan) ? $pesan : "" ?></p>
                
            </fieldset>
            </form>
        <?php
    }
    
}


function hapus($koneksi){
    if(isset($_GET['nim']) && isset($_GET['aksi'])){
        $nim = $_GET['nim'];
        $sql_hapus = "DELETE FROM mahasiswa WHERE nim=" . $nim;
        

        $hapus = $koneksi->prepare($sql_hapus);
        $hapus-> execute();
        
        if($hapus){
            if($_GET['aksi'] == 'delete'){
                header('location: index.php');
            }
        }
    }
    
}



if (isset($_GET['aksi'])){
    switch($_GET['aksi']){
        case "create":
            echo '<a href="index.php"> &laquo; Home</a>';
            tambah($koneksi);
            break;
        case "read":
            tampil_data($koneksi);
            break;
        case "update":
            ubah($koneksi);
            tampil_data($koneksi);
            break;
        case "delete":
            hapus($koneksi);
            break;
        default:
            echo "<h3>Aksi <i>".$_GET['aksi']."</i> tidaka ada!</h3>";
            tambah($koneksi);
            tampil_data($koneksi);
    }
} else {
    tambah($koneksi);
    tampil_data($koneksi);
}
?>
</body>
</html>
