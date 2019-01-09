<?php 
require_once '../../koneksi/conn.php';
$id_proker=$_GET['id_proker'];
$query = $conn->query("SELECT * FROM kas_masuk WHERE id_proker = '$id_proker'");
$result = array();
$fetchData = $query->fetch_assoc();
$result = $fetchData;
echo json_encode($result);
?>