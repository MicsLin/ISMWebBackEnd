<?php
function createQueryInfo($tableName = '', $getData = [])
{
    $currentTime = date('Y-m-d H:i:s');
    $data = array_merge([], $getData); //深拷貝
    array_push($data, ['key' => 'updated_at', 'value' => $currentTime]);
    array_push($data, ['key' => 'created_at', 'value' => $currentTime]);
    $keys = [];
    $values = [];
    foreach ($data as $item) {
        $keys[] = $item['key'];
        $values[] = $item['value'];
    }
    $length = count($keys);
    $keysString = join(',', $keys);
    $sString = str_repeat("s", $length);
    $questionMarkString = str_repeat("?,", $length - 1) . '?';
    $query = "INSERT INTO $tableName ($keysString) VALUES ($questionMarkString)";
    return ["query" => $query, "sString" => $sString, "bind_data_array" => $values];
}
function updateEditQuryInfo($tableName = '', $getData = [], $fieldInfo = ["key"=>'',"value"=>''])
{
    $whereKey = $fieldInfo['key'];
    $whereValue = $fieldInfo['value'];
    $currentTime = date('Y-m-d H:i:s');
    $data = array_merge([], $getData);
    array_push($data, ['key' => 'updated_at', 'value' => $currentTime]);

    $keys = [];
    $values = [];
    foreach ($data as $item) {
        $keys[] = $item['key'] . '=?';
        $values[] = $item['value'];
    }
    $length = count($keys);
    $settingString = join(',', $keys);
    array_push($values, $whereValue);
    $sString = str_repeat("s", $length + 1);
    $query = "UPDATE $tableName SET $settingString WHERE $whereKey = ?";
    return ["query" => $query, "sString" => $sString, "bind_data_array" => $values];
}