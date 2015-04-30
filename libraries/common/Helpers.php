<?php

/**
 * Common functions
 */
class Helpers {

    // email validation

    public static function isValidEmail($email) {
        return preg_match('/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/i', $email);
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
