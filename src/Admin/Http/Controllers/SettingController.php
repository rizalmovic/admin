<?php

namespace Rizalmovic\Admin\Http\Controllers;

use Rizalmovic\Core\Entities\Setting;
use Cache;

class SettingController extends AdminController
{
    public function getIndex()
    {
        $settings = Setting::all();
        return View('Admin::settings.index', compact('settings'));
    }

    public function postSave()
    {
        $inputs = request()->get('setting', []);

        foreach($inputs as $input) {
            Setting::find($input['id'])->update($input);
            Cache::forget('settings.' . $input['slug']);
        }

        return redirect()->back();
    }
}