<?php
$query = "SELECT * FROM about";
$result = $conn->query($query);

$about = array();
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $about[] = array(
            "At_ID" => $row["At_ID"],
            "At_Subject_en" => $row["At_Subject_en"],
            "At_Subject_zh" => $row["At_Subject_zh"],
            "At_Subtopic_en" => $row["At_Subtopic_en"],
            "At_Subtopic_zh" => $row["At_Subtopic_zh"],
            "At_Message_en" => $row["At_Message_en"],
            "At_Message_zh" => $row["At_Message_zh"],
            "At_Sort" => $row["At_Sort"],
            "At_Visible" => $row["At_Visible"],
            "At_Youtube" => $row["At_Youtube"],
            "At_Title01_en" => $row["At_Title01_en"],
            "At_Title01_zh" => $row["At_Title01_zh"],
            "At_Intro01_en" => $row["At_Intro01_en"],
            "At_Intro01_zh" => $row["At_Intro01_zh"],
            "At_Title02_en" => $row["At_Title02_en"],
            "At_Title02_zh" => $row["At_Title02_zh"],
            "At_Intro02_en" => $row["At_Intro02_en"],
            "At_Intro02_zh" => $row["At_Intro02_zh"],
            "At_Title03_en" => $row["At_Title03_en"],
            "At_Title03_zh" => $row["At_Title03_zh"],
            "At_Intro03_en" => $row["At_Intro03_en"],
            "At_Intro03_zh" => $row["At_Intro03_zh"],
            "At_Title04_en" => $row["At_Title04_en"],
            "At_Title04_zh" => $row["At_Title04_zh"],
            "At_Intro04_en" => $row["At_Intro04_en"],
            "At_Intro04_zh" => $row["At_Intro04_zh"],
            "created_at" => $row["created_at"],
            "updated_at" => $row["updated_at"]
        );
    }
}