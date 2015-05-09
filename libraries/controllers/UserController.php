<?php

session_start();

class UserController extends Controller {

    public function actionRegister() {

        $name = isset($_POST['name']) ? $_POST['name'] : null;
        $email = isset($_POST['email']) ? $_POST['email'] : null;
        $password = isset($_POST['password']) ? $_POST['password'] : null;
        $phone = isset($_POST['phone']) ? $_POST['phone'] : null;

        $datapost['error'] = '';
        $datapost['success'] = '';
        $datapost['title'] = 'Register';

        if (!empty($_POST)) {
            if (!empty($name) && !empty($password) && !empty($email) && !empty($phone)) {
                if (Helpers::isValidEmail($email) && Helpers::isValidPassword($password) && Helpers::isValidName($name) && Helpers::isValidPhone($phone)) {
                    if (User::verifyUserRegister($_POST)){
                        $datapost['success'] = User::insertUser($_POST);
                        $this->render('userLogoutForm', $datapost, 'main');
                    } else{
                        $datapost['error'] = 'User already exists. Please repeat your registration (change your E-mail).';
                        $this->render('userRegisterForm', $datapost, 'register');
                    }                
                } else {
                    $datapost['error'] = 'Non valid format. ...Name example: My Full Name ...E-mail (numbers allowed) example: my.2email@gmail.com ...Password (min 5 characters, one big letter, one special character, one number) example: Pas&1 ...Phone (+ - allowed) example: +421912 258 125 or 0912-258-125 ...';
                    $this->render('userRegisterForm', $datapost, 'register');
                }
            } else {
                $datapost['error'] = 'Name, E-mail, Password and Phone has to be filled.';
                $this->render('userRegisterForm', $datapost, 'register');
            }
        } else {
            $datapost['success'] = 'Feel free to register.';
            $this->render('userRegisterForm', $datapost, 'register');
        }   
    }

    public function actionLogin() {

        $email = isset($_POST['email']) ? $_POST['email'] : null;
        $password = isset($_POST['password']) ? $_POST['password'] : null;

        $datapost['error'] = '';
        $datapost['success'] = '';
        $datapost['title'] = 'Login';       

        if (!empty($_POST)) {
            if (!empty($email) && !empty($password)) {
                if (Helpers::isValidEmail($email) && Helpers::isValidPassword($password)) {
                    if (User::verifyUserLogin($_POST)) {
                        $_SESSION['logged'] = 1;
                        $datapost['success'] = 'Login successful, redirecting to the home page... ';
                        $this->render('userLogoutForm', $datapost, 'main');
                    } else {
                        $datapost['error'] = 'E-mail or password non valid, please try again.';
                        $this->render('userLoginForm', $datapost, 'register');
                    }
                } else {
                    $datapost['error'] = 'Non valid format. E-mail (numbers allowed) example: my.2email@gmail.com Password (min 5 characters, min one big letter, special character, number) example: Pas&1';
                    $this->render('userLoginForm', $datapost, 'register');
                }
            } else {
                $datapost['error'] = 'E-mail and password has to be filled.';
                $this->render('userLoginForm', $datapost, 'register');
            }
        } else {
            $datapost['success'] = 'Feel free to login.';
            $this->render('userLoginForm', $datapost, 'register');
        }   
    }
    
    public function actionLogout() {      

        $datapost['error'] = '';
        $datapost['success'] = '';   
        $datapost['title'] = 'Login';
              
        if (isset($_SESSION['logged'])) {           
            unset($_SESSION['logged']);
            $datapost['success'] = 'Logout successful, redirecting to the home page...';
            $this->render('userLogoutForm', $datapost, 'main');
        } else {           
            $datapost['error'] = 'Please log in, redirecting to the login form...';
            $this->render('userLoginForm', $datapost, 'register');
        }                       
    }
    
    public function actionLoginAdmin() {

        $email = isset($_POST['email']) ? $_POST['email'] : null;
        $password = isset($_POST['password']) ? $_POST['password'] : null;

        $datapost['error'] = '';
        $datapost['success'] = '';
        $datapost['title'] = 'Login';       

        if (!empty($_POST)) {
            if (!empty($email) && !empty($password)) {
                if (Helpers::isValidEmail($email) && Helpers::isValidPassword($password)) {
                    if (User::verifyAdminLogin($_POST)) {
                        $_SESSION['admin'] = 1;
                        $datapost['success'] = 'Login successful, redirecting to the admin page... ';
                        $this->render('adminLogoutForm', $datapost, 'admin');
                    } else {
                        $datapost['error'] = 'E-mail or password non valid, please try again.';
                        $this->render('adminLoginForm', $datapost, 'register');
                    }
                } else {
                    $datapost['error'] = 'Non valid format. E-mail (numbers allowed) example: my.2email@gmail.com Password (min 5 characters, min one big letter, special character, number) example: Pas&1';
                    $this->render('adminLoginForm', $datapost, 'register');
                }
            } else {
                $datapost['error'] = 'E-mail and password has to be filled.';
                $this->render('adminLoginForm', $datapost, 'register');
            }
        } else {
            $datapost['success'] = 'Feel free to login.';
            $this->render('adminLoginForm', $datapost, 'register');
        }   
    }
    
    public function actionLogoutAdmin() {      

        $datapost['error'] = '';
        $datapost['success'] = '';   
        $datapost['title'] = 'Login';
              
        if (isset($_SESSION['admin'])) {           
            unset($_SESSION['admin']);
            $datapost['success'] = 'Logout successful, redirecting to the home page...';
            $this->render('adminLogoutForm', $datapost, 'main');
        } else {           
            $datapost['error'] = 'Please log in, redirecting to the login form...';
            $this->render('adminLoginForm', $datapost, 'register');
        }                       
    }
}

?>
