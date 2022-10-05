<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BusinnesProductSettingController extends ProductSettingController
{
    protected $redirect = 'admin.ukm.index';
    protected $view = 'admins.potencies.ukm.setting';
    protected $key = 'businnes-product';
}
