<?php


$id_user = $_SESSION['id_users'];
$sql_pendaftar = "SELECT * FROM pendaftar WHERE users_id = '$id_user'";
$result_pendaftar = mysqli_query($koneksi, $sql_pendaftar);

if (mysqli_num_rows($result_pendaftar)) {
    $data_pendaftar = mysqli_fetch_array($result_pendaftar);
    $id_pendaftar = $data_pendaftar['id'];

    $sql_nilai = "SELECT * FROM nilai WHERE pendaftar_id = '$id_pendaftar'";
    $result_nilai = mysqli_query($koneksi,$sql_nilai);

    if (mysqli_num_rows($result_nilai)) {
        $data_nilai = mysqli_fetch_array($result_nilai);
        $status = $data_nilai['status'];

        // echo "status : " . $status;
        // die;

    } else {
        //JIka belum ada nilai atau status, maka kosong
    }
    
    //Simpan data
    if(isset($_POST['btn_simpan']) && $_POST['btn_simpan'] == 'simpan_nilai'){
        $un = $_POST['nilai_un'];
        $us = $_POST['nilai_us'];
        $rt = $_POST['nilai_rata'];

        if (($un <= 0 || $un > 100) || ($us <= 0 || $us > 100) || ($rt <= 0 || $rt > 100))  {
            // $_SESSION['insert_nilai_gagal'] = "Insert nilai gagal! Silahkan masukkan nilai dengan benar!";
            echo "<script>alert('Insert nilai gagal!'): window.location='../siswa/dashboard.php'</script>";
            header('location:../siswa/dashboard.php');
            // echo('Masuk'); die;
        } else {
           
            $sql_insert_nilai = "INSERT INTO nilai(nilai_un, nilai_us, nilai_rata, status, pendaftar_id) 
            VALUES ('$un', '$us', '$rt', 0, '$id_pendaftar') ";
        
            $query_insert_nilai = mysqli_query($koneksi, $sql_insert_nilai);
            
            if ($query_insert_nilai) {
                $_SESSION['pesan_insert_nilai'] = "Insert data nilai berhasil!";
                echo '<script>window.location="../siswa/dashboard.php"</script>';
                header('location:../siswa/dashboard.php');
            } else {
                echo "Error : " . mysqli_error($koneksi);
                die;
            }
            
        }
    }
    
}
?>