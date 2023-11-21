<?php
require_once dirname(__FILE__) .'/../connect.php';
include_once dirname(__FILE__) . '/../connectHeader.php';
include_once dirname(__FILE__) . '/../echoData.php';

$Ns_ID = $_POST['Ns_ID'];
$Ns_Visible = $_POST['Ns_Visible'];
$currentTime = date('Y-m-d H:i:s');

$query = "SELECT * FROM news WHERE Ns_ID = '$Ns_ID'";
$result = $conn->query($query);

$Intval_Ns_Visible = intval($Ns_Visible);

if ($result->num_rows > 0 && ($Intval_Ns_Visible == 1 || $Intval_Ns_Visible == 0)) {
    $updateQuery = "UPDATE news SET 
        Ns_Visible = ? 
        WHERE Ns_ID = ?";
    $stmt = $conn->prepare($updateQuery);
    $stmt->bind_param('ss', $Ns_Visible, $Ns_ID);

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