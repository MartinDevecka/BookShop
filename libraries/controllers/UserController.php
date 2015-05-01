<?php

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
                    } else{
                        $datapost['error'] = 'User already exists. Please repeat your registration (change your E-mail or password).';
                    }                
                } else {
                    $datapost['error'] = 'Non valid format. ...Name example: My Full Name ...E-mail (numbers allowed) example: my.2email@gmail.com ...Password (min 5 characters, one big letter, one special character, one number) example: Pas&1 ...Phone (+ - allowed) example: +421912 258 125 or 0912-258-125 ...';
                }
            } else {
                $datapost['error'] = 'Name, E-mail, Password and Phone has to be filled.';
            }
        }
        $this->render('userRegisterForm', $datapost, 'register');
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
                        $datapost['success'] = 'Login successful.';
                    } else {
                        $datapost['error'] = 'E-mail or password non valid, please try again.';
                    }
                } else {
                    $datapost['error'] = 'Non valid format. E-mail (numbers allowed) example: my.2email@gmail.com Password (min 5 characters, min one big letter, special character, number) example: Pas&1';
                }
            } else {
                $datapost['error'] = 'E-mail and password has to be filled.';
            }
        }
        $this->render('userLoginForm', $datapost, 'register');
    }
}
