<?php
    include("connectDB.php");

    if((isset($_GET['submit'])) && ($_GET['submit'] == "Insert Person"))
    {
        $personID = $_GET['personID'];
        $firstName = $_GET['firstName'];
        $middleName = $_GET['middleName'];
        $surname = $_GET['surname'];
        $prevPage = $_SERVER['HTTP_REFERER'];

        $sql = "UPDATE person SET firstName='$firstName', middleName='$middleName', surname='$surname'
            WHERE personID=$personID";
        $result = mysqli_query($conn, $sql);
        

        $houseNumName = $_GET['houseNumName'];
        $addressTwo = $_GET['addressTwo'];
        $addressThree = $_GET['addressThree'];
        $townCity = $_GET['townCity'];
        $county = $_GET['county'];
        $postCode = $_GET['postCode'];
        $prevPage = $_SERVER['HTTP_REFERER'];

        $sql = "INSERT INTO address (houseNumName, addressTwo, addressThree, townCity, county, postCode)
            VALUES ('$houseNumName', '$addressTwo', '$addressThree', '$townCity', '$county', '$postCode')";
        if(mysqli_query($conn, $sql))
        {
            header("Location: $prevPage?Message=Success");
        }
        else
        {
            header("Location: $prevPage?Message=Fail");
        }
    }
?>