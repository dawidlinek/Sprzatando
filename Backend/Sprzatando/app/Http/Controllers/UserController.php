<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
class UserController extends Controller
{
    //
    public function update(Request $request)
    {
        $user=Auth::user();
        $input=$request->all();
        Validator::make($input, [
            'name' => ['required', 'string', 'max:255', Rule::unique('users')->ignore($user->name)],
            'email' => ['required', 'email', 'max:255', Rule::unique('users')->ignore($user->id)],
            // 'photo' => ['nullable', 'image', 'max:1024'],
            ]);
            // ->validateWithBag('updateProfileInformation');

        // if (isset($input['photo'])) {
        //     $user->updateProfilePhoto($input['photo']);
        // }

        if ($input['email'] !== $user->email && $user instanceof MustVerifyEmail) {
            $this->updateVerifiedUser($user, $input);
        } else {
            $user->forceFill([
                'name' => $input['name'],
                'email' => $input['email'],
            ])->save();
        }
        return view('profile.show')->with('status',"Pomyślnie zaktualizowano dane");
    }
}
