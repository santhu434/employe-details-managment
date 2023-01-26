<?php
if (isset($_GET['employee_Id'])) {
    $employee_Id = $_GET['employee_Id'];

    $link = mysqli_connect('localhost', 'root', '', 'empdb');

    if (!$link) {
        die('connection error' . mysqli_connect_error());
    }
    $query = "DELETE FROM empdetails WHERE employee_Id= $employee_Id";
    $result = mysqli_query($link, $query);

    if ($result) {
        header('location:update1.php');
    } else {
        echo 'error while deleting reord';
    }
}else{
    echo 'value not come';
}