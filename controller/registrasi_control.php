<?php

include('../config/koneksi.php');
session_start();

if (isset($_POST['btn_registrasi'])) {
    // print_r($_POST);

    $nama = $_POST['nama'];
    $tempat_lahir = $_POST['tempat_lahir'];
    $tanggal_lahir = date("Y-m-d", strtotime($_POST['tgl_lahir']));
    $jenis_kelamin = $_POST['jenis_kelamin'];
    $agama = $_POST['agama'];
    $alamat = $_POST['alamat'];
    $email = $_POST['email'];
    $telepon = $_POST['telepon'];
    $password = md5($_POST['password']);
    $ulangi_password = md5($_POST['ulangi_password']);

    if ($_FILES['gambar']['name'] != '') {
        $ekstensi_diperbolehkan = array('jpg', 'png');
        $nama_gambar = $_FILES['gambar']['name'];
        $x = explode('.', $nama_gambar);
        $ekstensi = strtolower(end($x));
        $ukuran = $_FILES['gambar']['size'];
        $file_temp = $_FILES['gambar']['tmp_name'];
    
        $ubah_nama = $nama . '.' . $ekstensi;
    
        if (in_array($ekstensi, $ekstensi_diperbolehkan) == true) {
            if ($ukuran < 1044070) {
                move_uploaded_file($file_temp, '../uploads/'. $ubah_nama);
                $sql_update_profile = "UPDATE pendaftar SET foto = '$ubah_nama' where users_id='$id_user'";
                $query_update_profile = mysqli_query($koneksi, $sql_update_profile);
                if ($query_update_profile) {
                    
                } else {
                    echo "Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database";
                    die;
                }

            } else {
                echo "Maaf, Ukuran gambar yang diupload tidak boleh lebih dari 1MB";
                die;
            }
        } else {
            echo "Maaf, Tipe gambar yang diupload harus JPG / JPEG / PNG.";
            die;
        }
    }

    if($password != $ulangi_password){
        $_SESSION['pesan_registrasi'] = "Password tidak sama, Masukkan kembali password Anda!";
        echo '<script>window.location="../registrasi.php"</script>';
        header('location:registrasi.php');
        die;
    }

    $sql_user = "INSERT INTO users (nama, username, password, level) VALUES ('$nama','$email','$password','siswa')";
    $result_user = mysqli_query($koneksi, $sql_user);

    if($result_user){
        $data_user = mysqli_query($koneksi, "SELECT LAST_INSERT_ID()");
        while($u = mysqli_fetch_array($data_user)){
            $id_user = $u[0];
        }


        

        $sql_pendaftar = "INSERT INTO pendaftar (nama, tmpt_lahir, tgl_lahir, jenis_kelamin, agama, alamat, email, telepon, foto, users_id) 
        VALUES ('$nama','$tempat_lahir','$tanggal_lahir','$jenis_kelamin','$agama','$alamat','$email','$telepon', '$ubah_nama', '$id_user')";
        $result_pendaftar = mysqli_query($koneksi, $sql_pendaftar);

        if ($result_pendaftar) {
            $_SESSION['pesan_registrasi'] = "Registrasi berhasil! Silahkan login menggunakan Email dan Password Anda!";
            echo '<script>window.location="../login.php"</script>';
            header('location:../login.php');
            die;
        } else {

        }

    } else {
        $_SESSION['pesan_registrasi'] = "Maaf, Akun sudah terdaftar! Gunakan email yang lain! ";
        echo '<script>window.location="../registrasi.php"</script>';
        header('location:../registrasi.php');
        die;
    }

} else {
    header('location:../registrasi.php');
}

?>