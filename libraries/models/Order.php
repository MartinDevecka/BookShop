<?php

class Order {    

    /*
     * **************************************************************************************************************
     * CRUD model 
     * **************************************************************************************************************
     */

    public static function orderAdd($data) {

        extract($data);

        $order_add = "INSERT INTO orders "
                . "(id_user, order_date, order_payment_type, order_payment_date, order_paid, order_price) "
                . "VALUES ('" . $id_user . "', '" . $order_date . "', '" . $order_payment_type . "', '" . $order_payment_date . "', '" . $order_paid . "', '" . $order_price . "');";

        return DB::getInstance()->query($order_add);
    }

    public static function orderSelectAll() {

        $order_select_all = "SELECT "
                . "id_order, "
                . "id_user, "
                . "order_date, "
                . "order_payment_type, "
                . "order_payment_date, "
                . "order_paid, "
                . "order_price "               
                . "FROM orders "
                . "ORDER BY id_order;";

        if ($result = DB::getInstance()->query($order_select_all)) {
            if ($result->num_rows > 0) {
                return $result->fetch_all(MYSQLI_ASSOC);
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    public static function orderSelect($id) {

        $order_select = "SELECT "
                . "id_order, "
                . "id_user, "
                . "order_date, "
                . "order_payment_type, "
                . "order_payment_date, "
                . "order_paid, "
                . "order_price "    
                . "FROM orders "
                . "WHERE id_order='" . $id . "';";

        if ($result = DB::getInstance()->query($order_select)) {
            if ($result->num_rows > 0) {
                return $result->fetch_all(MYSQLI_ASSOC);
            } else {
                return false;
            }
        } else {
            return false;
        }
    }
    
    public static function orderDate($id) {

        $order_select = "SELECT "
                . "order_date "
                . "FROM orders "
                . "WHERE id_order='" . $id . "';";

        if ($result = DB::getInstance()->query($order_select)) {
            if ($result->num_rows > 0) {
                return ($result->fetch_row()[0]);
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    public static function orderSelectCombo() {

        $order_select = "SELECT "
                . "id_order, "
                . "order_date "
                . "FROM orders "
                . "ORDER BY id_order;";

        if ($result = DB::getInstance()->query($order_select)) {
            if ($result->num_rows > 0) {
                return $result->fetch_all(MYSQLI_ASSOC);
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    public static function orderEdit($data) {

        extract($data);

        $order_edit = "UPDATE orders "
                . "SET "
                . "id_user='" . $id_user . "', "
                . "order_date='" . $order_date . "', "
                . "order_payment_type='" . $order_payment_type . "', "
                . "order_payment_date='" . $order_payment_date . "', "
                . "order_paid='" . $order_paid . "', "
                . "order_price='" . $order_price . "' "                
                . "WHERE id_order='" . $id_order . "';";

        return DB::getInstance()->query($order_edit);
    }

    public static function orderDelete($id) {

        $order_delete = "DELETE FROM orders "
                . "WHERE id_order='" . $id . "';";

        return DB::getInstance()->query($order_delete);
    }
}

?>

