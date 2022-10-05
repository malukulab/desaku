<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BusinessProduct;
use Illuminate\Http\Request;

class BusinessProductController extends ProductController
{
    protected string $model = BusinessProduct::class;

    protected array $views = [
        'index' => 'admins.potencies.ukm.index',
        'create' => 'admins.potencies.ukm.create',
        'edit' => 'admins.potencies.ukm.edit',
    ];

    protected array $routes = [
        'index' => 'admin.ukm.index',
    ];

}
