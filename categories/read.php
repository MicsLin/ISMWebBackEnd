<?php
$query = "SELECT * FROM categories";
$result = $conn->query($query);

$categories = array();
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $categories[] = array(
            "c_id"=> $row["c_id"],
            "zh_title" => $row["zh_title"],
            "en_title" => $row["en_title"],
            "sort" => $row["sort"],
            "visibility" => $row["visibility"],
            "seo_keywords"=>$row["seo_keywords"],
            "seo_descript"=>$row["seo_descript"],
            "seo_title"=>$row["seo_title"],
            "img"=>$row["img"],
            "created_at"=>$row["created_at"],
            "updated_at"=>$row["updated_at"]
        );
    }
}