<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $d_origin = $_POST['origin'];
    $n_destination = $_POST['destination'];
    
    $conn = mysqli_connect('localhost', 'root', '', 'travelhomepage');
    
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    
    $sql = "INSERT INTO `homepage` (`origin`, `destination`) VALUES ('$d_origin', '$n_destination')";
    
    if (mysqli_query($conn, $sql)) {
        // Data inserted successfully
        mysqli_close($conn);
        header("Location: response.html"); // Redirect to response.html
        exit();
    } else {
        echo "Error: " . mysqli_error($conn);
    }
    
    mysqli_close($conn);
}
?>
