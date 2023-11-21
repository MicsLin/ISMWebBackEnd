<?php
require_once dirname(__FILE__) . '/../connect.php';
include_once dirname(__FILE__) . '/../connectHeader.php';
include_once dirname(__FILE__) . '/../echoData.php';
include_once dirname(__FILE__) . '/components/getPost.php';
include_once dirname(__FILE__) . '../../components/getPostToQueryInfo.php';

$query = "SELECT * FROM partners WHERE Pa_ID = '$Pa_ID'";
$result = $conn->query($query);

if (intval($sort) < 1) {
    $sort = '1';
}

if ($result->num_rows > 0) {
    $fieldInfo = ["key"=>'Pa_ID',"value"=>$Pa_ID];
    $createQueryInfo = updateEditQuryInfo('partners', $data, $fieldInfo);
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
} else {
    echoData(0, null, '找不到對應的記錄，無法進行更新。');
}
$stmt->close();
$conn->close();