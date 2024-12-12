<?php 
    
    include"connect.php";

    $id = $_GET['id'];

    echo $id;

    $sql = " DELETE FROM table_students WHERE id='$id' ";

    mysqli_query($conn, $sql);

    header( 'location: student.php');

?>
