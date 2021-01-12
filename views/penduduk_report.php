<div class="container">
    <div class="row">
        <div class="col-xs-12">
            <div class="panel panel-success">
                <div class="panel-heading">
                    <h3 class="panel-title"><span class="fa fa-user-plus"></span> Laporan Penduduk</h3>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-sm-6">
                            <table class="table">
                                <thead>
                                    <span>Laporan Penduduk Berdasarkan Dusun</span>
                                    <th width="50%">Dusun</th>
                                    <th>Cetak</th>
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
                                    //Melakukan perulangan u/menampilkan data
                                    while ($data = mysqli_fetch_array($query)) {
                                        ?>
                                        <tr>
                                            <td><?= $data['dusun'] ?></td>
                                            <td>
                                                <a href="report/penduduk_perdusun.php?id=<?= $data['id_dusun'] ?>" target="_blank" class="btn btn-info btn-xs">
                                                    <span class="fa fa-print"></span>
                                                </a>
                                            </td>
                                        </tr>
                                        <!--Tutup Perulangan data-->
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                        <div class="col-sm-6">
                            <a href="report/penduduk_semua.php" target="_blank" class="btn btn-info btn-sm">
                                <span class="fa fa_print"></span> Cetak Semua Data Penduduk
                            </a>
                        </div>
                    </div>
                    
                </div>
            </div>

        </div>
    </div>
</div>

<div id="cetak_perbulan" class="modalDialog">
    <div>
        <a href="#" title="Close" class="close">X</a>

        <form  target="_blank" action="report/arsip_perbulan.php" method="post">
        <h4>Pilih bulan </h4>
        <select name="bulan" class="form-control">
          <option value="12"> Desember </option>
          <option value="11"> November </option>
          <option value="10"> Oktober </option>
          <option value="09"> September </option>
          <option value="08"> Agustus </option>
          <option value="07"> Juli </option>
          <option value="06"> Juni </option>
          <option value="05"> Mei </option>
          <option value="04"> April </option>
          <option value="03"> Maret </option>
          <option value="02"> Februari </option>
          <option value="01"> Januari </option>
        </select>
        <h4>Pilih tahun</h4>
        <select name="tahun" class="form-control">
          <?
            for ($i=substr(date("d-m-Y"),6,4); $i > substr(date("d-m-Y"),6,4)-5; $i--) { ?>
              <option value="<?=$i?>"> <?=$i?> </option>
          <?  }
          ?>
        </select>

        <button type="submit">OK</button>
        </form>
    </div>
</div>

<div id="cetak_pertahun" class="modalDialog">
    <div>
        <a href="#" title="Close" class="close">X</a>

        <form  target="_blank" action="report/arsip_pertahun.php" method="post">
        <h4>Pilih tahun</h4>
        <select name="tahun" class="form-control">
          <?
            for ($i=substr(date("d-m-Y"),6,4); $i > substr(date("d-m-Y"),6,4)-5; $i--) { ?>
              <option value="<?=$i?>"> <?=$i?> </option>
          <?  }
          ?>
        </select>

        <button type="submit">OK</button>
        </form>
    </div>
</div>
