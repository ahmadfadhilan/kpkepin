<?php 
require_once '../../koneksi/conn.php';
$judul_program_kerja=$_GET['judul_program_kerja'];
// $tgl_akhir=$_GET['tgl_akhir'];
$query = $conn->query("SELECT no_spp,judul_program_penyerapan,biaya,judul_program_kerja FROM penyerapan WHERE judul_program_kerja = $judul_program_kerja");
?>
<div id="tes">
<h2>Laporan Penyerapan Tanggal <?= $judul_program_kerja ?> </h2>
<table class="table" id="printed">
    <thead>
        <tr>
            <th>No</th>
            <th>No.SPP</th>
            <th>Judul Program Penyerapan</th>
            <th>Biaya</th>
            <th>Judul Program Kerja</th>                     
        </tr>
    </thead>
<tbody>
    <?php
    $no=1;
    while ($row = $query->fetch_assoc()) { ?>
        <tr>
            <td><?=$no++; ?></td>
            <td><?=$row['no_spp'] ?></td>
            <td><?=$row['judul_program_penyerapan'] ?></td>
            <td><?= "Rp. ".number_format($row['biaya']); ?></td>
            <td><?=$row['judul_program_kerja'] ?></td>
        </tr>
   
    <?php 
    $total=$total+$row['biaya'];
    }

    ?>

</tbody>
<tr>
    <th></th>
    <th>Total Penyerapan</th>
    <td><b><?= "Rp. ".number_format($total); ?></b></td>
</tr>
</table>
    
</div>
<div class="row">
    <div class="col-sm-12">
    <button type="button" class="btn btn-success" onclick="print()">Print PDF</button>
    </div>
</div>

<script>
    


function print() {
   var pdf = new jsPDF('p', 'pt', 'letter');
    source = $('#tes')[0];
    specialElementHandlers = {
        '#bypassme': function (element, renderer) {
            return true
        }
    };
    margins = {
        top: 40,
        bottom: 40,
        left: 80,
        width: 700
    };
    // all coords and widths are in jsPDF instance's declared units
    // 'inches' in this case
    pdf.fromHTML(
    source, // HTML string or DOM elem ref.
    margins.left, // x coord
    margins.top, { // y coord
        'width': margins.width, // max width of content on PDF
        'elementHandlers': specialElementHandlers
    },

    function (dispose) {
        pdf.save('Test.pdf');
    }, margins);
}   
</script>n 