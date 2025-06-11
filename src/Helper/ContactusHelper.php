<?php

namespace SoftAndTech\Contactus\Helper;

use SoftAndTech\Contactus\Models\ContactUsSetting;

class ContactusHelper
{
    public static function get($key, $default = null)
    {
        $settings = self::getAll();
        return $settings[$key] ?? $default;
    }

    public static function getAll()
    {
        return ContactUsSetting::pluck('value', 'key')->toArray();
    }
 
}
