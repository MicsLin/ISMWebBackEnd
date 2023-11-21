<?php
$query = "SELECT * FROM news";
$result = $conn->query($query);

$news = array();
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $news[] = array(
            "Ns_ID" => $row["Ns_ID"],
            "Ns_Title_zh" => $row["Ns_Title_zh"],
            "Ns_Content_zh" => $row["Ns_Content_zh"],
            "Ns_Title_en" => $row["Ns_Title_en"],
            "Ns_Content_en" => $row["Ns_Content_en"],
            "Ns_Sort" => $row["Ns_Sort"],
            "Ns_Visible" => $row["Ns_Visible"],
            "Ns_Pic" => $row["Ns_Pic"],
            "created_at" => $row["created_at"],
            "updated_at" => $row["updated_at"]
        );
    }
}
