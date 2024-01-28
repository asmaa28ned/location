<?php


//connexion a la base de donnees 
$servername ="localhost";
$username ="root";
$password = "";
$dbname = "tpin";


 $conn = mysqli_connect($servername,$username,$password,$dbname);

/* if(!$conn){
echo " DATEBASE  NOT Connected ";
} else{
echo " DATEBASE  Connected ";
}  */



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Expert</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

</head>
<body style="margin: 55px;">
  <div class="contrainer my-5">
    <h1>List of expert</h1>
    <a class="btn btn-primary" href="/test/create.php" role="button">New Expert</a>
    <br>
    <table class="table">
        <thead>
            <tr>

                        <th> ID Expert </th>
                        <th> User name </th>
                        <th> Password </th>
                        <th> FisrtName </th>
                        <th> FamilyName </th>
                        <th> Birthday </th>
                        <th> Email </th>
                        <th> Phone</th>
                        <th> City </th>
                        <th> Region </th>
                        <th> Street </th>
                        <th> Code postal </th>
                        <th> ssn </th>
                        <th> icn </th>
                        <th> Num License </th>
                        <th> ccp </th>
                        <th> Holiday </th>
                        <th> action </th>

            </tr>
        </thead>

        <tbody>

        <?php
        $servername ="localhost";
        $username ="root";
        $password = "";
        $dbname = "tpin";
        $conn = mysqli_connect($servername,$username,$password,$dbname);
       
        
        if($conn->connect_error){
            die("Connection failed: " . $conn->connect_error);
        }

        $sql="SELECT * FROM expert";
        $result=$conn->query($sql);

        if(!$result){
            die("Innvalide query: " . $conn->error);
        }
        $currentDate = date('Y/m/d');

        if($_SERVER['REQUEST_METHOD']=='GET'){

        
        $messag=$_GET["messag"];
        $message=$_GET["message"];
        
       
        }

        //read data of each row
        while($row=$result->fetch_assoc()){

            //$id = $row["id"];
            echo" <tr>

            <td> ".$row["id"]." </td>
            <td> ".$row["fullname"]." </td>
            <td> ".$row["passw"]." </td>
            <td> ".$row["firstname"]." </td>
            <td> ".$row["familyname"]." </td>
            <td> ".$row["birth"]." </td>
            <td> ".$row["eemail"]." </td>
            <td> ".$row["ephone"]." </td>
            <td> ".$row["ecity"]." </td>
            <td> ".$row["ereg"]." </td>
            <td> ".$row["estr"]." </td>
            <td> ".$row["codep"]." </td>
            <td> ".$row["ssn"]." </td>
            <td> ".$row["icn"]." </td>
            <td> ".$row["license"]." </td>
            <td> ".$row["ccp"]." </td>
            <td> ".$row["holiday"]." </td>
                           
                            <td>  
                                <a class='btn btn-primary btn-sm' href='/test/update.php?id=$row[id]'>Update</a>
                                <a class='btn btn-danger btn-sm' href='/test/delet.php?id=$row[id]'>Delete</a>
    
                             </td>
                             <td>
                             <form method='get' action='save.php'>
                             <input type='hidden' name='id' value='$row[id]'>
       <input type='hidden' name='messag' value='$messag'>
       <input type='hidden' name='message' value='$message'>
       <input type='hidden' name='date' value='$currentDate'>

       <button action='/test/save.php' method='get' ><a class='btn btn-info btn-sm'>Sent the location to Expert</a></button>
     </form>
                             
                                
            
                            
                             </td>
            </tr>";
            echo" <tr></tr>";
           

        }
        $conn->close();

     
        ?>
        </tbody>
    </table>
  </div>
    
</body>
</html>