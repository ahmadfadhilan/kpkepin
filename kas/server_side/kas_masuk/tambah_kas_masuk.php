<?php 
require_once '../../koneksi/conn.php';

$no_prk = $conn->real_escape_string($_POST['no_prk']);
$nama = $conn->real_escape_string($_POST['nama']);
$coa = $conn->real_escape_string($_POST['coa']);
$kategori = $conn->real_escape_string($_POST['kategori']);
$jumlah = $conn->real_escape_string($_POST['jumlah']);

$data = array();
$data['error_string'] = array();
$data['inputerror'] = array();
$data['status'] = TRUE;

if($no_prk == ''){
	$data['inputerror'][] = 'no_prk';
	$data['error_string'][] = 'No.Proker wajib di isi';
	$data['status'] = FALSE;
}

if($nama == ''){
	$data['inputerror'][] = 'nama';
	$data['error_string'][] = 'Nama wajib di isi';
	$data['status'] = FALSE;
}

if($coa == ''){
	$data['inputerror'][] = 'coa';
	$data['error_string'][] = 'Coa wajib di isi';
	$data['status'] = FALSE;
}

if($kategori == ''){
	$data['inputerror'][] = 'kategori';
	$data['error_string'][] = 'Kategori wajib di isi';
	$data['status'] = FALSE;
}

if($jumlah == ''){
	$data['inputerror'][] = 'jumlah';
	$data['error_string'][] = 'Jumlah wajib diisi';
	$data['status'] = FALSE;
}

if($data['status'] === FALSE){
	echo json_encode($data);
	exit();
}

$sql=$conn->query("INSERT INTO kas_masuk VALUES ('','$no_prk','$nama','$coa','$kategori','$jumlah',NULL) ");
if ($sql) {
    echo json_encode(array("status" => TRUE));
}
?>