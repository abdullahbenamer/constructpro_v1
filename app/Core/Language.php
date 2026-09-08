<?php

class Language
{
    private static $language = 'en';
    private static $translations = [];

    public static function init()
    {
        if (isset($_GET['lang']) && in_array($_GET['lang'], ['en', 'ar'], true)) {
            $_SESSION['language'] = $_GET['lang'];
        }

        self::$language = $_SESSION['language'] ?? 'en';

        $file = __DIR__ . '/../Language/' . self::$language . '.php';

        if (file_exists($file)) {
            self::$translations = require $file;
        } else {
            self::$translations = [];
        }
    }

    public static function get()
    {
        return self::$language;
    }

    public static function direction()
    {
        return self::$language === 'ar' ? 'rtl' : 'ltr';
    }

    public static function translate($key)
    {
        return self::$translations[$key] ?? $key;
    }
}

function __($key)
{
    return Language::translate($key);
}