<?php
require 'config.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $action = $_POST["action"];
    
    if ($action == "register") {
        $user =new user();
        $user->register($_POST["username"],$_POST["password"],$_POST["role"]);
    } 
    else if ($action == "login") {
        $user =new user();
        $user->login($_POST["username"],$_POST["password"]);
    }
}
class user{
    var $id;
    var $username;
    var $password;
    var $role;
    public function register($username,$password,$roll){
        $con= connect_db(); 
         $user = new user();
         $safe_username = htmlspecialchars($_POST['username'], ENT_QUOTES, 'UTF-8');
        $safe_pass = htmlspecialchars($_POST['password'], ENT_QUOTES, 'UTF-8');
        $user->username = $con->real_escape_string($safe_username);
        $user->password = $user->passwordEncrypt($safe_pass);
        $user->role = $con->real_escape_string($roll);
         //save to database or file here.
         $checker = $user->regtoDB($con,$user);
         if ($checker) {
            header("Location: login.html");
         } else {
            header("Location: register.html");
         }
        
    }
    private function passwordEncrypt($password){
        $hash = password_hash($password, PASSWORD_DEFAULT);
        return $hash;
    }
    private function regtoDB($con,$user){
        $query ="INSERT INTO `user` (`username`, `password`, `role`) 
        VALUES ('$user->username', '$user->password', '$user->role')";
        $result = $con->query($query);
        return $result;
    }

    public function login($username,$password){
        $user = new user();
        $con= connect_db();
        $username = $con->real_escape_string($username);
        $password = $con->real_escape_string($password);
        

        $username = htmlspecialchars($username, ENT_QUOTES, 'UTF-8');

       $query ="SELECT * FROM `user` WHERE `username` = '$username'";
        $result = $con->query($query);
        if($result->num_rows > 0){
            
            while ($row =  $result->fetch_assoc()) {
                if(password_verify( $password,$row["password"]))
                {
                    if (isset($_POST["keepLoggedIn"]) && $_POST["keepLoggedIn"] === "yes") 
                    {
                        // Set a cookie with the username (for demonstration purposes)
                        setcookie("username", $username, time() + (86400 * 30), "/"); // Cookie lasts for 30 days
                    }

                    session_start();
                    $_SESSION['loggedin'] = true ;
                    $_SESSION['id'] = $row['id'];
                    $_SESSION['username']= $row['username'];
                    $_SESSION['role']= $row['role'];
                    
                    //echo " <br> log:".$_SESSION['loggedin']."<br>id:".$_SESSION['id']."<br>u:". $_SESSION['username']."<br>role".$_SESSION['role'];
                    if($_SESSION['role'] == 'admin'){
                        header("Location: view_user.php");

                    }
                    else{
                        header("Location: index.php");

                    }
                    
                }
                else
                {
                    header("Location: login.html");
                    //echo " <br> password is not correct";
                } 
        }
    }
        else{
            //echo '<script>alert("username and password is not correct");</script>';
            header("Location: login.html");
        }


 }
 public function viewUser(){
    $con= connect_db();
    $myarrObject = [];
    $sql = "SELECT * FROM `user`";
    $result =  $con->query($sql);
    if ($result) {
        while (($row=$result->fetch_assoc())){
            $user = new user();
            $user->id = $row['id'];
            $user->username = $row['username'];
            $user->role = $row['role'];
            $myarrObject[] = $user; 
        }
    return $myarrObject;
    }

}


}
?>