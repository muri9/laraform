<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return RedirectResponse
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
        return Redirect::route('claims.index');
    }

    public function client()
    {
        return Redirect::route('claims.create');
    }
}
