<?php 
require_once '../../koneksi/conn.php';
$no_spp = $conn->real_escape_string($_GET['no_spp']);

$sql=$conn->query("DELETE FROM penyerapan WHERE no_spp='$no_spp' ");
if ($sql) {
    echo json_encode(array("status" => TRUE));
}
?>