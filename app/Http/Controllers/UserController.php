<?php

namespace App\Http\Controllers;

use App\Models\User;
use Exception;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        try {
            $user = User::get();
            $count = User::count();
            return response()->json([
                'message' => 'User found successfully',
                'total' => $count,
                'data' => $user
            ], 200);
        } catch (Exception $e) {
            return response()->json([
                'message' => 'Internal Server Error',
                'error' => $e
            ], 500);
        }
    }

    public function store(Request $request)
    {
        $user = $request->validate([
            'Username' => 'string|required',
            'Password' => 'string|required',
            'Email' => 'string|required',
            'NamaLengkap' => 'string|required',
            'Alamat' => 'string|required'
        ]);

        try {
            $result = User::create($user);
            return response()->json([
                'message' => 'User created successfully',
                'data' => $result
            ], 200);
        } catch (Exception $e) {
            return response()->json([
                'message' => 'Internal Server Error',
                'error' => $e
            ], 500);
        }
    }

    public function update(Request $request, $id)
    {

        $user = $request->validate([
            'Username' => 'string',
            'Password' => 'string',
            'Email' => 'string',
            'NamaLengkap' => 'string',
            'Alamat' => 'string'
        ]);

        try {
            User::where('UserID', $id)->update($user);
            $result = User::where('UserID', $id)->first();
            return response()->json([
                'message' => 'User update successfully',
                'data' => $result
            ], 200);
        } catch (Exception $e) {
            return response()->json([
                'message' => 'Internal Server Error',
                'error' => $e
            ], 500);
        }
    }

    public function destroy(Request $request, $id)
    {
        try {
            User::where('UserID', $id)->delete();
            return response()->json([
                'message' => 'User delete successfully',
            ], 200);
        } catch (Exception $e) {
            return response()->json([
                'message' => 'Internal Server Error',
                'error' => $e
            ], 500);
        }
    }
}
