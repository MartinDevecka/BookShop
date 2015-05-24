<?php

class User {

    public $name;
    private static $id_user = 1;

    public static function insertUser($data) {

        extract($data);

        $insert_user = "INSERT INTO users (user_name, user_password, user_email, user_phone) VALUES ('$name',MD5('$password'),'$email','$phone')";

        if (DB::getInstance()->query($insert_user)) {
            return 'Your registration was successful, redirecting to the home page...';
        }
        //$customer_id = DB::getInstance()->insert_id;        
        //$query2 = "INSERT INTO customer_address (customer_first_name, customer_last_name, customer_street, customer_zip, customer_city) VALUES ('$email', MD5('$password'))";   
    }

    public static function verifyUserLogin($data) {

        extract($data);

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
    }  

    public static function verifyUserRegister($data) {

        extract($data);

        // New user cannot be registered if E-mail or password are identical with the existing one in the database.
        $verify_user = "SELECT * FROM users WHERE user_email = '" . $email . "'";

        if ($result = DB::getInstance()->query($verify_user)) {
            if ($result->num_rows == 0) {
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    public static function GetUserDetails($userId) {
        $userDetails = 'SELECT user_name, user_email, user_phone FROM users WHERE id_user = ' . $userId . ';';
        if ($result = DB::getInstance()->query($userDetails))
            if ($result->num_rows > 0) {
                return $result->fetch_all(MYSQLI_ASSOC);
            } else {
                return false;
            }
    }

    public static function GetUserName($userId) {
        return self::GetUserDetails($userId)[0]['user_name'];
    }

    public static function GetUserId() {
        return self::$id_user;
    }
    
     /*
     * **************************************************************************************************************
     * CRUD model
     * **************************************************************************************************************
     */

    public static function userAdd($data) {

        extract($data);

        $user_add = "INSERT INTO users "
                . "(user_name, user_password, user_email, user_phone) "
                . "VALUES ('$user_name', MD5('$user_password'), '$user_email', '$user_phone');";

        return DB::getInstance()->query($user_add);
    }
    
    public static function verifyUserAdd($data) {

        extract($data);

        // New user cannot be registered if E-mail or password are identical with the existing one in the database.
        $verify_user = "SELECT * FROM users WHERE user_email = '" . $user_email . "';'";

        if ($result = DB::getInstance()->query($verify_user)) {
            if ($result->num_rows == 0) {
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }
    
    public static function userSelectAll() {

        $user_select_all = "SELECT "
                . "id_user, "
                . "user_name, "
                . "user_password, "   
                . "user_email, " 
                . "user_phone "             
                . "FROM users "
                . "ORDER BY id_user;";

        if ($result = DB::getInstance()->query($user_select_all)) {
            if ($result->num_rows > 0) {
                return $result->fetch_all(MYSQLI_ASSOC);
            } else {
                return false;
            }
        } else {
            return false;
        }
    }
    
    public static function userSelect($id) {

        $user_select = "SELECT "
                . "id_user, "
                . "user_name, "
                . "user_password, "
                . "user_email, " 
                . "user_phone " 
                . "FROM users "
                . "WHERE id_user='" . $id . "';";              

        if ($result = DB::getInstance()->query($user_select)) {
            if ($result->num_rows > 0) {
                return $result->fetch_all(MYSQLI_ASSOC);
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    public static function userEmail($id) {

        $user_select = "SELECT "
                . "user_email "
                . "FROM users "
                . "WHERE id_user='" . $id . "';";

        if ($result = DB::getInstance()->query($user_select)) {
            if ($result->num_rows > 0) {
                return ($result->fetch_row()[0]);
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    public static function userSelectCombo() {

        $user_select = "SELECT "
                . "id_user, "
                . "user_email "
                . "FROM users "
                . "ORDER BY id_user;";

        if ($result = DB::getInstance()->query($user_select)) {
            if ($result->num_rows > 0) {
                return $result->fetch_all(MYSQLI_ASSOC);
            } else {
                return false;
            }
        } else {
            return false;
        }
    }    

    public static function userEdit($data) {
        
        extract($data);

        $user_edit = "UPDATE users "
                . "SET "
                . "user_name='" . $user_name . "', "
                . "user_password='" . $user_password . "', "
                . "user_email='" . $user_email . "', "
                . "user_phone='" . $user_phone . "' "
                . "WHERE id_user='" . $id_user . "';";

        return DB::getInstance()->query($user_edit);
    }

    public static function userDelete($id) {

        $user_delete = "DELETE FROM users "
                . "WHERE id_user='" . $id . "';";

        return DB::getInstance()->query($user_delete);
    }

}
?>


