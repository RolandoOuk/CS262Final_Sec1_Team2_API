<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Hash;

class AdminAPI extends Controller
{
    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id); // Find the user by ID

        $validatedData = $request->validate([
            'first_name' => 'sometimes|required|string|max:255',
            'last_name' => 'sometimes|required|string|max:255',
            'email' => 'sometimes|required|string|email|max:255|unique:users,email,' . $user->id,
            'password' => 'sometimes|required|string|min:8|confirmed', // Validation rule for role
            'gender' => 'sometimes|required|string', // Validation rule for gender // Validation rule for telephone
        ]);

        if (isset($validatedData['password'])) {
            $validatedData['password'] = Hash::make($validatedData['password']);
        }

        $user->update($validatedData);
        return response()->json([
            'status' => 'success',
            'user' => $user,
        ]);
    }
    public function destroy($id)
    {
        // Find the user
        $user = User::findOrFail($id);

        // Delete the user
        $user->delete();

        return response()->json(['message' => 'User deleted successfully']);
    }

    //log out
    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();
        return response()->json(['message' => 'Logged out']);
    }
}
