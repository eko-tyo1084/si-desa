<!DOCTYPE html>
<html>
    <head>
        <title>Cetak Data Semua Penduduk</title>
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
                        <h3>DATA SELURUH PENDUDUK</h3>
                        <table class="table table-bordered table-striped table-hover"> 
                        <tbody>
                                <thead>
								<tr>
									<th><center>No.</center></th>
                                    <th width="10%"><center>NIK</center></th>
                                    <th><center>Nama Penduduk</center></th>
                                    <th width="14%"><center>Tempat Lahir</center></th>
                                    <th width="10%"><center>Tanggal Lahir</center></th>
                                    <th width="10%">Jenis Kelamin</th>
                                    <th><center>Dusun</center></th>
                                    <th width="15%"><center>Alamat</center></th>
                                    <th><center>Pekerjaan</center></th>
								</tr>
								</thead>
							<tbody>
                            <!--ambil data dari database, dan tampilkan kedalam tabel-->
                            <?php
                            //buat sql untuk tampilan data, gunakan kata kunci select
                            $sql = "SELECT * FROM penduduk JOIN dusun WHERE penduduk.dusun=dusun.id_dusun";
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
									<td><?= $data['nik'] ?></td>
                                    <td><?= $data['nama'] ?></td>
                                    <td><?= $data['tmp_lahir'] ?></td>
                                    <td><?= $data['tgl_lahir'] ?></td>
									<td><?= $data['jenis_kelamin'] ?></td>
									<td><?= $data['dusun'] ?></td>
									<td><?= $data['alamat'] ?></td>
                                    <td><?= $data['pekerjaan'] ?></td>
                                </tr>
                                <!--Tutup Perulangan data-->
                            <?php } ?>
							</tbody>
                        </tbody>
                            <!-- <tfoot> 
                                <tr>
                                    <td colspan="8" class="text-right">
                                        Kisaran  <?= date("d-m-Y") ?>
                                        <br><br><br><br>
                                        <u>Kabag Hukum, S.Hum<strong></u><br>
                                        NIP.102871291416712
									</td>
								</tr>
							</tfoot>  -->
                        </table>
                        <table class="table">
                                <tbody>
                                    <tr>
                                        <td>
                                            <table>
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
                                                <tr>
                                                    <th >Jumlah Laki-laki</th><td>&nbsp;  : &nbsp;</td><td> <?= $laki ?> Orang</td>
                                                </tr>
                                                <tr>
                                                    <th>Jumlah Perempuan</th><td>&nbsp;  : &nbsp;</td><td> <?= $perempuan ?> Orang</td>
                                                </tr>
                                                <tr>
                                                    <th>Total Penduduk</th><td>&nbsp;  : &nbsp;</td><td> <?= $total ?> Orang</td>
                                                </tr>
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