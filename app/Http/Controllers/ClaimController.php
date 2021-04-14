<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreClaimRequest;
use App\Models\Claim;
use App\Models\Role;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ClaimController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $this->authorize('claims-index', Claim::class);
        $items = Claim::all();
        return view('claims.index', ['items' => $items]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $this->authorize('claims-create', Claim::class);
        return view('claims.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return RedirectResponse
     */
    public function store(StoreClaimRequest $request)
    {
        $this->authorize('claims-create', Claim::class);
        $user = Auth::user();
        $claim = new Claim();
        $claim->user()->associate(Auth::user());
        $claim->subject = $request->input('subject');
        $claim->message = $request->input('message');
        $claim->mark = false;
        $claim->save();


        //return $this->show($claim);
        return redirect()->action( [self::class, 'show'], $claim)
        ->with('status', 'Claim saved!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Claim  $claim
     * @return \Illuminate\View\View
     */
    public function show(Claim $claim)
    {
        return view('claims.show', ['claim'=>$claim]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Claim  $claim
     * @return \Illuminate\Http\Response
     */
    public function edit(Claim $claim)
    {
        $this->authorize('claims-update', Claim::class);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Claim  $claim
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Claim $claim)
    {
        $this->authorize('claims-update', Claim::class);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Claim  $claim
     * @return \Illuminate\Http\Response
     */
    public function destroy(Claim $claim)
    {
        $this->authorize('claims-destroy', Claim::class);
    }
}
