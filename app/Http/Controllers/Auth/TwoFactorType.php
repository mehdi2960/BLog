<?php


namespace App\Http\Controllers\Auth;


use App\Models\ActiveCode;
use Illuminate\Http\Request;

trait TwoFactorType
{
    public function loggedIn(Request $request,$user)
    {
        if ($user->hasTwoFactorAuthenticatedEnabled()) {
            auth()->logout();
            $request->session()->flash('auth', [
                'user_id' => $user->id,
                'using_sms' => false,
                'remember' => $request->has('remember')
            ]);


            if ($user->two_factor_type == 'sms') {
                $code = ActiveCode::generateCode($user);
                $request->session()->push('auth.using_sms','true');
            }
            return redirect(route('auth.token'));
        }

        return false;
    }
}
