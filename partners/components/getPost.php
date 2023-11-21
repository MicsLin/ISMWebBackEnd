<?php
$Pa_ID = $_POST['Pa_ID'];
$Pa_Title = $_POST['Pa_Title'];
$sort = $_POST['sort'];
$visibility = $_POST['visibility'];
$Pa_Pic = $_FILES['Pa_Pic'];

$getPa_visibility = isset($visibility) ? $visibility : '1';
$data = [
    ['key' => 'Pa_Title', 'value' => $Pa_Title],
    ['key' => 'sort', 'value' => $sort],
    ['key' => 'visibility', 'value' => $getPa_visibility]
];