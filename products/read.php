<?php
$query = "SELECT * FROM products";
$result = $conn->query($query);

$products = array();
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $products[] = array(
            "p_id"=> $row["p_id"],
            "c_id" => $row["c_id"],
            "title" => $row["title"],
            "zh_content" => $row["zh_content"],
            "en_content" => $row["en_content"],
            "zh_spec"=>$row["zh_spec"],
            "en_spec"=>$row["en_spec"],
            "sort"=>$row["sort"],
            "visibility"=>$row["visibility"],
            "new"=>$row["new"],
            "hot"=>$row["hot"],
            "recommend"=>$row["recommend"],
            "pic1"=>$row["pic1"],
            "pic2"=>$row["pic2"],
            "pic3"=>$row["pic3"],
            "file1"=>$row["file1"],
            "created_at"=>$row["created_at"],
            "updated_at"=>$row["updated_at"]
        );
    }
}