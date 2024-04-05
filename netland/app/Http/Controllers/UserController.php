<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function create()
    {
        return view('create-user');
    }

    public function add()
    {
        return view('create-user');
    }

    public function store(Request $request)
    {
        // Valideer de ingediende gegevens
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|unique:users,email',
            'password' => 'required|string|min:8',
        ]);

        // Maak een nieuwe gebruiker aan
        $user = new User();
        $user->name = $validatedData['name'];
        $user->email = $validatedData['email'];
        $user->password = bcrypt($validatedData['password']); // Hash het wachtwoord
        $user->save();

        // Retourneer een succesvolle respons met de toegevoegde gebruiker
        return redirect('/users/create')->with('success', 'User added successfully!');
    }
}
