<?php
require_once dirname(__FILE__) . '/../connect.php';
include_once dirname(__FILE__) . '/../connectHeader.php';
include_once dirname(__FILE__) . '/../echoData.php';

$Fb_ID = $_POST['Fb_ID'];

try {
    $sql = "DELETE FROM feedback WHERE Fb_ID = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('s', $Fb_ID);
    $stmt->execute();
    $rowCount = $stmt->affected_rows;
    if ($rowCount > 0) {
        echoData(1, null, 'delete success');
    } else {
        echoData(3, null, 'delete fail' . $stmt->error);
    }
} catch (PDOException $e) {
    echo "資料庫錯誤：" . $e->getMessage();
}
$stmt->close();
$conn->close();