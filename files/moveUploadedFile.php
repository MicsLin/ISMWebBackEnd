<?php
include_once dirname(__FILE__) . '/pathAndUrl.php';

function getExtension($file = null)
{
    if (isset($file) && $file["error"] === UPLOAD_ERR_OK) {
        $filepName = $file["name"];
        $fileExtension = pathinfo($filepName, PATHINFO_EXTENSION); // 獲取副檔名(PNG)
        return $fileExtension;
    } else {
        return null; // 沒有上傳檔案或發生錯誤時的處理
    }
}

function moveFileToImgs($file = null, $prefix = 'img_')
{
    $extension = getExtension($file);
    if (!$extension) {
        return null;
    }

    $imgsFolderPath = getImgsFolderPath();
    $tmpName = $file["tmp_name"];
    $uniqueFileName = uniqid($prefix) . "." . $extension;
    $newImgPath = getImgPath($imgsFolderPath, $uniqueFileName);

    // 檢查資料夾是否存在，如果不存在則建立
    if (!is_dir($imgsFolderPath)) {
        mkdir($imgsFolderPath, 0777, true);
    }
    //不檢查圖片是否存在，直接覆蓋，刪除時比較方便不用再搜尋。
    if (move_uploaded_file($tmpName, $newImgPath)) {
        //檔案儲存成功！返回圖片名稱aa.png
        return $uniqueFileName;
    } else {
        //檔案儲存失敗！
        return null;
    }
}

function moveFileToFiles($file = null, $prefix = 'file_')
{
    $extension = getExtension($file);
    if (!$extension) {
        return null;
    }

    $filesFolderPath = getFilesFolderPath();
    $tmpName = $file["tmp_name"];
    $uniqueFileName = uniqid($prefix) . "." . $extension;
    $newFilePath = getFilePath($filesFolderPath, $uniqueFileName);

    if (!is_dir($filesFolderPath)) {
        mkdir($filesFolderPath, 0777, true);
    }
    if (move_uploaded_file($tmpName, $newFilePath)) {
        return $uniqueFileName;
    } else {
        return null;
    }
}