<?php

namespace App\Actions\Fortify;

use App\Models\User;
use Laravel\Jetstream\Jetstream;
use Illuminate\Support\Facades\Hash;
//use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;
//use Illuminate\Foundation\Support\Providers\RouteServiceProvider;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @param  array<string, string>  $input
     */
    public function create(array $input): User
    {

        
        Validator::make($input, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'phone' => ['required'],
            'address' => ['required'],
            'gender' => ['required', 'in:male,female,other'], // Add validation 
            'password' => $this->passwordRules(),
            'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['accepted', 'required'] : '',
        ])->validate();

        //dd($input);
        
        return User::create([
            'name' => $input['name'],
            'email' => $input['email'],
            'password' => Hash::make($input['password']),
            'phone' => $input['phone'],
            'address' => $input['address'],
            'gender' => $input['gender'], // Save gender in the database
        ]);

        //auth()->login($user);

        //return redirect(RouteServiceProvider::HOME)->with('status', 'Registration successful! You are now logged in.');

    }
}
