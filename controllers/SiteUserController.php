<?php
class SiteUser
{
    public function actionLogin()
    {
        $un = '';
        if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit']))
        {
            $un = $_POST['username'];
            $pwd = $_POST['password'];
            $remember = false;
            if(isset($_POST['rememberMe']))
            {
                $remember = true;
            }
            $result = User::login($un,$pwd,$remember);
            $error = null;
            if(isset($result[1]))
            {
                $error = $result[1];
                include_once('views/user/login.php');
                exit();
            }
            header('Location: ' . ROOT);
        }
        
        include_once('views/user/login.php');
        
        
    }

    public function actionLogout()
    {
        User::logout();
        header('Location: ' . ROOT);
    }

    public function actionRegister()
    {

    }
}