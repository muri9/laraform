<?php

namespace App\Http\Controllers;

use App\Models\Claim;
use App\Models\Role;
use Illuminate\Http\Request;
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
        if ($user->hasRole(Role::ADMIN)) {
            $items = Claim::all();
            return view('claims.index', ['items' => $items]);
        }
        if ($user->hasRole(Role::MANAGER)) {
            $items = Claim::all();
            return view('claims.index', ['items' => $items]);
        }
        if ($user->hasRole(Role::CLIENT)) {
            $items = Claim::where('user_id', $user->id)->get();
            return view('claims.client-index', ['items' => $items]);
        }

        return view('dashboard');
    }
}
