<?php
$Fb_ID = $_POST['Fb_ID'];
$Fb_Name = $_POST['Fb_Name'];
$Fb_Email = $_POST['Fb_Email'];
$Fb_Subject = $_POST['Fb_Subject'];
$Fb_Message = $_POST['Fb_Message'];

$data = [
    ['key' => 'Fb_Name', 'value' => $Fb_Name],
    ['key' => 'Fb_Email', 'value' => $Fb_Email],
    ['key' => 'Fb_Subject', 'value' => $Fb_Subject],
    ['key' => 'Fb_Message', 'value' => $Fb_Message]
];