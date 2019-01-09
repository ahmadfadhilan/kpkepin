<?php 
require_once '../../koneksi/conn.php';
$id_proker = $conn->real_escape_string($_GET['id_proker']);

$sql=$conn->query("DELETE FROM kas_masuk WHERE id_proker='$id_proker' ");
if ($sql) {
    echo json_encode(array("status" => TRUE));
}
?>