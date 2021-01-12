<?php

$id=$_GET['id'];
$ambil=  mysqli_query($koneksi, "SELECT * FROM penduduk WHERE id ='$id'") or die ("SQL Edit error");
$data= mysqli_fetch_array($ambil);
$id_dusun = $data['dusun'];

if ($data['jenis_kelamin']=='Laki-laki') {
    $dsn="UPDATE dusun SET jumlah_laki=jumlah_laki-1, total=total-1 WHERE id_dusun='$id_dusun'";
}else if ($data['jenis_kelamin']=='Perempuan') {
    $dsn="UPDATE dusun SET jumlah_perempuan=jumlah_perempuan-1, total=total-1 WHERE id_dusun='$id_dusun'";
}
$query2= mysqli_query($koneksi, $dsn) or die ("SQL Simpan Arsip Error");



//membuat query untuk hapus data
$sql="DELETE FROM penduduk WHERE id ='".$_GET['id']."'";
$query=mysqli_query($koneksi, $sql) or die ("SQL Hapus Error");




if($query){
    echo"<script> window.location.assign('?page=penduduk&actions=tampil');</script>";
}else{
    echo"<script> alert ('Maaf !!! Data Tidak Berhasil Dihapus') window.location.assign('?page=penduduk&actions=tampil');</scripr>";
}

