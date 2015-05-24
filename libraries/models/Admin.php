<?php

class Admin {

    public $name;
    private static $id_user = 1;

    public static function verifyAdminLogin($data) {

        extract($data);

        if ($email == "devemart@gmail.com" && $password == "Admin@123") {
            $verify_user = "SELECT id_user FROM users WHERE user_email = '" . $email . "' AND user_password = MD5('" . $password . "')";
            if ($result = DB::getInstance()->query($verify_user)) {
                if ($result->num_rows > 0) {
                    self::$id_user = $result->fetch_row()[0];
                    return true;
                } else {
                    return false;
                }
            } else {
                return false;
            }
        } else {
            return false;
        }
    }
}
?>

