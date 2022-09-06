<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="css/main.css" />
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Address Book</title>
</head>
<body>

    <?php
        include("includes/header.php");
    ?>

    <div class="mainContent">
        <?php
            include("scripts/connectDB.php");
            $personID = $_GET['personID'];
            $sql = "SELECT personID, person.addressID, firstName, middleName, surname, houseNumName, addressTwo, addressThree, townCity, county, postCode  
                    FROM person, address
                    WHERE personID = $personID
                    AND address.addressID = person.addressID";
            $result = mysqli_query($conn, $sql);
            while($row = mysqli_fetch_assoc($result)) {
        ?>
            <form action="scripts/doEdit.php" method="get">
                <input type="hidden" name="personID" value="<?php echo $row['personID']; ?>" />
                <input type="hidden" name="addressID" value="<?php echo $row['addressID']; ?>" />
                <input type="input" name="firstName" value="<?php echo $row['firstName']; ?>" placeholder="First Name" />
                <input type="input" name="middleName" value="<?php echo $row['middleName']; ?>" placeholder="Middle Name (optional)" />
                <input type="input" name="surname" value="<?php echo $row['surname']; ?>" placeholder="Surname" />
                <input type="input" name="houseNumName" value="<?php echo $row['houseNumName']; ?>" placeholder="House Number or Name" />
                <input type="input" name="addressTwo" value="<?php echo $row['addressTwo']; ?>" placeholder="Address Two (optional)" />
                <input type="input" name="addressThree" value="<?php echo $row['addressThree']; ?>" placeholder="Address Three (optional)" />
                <input type="input" name="townCity" value="<?php echo $row['townCity']; ?>" placeholder="Town or City" />
                <input type="input" name="county" value="<?php echo $row['county']; ?>" placeholder="County" />
                <input type="input" name="postCode" value="<?php echo $row['postCode']; ?>" placeholder="Post Code" />
                <input type="submit" name="submit" value="Edit Details" />
            </form>
            <?php
            };
            ?>
    </div>

    <?php
        include("includes/footer.php");
    ?>
    
</body>
</html>