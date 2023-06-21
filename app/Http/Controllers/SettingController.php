<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;
use Inertia\Inertia;

class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Inertia\Response
     */
    public function index()
    {
        $settings = Setting::all();
        return Inertia::render('Settings/Index', ['setting' => $settings]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        abort(404);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'string|required',
            'value'=>'numeric|required'
        ]);
        $setting = Setting::create([
            'name' => $request->name,
            'value' => $request->value
        ]);
        return Redirect::back()
            ->with('message', 'Settings Saved Successfully')
            ->with('key', Str::uuid()->toString())
            ->with('type', 'emerald');
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Setting $setting
     * @return \Illuminate\Http\Response
     */
    public function show(Setting $setting)
    {
        abort(404);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Setting $setting
     * @return \Illuminate\Http\Response
     */
    public function edit(Setting $setting)
    {
        abort(404);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Setting $setting
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Setting $setting)
    {
        $data = $request->all();
        foreach ($data['settings'] as $setting) {
            $set = Setting::where('name', $setting['name'])->first();
            $set->value = $setting['value'];
            $set->save();
        }
        return Redirect::back()
            ->with('message', 'Settings Updated Successfully')
            ->with('key', Str::uuid()->toString())
            ->with('type', 'emerald');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Setting $setting
     * @return \Illuminate\Http\Response
     */
    public function destroy(Setting $setting)
    {
        abort(404);
    }
}
