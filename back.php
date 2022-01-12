<?php

$person = json_decode($_POST['person']);
$DLN;
foreach ($person as $per)
    $DLN = $per->DLNUMBER;

$conn = new mysqli('localhost', 'root', '', 'mini_proj');

$sql = "SELECT * FROM `dlinfo` WHERE DLNUMBER = '$DLN';";
$result = mysqli_query($conn, $sql);

if ($result) {
    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        echo "<b>" . "<center>" . "DL NUMBER FOUND ON THE DATABASE" . "</center>" . "</b>" . "<br>";
        echo "DL Number - " . $row['DLNUMBER'] . "<br>";
        echo "Validity  - " . $row['VALIDITY_NT'] . "<br>";
        echo "Name - " . $row['NAME'] . "<br>";
        echo "S\W\D - " . $row['S_W_D'] . "<br>";
        echo "ID Mark 1 - " . $row['ID_MARK_1'] . "<br>";
        echo "ID Mark 2 - " . $row['ID_MARK_2'] . "<br>";
        echo "DOB - " . $row['DOB'] . "<br>";
        echo "Address - " . $row['ADDRESS'] . "<br>";
        echo "Issue Authority - " . $row['ISSUE_AUTH'] . "<br>";
        echo "Issue Date - " . $row['ISSUE_DATE'] . "<br>";
        echo "Purpose - " . $row['PURPOSE'] . "<br>";
        echo "Veh Class 1 - " . $row['VEHCLASS1'] . "<br>";
        echo "Veh Class 2 - " . $row['VEHCLASS2'] . "<br>";
        echo "Veh Class 3 - " . $row['VEHCLASS3'];
    } else {
        echo "NO USER FOUND ON THE DATABASE.";
        echo "<br>";
        echo "THIS PERSON MIGHT HAVE A FAKE ID.";
    }
} else {
    echo 'Unexpected Error Occurred ';
}
