
<html>
<head>
<title> form </title>
<head><style>
      p {
        border: 2px solid black;
        outline: #4CAF50 solid 10px;
        margin: 10px;  
        padding: 10px;
        text-align: center;
        font-size: x-large;
      }
     </style>
    <p>EMPLOYEE MANAGEMENT DETAILS</p> 
    <style>
     div 
     {
    padding: 70px;

     border: 1px solid #4CAF50;
     }
    </style>
     <style ttpye="text/css">
     label
     {
    width: 100px;
     display: inline-block;
                margin: 5px;
              }
              form{
                border-radius: 6px;
                background: black;
                color: white;
                width: 490px;
                padding: 50px;
              }
              
            </style>
            <style>
              input[type=text], select {
                width: 100%;
                padding: 12px 20px;
                margin: 8px 0;
                display: inline-block;
                border: 1px solid #ccc;
                border-radius: 4px;
                box-sizing: border-box;
              }
              
              input[type=submit] {
                width: 100%;
                background-color: #4CAF50;
                color: white;
                padding: 14px 20px;
                margin: 8px 0;
                border: none;
                border-radius: 4px;
                cursor: pointer;
              }
              
              input[type=submit]:hover {
                background-color: #45a049;
              }
              
              div {
                border-radius: 5px;
                background-color: #0e0d0d;
                padding: 20px;
              }
              </style>

<?php
$link = mysqli_connect('localhost', 'root' ,'', 'empdb');

if(!$link) {
    die('connection error' . mysqli_connect_error());
}
$employee_Id = $_GET['employee_Id'];
$query = "SELECT * FROM empdetails WHERE employee_Id=$employee_Id";

$result=mysqli_query($link, $query);

$numrow = mysqli_num_rows($result);

if ($numrow == 1) {
    $row = mysqli_fetch_assoc($result);

    ?>          
            
    <body>
        

    <form id="myForm" method="post" action="emp.php" <?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
    <input type="hidden" name="employee_Id" value="<?=$employee_Id ?>"?>
    <thead> 
        <tr>      
            <th>UPDATE FORM  </th>
        </tr>
    <div>
   
    <label> Employee Name:</label> <input type="text" name="ename" value ="<?= $row['employee_name'] ?> " placeholder="Enter name" required  ><br>
    <label for="department">Department:</label>
    <select name="depart" value ="<?= $row['department'] ?> " id="depart"   >
    <option value="FINANCE">FINANCE</option>
    <option value="AUDIT">AUDIT</option>
    <option value="MAKETING">MAKETING</option>
    <option value="PRODUCTION">PRODUCTION</option>
    </select><br>
    <label>Maritial Status:</label> <br>
    <select name="status" value ="<?= $row['marital_status'] ?> " id="status" >
    <option value="maried">MARIED</option>
    <option value="unmaried">UNMARIED</option>
    </select><br>
    <label>Sex:</label> <br>
    <select name="sex" value ="<?= $row['sex'] ?> " id="sex">
    <option value="male">MALE</option>
    <option value="female">FEMALE</option>
    </select><br>
    <label>Address:</label><br>
    <textarea id="add" name="add" value ="<?= $row['employee_address'] ?> " rows="5" cols="61"></textarea > <br>
    <label>salary:</label> <input type="text" name="salary" value ="<?= $row['salary'] ?> " placeholder="Enter salary" required><br>
    <label>Mobile:</label> <input type="text" name="mobile" value ="<?= $row['mobile'] ?> " placeholder="Enter mobile" required><br>
    <input type="submit" name="submit" value="update">
    
    <style>
a:link, a:visited {
  background-color: #f44336;
  color: white;
  padding: 14px 25px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
}

a:hover, a:active {
  background-color: red;
}
</style>
<a href="update1.php" target="_blank">View</a>
    <input type="button" onclick="myFunction()" value="Clear">
    
    </div>
    
    </form> 
    <script>
function myFunction() {
  document.getElementById("myForm").reset();
}
</script>

    </body>
    </html>
    <?php } ?>