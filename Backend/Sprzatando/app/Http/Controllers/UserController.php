<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Validation\Rule;
use Laravel\Fortify\Rules\Password;
use Illuminate\Support\Facades\Auth;
class UserController extends Controller
{
    //
    public function update(Request $request)
    {
        // return view('profile.show')->with('status',"Pomyślnie zaktualizowano dane")->withErrors();
        $user=Auth::user();
        // return $user;
        $validatedData = $request->validate( [
            'name' => ['required', 'string', 'max:255', Rule::unique('users')->ignore($user->id)],
            'email' => ['required', 'email', 'max:255', Rule::unique('users')->ignore($user->id)],
            // 'photo' => ['nullable', 'image', 'max:1024'],
            ]);
            // ->validateWithBag('updateProfileInformation');
            // return $validatedData;
            // if (isset($input['photo'])) {
                //     $user->updateProfilePhoto($input['photo']);
                // }
                
                // if ($input['email'] !== $user->email && $user instanceof MustVerifyEmail) {
                    // $this->updateVerifiedUser($user, $input);
                    // } else {
            $user->forceFill($validatedData)->save();
            return back()->with('status', 'Pomyślnie zaktualizowano dane');
            // }
        }
    public function updatePassword(Request $request){
        $validatedData = $request->validate( [
            'old_password'=>['required'],
            'confirmed'=>['required'],
            'password' =>['required', 'string'],
            ]);
        if($request->password!=$request->confirmed){
            return back()->withErrors("Hasła się nie zgadzają.");
        }
        if (!Hash::check($request['old_password'], Auth::user()->password)) {
            return back()->withErrors("Stare hasło się nie zgadza.");
       }

       Auth::user()->forceFill([
            'password' => Hash::make($request->password),
        ])->save();
        return back()->with('status', 'Pomyślnie zaktualizowano hasło.');
        
    }
}
