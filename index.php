
<html>
    <head>
        <title>Performance Review</title>
        <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@500&display=swap" rel="stylesheet">
    </head>
    <style>
        body{
            font-family: 'DM Sans';
            font-size: 30px;
            background: linear-gradient(35deg,pink,blue);
        }
        /*th{
            font-size: 30px;
            padding: 10px;
            margin: 10px;
            text-align: center;
        }*/
        tr{
            font-size: 25px;
            border: 0px;
            border-radius: 10px;
            /*background: linear-gradient(40deg,white);*/
            background-color: white;
            text-align: left;
            display: flex;
            padding: 5px;
            margin: 15px;
            color: black;
            width: 900px;
        }
        td{
            padding: 2px;
            margin: 2px;
            display: block;
        }
        p{
            text-align: left;
        }
        #mail,#rat,#star{
            margin: 0px 15px 0px 15px;
            padding: 20px 12px 0px 12px;
            text-align: center;
            display: block;
        }
        
        #star{
            width: 100px;
        }
        h1{
            color: white;
            margin: 25px 0px 5px 0px;
        }
        
    </style>
    <center>
    <body>
        <h1>PERFORMANCE REVIEWER</h1>
    </body>
    </center>
</html>

<?php

$link = mysqli_connect("localhost", "username", "password", "dbname");

if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}


$sql= "SELECT * from persons";

if($result = mysqli_query($link, $sql)){
    if(mysqli_num_rows($result) > 0){
        echo "<center>";
        echo "<table>";
            //echo "<tr>";
                //echo "<th>S No</th>";
                //echo "<th>First Name</th>";
                //echo "<th>Last Name</th>";
                //echo "<th>Email</th>";
                //echo "<th>Description</th>";
                //echo "<th>Rating</th>";
            //echo "</tr>";
        while($row = mysqli_fetch_array($result)){
            echo "<tr>";
                //echo "<td>" . $row['id'] . "</td>";
                echo "<td>"."<img src='https://image.freepik.com/free-vector/businessman-profile-cartoon_18591-58479.jpg' height='150px' width='150px'"."</td>";
                echo "<td>" ."<b>". $row['first_name']." ".$row['last_name'] ."</b>". "<p>".$row['description']."</p>"."</td>";
                //echo "<td>" . $row['last_name'] . "</td>";
                echo "<td id='mail'>" . $row['email'] . "</td>";
                //echo "<td>" ."<p>". $row['description'] ."</p>". "</td>";
                echo "<td id='rat'>" . $row['rating'] . "</td>";
                //echo "<p>".$row['description']."</p>";
                $star= $row['rating'];
                echo "<td id='star'>";
                for($i=1;$i<=$star;$i++)
                {
                    echo "<img src='star.png' height='25' width='25'>";
                }
                echo "<td>";
            echo "</tr>";
        }
        echo "</table>";
        echo "</center>";
        // Free result set
        mysqli_free_result($result);
    } else{
        echo "No records matching your query were found.";
    }
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
 
// Close connection
mysqli_close($link);
?>
