<?php
require_once dirname(__FILE__) . '/../connect.php';
include_once dirname(__FILE__) . '/../connectHeader.php';
include_once dirname(__FILE__) . '/../echoData.php';

$At_ID = $_POST['At_ID'];
$At_Visible = $_POST['At_Visible'];
$currentTime = date('Y-m-d H:i:s');

$query = "SELECT * FROM about WHERE At_ID = '$At_ID'";
$result = $conn->query($query);

$Intval_At_Visible = intval($At_Visible);

if ($result->num_rows > 0 && ($Intval_At_Visible == 1 || $Intval_At_Visible == 0)) {
    // $updateQuery = "UPDATE about SET 
    //     At_Visible = ? 
    //     WHERE At_ID = ?";
    $updateQuery = "UPDATE about SET At_Visible = CASE
        WHEN At_ID = ? THEN ?
        ELSE 0 END";
    $stmt = $conn->prepare($updateQuery);
    $stmt->bind_param('ss', $At_ID, $At_Visible);

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