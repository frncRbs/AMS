<?php
    include_once('database.php');
    include_once('config.php');

session_start();
$message = "";

if(isset($_POST["login"]))
{
    $database = new Connection();
    $db = $database->open();
    try{
        if(empty($_POST["username"]) || empty($_POST["password"]))
        {
            $message = '<label>All fields are required</label>';
        }
        else
        {
            $query = "SELECT * FROM m_user WHERE username = :username AND password = :password";
            $statement = $db->prepare($query);
            $statement->execute(array
                ('username'     =>     $_POST["username"],
                 'password'     =>     $_POST["password"])
            );
            $count = $statement->rowCount();
            if($count == 1)
            {
                $statement2 = $db->prepare("SELECT pk FROM m_user WHERE username='".$_POST["username"]."' AND password='".$_POST["password"]."'");
                $statement2 -> execute();
                $id = $statement2->fetch();
                $_SESSION["userid"] = $id['pk'];

                $_SESSION["username"] = $_POST["username"];
                header("location:".LOCATION."validator/main.php");
            }
            else if ($count > 1)
            {
                $message = "Duplicate account please contact your system provider.";
                $_SESSION["message"] = $message;
                header("location:".LOCATION."index.php");
                
            }
            else
            {
                $message = "Incorrect username or password.";
                $_SESSION["message"] = $message;
                header("location:".LOCATION."/index.php");
                
            }
        }
    }
    catch(PDOException $e){
        $_SESSION['message'] = $e->getMessage();
        header("location:".LOCATION."/index.php");
    }

    //close connection
    $database->close();
}
?>