<?php include('../config/auto_load.php'); ?>

<?php include('../controller/siswa_dashboard_control.php'); ?>

<?php include('../template/header.php'); ?>

<!-- Begin Page Content -->
<div class="container-fluid">
  <!-- Page Heading -->
  <h1 class="h3 mb-4 text-gray-800 text-left">Dashboard</h1>
  <!-- <hr> -->

    <div class="row">
        <div class="col-md-12">
            <?php

                if (isset($_SESSION['pesan_profil'])  && $_SESSION['pesan_profil'] <> '') {
                    echo '<div class="alert alert-success text-center">'. $_SESSION['pesan_profil'] .'</div>';

                }

                if (isset($_SESSION['pesan_nilai_gagal']) && $_SESSION['pesan_nilai_gagal'] <> '') {
                    echo '<div class="alert alert-danger text-center">'. $_SESSION['pesan_nilai_gagal'] .'</div>';
                }

                if (isset($_SESSION['pesan_nilai_sukses']) && $_SESSION['pesan_nilai_sukses'] <> '') {
                    echo '<div class="alert alert-success text-center">'. $_SESSION['pesan_nilai_sukses'] .'</div>';
                }
                                
                unset($_SESSION['pesan_profil']);
                unset($_SESSION['pesan_nilai_gagal']);
                unset($_SESSION['pesan_nilai_sukses']);
                
            ?>
        </div>



    <!-- Kolom Pertama -->
        <div class="col-md-6">
            <div class="row">
                <?php if(!isset($status) ) { ?>

                <!-- Data Nilai -->
                <div class="col-md-12">
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">MASUKKAN DATA NILAI</h6>
                        </div>
                        <div class="card-body">
                            <h6 class="text-left mt-1 mb-3 text-danger">* Masukkan nilai Anda untuk syarat validasi pendaftaran</h6>
                            <form class="user" method="POST" action="<?= $base_url ?>/siswa/dashboard.php">
                                <div class="form-group">
                                    <label for="nilai_un">Nilai Ujian Nasional</label>
                                <input type="number" name="nilai_un" class="form-control form-control"  required="" id="nilai_un" placeholder="Masukkan Nilai Ujian Nasional">
                                </div>
                                <form class="user">
                                    <div class="form-group">
                                        <label for="nilai_us">Nilai Ujian Sekolah</label>
                                         <input type="number" name="nilai_us" class="form-control form-control"  required="" id="nilai_us" placeholder="Masukkan Nilai Ujian Sekolah">
                                    </div>
                                <form class="user">
                                    <div class="form-group">
                                        <label for="nilai_rata">Nilai Rata-rata</label>
                                         <input type="number" name="nilai_rata" class="form-control form-control"  required="" id="nilai_rata" placeholder="Masukkan Nilai Rata-rata">
                                    </div>

                                <div class="text-right">
                                    <button type="submit" name="btn_simpan" value="simpan_nilai"  class="btn btn-primary"> Simpan </button>
                                    <a href="dashboard.php" class="btn btn-danger" name="kembali">Kembali</a>
                                </div>                  
                            </form>
                        </div>
                    </div>
                </div>

                <?php } else if(isset($status) && $status == 0) { ?>

                <!-- Proses Penilaian -->
                <div class="col-md-12">
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">PENGUMUMAN VALIDASI PENDAFTARAN</h6>
                        </div>
                            <div class="card-body">
                                <div class="card text-center">
                                    <div class="card-body">
                                        <h5 class="card-title mb-4 mt-3">Proses Penilaian</h5>
                                        <div class="col-auto">
                                            <i class="fas fa-spinner text-warning" style="font-size: 90px"></i>
                                        </div>
                                        <p class="card-text mt-4">
                                            Terima Kasih telah melakukan pendaftaran di MA NU Sunan Giri Prigen, pengumuman pada tanggal : </p>
                                            <span class="badge badge-danger" style="font-size: 18px">5 AGUSTUS 2021</span> 
                                        </p>
                                    </div>
                                    <div class="card-footer">
                                        <marquee style="MARGINmargin-bottom: -5px">MA NU SUNAN GIRI PRIGEN - PROGRAM VOKASIONAL | MULTIMEDIA | PARIWISATA & PERHOTELAN |</marquee>
                                    </div>
                                </div>
                            </div>
                    </div>
                </div>

                <?php } else if(isset($status) && $status == 1) { ?>

                <!-- Penilaian Diterima -->
                <div class="col-md-12">
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">PENGUMUMAN VALIDASI PENDAFTARAN</h6>
                        </div>
                            <div class="card-body">
                                <div class="card text-center">
                                    <div class="card-body">
                                        <h5 class="card-title mb-4 mt-3">ANDA LOLOS</h5>
                                        <div class="col-auto">
                                            <i class="fas fa-check-circle text-success" style="font-size: 90px"></i>
                                        </div>
                                        <p class="card-text mt-4">
                                            Selamat Anda diterima di MA NU Sunan Giri Prigen, pengumuman pada tanggal : </p>
                                            <span class="badge badge-danger" style="font-size: 18px">5 AGUSTUS 2021</span> 
                                        </p>
                                    </div>
                                    <div class="card-footer">
                                        <marquee style="MARGINmargin-bottom: -5px">MA NU SUNAN GIRI PRIGEN - PROGRAM VOKASIONAL | MULTIMEDIA | PARIWISATA & PERHOTELAN |</marquee>
                                    </div>
                                </div>
                            </div>
                    </div>
                </div>

                <?php } else if(isset($status) && $status == 2) { ?>

                <!-- Penilaian Gagal -->
                <div class="col-md-12">
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">PENGUMUMAN VALIDASI PENDAFTARAN</h6>
                        </div>
                            <div class="card-body">
                                <div class="card text-center">
                                    <div class="card-body">
                                        <h5 class="card-title mb-4 mt-3">ANDA TIDAK LOLOS</h5>
                                        <div class="col-auto">
                                            <i class="fas fa-times text-danger" style="font-size: 90px"></i>
                                        </div>
                                        <p class="card-text mt-4">
                                            Anda belum diterima di MA NU Sunan Giri Prigen</p>
                                        </p>
                                    </div>
                                    <div class="card-footer">
                                        <marquee style="MARGINmargin-bottom: -5px">MA NU SUNAN GIRI PRIGEN - PROGRAM VOKASIONAL | MULTIMEDIA | PARIWISATA & PERHOTELAN |</marquee>
                                    </div>
                                </div>
                            </div>
                    </div>
                </div>

                <?php } ?>

                    <!-- Persyaratan Berkas -->
                <div class="col-md-12">
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">PERSYARATAN BERKAS SISWA BARU</h6>
                        </div>
                        <div class="card-body">
                            <div class="text mb-3">
                                <h6 class="">Siswa baru yang sudah diterima di MA NU Sunan Giri Prigen <b>wajib</b> melengkapi berkas sebagai berikut: </h6>
                            </div>
                            <ul class="list-group">
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    1. FC Akta Kelahiran
                                <span class="badge badge-primary badge-pill">2 Lembar</span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    2. FC Kartu Keluarga
                                <span class="badge badge-primary badge-pill">2 Lembar</span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    3. FC Ijazah SMP/MTs
                                <span class="badge badge-primary badge-pill">2 Lembar</span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    4. FC Surat Keterangan Kelulusan
                                <span class="badge badge-primary badge-pill">2 Lembar</span>
                                </li>
                            
                            </ul>

                                <h6 class="text mt-3 text-danger">* Wajib melengkapi berkas diatas pada saat awal masuk sekolah Tahun Pelajaran Baru 2021/2022 </h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Kolom Kedua -->
        <div class="col-md-6">
            <div class="row">
                <!-- Data Diri -->
                <div class="col-md-12">
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">DATA DIRI</h6>
                        </div>
                        <div class="card-body">
                            <div class="text-center">
                            <?php
                                if($data_pendaftar['foto'] != NULL && isset($data_pendaftar['foto'])) {
                                $foto = '../uploads/' . $data_pendaftar['foto'];
                                } else {
                                    $foto = '../assets/img/avatar.png';
                                }
                            ?>
                            <img src="<?= $foto ?>" alt="fotoprofil" class="img-fuild rounded-circle" style="width: 200px; height:200px">
                        </div>
                        <div class="text-right mt-2">
                            <a href="editprofile.php" name="edit_profile" class="btn btn-warning btn-sm mb-3">
                            <i class="fas fa-user-edit fa-sm fa-fw mr-2"></i>
                            Edit Profile</a>                        
                        </div>
                        <h5 class="text-center card-title text-uppercase" style="color: black"><b> <?= $data_pendaftar['nama'] ?> </b></h5>
                        <ul class="list-group">
                            <li class="list-group-item ">
                                <h6 class="mb-0" style="color: black"><b>Tempat, Tanggal Lahir</b></h6>
                                <small class="text-muted"><?= $data_pendaftar['tmpt_lahir'] ?>, <?= date("d-m-Y", strtotime($data_pendaftar['tgl_lahir'] ))?></small>
                            </li>
                            <li class="list-group-item ">
                                <?php
                                    if($data_pendaftar['jenis_kelamin'] == 'L'){
                                        $kelamin = "Laki-laki";
                                    }  else {
                                        $kelamin = "Laki-Perempuan";
                                    }
                                ?>
                                <h6 class="mb-0" style="color: black"><b>Jenis Kelamin</b></h6>
                                <small><?= $kelamin ?></small>
                            </li>
                            <li class="list-group-item ">
                                <h6 class="mb-0" style="color: black"><b>Agama</b></h6>
                                <small> <?= $data_pendaftar['agama'] ?> </small>
                            </li>
                            <li class="list-group-item ">
                                <h6 class="mb-0" style="color: black"><b>Alamat</b></h6>
                                <small> <?= $data_pendaftar['alamat'] ?> </small>
                            </li>
                            <li class="list-group-item ">
                                <h6 class="mb-0" style="color: black"><b>Email</b></h6>
                                <small><?= $data_pendaftar['email'] ?></small>
                            </li>
                            <li class="list-group-item ">
                                <h6 class="mb-0" style="color: black"><b>Telepon</b></h6>
                                <small><?= $data_pendaftar['telepon'] ?></small>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>


    
</div>
</div>
<!-- /.container-fluid -->
      
<?php include('../template/footer.php'); ?>