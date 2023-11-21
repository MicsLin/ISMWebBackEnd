<?php
require_once dirname(__FILE__) . '/../connect.php';
include_once dirname(__FILE__) . '/../connectHeader.php';
include_once dirname(__FILE__) . '/../echoData.php';

$ID = $_POST['ID'];
$visibility = $_POST['visibility'];
$currentTime = date('Y-m-d H:i:s');

$query = "SELECT * FROM servicecenter WHERE ID = '$ID'";
$result = $conn->query($query);

$Intval_visibility = intval($visibility);

if ($result->num_rows > 0 && ($Intval_visibility == 1 || $Intval_visibility == 0)) {
    $updateQuery = "UPDATE servicecenter SET 
        visibility = ? 
        WHERE ID = ?";
    $stmt = $conn->prepare($updateQuery);
    $stmt->bind_param('ss', $visibility, $ID);

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