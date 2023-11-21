<?php
function getThisPhpFolderPath()
{
    $thisPhpPath = __FILE__; //C:\\xampp\\htdocs\\webTest\\BackEnd\\files\\pathAndUrl.php
    $thisPhpFolderPath = dirname($thisPhpPath);
    return $thisPhpFolderPath; //C:\\xampp\\htdocs\\webTest\\BackEnd\\files
}

//imgs
function getImgsFolderPath()
{
    $thisPhpFolderPath = getThisPhpFolderPath();
    $imgsFolderPath = $thisPhpFolderPath . DIRECTORY_SEPARATOR . 'imgs';
    return $imgsFolderPath; //C:\\xampp\\htdocs\\webTest\\BackEnd\\files\\imgs
}
function getImgPath($imgsFolderPath='',$fileName=''){
    $imgPath = $imgsFolderPath . DIRECTORY_SEPARATOR  . $fileName;
    return $imgPath;
}
function getImgsFolderUrl(){
    // $imgsFolderPath = getImgsFolderPath();
    // $relativePath = str_replace('C:\\xampp\\htdocs', '',$imgsFolderPath);
    // $imgsFolderUrl = str_replace('\\', '/',$relativePath);
    $imgsFolderUrl = '/files/imgs';
    return $imgsFolderUrl;
}
function getImgUrl($imgsFolderUrl='',$fileName=''){
    $imgUrl = $imgsFolderUrl . '/'  . $fileName;
    return $imgUrl;
}

//files
function getFilesFolderPath()
{
    $thisPhpFolderPath = getThisPhpFolderPath();
    $filesFolderPath = $thisPhpFolderPath . DIRECTORY_SEPARATOR . 'files';
    return $filesFolderPath; //C:\\xampp\\htdocs\\webTest\\BackEnd\\files\\files
}
function getFilePath($filesFolderPath='',$fileName=''){
    $filePath = $filesFolderPath . DIRECTORY_SEPARATOR  . $fileName;
    return $filePath;
}
function getFilesFolderUrl(){
    $filesFolderUrl = '/files/files';
    return $filesFolderUrl;
}
function getFileUrl($filesFolderUrl='',$fileName=''){
    $fileUrl = $filesFolderUrl . '/'  . $fileName;
    return $fileUrl;
}