<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User; // Include the User model

class PivotController extends Controller
{
    /**
     * Retrieve data from the pivot table.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Find the user by ID
        $user = User::find(1); // Replace 1 with the ID of the desired user

        // Check if user exists
        if ($user) {
            // User found, proceed with retrieving roles
            $roles = $user->roles; // Get the roles of the user

            $roleData = [];

            foreach ($roles as $role) {
                $roleData[] = [
                    'name' => $role->name,
                    'status' => $role->pivot->status,
                    'created_at' => $role->pivot->created_at,
                    'updated_at' => $role->pivot->updated_at
                ];
            }

            return response()->json($roleData);
        } else {
            // User not found, return an appropriate response
            return response()->json(['error' => 'User not found'], 404);
        }
    }
}
