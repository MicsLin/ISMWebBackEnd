<?php
$p_id = $_POST['p_id'];
$c_id = $_POST['c_id'];
$title = $_POST['title'];
$zh_content = $_POST['zh_content'];
$en_content = $_POST['en_content'];
$zh_spec = $_POST['zh_spec'];
$en_spec = $_POST['en_spec'];
$sort = $_POST['sort'];
$visibility = $_POST['visibility'];
$new = $_POST['new'];
$hot = $_POST['hot'];
$recommend = $_POST['recommend'];

$getVisibility = isset($visibility) ? $visibility : '1';

$data = [
    ['key' => 'c_id', 'value' => $c_id],
    ['key' => 'title', 'value' => $title],
    ['key' => 'zh_content', 'value' => $zh_content],
    ['key' => 'en_content', 'value' => $en_content],
    ['key' => 'zh_spec', 'value' => $zh_spec],
    ['key' => 'en_spec', 'value' => $en_spec],
    ['key' => 'sort', 'value' => $sort],
    ['key' => 'visibility', 'value' => $getVisibility],
    ['key' => 'new', 'value' => $new],
    ['key' => 'hot', 'value' => $hot],
    ['key' => 'recommend', 'value' => $recommend]
];