<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class DataRecivedController extends Controller
{

    public function index()
    {
        // لو شغّال داخل docker لازم تستخدم اسم السيرفس مش localhost
        $response = Http::get('http://project1/api/users');

        if ($response->successful()) {
            $users = $response->json();
            return response()->json([
                'count' => count($users),
                'data' => $users,
            ]);
        }

        return response()->json(['error' => 'Failed to fetch users'], 500);

    }

}
