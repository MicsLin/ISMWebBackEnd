<?php
$query = "SELECT * FROM countries";
$result = $conn->query($query);

//抓出所有城市=>之後當作選單使用，之後要存到cervicecenter
//continents  subregions 的table 沒用到
$countries = array();
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $countries[] = array(
            "country_id" => $row["country_id"],
            "name" => $row["name"],
            "country_name_zh" => $row["country_name_zh"],
            "iso3" => $row["iso3"],
            "continent_code" => $row["continent_code"],
            "sub_continent_code" => $row["sub_continent_code"]
        );
    }
}