<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\UpdateProfileRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function edit()
    {
        return view('dashboard.profile.edit', ['user' => Auth::user()]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProfileRequest $request)
    {
        $data          = $request->safe()->except('image');
        $data['image'] = Storage::disk('users')->put('images', $request->file('image'));

        auth()->user()->update($data);

        return redirect()->route('dashboard.profile.edit')->with('success', 'Profile updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
