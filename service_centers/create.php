<?php
require_once dirname(__FILE__) . '/../connect.php';
include_once dirname(__FILE__) . '/../connectHeader.php';
include_once dirname(__FILE__) . '/../echoData.php';
include_once dirname(__FILE__) . '/components/getPost.php';
include_once dirname(__FILE__) . '../../components/getPostToQueryInfo.php';

$createQueryInfo = createQueryInfo('servicecenter', $data);
$query = $createQueryInfo['query'];
$sString = $createQueryInfo['sString'];
$values = $createQueryInfo['bind_data_array'];

$stmt = $conn->prepare($query);
$stmt->bind_param($sString, ...$values);

if ($stmt->execute()) {
    if ($getCompanyMajor == '0') {
        echoData(1, null, 'update success');
    }
    //刪除其他的major
    $ID = $conn->insert_id;
    $updateQuery = "UPDATE servicecenter SET 
        CompanyMajor = CASE 
        WHEN ID = ? THEN ? 
        ELSE '0' 
    END";
    $stmt = $conn->prepare($updateQuery);
    $stmt->bind_param('ss', $ID, $getCompanyMajor);
    if ($stmt->execute()) {
        echoData(1, null, 'update success');
    } else {
        echoData(4, null, 'update success but fail delete other major value');
    }
} else {
    echoData(3, null, 'update fail' . $stmt->error);
}

$stmt->close();
$conn->close();