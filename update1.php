<style>
    .dbresult,.dbresult td,.dbresult th{
        border: 1px solid black;
        border-collapse: collapse;
        padding: 8px;
    }
    .dbresult{
        width: 800px;
        margin: auto;
    }
    .dbresult tr:nth-child(odd){
        background-color: #b2d0d6;
    }
    .dbresult tr:nth-child(even){
        background-color: lightcyan;
    }

</style>


<?php


$link = mysqli_connect('localhost', 'root' ,'', 'empdb');

if(!$link) {
    die('connection error' . mysqli_connect_error());
}
$query = "SELECT * FROM empdetails";

$result=mysqli_query($link, $query);

$numrow = mysqli_num_rows($result);

if($numrow>0)
{
    echo '<table class="dbresult">';
    echo '<tr><th colspan="10"><a href="emp.php">Go Back</a></th></tr>';
    echo '<tr>';
    echo '<th> employee_Id </th>';
    echo '<th> employee_name </th>';
    echo '<th> dapartment </th>';
    echo '<th> marital_status </th>';
    echo '<th> sex </th>';
    echo '<th> address</th>';
    echo '<th> mobile</th>';
    echo '<th> salary </th>';
    echo '<th> Delete </th>';
    echo '<th> Upadte </th>';
    echo'</tr>';

    while ($row = mysqli_fetch_assoc($result)) {
        $employee_Id = $row['employee_Id'];
        echo '<tr>';
        
        echo '<td>' . $row['employee_Id']. '</td>'; 
        echo '<td>' . $row['employee_name'].'</td>';
        echo '<td>' . $row['department'].'</td>';
        echo '<td>' . $row['marital_status'].'</td>';
        echo '<td>' . $row['sex'].'</td>';
        echo '<td>' . $row['employee_address'].'</td>';
        echo '<td>' . $row['mobile'].'</td>';
        echo '<td>' . $row['salary'].'</td>';
        echo '<td><a href="delete.php?employee_Id='. $employee_Id.'">Delete</a></td>';
        echo '<td><a href="updateform.php?employee_Id='. $employee_Id.'">Update</a></td>';
    
        echo '</tr>';
    }
        echo '</table>';
        
    
}else
{
    echo 'Record Not Found';
}