<?php
$query = "SELECT * FROM partners";
$result = $conn->query($query);

$partners = array();
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $partners[] = array(
            "Pa_ID" => $row["Pa_ID"],
            "Pa_Title" => $row["Pa_Title"],
            "sort" => $row["sort"],
            "visibility" => $row["visibility"],
            "Pa_Pic" => $row["Pa_Pic"],
            "created_at" => $row["created_at"],
            "updated_at" => $row["updated_at"]
        );
    }
}
