<?php

class User {

    public $name;

    public static function insertUser($data) {

        extract($data);

        $insert_user = "INSERT INTO users (user_name, user_password, user_email, user_phone) VALUES ('$name',MD5('$password'),'$email','$phone')";

        if (DB::getInstance()->query($insert_user)) {
            return 'User insertion successful.';
        } else {
            return 'User insertion failed.';
        }

        //$customer_id = DB::getInstance()->insert_id;        
        //$query2 = "INSERT INTO customer_address (customer_first_name, customer_last_name, customer_street, customer_zip, customer_city) VALUES ('$email', MD5('$password'))";   
    }

    public static function verifyUser($data) {

        extract($data);

        $verify_user = "SELECT * FROM users WHERE user_email = '" . $email . "' AND user_password = MD5('" . $password . "')";

        if ($result = DB::getInstance()->query($verify_user)) {
            if ($result->num_rows > 0) {
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

}
?>


