<?php
require_once dirname(__FILE__) . '/../connect.php';
include_once dirname(__FILE__) . '/../connectHeader.php';
include_once dirname(__FILE__) . '/../echoData.php';
include_once dirname(__FILE__) . '/../files/moveUploadedFile.php';
include_once dirname(__FILE__) . '/../files/deleteFile.php';
include_once dirname(__FILE__) . '/../files/pathAndUrl.php';
$ID = $_POST['ID'];
$ImageFile = $_FILES['Image'];

// 先找到原本圖片，並刪除
try {
    $sql = "SELECT Image FROM servicecenter WHERE ID = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('s', $ID);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result && $result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $fileName = $row['Image'];
        if ($fileName) {
            $imgsFolderPath = getImgsFolderPath();
            $imgPath = getImgPath($imgsFolderPath, $fileName);
            deleteFile($imgPath);
        }
        // echo "ID {$ID} 的 imgPath 是：{$imgPath}";
    } else {
        // echo "找不到 ID {$ID} 的相符資料。";
    }
} catch (PDOException $e) {
    // echo "資料庫錯誤：" . $e->getMessage();
}

//儲存新圖片
$savedPictureName = moveFileToImgs($ImageFile,'ServiceCenter_');

//更新資料庫
$currentTime = date('Y-m-d H:i:s');
$query = "SELECT * FROM servicecenter WHERE ID = '$ID'";
$result = $conn->query($query);
if ($result->num_rows > 0) {
    $updateQuery = "UPDATE servicecenter SET 
        `Image` = ? ,
        updated_at = ? 
        WHERE ID = ?";
    $stmt = $conn->prepare($updateQuery);
    $stmt->bind_param('sss', $savedPictureName, $currentTime, $ID);
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