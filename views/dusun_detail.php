<div class="container">
    <div class="row">
        <div class="col-xs-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Informasi Detail Dusun</h3>
                </div>
                <div class="panel-body">
                    <!--Menampilkan data detail arsip-->
                    <?php
                    $sql = "SELECT *FROM dusun WHERE id_dusun='" . $_GET ['id'] . "'";
                    //proses query ke database
                    $query = mysqli_query($koneksi, $sql) or die("SQL Detail error");
                    //Merubaha data hasil query kedalam bentuk array
                    $data = mysqli_fetch_array($query);
                    ?>   

                    <!--dalam tabel--->
                    <table class="table"> 
                        <tr>
                            <td>Dusun</td> <td><?= $data['dusun'] ?></td><td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>Kepala Dusun</td> <td><?= $data['kepala_dusun'] ?></td>
                        </tr>
						<tr>
                            <td>Jumlah Laki-laki</td> <td><?= $data['jumlah_laki'] ?></td>
                        </tr>
                        <tr>
                            <td>Jumnlah Perempuan</td> <td><?= $data['jumlah_perempuan'] ?></td>
                        </tr>
						<tr>
                            <td>Total</td> <td><?= $data['total'] ?></td>
                        </tr>
                    </table>
				
                </div> <!--end panel-body-->
                <!--panel footer--> 
                <div class="panel-footer">
                    <a href="?page=dusun&actions=tampil" class="btn btn-success btn-sm">
                        Kembali ke Data Dusun </a>
                </div>
                <!--end panel footer-->
            </div>

        </div>
    </div>
</div>

