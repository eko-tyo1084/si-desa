<div class="container">
    <div class="row">
        <div class="col-xs-12">
            <div class="panel panel-success">
                <div class="panel-heading">
                    <h3 class="panel-title">Form Tambah Data Arsip</h3>
                </div>
                <div class="panel-body">
                    <!--membuat form untuk tambah data-->
                    <form class="form-horizontal" action="" method="post">
						<div class="form-group">
                            <label for="nik" class="col-sm-3 control-label">NIK</label>
                            <div class="col-sm-9">
                                <input type="text" name="nik" class="form-control" id="inputEmail3" placeholder="Inputkan Nomor Induk Kependudukan" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="no_rak" class="col-sm-3 control-label">Nama</label>
                            <div class="col-sm-9">
                                <input type="text" name="nama" class="form-control" id="inputEmail3" placeholder="Inputkan Nama Penduduk" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="no_rak" class="col-sm-3 control-label">Tempat Lahir</label>
                            <div class="col-sm-9">
                                <input type="text" name="tmp_lahir" class="form-control" id="inputEmail3" placeholder="Inputkan Tempat Lahir" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="tgl_masuk" class="col-sm-3 control-label">Tanggal Lahir</label>
                            <div class="col-sm-3">
                                <input type="date" name="tgl_lahir" class="form-control" id="inputEmail3" placeholder="Inputkan Tanggal Lahir" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="ruang_arsip" class="col-sm-3 control-label">Jenis Kelamin</label>
                               <div class="col-sm-2 col-xs-9">
                                <select name="jenis_kelamin" class="form-control">
                                    <option value="Laki-laki">Laki-laki</option>
                                    <option value="Perempuan">Perempuan</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="ruang_arsip" class="col-sm-3 control-label">Dusun</label>
                               <div class="col-sm-2 col-xs-9">
                                <select name="dusun" class="form-control">
                                    <?php
                                        $sql = "SELECT * FROM dusun";
                                        $query = mysqli_query($koneksi, $sql) or die("SQL Anda Salah");
                                        while ($data = mysqli_fetch_array($query)) {
                                    ?>
                                        <option value="<?= $data['id_dusun']?>"><?= $data['dusun']?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="pengantar" class="col-sm-3 control-label">Alamat</label>
                            <div class="col-sm-9">
                                <input type="text" name="alamat" class="form-control" id="inputPassword3" placeholder="Inputkan Alamat" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="pengantar" class="col-sm-3 control-label">Pekerjaan</label>
                            <div class="col-sm-9">
                                <input type="text" name="pekerjaan" class="form-control" id="inputPassword3" placeholder="Inputkan Pekerjaan" required>
                            </div>
                        </div>
						

                        <div class="form-group">
                            <div class="col-sm-offset-3 col-sm-9">
                                <button type="submit" class="btn btn-success">
                                    <span class="fa fa-save"></span> Simpan Penduduk</button>
                            </div>
                        </div>
                    </form>

                </div>
                <div class="panel-footer">
                    <a href="?page=penduduk&actions=tampil" class="btn btn-danger btn-sm">
                        Kembali Ke Data Penduduk
                    </a>
                </div>
            </div>

        </div>
    </div>
</div>

<?php
if($_POST){
    //Ambil data dari form
    $nik        =$_POST['nik'];
    $nama       =$_POST['nama'];
    $templahir  =$_POST['tmp_lahir'];
    $tgllahir   =$_POST['tgl_lahir'];
    $jkelamin   =$_POST['jenis_kelamin'];
    $alamat     =$_POST['alamat'];
    $pekerjaan  =$_POST['pekerjaan'];
    $dusun      =$_POST['dusun'];

    //buat sql
    $sql="INSERT INTO penduduk VALUES ('','$nik','$nama','$templahir','$tgllahir','$jkelamin','$alamat','$pekerjaan','$dusun')";
    $query=  mysqli_query($koneksi, $sql) or die ("SQL Simpan Arsip Error");

    if($jkelamin=='Laki-laki'){
        $dsn="UPDATE dusun SET jumlah_laki=jumlah_laki+1, total=total+1 WHERE id_dusun='$dusun'";
    }else if ($jkelamin=='Perempuan') {
        $dsn="UPDATE dusun SET jumlah_perempuan=jumlah_perempuan+1, total=total+1 WHERE id_dusun='$dusun'";
    }
    $query2= mysqli_query($koneksi, $dsn) or die ("SQL Simpan Arsip Error");
    if ($query){
        echo "<script>window.location.assign('?page=penduduk&actions=tampil');</script>";
    }else{
        echo "<script>alert('Simpan Data Gagal');<script>";
    }
}

?>
