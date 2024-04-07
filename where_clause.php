<?php
// Connecting to Database
$servername = "localhost";
$username = "root";
$password = "";
$database = "dbsap2";

// Create a Connection
$conn = mysqli_connect($servername, $username, $password, $database);

// Die if unsuccessful connection
if(!$conn){
    die("Sorry we failed to connect: " . mysqli_connect_error() . "<br>");
}
else{
    echo "Connection was successful <br>";
}

// Usage of WHERE Clause to fetch selected data from DB
$sql = "SELECT * FROM `phptrip` WHERE `dest`='India'";
$result = mysqli_query($conn, $sql);

// Find the number of records
$num = mysqli_num_rows($result);
echo $num . " results found in database <br>";

// Printing Data
$no = 1;
if($num > 0){
    while($row = mysqli_fetch_assoc($result)){
        echo $no . ". Hello " . $row['name'] . " Welcome to " . $row['dest'] . "<br>";
        $no = $no + 1;
    }
}

// Usage of WHERE Clause to update data
$sql = "UPDATE `phptrip` SET `name` = 'INDTour' WHERE `dest` = 'India'";
$result = mysqli_query($conn, $sql);
echo var_dump($result) . "<br>";
$aff = mysqli_affected_rows($conn);
echo "Number of affected rows: " . $aff . "<br>";
if($result){
    echo "We updated the record successfully";
}
else{
    echo "We could not update the record";
}
?>