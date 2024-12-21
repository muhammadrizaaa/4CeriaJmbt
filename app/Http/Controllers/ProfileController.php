<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use App\Models\Contact;
use App\Models\PhoneNumber;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        $user = User::with('PhoneNumber')->find(Auth::id());
        $contacts = Contact::all();
        return view('profile.edit', compact('user', 'contacts'));
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }

    public function addPhoneNumber(Request $request){
        $request->validate([
            'phone_num'=>['string', 'max:15'],
            'id_contact'=>['numeric']
        ]);
        PhoneNumber::create([
            'contact'=>$request->phone_num,
            'id_user'=>Auth::id(),
            'id_contact'=>$request->id_contact
        ]);
        return Redirect::route('profile.edit')->with('status', 'Phone Number Added');
    }
    public function deletePhoneNumber($id){
        $phone = PhoneNumber::find($id);
        $phone->delete();
        return Redirect::route('profile.edit')->with('status', 'Phone Number Deleted');
    }
}
