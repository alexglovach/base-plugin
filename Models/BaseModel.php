<?php

namespace BasePlugin\Models;

class BaseModel
{
    const SETTINGS_NAME = 'base-plugin-option';
    protected static $settings;

    public static function getSettings()
    {
        self::$settings = json_decode(get_option(self::SETTINGS_NAME), true);
        return self::$settings;
    }

    public static function setSettings(array $settings)
    {
        self::updateSettings($settings);
    }

    public static function updateSettings(array $settings)
    {
        self::$settings = json_encode($settings);
        update_option(self::SETTINGS_NAME, self::$settings);
    }

    public static function deleteSettings()
    {
        self::$settings = '';
        delete_option(self::SETTINGS_NAME);
    }
}
