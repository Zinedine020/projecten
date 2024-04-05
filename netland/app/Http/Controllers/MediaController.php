<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Media;
use Illuminate\Support\Facades\Log;

class MediaController extends Controller
{
    public function films()
    {
        $films = Media::where('is_movie', true)->get();
        return view('films', compact('films'));
    }

    public function series()
    {
        $series = Media::where('is_movie', false)->get();
        return view('series', compact('series'));
    }

    public function show($id)
    {
        $media = Media::find($id);
    
        if ($media) {
            Log::debug('Media object gevonden:', ['media' => $media]);
            return view('media', compact('media'));
        } else {
            Log::debug('Media niet gevonden voor ID: ' . $id);
            return abort(404);
        }
    }

    public function index()
    {
        // Haal alle media op uit de database
        $media = Media::all();
        
        // Geef de opgehaalde media door aan de weergave 'media.blade.php'
        return view('media', compact('media'));
    }
}
