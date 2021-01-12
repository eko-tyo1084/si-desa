<?php
$id=$_GET['id'];
$ambil=  mysqli_query($koneksi, "SELECT * FROM penduduk JOIN dusun WHERE penduduk.dusun=dusun.id_dusun AND id ='$id'") or die ("SQL Edit error");
$data= mysqli_fetch_array($ambil);
?>
<div class="container">
    <div class="row">
        <div class="col-xs-12">
            <div class="panel panel-success">
                <div class="panel-heading">
                    <h3 class="panel-title">Form Update Data Penduduk</h3>
                </div>
                <div class="panel-body">
                    <!--membuat form untuk tambah data-->
                    <form class="form-horizontal" action="" method="post">
                        <div class="form-group">
                            <label for="nik" class="col-sm-3 control-label">NIK</label>
                            <div class="col-sm-9">
                                <input type="text" name="nik" class="form-control" id="inputEmail3" value="<?= $data['nik'] ?>" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="no_rak" class="col-sm-3 control-label">Nama</label>
                            <div class="col-sm-9">
                                <input type="text" name="nama" class="form-control" id="inputEmail3" value="<?= $data['nama'] ?>" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="no_rak" class="col-sm-3 control-label">Tempat Lahir</label>
                            <div class="col-sm-9">
                                <input type="text" name="tmp_lahir" class="form-control" id="inputEmail3" value="<?= $data['tmp_lahir'] ?>" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="tgl_masuk" class="col-sm-3 control-label">Tanggal Lahir</label>
                            <div class="col-sm-3">
                                <input type="date" name="tgl_lahir" class="form-control" id="inputEmail3" value="<?= $data['tgl_lahir'] ?>" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="ruang_arsip" class="col-sm-3 control-label">Jenis Kelamin</label>
                               <div class="col-sm-2 col-xs-9">
                                <select name="jenis_kelamin" class="form-control">
                                    <option value="<?= $data['jenis_kelamin'] ?>"><?= $data['jenis_kelamin'] ?></option>
                                    <option value="Laki-laki">Laki-laki</option>
                                    <option value="Perempuan">Perempuan</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="ruang_arsip" class="col-sm-3 control-label">Dusun</label>
                            <div class="col-sm-2 col-xs-9">
                                <select name="dusun" class="form-control">
                                    <option value="<?= $data['id_dusun'] ?>"><?= $data['dusun'] ?></option>
                                    <?php
                                        $sql = "SELECT * FROM dusun";
                                        $query = mysqli_query($koneksi, $sql) or die("SQL Anda Salah");
                                        while ($data2 = mysqli_fetch_array($query)) {
                                    ?>
                                        <option value="<?= $data2['id_dusun']?>"><?= $data2['dusun']?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="pengantar" class="col-sm-3 control-label">Alamat</label>
                            <div class="col-sm-9">
                                <input type="text" name="alamat" class="form-control" id="inputPassword3" value="<?= $data['alamat'] ?>" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="pengantar" class="col-sm-3 control-label">Pekerjaan</label>
                            <div class="col-sm-9">
                                <input type="text" name="pekerjaan" class="form-control" id="inputPassword3" value="<?= $data['pekerjaan'] ?>" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-sm-offset-3 col-sm-9">
                                <button type="submit" class="btn btn-success">
                                    <span class="fa fa-edit"></span> Update Data Penduduk</button>
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
    

    $id_dusun = $data['id_dusun'];
    $jkelamin1   =$data['jenis_kelamin'];
    $dusun1=  mysqli_query($koneksi, "SELECT * FROM dusun WHERE id_dusun ='$id_dusun'") or die ("SQL Edit error");
    $dusun2= mysqli_fetch_array($dusun1);

    if ($jkelamin1==$jkelamin && $id_dusun==$dusun) {
        $sql="UPDATE penduduk SET nik='$nik', nama='$nama', tmp_lahir='$templahir', tgl_lahir='$tgllahir', alamat='$alamat', pekerjaan='$pekerjaan' WHERE id ='$id'"; 
        $query=  mysqli_query($koneksi, $sql) or die ("SQL Edit MHS Error");
    }else {
        if ($id_dusun==$dusun) {
            $sql="UPDATE penduduk SET nik='$nik', nama='$nama', tmp_lahir='$templahir', tgl_lahir='$tgllahir', jenis_kelamin='$jkelamin', alamat='$alamat', pekerjaan='$pekerjaan', dusun='$dusun' WHERE id ='$id'"; 
            $query=  mysqli_query($koneksi, $sql) or die ("SQL Edit MHS Error");
    
            if($jkelamin=='Laki-laki'){
                $dsn="UPDATE dusun SET jumlah_laki=jumlah_laki+1,  jumlah_perempuan=jumlah_perempuan-1 WHERE id_dusun='$dusun'";
            }else if ($jkelamin=='Perempuan') {
                $dsn="UPDATE dusun SET jumlah_laki=jumlah_laki-1, jumlah_perempuan=jumlah_perempuan+1 WHERE id_dusun='$dusun'";
            }
            $query2= mysqli_query($koneksi, $dsn) or die ("SQL Simpan Arsip Error");
        }else {
            $sql="UPDATE penduduk SET nik='$nik', nama='$nama', tmp_lahir='$templahir', tgl_lahir='$tgllahir', jenis_kelamin='$jkelamin', alamat='$alamat', pekerjaan='$pekerjaan', dusun='$dusun' WHERE id ='$id'"; 
            $query=  mysqli_query($koneksi, $sql) or die ("SQL Edit MHS Error");
    
            if($jkelamin=='Laki-laki'){
                $dsn="UPDATE dusun SET jumlah_laki=jumlah_laki+1, total=total+1 WHERE id_dusun='$dusun'";
                $dsn2="UPDATE dusun SET jumlah_laki=jumlah_laki-1, total=total-1 WHERE id_dusun='$id_dusun'";
            }else if ($jkelamin=='Perempuan') {
                $dsn="UPDATE dusun SET jumlah_perempuan=jumlah_perempuan+1, total=total+1 WHERE id_dusun='$dusun'";
                $dsn2="UPDATE dusun SET jumlah_perempuan=jumlah_perempuan-1, total=total-1 WHERE id_dusun='$id_dusun'";
            }
            $query2= mysqli_query($koneksi, $dsn) or die ("SQL Simpan Arsip Error");
            $query3= mysqli_query($koneksi, $dsn2) or die ("SQL Simpan Arsip Error");
        }
    }


    if ($query){
        echo "<script>window.location.assign('?page=penduduk&actions=tampil');</script>";
    }else{
        echo "<script>alert('Edit Data Gagal');<script>";
    }
}

?>



