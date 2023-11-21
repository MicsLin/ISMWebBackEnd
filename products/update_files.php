<?php
require_once dirname(__FILE__) . '/../connect.php';
include_once dirname(__FILE__) . '/../connectHeader.php';
include_once dirname(__FILE__) . '/../echoData.php';
include_once dirname(__FILE__) . '/../files/moveUploadedFile.php';
include_once dirname(__FILE__) . '/../files/deleteFile.php';
include_once dirname(__FILE__) . '/../files/pathAndUrl.php';
$p_id = $_POST['p_id'];
$pic1 = $_FILES['pic1'];
$pic2 = $_FILES['pic2'];
$pic3 = $_FILES['pic3'];
$file1 = $_FILES['file1'];

if (!isset($pic1) && !isset($pic2) && !isset($pic3) && !isset($file1)) {
    echoData(4, null, 'no file update');
}

// 先找到原本資料，並刪除
try {
    $sql = "SELECT pic1,pic2,pic3,file1 FROM products WHERE p_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('s', $p_id);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result && $result->num_rows > 0) {
        $row = $result->fetch_assoc();
        function deleteImgFunction($fileName)
        {
            $imgsFolderPath = getImgsFolderPath();
            $imgPath = getImgPath($imgsFolderPath, $fileName);
            deleteFile($imgPath);
        }

        $fileName;
        if (isset($pic1)) {
            $fileName = $row['pic1'];
            deleteImgFunction($fileName);
        }
        if (isset($pic2)) {
            $fileName = $row['pic2'];
            deleteImgFunction($fileName);
        }
        if (isset($pic3)) {
            $fileName = $row['pic3'];
            deleteImgFunction($fileName);
        }
        if (isset($file1)) {
            $fileName = $row['file1'];
            $filesFolderPath = getFilesFolderPath();
            $filePath = getFilePath($filesFolderPath, $fileName);
            deleteFile($filePath);
        }
        // echo "ID {$Ns_ID} 的 imgPath 是：{$imgPath}";
    } else {
        // echo "找不到 ID {$Ns_ID} 的相符資料。";
    }
} catch (PDOException $e) {
    // echo "資料庫錯誤：" . $e->getMessage();
}

//儲存新的資料
$queryKeys = array();
$queryValues = array();
if (isset($pic1)) {
    $savedPictureName = moveFileToImgs($pic1,'Products_');
    array_push($queryKeys, "pic1 = ? ,");
    array_push($queryValues, $savedPictureName);
}
if (isset($pic2)) {
    $savedPictureName = moveFileToImgs($pic2,'Products_');
    array_push($queryKeys, "pic2 = ? ,");
    array_push($queryValues, $savedPictureName);
}
if (isset($pic3)) {
    $savedPictureName = moveFileToImgs($pic3,'Products_');
    array_push($queryKeys, "pic3 = ? ,");
    array_push($queryValues, $savedPictureName);
}
if (isset($file1)) {
    $savedFileName = moveFileToFiles($file1,'Products_');
    array_push($queryKeys, "file1 = ? ,");
    array_push($queryValues, $savedFileName);
}
$updateQuery = 'UPDATE products SET ' . join("", $queryKeys) . "updated_at = ? WHERE p_id = ?";
$length = count($queryKeys);
$bind_param = str_repeat("s", $length) . "ss";
$currentTime = date('Y-m-d H:i:s');
array_push($queryValues, $currentTime, $p_id);

//更新資料庫
$query = "SELECT * FROM products WHERE p_id = '$p_id'";
$result = $conn->query($query);
if ($result->num_rows > 0) {
    $stmt = $conn->prepare($updateQuery);
    $stmt->bind_param($bind_param, ...$queryValues);
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