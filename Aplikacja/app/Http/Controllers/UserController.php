<?php

namespace App\Http\Controllers;

use App\Models\User;
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
        if(strlen($request->password)<8){
            return back()->withErrors("Hasła musi mieć co najmniej 8 znaków.");
        }
        if (!Hash::check($request['old_password'], Auth::user()->password)) {
            return back()->withErrors("Stare hasło się nie zgadza.");
       }

       Auth::user()->forceFill([
            'password' => Hash::make($request->password),
        ])->save();
        return back()->with('status', 'Pomyślnie zaktualizowano hasło.');

    }
    public function UserApi(User $user){
        $user->avg=round($user->engaged->avg('details.rating'),1);
        $user->jobs=$user->engaged()->count();
        $user->CreatedAnnouncements=$user->announcements()->count();
        $user->ban=$user->ban_ending_at?date('Y-m-d',strtotime($user->ban_ending_at)):null;
        unset($user->engaged);
        unset($user->ban_ending_at);
        $user->last=$user->engaged()->where('status','selected')->latest()->first()->details??"";
        return $user;
    }
    public function ban_user(Request $request){
        $data=$request->validate(['date'=>'required','user'=>'required']);
        User::findOrFail($data['user'])->update(['ban_ending_at'=>$data['date']]);
        return back()->with('status','Pomyślnie zbanowano użytkownika');
    }
}
