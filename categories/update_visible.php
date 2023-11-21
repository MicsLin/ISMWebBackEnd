<?php
require_once dirname(__FILE__) .'/../connect.php';
include_once dirname(__FILE__) . '/../connectHeader.php';
include_once dirname(__FILE__) . '/../echoData.php';

$c_id = $_POST['c_id'];
$visibility = $_POST['visibility'];
$currentTime = date('Y-m-d H:i:s');

$query = "SELECT * FROM categories WHERE c_id = '$c_id'";
$result = $conn->query($query);

$Intval_visibility = intval($visibility);

if ($result->num_rows > 0 && ($Intval_visibility == 1 || $Intval_visibility == 0)) {
    $updateQuery = "UPDATE categories SET 
        visibility = ? 
        WHERE c_id = ?";
    $stmt = $conn->prepare($updateQuery);
    $stmt->bind_param('ss', $visibility, $c_id);

    if ($stmt->execute()) {
        echoData(1, null, 'update success');
    } else {
        echoData(3, null, 'update fail' . $stmt->error);
    }
} else {
    echoData(0, null, '找不到對應的記錄，無法進行更新。');
}
$stmt->close();
$conn->close();