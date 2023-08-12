<?php
session_start();
if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true){
    header("Location: login.html");
    exit();
}
else{
         $role = $_SESSION['role'];
       $username = $_SESSION['username'];   
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>My Beautiful Home Page</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f7f7f7;
        }
        header {
            background-color: #333;
            color: #fff;
            text-align: center;
            padding: 10px;
        }
        .container {
            max-width: 960px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }
        h1 {
            color: #333;
        }
        p {
            color: #666;
            line-height: 1.6;
        }
        footer {
            text-align: center;
            padding: 10px;
            background-color: #333;
            color: #fff;
        }
    </style>
</head>
<body>
    <header>
        <h1>Welcome to My Beautiful Home Page</h1>
    </header>
    <div class="container">
        <h2>About Us<span style="margin-left: 25rem; "><a style="text-decoration:none;color:black;" href="logout.php">Logout</a></span></h2>
        <p><?php if ($role == 'admin') {
            echo "Hello Admin ".$username." welcome to your page";
        } else {
            echo "Hello Stuedent ".$username." welcome to your page";
        } 
        ?></p>
    </div>
    <footer>
        <p>&copy; 2023 Abenezer Ashenafi Home Page. Act exam purpose.</p>
    </footer>
</body>
</html>
