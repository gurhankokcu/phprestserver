<?php

class Helper
{
    public static function stringValue($value, $default = null, $regex = null)
    {
        $value = strval($value);
        return $regex == null || ($value != null && preg_match($regex, $value) == 1) ? $value : $default;
    }

    public static function integerValue($value, $default = null, $regex = null)
    {
        $value = self::stringValue($value, null, $regex);
        return $value != null && is_numeric($value) ? intval($value) : $default;
    }

    public static function floatValue($value, $default = null, $regex = null)
    {
        $value = self::stringValue($value, null, $regex);
        return $value != null && is_numeric($value) ? floatval($value) : $default;
    }

    public static function dateValue($value, $default = null, $regex = null)
    {
        $value = self::stringValue($value, null, $regex);
        return $value != null ? date($value) : $default;
    }

    public static function stringValueInArray($array, $key, $default = null, $regex = null)
    {
        $value = isset($array[$key]) ? $array[$key] : $default;
        return self::stringValue($value, $default, $regex);
    }

    public static function integerValueInArray($array, $key, $default = null, $regex = null)
    {
        return self::integerValue(Helper::stringValueInArray($array, $key, $default, $regex), $default);
    }

    public static function floatValueInArray($array, $key, $default = null, $regex = null)
    {
        return self::floatValue(Helper::stringValueInArray($array, $key, $default, $regex), $default);
    }

    public static function dateValueInArray($array, $key, $default = null, $regex = null)
    {
        return self::dateValue(Helper::stringValueInArray($array, $key, $default, $regex), $default);
    }
}
