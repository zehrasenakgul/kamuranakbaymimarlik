<?php

namespace App\Http\Composers;

use App\Models\Setting;
use Illuminate\Contracts\View\View;

class SettingShareComposer
{
    public function compose(View $view)
    {
        $data = [];
        $settings = Setting::all();
        $settingArr = [];
        foreach ($settings as $setting) {
            $settingArr[$setting->key] = $setting->value;
        }
        $data['settings'] = $settingArr;
        $view->with("settings", $data);
    }
}
