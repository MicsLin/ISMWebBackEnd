<?php
require_once dirname(__FILE__) . '/../connect.php';
include_once dirname(__FILE__) . '/../connectHeader.php';
include_once dirname(__FILE__) . '/../echoData.php';
include_once dirname(__FILE__) . '/../files/deleteFile.php';
include_once dirname(__FILE__) . '/../files/pathAndUrl.php';

$Pa_ID = $_POST['Pa_ID'];

//先刪除圖片
try {
    $sql = "SELECT Pa_Pic FROM partners WHERE Pa_ID = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('s', $Pa_ID);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result && $result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $fileName = $row['Pa_Pic'];
        $imgsFolderPath = getImgsFolderPath();
        $imgPath = getImgPath($imgsFolderPath, $fileName);

        // echo "ID {$Pa_ID} 的 imgPath 是：{$imgPath}";
        deleteFile($imgPath);
    } else {
        // echo "找不到 ID {$Pa_ID} 的相符資料。";
    }
} catch (PDOException $e) {
    echo "資料庫錯誤：" . $e->getMessage();
}

try {
    $sql = "DELETE FROM partners WHERE Pa_ID = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('s', $Pa_ID);
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