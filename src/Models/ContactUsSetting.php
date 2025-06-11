<?php

namespace SoftAndTech\Contactus\Models;

use Illuminate\Database\Eloquent\Model;

class ContactUsSetting extends Model
{
    protected $fillable = ['key', 'value'];
    protected $table = 'contactus_settings';
    public $timestamps = true;
    
    public static function get($key, $default = null)
    {
        return static::where('key', $key)->value('value') ?? $default;
    }

    public static function set($key, $value)
    {
        return static::updateOrCreate(['key' => $key], ['value' => $value]);
    }
}