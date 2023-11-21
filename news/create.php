<?php
require_once dirname(__FILE__) . '/../connect.php';
include_once dirname(__FILE__) . '/../connectHeader.php';
include_once dirname(__FILE__) . '/../echoData.php';
include_once dirname(__FILE__) . '/../files/moveUploadedFile.php';
include_once dirname(__FILE__) . '/components/getPost.php';
include_once dirname(__FILE__) . '../../components/getPostToQueryInfo.php';

$savedPictureName = moveFileToImgs($Ns_Pic,"News_");
array_push($data,['key' => 'Ns_Pic', 'value' => $savedPictureName]);

$createQueryInfo = createQueryInfo('news', $data);
$query = $createQueryInfo['query'];
$sString = $createQueryInfo['sString'];
$values = $createQueryInfo['bind_data_array'];

$stmt = $conn->prepare($query);
$stmt->bind_param($sString, ...$values);
if ($stmt->execute()) {
    echoData(1, null, 'update success');
} else {
    echoData(3, null, 'update fail' . $stmt->error);
}

$stmt->close();
$conn->close();