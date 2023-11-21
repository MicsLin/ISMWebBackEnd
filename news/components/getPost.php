<?php
$Ns_ID = $_POST['Ns_ID'];
$Ns_Title_zh = $_POST['Ns_Title_zh'];
$Ns_Content_zh = $_POST['Ns_Content_zh'];
$Ns_Title_en = $_POST['Ns_Title_en'];
$Ns_Content_en = $_POST['Ns_Content_en'];
$Ns_Sort = $_POST['Ns_Sort'];
$Ns_Visible = $_POST['Ns_Visible'];
$Ns_Pic = $_FILES['Ns_Pic'];

$getNs_Visible = isset($Ns_Visible) ? $Ns_Visible : '1';
$data = [
    ['key' => 'Ns_Title_zh', 'value' => $Ns_Title_zh],
    ['key' => 'Ns_Content_zh', 'value' => $Ns_Content_zh],
    ['key' => 'Ns_Title_en', 'value' => $Ns_Title_en],
    ['key' => 'Ns_Content_en', 'value' => $Ns_Content_en],
    ['key' => 'Ns_Sort', 'value' => $Ns_Sort],
    ['key' => 'Ns_Visible', 'value' => $getNs_Visible],
    ['key' => 'Ns_Pic', 'value' => $savedPictureName]
];