<?php 
require_once '../koneksi/conn.php'; 
$nama = $conn->real_escape_string($_POST['kas_masuk.nama']);
$query_kas = $conn->query("SELECT judul_program_kerja FROM penyerapan"); ?>

<div class="container-fluid">
    <div class="row bg-title">
        <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
            <h4 class="page-title"> Laporan Penyerapan Anggaran </h4> </div>
        <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
            <ol class="breadcrumb">
                <li><a href="#"> Laporan Penyerapan Anggaran </a></li>
            </ol>
        </div>
        <!-- /.col-lg-12 -->
    </div>
     <div class="row">
        <div class="col-sm-12">
            <div class="white-box">
                <div class="row">
                    <!-- <div class="col-sm-4">
                        <input type="text" name="tanggal_awal" data-date-format="yyyy-mm-dd" readonly id="tanggal_awal" placeholder="Tanggal Awal" class="form-control form-control-line tgl">
                    </div>
                    <div class="col-sm-4">
                        <input type="text" placeholder="Tanggal Akhir" data-date-format="yyyy-mm-dd" readonly name="tanggal akhir" id="tanggal_akhir" class="form-control form-control-line tgl"> 
                    </div> -->
                    <div class="col-sm-8">
                        <select name="judul_program_kerja" id="judul_program_kerja" class="form-control form-control-line">
                        <option value="">--Silahkan Pilih--</option>
                        <?php 
                            while ($row = $query_kas->fetch_assoc()) { ?>
                                <option value="<?=$row['nama'] ?>"><?=$row['nama'] ?></option>
                           <?php }
                        ?>
                        
                        </select>
                    </div>
                    



                    <div class="col-sm-4">
                         <button type="button" class="btn btn-warning pull-right" onclick="back()"> Kembali </button>
                        <button type="button" class="btn btn-primary pull-right" onclick="lihat_laporan()" style="margin-right: 5px;"> Lihat</button>
                       
                    </div>
                </div>
                <br>
                
                
                <div class="table-responsive">
                    <div id="isi_tabel">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>No.SPP</th>
                                <th>Judul Program Penyerapan</th>
                                <th>Biaya</th>
                                <th>Judul Program Kerja</th>                     
                            </tr>
                        </thead>                        
                    </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /.row -->
</div>
<script>
    // $('.tgl').datepicker();
    function back() {
        $('#kontenku').load('page/Penyerapan.php');
    }
    function lihat_laporan() {
        
        let judul_program_kerja = $('#judul_program_kerja').val();
        // console.log()
        // let tgl_akhir = $('#tanggal_akhir').val();
        if (judul_program_kerja=='') {
            alert('harap isi tanggal terlebih dulu');
        }else{
            $('#isi_tabel').load('server_side/penyerapan/laporan_penyerapan.php?judul_program_kerja='+judul_program_kerja);
        }
        
    }
</script>
      