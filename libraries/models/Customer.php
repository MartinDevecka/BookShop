<?php

class Customer {

    public $name;
    
    public static function insert($data) {
        
        extract($data);
        
        $query1 = "INSERT INTO customers (customer_email, customer_password) VALUES ('$email', MD5('$password'))";

        if (DB::getInstance()->query($query1)) {
            return 'Customer insertion failed.';
        } else {
            return 'Customer insertion successful.';
        }
        
        $customer_id = DB::getInstance()->insert_id;
        
        $query2 = "INSERT INTO customer_address (customer_first_name, customer_last_name, customer_street, customer_zip, customer_city) VALUES ('$email', MD5('$password'))";
        
    }
}
?>


