<!Doctype html>
<html>
<body bgcolor="white">
<title>Blood Bank System</title>
<link rel="stylesheet" type="text/css" href="style2.css"/>
<div class="topnav">
 
<a class="active " href="adminhome.php">Home</a>
                <a class="active " href="choice.html">Register</a>
                <a class="active " href="search.php">Search</a>
                <a class="active " href="adminrequest.php">Requests</a>
                
                <a class="active" href="alloacte.php">alloacte</a>
                <a class="active" href="report.php">Report</a>
 
</div>
<center>
<form name="Search" method="post" action="">
<table>
 <tr>          
                    <td><font size="6">Blood Group:</font></td>
                    <td><select name="bgroup">
                                <option>O+</option>
                                <option>A+</option>
                                <option>B+</option>
                                <option>AB+</option>
                                <option>O-</option>
                                <option>A-</option>
                                <option>B-</option>
                                <option>AB-</option>
                        </select></td>
                </tr>
				<tr>
                    <td></td>
                    <td><input type="submit" value="Search" name="b2"/></td>
                </tr>

</table>
</form>
</center>
</body>
</html>

<?php
  
  if(isset($_POST['bgroup']))
  {
  $bgroup=$_POST['bgroup'];

  try
{
    $host="localhost";
    $port=3306;
    $dbname="project";
    $dbuser="root";
    $dbpass="root";

    $cn=new PDO("mysql:host=$host; port=$port; dbname=$dbname",$dbuser,$dbpass);
}

catch(PDOException $e)
{
    echo $e-> getmessage();
    die();
}

$sql="select * from register where bloodgroup='$bgroup' ";
$result=$cn->query($sql);

$rowcount=$result->rowCount();
?>
<html>
    <head>
        <style>
            td,th{
                padding:10px;
            }
            table{
                margin-top:20px;
                width:350px;
            }
        </style>
    </head>
    <body>
<?php

echo"<table border=1 align='center' style='border-collapse:collapse';>
        <tr>
            
            <th>donor name</th>
            <th>contact no</th>
        </tr>";
if($rowcount>0)
{
    foreach($result as $row)
    {
        echo"<tr>
                
                <td>".$row[0]." ".$row[1]."</td>
                <td>".$row[2]."</td>
        </tr>";
    }
    echo "</table>";
}
else 
{
    echo"$bgroup is not Available";
?>
    <script type="text/javascript">alert('No data found !!!');</script>
<?php
}
?>
</body>
</html>
<?php
}
?>

    



