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

        <form action="">
            <input type="text" value="customers" onkeyup="showCustomer(this.value)" />
        </form>
    <script>
        function showCustomer(str) {
            const xhttp = new XMLHttpRequest();
            xhttp.onload = function() {
                document.getElementById("searchResult").innerHTML = this.responseText;
            }
            xhttp.open("GET", "scripts/getperson.php?q="+str);
            xhttp.send();
        }
    </script>
    <div class="mainContent" id="searchResult">
        <?php
            include("scripts/connectDB.php");
            $sql = "SELECT personID, firstName, middleName, surname, houseNumName, addressTwo, addressThree, townCity, county, postCode  
                    FROM person, address
                    WHERE address.addressID = person.addressID";
            $result = mysqli_query($conn, $sql);
            while($row = mysqli_fetch_assoc($result)) {
        ?>
            <section class="card">
                <div class="profilePic">

                </div>
                <div class="profileText">
                    <?php
                    echo "<h1>".$row["firstName"]." ".$row["middleName"]." ".$row["surname"]."<span class=\"h1Small\"><a href=\"edit.php?personID=".$row['personID']."\">Edit</a> / Hide</span></h1>";
                    ?>
                    <table>
                        <tr>
                            <th>House Number or Name</th><td><?php echo $row['houseNumName']; ?></td><th>Address Three</th><td><?php echo $row['addressThree']; ?></td>
                            <th>County</th><td><?php echo $row['county']; ?></td>
                        </tr>
                        <tr>
                            <th>Address Two</th><td><?php echo $row['addressTwo']; ?></td><th>Town or City</th><td><?php echo $row['townCity']; ?></td>
                            <th>Post Code</th><td><?php echo $row['postCode']; ?></td>
                        </tr>
                    </table>
                </div>
            </section>
            <?php
            };
            ?>
    </div>

    <?php
        include("includes/footer.php");
    ?>
    
</body>
</html>