<?php

namespace BasePlugin\Services\Frontend;

use BasePlugin\Models\BaseModel;

class FrontendService
{
    public function outputTextInHead(): void
    {
        $settings = BaseModel::getSettings();
        echo $settings['text_in_head'];
    }

    public function outputTextInFooter(): void
    {
        $settings = BaseModel::getSettings();
        echo $settings['text_in_footer'];
    }
}