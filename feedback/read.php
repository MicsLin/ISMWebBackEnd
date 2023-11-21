<?php
$query = "SELECT * FROM feedback";
$result = $conn->query($query);

$feedback = array();
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $feedback[] = array(
            "Fb_ID" => $row["Fb_ID"],
            "Fb_Name" => $row["Fb_Name"],
            "Fb_Email" => $row["Fb_Email"],
            "Fb_Subject" => $row["Fb_Subject"],
            "Fb_Message" => $row["Fb_Message"],
            "created_at" => $row["created_at"],
            "updated_at" => $row["updated_at"]
        );
    }
}
