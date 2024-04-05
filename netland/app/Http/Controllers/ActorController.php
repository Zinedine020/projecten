<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Actor;

class ActorController extends Controller
{
    // Methode om alle acteurs op te halen en weer te geven
    public function index()
    {
        $acteurs = Actor::all();
        return view('acteurs', compact('acteurs'));
    }

    // Methode om films of series van een specifieke acteur op te halen en weer te geven
    public function media($id)
    {
        $acteur = Actor::findOrFail($id);
        $media = $acteur->media;
        return view('acteur_media', compact('acteur', 'media'));
    }
}
