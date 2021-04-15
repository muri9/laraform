<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreClaimRequest;
use App\Models\Claim;
use App\Models\Role;
use Carbon\Carbon;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;
use League\Flysystem\Util;

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
        $items = Claim::orderBy('id', 'desc')->paginate(10);
        $items->withPath('/claims');
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
     * @param \Illuminate\Http\Request $request
     * @return RedirectResponse
     */
    public function store(StoreClaimRequest $request)
    {
        $response = Gate::inspect('create', Claim::class);
        if (!$response->allowed()) {
            return redirect()->action([self::class, 'create'])
                ->with('status', $response->message());
        }

        $claim = new Claim();
        $claim->user()->associate(Auth::user());
        $claim->subject = $request->input('subject');
        $claim->message = $request->input('message');
        $claim->mark = false;
        if ($file = $request->file('file')) {
            //$extension = $file->extension();
            $name = $file->getClientOriginalName();
            $path = $file->storeAs('public', Util::normalizePath($name));
            $claim->file = Storage::url($path);
        }
        $claim->save();

        //return view('claims.show', ['claim'=>$claim]);
        return redirect()->action([self::class, 'create'])
            ->with('status', 'Claim saved!');
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Claim $claim
     * @return \Illuminate\View\View
     */
    public function show(Claim $claim)
    {
        $this->authorize('view', $claim);
        return view('claims.show', ['claim' => $claim]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Claim $claim
     * @return \Illuminate\Http\Response
     */
    public function edit(Claim $claim)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Claim $claim
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Claim $claim)
    {
        //
    }

    /**
     * Mark as read
     *
     * @param \App\Models\Claim $claim
     * @return \Illuminate\Http\RedirectResponse
     */
    public function mark(Claim $claim)
    {
        $this->authorize('claims-mark', Claim::class);
        $claim->mark = true;
        $claim->save();
        return redirect()->action([self::class, 'show'], $claim)
            ->with('status', 'Claim marked as read!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Claim $claim
     * @return \Illuminate\Http\Response
     */
    public function destroy(Claim $claim)
    {
        //
    }
}
