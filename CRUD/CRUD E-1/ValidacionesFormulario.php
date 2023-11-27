<?php

namespace bd;

class ValidacionesFormulario
{
    public static function sanitizeString($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    public static function validateName($name)
    {
        $name = self::sanitizeString($name);
        return preg_match('/^[a-zA-Z\s]+$/', $name);
    }

    public static function validateEmail($email)
    {
        $email = self::sanitizeString($email);
        return filter_var($email, FILTER_VALIDATE_EMAIL);
    }

    public static function validatePassword($password)
    {
        return preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{5,}$/', $password);
    }

    public static function validateCardNumber($card)
    {
        $card = self::sanitizeString($card);
        return preg_match('/^\d{16}$/', $card);
    }

    public static function validateExpiryDate($date)
    {
        $date = self::sanitizeString($date);
        $currentDate = date("Y-m-d");
        return $date > $currentDate;
    }

    public static function validateSecurityCode($code)
    {
        $code = self::sanitizeString($code);
        return preg_match('/^\d{3}$/', $code);
    }
}
