<?php

namespace App\Http\Controllers;

use App\Models\Claim;
use App\Models\Role;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $user = Auth::user();
        if ($user->hasRole(Role::ADMIN)) return $this->admin();
        if ($user->hasRole(Role::MANAGER)) return $this->manager();
        return $this->client();
    }

    public function admin()
    {
        return view('dashboard.admin');
    }

    public function manager()
    {
        return view('dashboard.manager');
    }

    public function client()
    {
        return view('dashboard.client');
    }
}
