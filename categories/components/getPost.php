<?php
$c_id = $_POST['c_id'];
$zh_title = $_POST['zh_title'];
$en_title = $_POST['en_title'];
$sort = $_POST['sort'];
$visibility = $_POST['visibility'];

$getVisibility = isset($visibility) ? $visibility : '1';
$data = [
    ['key' => 'zh_title', 'value' => $zh_title],
    ['key' => 'en_title', 'value' => $en_title],
    ['key' => 'sort', 'value' => $sort],
    ['key' => 'visibility', 'value' => $getVisibility]
];