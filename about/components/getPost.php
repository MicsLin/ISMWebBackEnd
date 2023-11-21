<?php
$At_ID = $_POST['At_ID'];
$At_Subject_en = $_POST['At_Subject_en'];
$At_Subject_zh = $_POST['At_Subject_zh'];
$At_Subtopic_en = $_POST['At_Subtopic_en'];
$At_Subtopic_zh = $_POST['At_Subtopic_zh'];
$At_Message_en = $_POST['At_Message_en'];
$At_Message_zh = $_POST['At_Message_zh'];
$At_Sort = $_POST['At_Sort'];
$At_Visible = $_POST['At_Visible'];
$At_Youtube = $_POST['At_Youtube'];
$At_Title01_en = $_POST['At_Title01_en'];
$At_Title01_zh = $_POST['At_Title01_zh'];
$At_Intro01_en = $_POST['At_Intro01_en'];
$At_Intro01_zh = $_POST['At_Intro01_zh'];
$At_Title02_en = $_POST['At_Title02_en'];
$At_Title02_zh = $_POST['At_Title02_zh'];
$At_Intro02_en = $_POST['At_Intro02_en'];
$At_Intro02_zh = $_POST['At_Intro02_zh'];
$At_Title03_en = $_POST['At_Title03_en'];
$At_Title03_zh = $_POST['At_Title03_zh'];
$At_Intro03_en = $_POST['At_Intro03_en'];
$At_Intro03_zh = $_POST['At_Intro03_zh'];
$At_Title04_en = $_POST['At_Title04_en'];
$At_Title04_zh = $_POST['At_Title04_zh'];
$At_Intro04_en = $_POST['At_Intro04_en'];
$At_Intro04_zh = $_POST['At_Intro04_zh'];

$getAt_Visible = isset($At_Visible) ? $At_Visible : '1';
$data = [
    ['key' => 'At_Subject_en', 'value' => $At_Subject_en],
    ['key' => 'At_Subject_zh', 'value' => $At_Subject_zh],
    ['key' => 'At_Subtopic_en', 'value' => $At_Subtopic_en],
    ['key' => 'At_Subtopic_zh', 'value' => $At_Subtopic_zh],
    ['key' => 'At_Message_en', 'value' => $At_Message_en],
    ['key' => 'At_Message_zh', 'value' => $At_Message_zh],
    ['key' => 'At_Sort', 'value' => $At_Sort],
    ['key' => 'At_Visible', 'value' => $getAt_Visible],
    ['key' => 'At_Youtube', 'value' => $At_Youtube],
    ['key' => 'At_Title01_en', 'value' => $At_Title01_en],
    ['key' => 'At_Title01_zh', 'value' => $At_Title01_zh],
    ['key' => 'At_Intro01_en', 'value' => $At_Intro01_en],
    ['key' => 'At_Intro01_zh', 'value' => $At_Intro01_zh],
    ['key' => 'At_Title02_en', 'value' => $At_Title02_en],
    ['key' => 'At_Title02_zh', 'value' => $At_Title02_zh],
    ['key' => 'At_Intro02_en', 'value' => $At_Intro02_en],
    ['key' => 'At_Intro02_zh', 'value' => $At_Intro02_zh],
    ['key' => 'At_Title03_en', 'value' => $At_Title03_en],
    ['key' => 'At_Title03_zh', 'value' => $At_Title03_zh],
    ['key' => 'At_Intro03_en', 'value' => $At_Intro03_en],
    ['key' => 'At_Intro03_zh', 'value' => $At_Intro03_zh],
    ['key' => 'At_Title04_en', 'value' => $At_Title04_en],
    ['key' => 'At_Title04_zh', 'value' => $At_Title04_zh],
    ['key' => 'At_Intro04_en', 'value' => $At_Intro04_en],
    ['key' => 'At_Intro04_zh', 'value' => $At_Intro04_zh]
];