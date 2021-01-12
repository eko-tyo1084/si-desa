<?php
$id=$_GET['id'];
$ambil=  mysqli_query($koneksi, "SELECT * FROM dusun WHERE id_dusun='$id'") or die ("SQL Edit error");
$data= mysqli_fetch_array($ambil);
?>
<div class="container">
    <div class="row">
        <div class="col-xs-12">
            <div class="panel panel-success">
                <div class="panel-heading">
                    <h3 class="panel-title">Update Data Dusun</h3>
                </div>
                <div class="panel-body">
                    <!--membuat form untuk tambah data-->
                    <form class="form-horizontal" action="" method="post">
                        <div class="form-group">
                            <label for="no_perkara" class="col-sm-3 control-label">Nama Dusun</label>
                            <div class="col-sm-9">
								<input type="text" name="dusun" class="form-control" id="inputEmail3" value="<?= $data['dusun'] ?>">
                            </div>
                        </div>

						<div class="form-group">
                            <label for="peminjam" class="col-sm-3 control-label">Kepala Dusun</label>
                            <div class="col-sm-9">
                                <input type="text" name="kepala_dusun" class="form-control" id="inputEmail3" value="<?= $data['kepala_dusun'] ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-offset-3 col-sm-9">
                                <button type="submit" class="btn btn-success">
                                    <span class="fa fa-edit"></span> Update Data Dusun</button>
                            </div>
                        </div>
                    </form>


                </div>
                <div class="panel-footer">
                    <a href="?page=dusun&actions=tampil" class="btn btn-danger btn-sm">
                        Kembali Ke Data Dusun
                    </a>
                </div>
            </div>

        </div>
    </div>
</div>

<?php 
if($_POST){
    //Ambil data dari form
    $dusun          = $_POST['dusun'];
    $kepala_dusun   = $_POST['kepala_dusun'];
    //buat sql
    $sql="UPDATE dusun SET dusun = '$dusun', kepala_dusun='$kepala_dusun' WHERE id_dusun='$id'"; 
    $query=  mysqli_query($koneksi, $sql) or die ("SQL Edit MHS Error");
    if ($query){
        echo "<script>window.location.assign('?page=dusun&actions=tampil');</script>";
    }else{
        echo "<script>alert('Edit Data Gagal');<script>";
    }
    }

?>



