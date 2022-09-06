<?php
    include("connectDB.php");

    if((isset($_GET['submit'])) && ($_GET['submit'] == "Edit Details"))
    {
        $personID = $_GET['personID'];
        $firstName = $_GET['firstName'];
        $middleName = $_GET['middleName'];
        $surname = $_GET['surname'];

        $sql = "UPDATE person SET firstName='$firstName', middleName='$middleName', surname='$surname'
            WHERE personID=$personID";
        if(mysqli_query($conn, $sql))
        {
            $personSuccess = True;
        }
        else
        {
            $personSuccess = False;
        }

        $addressID = $_GET['addressID'];
        $houseNumName = $_GET['houseNumName'];
        $addressTwo = $_GET['addressTwo'];
        $addressThree = $_GET['addressThree'];
        $townCity = $_GET['townCity'];
        $county = $_GET['county'];
        $postCode = $_GET['postCode'];
        $prevPage = $_SERVER['HTTP_REFERER'];

        $sql = "UPDATE address SET houseNumName='$houseNumName', addressTwo='$addressTwo', addressThree='$addressThree', 
                townCity='$townCity', county='$county', postCode='$postCode'
            WHERE addressID = $addressID";
        if((mysqli_query($conn, $sql)) && ($personSuccess==True))
        {
            header("Location: $prevPage");
        }
        else
        {
            header("Location: $prevPage");
        }
    }
?>