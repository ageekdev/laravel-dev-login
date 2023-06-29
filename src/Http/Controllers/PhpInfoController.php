<?php

namespace AgeekDev\DevLogin\Http\Controllers;

use AgeekDev\DevLogin\PHPInfo;
use Illuminate\Routing\Controller;
use Illuminate\View\View;

class PhpInfoController extends Controller
{
    public function index(): View
    {
        $phpinfo = new PHPInfo();

        return view('dev-login::phpinfo.info', compact('phpinfo'));
    }
}
