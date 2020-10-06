<?php

namespace BasePlugin\Services\Admin;

use BasePlugin\Models\BaseModel;

class AdminService
{
    public static function BasePluginPageData(): array
    {
        $data = [
            'title' => ' Base Plugin Settings Page Title',
            //'data'=> BaseModel::getSettings()
        ];
        return $data;
    }

}