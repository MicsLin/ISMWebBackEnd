<?php
$BI_ID = $_POST['BI_ID'];
$BI_Title_zh = $_POST['BI_Title_zh'];
$BI_Content_zh = $_POST['BI_Content_zh'];
$BI_Title_en = $_POST['BI_Title_en'];
$BI_Content_en = $_POST['BI_Content_en'];
$BI_Sort = $_POST['BI_Sort'];
$BI_Visible = $_POST['BI_Visible'];
$BI_Pic = $_FILES['BI_Pic'];

$getBI_Visible = isset($BI_Visible) ? $BI_Visible : '1';
$data = [
    ['key' => 'BI_Title_zh', 'value' => $BI_Title_zh],
    ['key' => 'BI_Content_zh', 'value' => $BI_Content_zh],
    ['key' => 'BI_Title_en', 'value' => $BI_Title_en],
    ['key' => 'BI_Content_en', 'value' => $BI_Content_en],
    ['key' => 'BI_Sort', 'value' => $BI_Sort],
    ['key' => 'BI_Visible', 'value' => $getBI_Visible]
];