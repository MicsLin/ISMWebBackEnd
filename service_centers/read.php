<?php
$query = "SELECT * FROM servicecenter";
$result = $conn->query($query);

$service_centers = array();
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $service_centers[] = array(
            "ID"=> $row["ID"],
            "Country_id"=> $row["Country_id"],
            "Continent" => $row["Continent"],
            "SubContinent" => $row["SubContinent"],
            "CountryIso3" => $row["CountryIso3"],
            "CountryName_en" => $row["CountryName_en"],
            "CountryName_zh" => $row["CountryName_zh"],
            "CompanyName"=>$row["CompanyName"],
            "CompanyMajor"=>$row["CompanyMajor"],
            "Tel"=>$row["Tel"],
            "Address"=>$row["Address"],
            "ContactPerson"=>$row["ContactPerson"],
            "Email"=>$row["Email"],
            "Mobile"=>$row["Mobile"],
            "Fax"=>$row["Fax"],
            "OfficeHour"=>$row["OfficeHour"],
            "Twitter"=>$row["Twitter"],
            "Twitter_Visibility"=>$row["Twitter_Visibility"],
            "Facebook"=>$row["Facebook"],
            "Facebook_Visibility"=>$row["Facebook_Visibility"],
            "Instagram"=>$row["Instagram"],
            "Instagram_Visibility"=>$row["Instagram_Visibility"],
            "Linkedin"=>$row["Linkedin"],
            "Linkedin_Visibility"=>$row["Linkedin_Visibility"],
            "Skype"=>$row["Skype"],
            "Skype_Visibility"=>$row["Skype_Visibility"],
            "Line"=>$row["Line"],
            "Line_Visibility"=>$row["Line_Visibility"],
            "Youtube"=>$row["Youtube"],
            "Youtube_Visibility"=>$row["Youtube_Visibility"],
            "Image"=>$row["Image"],
            "visibility"=>$row["visibility"],
            "created_at"=>$row["created_at"],
            "updated_at"=>$row["updated_at"]
        );
    }
}