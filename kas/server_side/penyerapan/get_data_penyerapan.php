<?php 
require_once '../../koneksi/conn.php';
$no_spp=$_GET['no_spp'];
$query = $conn->query("SELECT * FROM penyerapan WHERE no_spp = '$no_spp'");
$result = array();
$fetchData = $query->fetch_assoc();
$result = $fetchData;
echo json_encode($result);
?>