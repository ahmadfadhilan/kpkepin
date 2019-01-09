<?php 
require_once '../../koneksi/conn.php';
$no_spp = $conn->real_escape_string($_POST['no_spp']);
$judul_program_penyerapan = $conn->real_escape_string($_POST['judul_program_penyerapan']);
$biaya = $conn->real_escape_string($_POST['biaya']);
$tanggal = $conn->real_escape_string($_POST['tanggal']);
$judul_program_kerja = $conn->real_escape_string($_POST['judul_program_kerja']);

$data = array();
$data['error_string'] = array();
$data['inputerror'] = array();
$data['status'] = TRUE;

if($no_spp == ''){
	$data['inputerror'][] = 'no_spp';
	$data['error_string'][] = 'No.Proker wajib di isi';
	$data['status'] = FALSE;
}

if($judul_program_penyerapan == ''){
	$data['inputerror'][] = 'judul_program_penyerapan';
	$data['error_string'][] = 'wajib di isi';
	$data['status'] = FALSE;
}

if($biaya == ''){
	$data['inputerror'][] = 'biaya';
	$data['error_string'][] = 'wajib di isi';
	$data['status'] = FALSE;
}

if($judul_program_kerja == ''){
	$data['inputerror'][] = 'judul_program_kerja';
	$data['error_string'][] = 'Jumlah wajib diisi';
	$data['status'] = FALSE;
}

if($data['status'] === FALSE){
	echo json_encode($data);
	exit();
}

$sql=$conn->query("UPDATE penyerapan SET no_spp='$no_spp',judul_program_penyerapan='$judul_program_penyerapan',biaya='$biaya',judul_program_kerja='$judul_program_kerja' WHERE no_spp='$no_spp' ");
if ($sql) {
    echo json_encode(array("status" => TRUE));
}
?>