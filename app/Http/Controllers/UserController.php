<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function create() {

        return view('user.create');
    }

    public function store(Request $request) {

        $validate = [
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed',
            'avatar' => 'nullable|image',
        ];
        $message = [
            'password.required' => 'Поле не заполнено',
            'password.confirmed' => 'Данные не совпали',
            'email.unique' => 'Такой емайл уже существует',
            'avatar.image' => 'Файл должен быть изображением',
        ];
        $request->validate($validate, $message);

        if($request->hasFile('avatar')) {
            $folder = date('Y-m-d');
            $avatar = $request->file('avatar')->store("images/$folder");
        }

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'avatar' => $avatar ?? null,
        ]);

        session()->flash('success', 'Successful registration');
        Auth::login($user);
        return redirect()->route('home');
    }

    public function LoginForm() {

        return view('user.login');
    }

    public function login(Request $request) {

        $validate = [
            'email' => 'required|email',
            'password' => 'required',
        ];

        $messages =   [
            'email.required' => 'Поле обязательно',
            'password.required' => 'Поле обязательно',
        ];
        $request->validate($validate, $messages);

        if(Auth::attempt([
            'email' => $request->email,
            'password' => $request->password,
        ])) {
            return redirect()->route('home');
        }

        return redirect()->back()->with('error', 'Incorrect Login or password');
    }

    public function logout() {

        Auth::logout();
        return redirect()->route('login.create');
    }
}
//,
//        [
//            'name' => 'Данные не указаны',
//            'email.required' => 'Данные не указаны',
//            'email.email' => 'Данные введенеы не корректно',
//            'email.unique' => 'такой email уже указан',
//            'password.required' => 'Данные не указаны',
//            'password.confirmed' => 'Пароли не совпадают',
//        ]
