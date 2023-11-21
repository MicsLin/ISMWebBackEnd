<?php
require_once dirname(__FILE__) . '/../connect.php';
include_once dirname(__FILE__) . '/../connectHeader.php';
include_once dirname(__FILE__) . '/../echoData.php';
include_once dirname(__FILE__) . '/../files/deleteFile.php';
include_once dirname(__FILE__) . '/../files/pathAndUrl.php';
$p_id = $_POST['p_id'];
$key = $_POST['key'];
$folderName = $_POST['folderName'];

//先刪除圖片
try {
    $sql = "SELECT $key FROM products WHERE p_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('s', $p_id);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result && $result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $fileName = $row[$key];

        $path;
        if($folderName == 'imgs'){
            $imgsFolderPath = getImgsFolderPath();
            $path = getImgPath($imgsFolderPath, $fileName);
        }
        if($folderName == 'files'){
            $filesFolderPath = getFilesFolderPath();
            $path = getFilePath($filesFolderPath, $fileName);
        }

        // echo "ID {$Ns_ID} 的 imgPath 是：{$imgPath}";
        deleteFile($path);
    } else {
        // echo "找不到 ID {$Ns_ID} 的相符資料。";
    }
} catch (PDOException $e) {
    echo "資料庫錯誤：" . $e->getMessage();
}

//再清除資料
try {
    $sql = "UPDATE products SET $key = Null WHERE p_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('s', $p_id);
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