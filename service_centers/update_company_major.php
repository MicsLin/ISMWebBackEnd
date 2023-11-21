<?php
require_once dirname(__FILE__) . '/../connect.php';
include_once dirname(__FILE__) . '/../connectHeader.php';
include_once dirname(__FILE__) . '/../echoData.php';

$ID = $_POST['ID'];
$CompanyMajor = $_POST['CompanyMajor'];
$currentTime = date('Y-m-d H:i:s');

$query = "SELECT * FROM servicecenter WHERE ID = '$ID'";
$result = $conn->query($query);

$Intval_CompanyMajor = intval($CompanyMajor);

if ($result->num_rows > 0 && ($Intval_CompanyMajor == 1 || $Intval_CompanyMajor == 0)) {
    $updateQuery = "UPDATE servicecenter SET 
        CompanyMajor = CASE 
        WHEN ID = ? THEN ? 
        ELSE '0' 
    END";
    $stmt = $conn->prepare($updateQuery);
    $stmt->bind_param('ss', $ID, $CompanyMajor);

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