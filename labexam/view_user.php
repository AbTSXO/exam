<?php
session_start();
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("Location: login.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Exam</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="style.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</head>
<style>
    .fs-2 {
    font-size: 1rem!important;
}
</style>
  <body>
    <nav class="navbar navbar-dark justify-content-center fs-2 mb-5">
    <a href="index.html" class="logo">Exam</a>
        <ul class="menu">
          
          <li><a style="font-size: medium;" class="page-links active" href="#">View</a></li>
          <li><a style="font-size: medium;" class="page-links" href="logout.php">Logout</a></li>

        </ul>

    </nav> 
    <div class="container" style="box-shadow: 0 3rem 3rem rgba(0,0,0,0.4);">
        <div class="text-center mb-4">
                    <h3> View Users </h3>
                    <p class="text-muted">View registered accounts</p>
                    <div class="container d-flex justify-content-center">
                    <table class="table table-hover text-center">
                        <thead class="table-dark">
                            <tr>
                            <th scope="col">id</th>
                            <th scope="col">User Name</th>
                            <th scope="col">Role</th>
                            </tr>
                        </thead>
                        <tbody>
                            
                        <?php
                        require "user.php";
                        $result = [];
                        $i = 0; 
                         $user = new user();
                         //fetch data from database and display it in the table
                         $result=$user->viewUser() ;
                     while ($i < count($result)) {
                        $person = $result[$i++];
                         echo"                
                            <tr>
                            <td>  $person->id</td>
                            <td>  $person->username</td>
                            <td>  $person->role</td>
                            


                           </tr>";
                        
                        }
                        ?>
                    </tbody>
                    </table>
                        
                </div>
        </div>    

        

    </div>








  </body></html>  