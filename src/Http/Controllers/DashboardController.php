<?php

namespace AgeekDev\DevLogin\Http\Controllers;

use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Route;
use Illuminate\View\View;

class DashboardController extends Controller
{
    public function index(): View
    {
        return view('dev-login::dashboard')->with('defaultApps', $this->getDefaultApps());
    }

    private function getDefaultApps(): array
    {
        $defaultApps = [
            [
                'route_name' => 'telescope',
                'title' => 'Telescope',
                'desc' => 'Debug your application using telescope debugging and insight UI.',
            ],
            [
                'route_name' => 'vapor-ui',
                'title' => 'Vapor UI',
                'desc' => "A beautiful dashboard accessible via your Vapor application that allows you to view/search your application's logs and failed queue jobs.",
            ],
            [
                'route_name' => 'horizon.index',
                'title' => 'Horizon',
                'desc' => 'Beautiful UI for monitoring your Redis driven Laravel queues.',
            ],
        ];

        return array_filter($defaultApps, static function ($app) {
            return Route::has($app['route_name']);
        });
    }
}
