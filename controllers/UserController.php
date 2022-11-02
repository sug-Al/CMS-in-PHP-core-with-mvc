<?php

namespace app\controllers;

use app\models\Users;
use app\Router;

require_once __DIR__ . '/../Base/Session.php';

class UserController extends AbstractController
{
    public static function userLogin(Router $router)
    {
        
        $loginPostedInfo = [
            'username' => '',
            'password' => '',
        ];

        if (isset($_POST['login'])) {

            $loginPostedInfo['username'] = $_POST['username'];
            $loginPostedInfo['password'] = $_POST['userPassword'];

            $user = new Users();
            $user->load($loginPostedInfo);
            if($user->save()){
                if (isset($_SESSION['userNotFoundMsg'])) {
                    self::renderLoginForm($loginPostedInfo, $router);
                }
                if (isset($_SESSION['userId']) And $_SESSION['userLoggedIn'] == true) {
                    if($_SESSION['userType'] == '0'){
                        self::redirectTo('http://localhost:8080/customer/products');
                    }
                    else{
                        self::redirectTo('http://localhost:8080/admin/products');
                    }      
                }
            }
            else{
                echo "User Login Failure!!";
            }
        } else {
            self::renderLoginForm(null, $router);

        }

    }

    public static function userLogout(Router $router){


        if(isset($_POST['logout'])){
            
            $_SESSION['userId'] = null;
            $_SESSION['username'] = null;
            $_SESSION['userType'] = null;
            $_SESSION['userNotFoundMsg'] = null;
            $_SESSION['userLoggedIn'] = false;
                
            self::redirectTo('http://localhost:8080/');    
        }
        else{
            var_dump($_SESSION);
            echo "User not logged in status:false";
        }
    }


    public static function userSignin(Router $router)
    {
        $signinPostedInfo = [
            'fullname' => '',
            'address' => '',
            'contact' => '',
            'username' => '',
            'password' => '',
            'repassword' => ''
        ];

        if (isset($_POST['signin'])) {
            $signinPostedInfo['fullname'] = $_POST['fullname'];
            $signinPostedInfo['address'] = $_POST['address'];
            $signinPostedInfo['contact'] = $_POST['contact'];
            $signinPostedInfo['username'] = $_POST['username'];
            $signinPostedInfo['password'] = $_POST['password'];
            $signinPostedInfo['repassword'] = $_POST['repassword'];

            if($signinPostedInfo['password'] == $signinPostedInfo['repassword']){
                $user = new Users();
                $user->load($signinPostedInfo);
                if($user->save()){
                    self::redirectTo("http://localhost:8080/login");
                }
                else{
                    echo "User Signin Failure!!!";
                }
            }
            else{
                echo "Password must be same in both fields!!";
            }
        } else {
            self::rendereSigninForm(null, $router);
        }

    }

    public static function renderLoginForm($userData, $router)
    {
        $router->renderView('users/login_page',
            [
                'users' => $userData,
            ],
            null
        );
    }

    public static function rendereSigninForm($userData, $router)
    {
        $router->renderView('users/signin_page',
            [
                'users' => $userData,
            ],
            null
        );
    }

}