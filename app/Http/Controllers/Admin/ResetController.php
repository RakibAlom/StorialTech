<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;

class ResetController extends Controller
{
    public function routeCache()
    {
        Artisan::call('route:cache');
        return 'Route Cached!';
    }
    
    public function viewCache()
    {
        Artisan::call('view:cache');
        return 'View Cached!';
    }
    
    public function eventCache()
    {
        Artisan::call('event:cache');
        return 'Event Cached!';
    }
    
    public function configCache()
    {
        Artisan::call('config:cache');
        return 'Config Cached!';
    }
    
    public function clearCache()
    {
        Artisan::call('cache:clear');
        return 'Cache Clear!';
    }
    
    public function clearEvent()
    {
        Artisan::call('event:clear');
        return 'Event Clear!';
    }
    
    public function clearView()
    {
        Artisan::call('view:clear');
        return 'View Clear!';
    }
    
    public function clearRoute()
    {
        Artisan::call('route:clear');
        return 'Route Clear!';
    }
    
    public function clearConfig()
    {
        Artisan::call('config:clear');
        return 'Config Clear!';
    }

    public function clearOptimize()
    {
        Artisan::call('optimize:clear');
        return 'Optimize Clear!';
    }

    public function storageLink()
    {
        Artisan::class('storage:link');
        return 'Storage linked!';
    }
    
    public function redirect()
    {
        return redirect('/');
    }
}
