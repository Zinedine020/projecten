<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User; // Voeg het User model toe

class PivotController extends Controller
{
    /**
     * Haal de gegevens op uit de pivot tabel.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::find(1); // Vervang 1 door de ID van de gewenste gebruiker
        $roles = $user->roles; // Haal de rollen op van de gebruiker

        return response()->json($roles);
    }
}

foreach ($user->roles as $roles) {
    echo $roles->pivot->status;
    echo $roles->pivot->created_at;
    echo $roles->pivot->updated_at;
    
}