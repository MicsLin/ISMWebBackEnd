<?php
$ID = $_POST['ID'];
$Country_id = $_POST['Country_id'];
$Continent = $_POST['Continent'];
$SubContinent = $_POST['SubContinent'];
$CountryIso3 = $_POST['CountryIso3'];
$CountryName_en = $_POST['CountryName_en'];
$CountryName_zh = $_POST['CountryName_zh'];
$CompanyName = $_POST['CompanyName'];
$CompanyMajor = $_POST['CompanyMajor'];
$Tel = $_POST['Tel'];
$Address = $_POST['Address'];
$ContactPerson = $_POST['ContactPerson'];
$Email = $_POST['Email'];
$Mobile = $_POST['Mobile'];
$Fax = $_POST['Fax'];
$OfficeHour = $_POST['OfficeHour'];
$Twitter = $_POST['Twitter'];
$Twitter_Visibility = $_POST['Twitter_Visibility'];
$Facebook = $_POST['Facebook'];
$Facebook_Visibility = $_POST['Facebook_Visibility'];
$Instagram = $_POST['Instagram'];
$Instagram_Visibility = $_POST['Instagram_Visibility'];
$Linkedin = $_POST['Linkedin'];
$Linkedin_Visibility = $_POST['Linkedin_Visibility'];
$Skype = $_POST['Skype'];
$Skype_Visibility = $_POST['Skype_Visibility'];
$Line = $_POST['Line'];
$Line_Visibility = $_POST['Line_Visibility'];
$Youtube = $_POST['Youtube'];
$Youtube_Visibility = $_POST['Youtube_Visibility'];
$visibility = $_POST['visibility'];

$getCompanyMajor = isset($CompanyMajor) ? $CompanyMajor : '0';
$data = [
    ['key' => 'Country_id', 'value' => $Country_id],
    ['key' => 'Continent', 'value' => $Continent],
    ['key' => 'SubContinent', 'value' => $SubContinent],
    ['key' => 'CountryIso3', 'value' => $CountryIso3],
    ['key' => 'CountryName_en', 'value' => $CountryName_en],
    ['key' => 'CountryName_zh', 'value' => $CountryName_zh],
    ['key' => 'CompanyName', 'value' => $CompanyName],
    ['key' => 'CompanyMajor', 'value' => $getCompanyMajor],
    ['key' => 'Tel', 'value' => $Tel],
    ['key' => '`Address`', 'value' => $Address], //注意:Address是sql保留字，故要用`Address`或[Address]
    ['key' => 'ContactPerson', 'value' => $ContactPerson],
    ['key' => 'Email', 'value' => $Email],
    ['key' => 'Mobile', 'value' => $Mobile],
    ['key' => 'Fax', 'value' => $Fax],
    ['key' => 'OfficeHour', 'value' => $OfficeHour],
    ['key' => 'Twitter', 'value' => $Twitter],
    ['key' => 'Twitter_Visibility', 'value' => isset($Twitter_Visibility) ? $Twitter_Visibility : '1'],
    ['key' => 'Facebook', 'value' => $Facebook],
    ['key' => 'Facebook_Visibility', 'value' => isset($Facebook_Visibility) ? $Facebook_Visibility : '1'],
    ['key' => 'Instagram', 'value' => $Instagram],
    ['key' => 'Instagram_Visibility', 'value' => isset($Instagram_Visibility) ? $Instagram_Visibility : '1'],
    ['key' => 'Linkedin', 'value' => $Linkedin],
    ['key' => 'Linkedin_Visibility', 'value' => isset($Linkedin_Visibility) ? $Linkedin_Visibility : '1'],
    ['key' => 'Skype', 'value' => $Skype],
    ['key' => 'Skype_Visibility', 'value' => isset($Skype_Visibility) ? $Skype_Visibility : '1'],
    ['key' => 'Line', 'value' => $Line],
    ['key' => 'Line_Visibility', 'value' => isset($Line_Visibility) ? $Line_Visibility : '1'],
    ['key' => 'Youtube', 'value' => $Youtube],
    ['key' => 'Youtube_Visibility', 'value' => isset($Youtube_Visibility) ? $Youtube_Visibility : '1'],
    ['key' => 'visibility', 'value' => isset($visibility) ? $visibility : '1']
];