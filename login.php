<?php
require __DIR__ . '/Twig/vendor/autoload.php';
require_once 'user.php';
require_once 'database.php';


use Twig\Environment;
use Twig\Loader\FilesystemLoader;

$loader = new FilesystemLoader(__DIR__ . '/templates');
$twig = new Environment($loader);

// session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

echo 'Login scherm';

    $db = new Database();

    
    $loggedInUser = User::login($username, $password, $db);

    //var_dump( $loggedInUser);

    if ($loggedInUser) {
        $_SESSION['user'] = $loggedInUser;

        //header('Location: templates/welcome.twig');
        echo $twig->render('welcome.twig', );
        exit();
    } else {
    
    }
}


echo $twig->render('login.twig');




?>
