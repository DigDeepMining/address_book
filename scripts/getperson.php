<?php
    include("connectDB.php");
    $q = $_GET['q'];
    $sql = "SELECT personID, firstName, middleName, surname, houseNumName, addressTwo, addressThree, townCity, county, postCode  
            FROM person, address
            WHERE address.addressID = person.addressID
            AND firstName LIKE '%$q%'";
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