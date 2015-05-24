<?php

/**
 * Common functions
 */
class Helpers {
    
    /*
     * REGISTER AND LOGIN FORM VALIDATIONS
     */
    
    // name validation

    public static function isValidName($name) {
        if (!empty($_POST['name'])) {
            return preg_match('/^([A-Z]{1}[a-z]+[\s]{1})+([A-Z]{1}[a-z]+[\s]{0})+$/', $name);
        }
    }

    // email validation

    public static function isValidEmail($email) {
        if (!empty($_POST['email'])) {
            return preg_match('/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/', $email);
        }
    }

    // password validation

    public static function isValidPassword($password) {
        if (!empty($_POST['password'])) {
            return preg_match('/^(?=.*[0-9])(?=.*[\W])(?=.*[a-z])(?=.*[A-Z])([a-zA-Z0-9\W]{5,})$/', $password);
        }
    }

    // phone validation

    public static function isValidPhone($phone) {
        if (!empty($_POST['phone'])) {
            return preg_match('/^\+?[0-9]{1,}(\s?-?[0-9]{1,})+(\s?-?[0-9]{1,}[\s]{0})+$/', $phone);
        }
    }  
    
    /*
     * REGISTER AND LOGIN FORM VALIDATIONS ADMIN
     */
    
    // name validation

    public static function isValidNameAdmin($user_name) {
        if (!empty($_POST['user_name'])) {
            return preg_match('/^([A-Z]{1}[a-z]+[\s]{1})+([A-Z]{1}[a-z]+[\s]{0})+$/', $user_name);
        }
    }

    // email validation

    public static function isValidEmailAdmin($user_email) {
        if (!empty($_POST['user_email'])) {
            return preg_match('/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/', $user_email);
        }
    }

    // password validation

    public static function isValidPasswordAdmin($user_password) {
        if (!empty($_POST['user_password'])) {
            return preg_match('/^(?=.*[0-9])(?=.*[\W])(?=.*[a-z])(?=.*[A-Z])([a-zA-Z0-9\W]{5,})$/', $user_password);
        }
    }

    // phone validation

    public static function isValidPhoneAdmin($user_phone) {
        if (!empty($_POST['user_phone'])) {
            return preg_match('/^\+?[0-9]{1,}(\s?-?[0-9]{1,})+(\s?-?[0-9]{1,}[\s]{0})+$/', $user_phone);
        }
    } 

    // format date from database format to local format. E.g. 2015-01-02 12:12:11 translates to 2.1.2015 12:12:11

    public static function formatDateFromDb($date, $noTime = false) {
        $format = 'd.m.Y';
        if (strlen($date) > 10) {
            if (!$noTime)
                $format .= ' H:i:s';
        }
        $time = strtotime($date);
        if ($time)
            $date = date($format, $time);
        else
            $date = '';
        return $date;
    }

    // format date from local format to database format. E.g. 2.1.2015 12:12:11  translates to 2015-01-02 12:12:11

    public static function formatDateToDb($date) {
        $object = DateTime::createFromFormat('d.m.Y', $date);
        if ($object) {
            $time = $object->getTimestamp();
            return date('Y-m-d', $time);
        } else {
            return false;
        }
    }
}
