<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    protected $title = 'dharmawidya';
    protected $menu = 'login';

    public function index()
    {
        $data = [
            'title' => $this->title,
            'menu' => $this->menu,
            'submenu' => 'dashboard',
            'label' => 'dashboard',
        ];
        return view('dashboard')->with($data);
    }

    public function phpinfo()
    {
        return view('phpinfo');
    }
}
