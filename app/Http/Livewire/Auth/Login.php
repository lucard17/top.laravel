<?php

namespace App\Http\Livewire\Auth;

use App\Models\Role;
use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class Login extends Component
{
    public $action = 'login';
    public $name = '';
    public $email = '';
    public $password = "";
    public $password_confirmation = "";


    protected function rules()
    {
        if ($this->action == 'login') {
            return [
                'email' => ['required', 'email', 'exists:users'],
                'password' => 'required'
            ];
        }
        if ($this->action == 'register') {
            return [
                'name' => ['required', 'string', 'min:5', 'max:255'],
                'email' => ['required', 'email', 'unique:users'],
                'password' => 'required',
                'password_confirmation' => 'required|same:password'

            ];
        }

    }
    public function render()
    {

        return view('livewire.auth.login')
            ->extends('main')
            ->section('content');
    }
    public function login()
    {

        $credentials = $this->validate();
        if (Auth::attempt($credentials)) {
            session()->regenerate();
            return redirect()->route('home');
        }

    }
    public function register()
    {
        $credentials = $this->validate();
        $user = User::create(
            [
                'name' => $credentials['name'],
                'email' => $credentials['email'],
                'password' => Hash::make($credentials['password'])
            ]
        );
        $user->roles()->attach(Role::where('name', 'user')->first());
        if (Auth::attempt(['email' => $credentials['email'], 'password' => $credentials['password']])) {
            session()->regenerate();
            return redirect()->route('home');
        }


    }
    public function mount($action = 'login')
    {
        if ($action == 'logout') {
            Auth::logout();
            session()->invalidate();
            session()->regenerateToken();
            return redirect()->route('home');
        }
        $this->action = $action;
    }
    public function update()
    {
        if ($this->action == 'login') {
            $this->validateOnly($this->loginValidationRules);
        } else {
            $this->validateOnly($this->registerValidationRules);
        }
    }
}