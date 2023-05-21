<?php
// Retrieve the submitted data from the $_POST superglobal
$mood = $_POST['mood'];
$comments = $_POST['comments'];

// Establish a database connection
$conn = new mysqli('localhost', 'root', '', 'moo-dify');
if ($conn->connect_error){
    die('Connection Failed  :' .$conn->connect_error);
}else {
    $stmt = $conn->prepare("Insert into feeling(mood, comments) values(?,?)");
    $stmt-> bind_param("s,s",$mood, $comments);
    $stmt->execute();
    echo "Survey responded";
    $stmt->close();
    $conn->close();
} 

?>