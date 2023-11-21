<?php
$query = "SELECT * FROM banner";
$result = $conn->query($query);

$banner = array();
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $banner[] = array(
            "BI_ID" => $row["BI_ID"],
            "BI_Title_zh" => $row["BI_Title_zh"],
            "BI_Content_zh" => $row["BI_Content_zh"],
            "BI_Title_en" => $row["BI_Title_en"],
            "BI_Content_en" => $row["BI_Content_en"],
            "BI_Sort" => $row["BI_Sort"],
            "BI_Visible" => $row["BI_Visible"],
            "BI_Pic" => $row["BI_Pic"],
            "created_at" => $row["created_at"],
            "updated_at" => $row["updated_at"]
        );
    }
}
