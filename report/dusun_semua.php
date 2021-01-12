<!DOCTYPE html>
<html>
    <head>
        <title>Cetak Data Dusun</title>
        <link href="../Assets/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
    </head>  
    <body onload="print()">
        <!--Menampilkan data detail arsip-->
        <?php
        include '../config/koneksi.php';
        ?>   

        <div class="container">
            <div class='row'>
                <div class="col-sm-12">
                    <!--dalam tabel--->
                    <div class="text-center">
                        <h2>Sistem Informasi Desa Perkebunan Limau Manis</h2>
                        <h4>Jalan Jendral Ahmad Yani No. 33, Sei Renggas, Kisaran, Sendang Sari <br> Kisaran Barat, Kabupaten Asahan, Sumatera Utara, 21211</h4>
                        <hr>
                        <h3>REKAP DATA DUSUN</h3>
                        <table class="table table-bordered table-striped table-hover"> 
                        <tbody>
                                <thead>
								<tr>
									<th><center>No.</center></th>
                                    <th width="15%"><center>Nama Dusun</center></th>
                                    <th><center>Kepala Dusun</center></th>
                                    <th width="15%"><center>Jumlah Laki-laki</center></th>
                                    <th width="15%"><center>Jumlah Perempuan</center></th>
                                    <th width="10%"><center>Total</center></th>
								</tr>
								</thead>
							<tbody>
                            <!--ambil data dari database, dan tampilkan kedalam tabel-->
                            <?php
                            //buat sql untuk tampilan data, gunakan kata kunci select
                            $sql = "SELECT * FROM dusun";
                            $query = mysqli_query($koneksi, $sql) or die("SQL Anda Salah");
                            //Baca hasil query dari databse, gunakan perulangan untuk 
                            //Menampilkan data lebh dari satu. disini akan digunakan
                            //while dan fungdi mysqli_fecth_array
                            //Membuat variabel untuk menampilkan nomor urut
                            $nomor = 0;
                            //Melakukan perulangan u/menampilkan data
                            while ($data = mysqli_fetch_array($query)) {
                                $nomor++; //Penambahan satu untuk nilai var nomor
                                ?>
                                <tr>
                                    <td><?= $nomor ?></td>
									<td><?= $data['dusun'] ?></td>
                                    <td><?= $data['kepala_dusun'] ?></td>
                                    <td><?= $data['jumlah_laki'] ?></td>
                                    <td><?= $data['jumlah_perempuan'] ?></td>
									<td><?= $data['total'] ?></td>
                                </tr>
                                <!--Tutup Perulangan data-->
                            <?php } ?>
                                <?php 
                                    $sql1 = "SELECT id FROM penduduk WHERE jenis_kelamin='Laki-laki'";
                                    $query1 = mysqli_query($koneksi, $sql1) or die("SQL Anda Salah");
                                    $laki = mysqli_num_rows($query1);

                                    $sql2 = "SELECT id FROM penduduk WHERE jenis_kelamin='Perempuan'";
                                    $query2 = mysqli_query($koneksi, $sql2) or die("SQL Anda Salah");
                                    $perempuan = mysqli_num_rows($query2);

                                    $sql3 = "SELECT id FROM penduduk";
                                    $query3 = mysqli_query($koneksi, $sql3) or die("SQL Anda Salah");
                                    $total = mysqli_num_rows($query3);
                                ?>
                                <tr style="background-color:#ecebe9">
                                    <td colspan="3"><strong>Total</strong></td>
                                    <td><strong><?= $laki ?></strong></td>
                                    <td><strong><?= $perempuan ?></strong></td>
                                    <td><strong><?= $total ?></strong></td>
                                </tr>
							</tbody>
                        </tbody>
                        </table>
                        <table class="table">
                                <tbody>
                                    <tr>
                                        <td width="50%">
                                            <table>

                                            </table>
                                        </td>
                                        <td></td>
                                        <td>
                                            <div class="text-center">
                                                Lima Puluh,  <?= date("d-m-Y") ?>
                                                <br><br><br><br>
                                                <u><strong>KEPALA DESA<strong></u><br>
                                                NIP.102871291416712
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>     
                        </table>

                    </div>
                </div>
            </div>
    </body>
</html>