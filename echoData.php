<?php
function echoData($status = 1, $data, $notes = '')
{
    $Data = ['status' => $status, 'data' => $data, 'notes' => $notes];
    echo json_encode($Data);
    exit;
}