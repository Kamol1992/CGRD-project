<?php
session_start();
require_once "Database.php";
require_once "User.php";
require_once "Post.php";
require_once "Auth.php";
require_once "Blog.php";

$blog = new Blog();
$auth = new Auth();
$header = include __DIR__ . '/templates/header.php';
$message = $blog->notifications();

if (isset($_SESSION['flash'])) {
    echo '<div class="notification-error"><div class="noti-content '.$_SESSION['flash']['type'].'"><p>'.$_SESSION['flash']['text'].'</p></div></div>';
    unset($_SESSION['flash']);
}

ob_start();

if (!isset($_SESSION['user'])) {
    // Login
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $user = User::authenticate($_POST['username'], $_POST['password']);
        if ($user) {
            $_SESSION['user'] = $user;
            header("Location: index.php");
            exit;
        } else {
            $header;
            header("Location: index.php");
            $_SESSION['flash'] = $auth->notification()['error'];
            $blog->showLogin();
        }
    } else {
        $header;
        $blog->showLogin();
    }
} else {
    // Logout
    if (isset($_GET['logout'])) {
        Auth::logout();
    }

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $check_required = strlen(trim($_POST['title'])) < 1 || strlen(trim($_POST['title'])) < 1;
        if (isset($_POST['action']) && $_POST['action'] === 'create') {
            if($check_required){
                $_SESSION['flash'] = $message['error'];
            }else{
                $blog->createPost($_POST['title'], $_POST['description']);
                $_SESSION['flash'] = $message['create'];
            }    
        } elseif (isset($_POST['action']) && $_POST['action'] === 'edit') {
            if($check_required){
                $_SESSION['flash'] = $message['error'];
            }
            else{
                $blog->updatePost($_POST['id'], $_POST['title'], $_POST['description']);
                $_SESSION['flash'] = $message['edit'];
            }
            
        }
        header("Location: index.php");
        exit;
    }

    if (isset($_GET['delete'])) {
        $blog->deletePost($_GET['delete']);
        $_SESSION['flash'] = $message['delete'];
        header("Location: index.php");
        exit;
    }

    $header;
    if (isset($_GET['edit'])) {
        $blog->showEditForm($_GET['edit']);
    } elseif (isset($_GET['create'])) {
        $blog->showCreateForm();
    } else {
        $blog->listPosts();
    }
}

include __DIR__ . '/templates/footer.php';
