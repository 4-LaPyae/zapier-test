<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ZapierController extends Controller
{
    public function me (Request $request){

    $apiKey = $request->header('Authorization');

    if (!$apiKey) {
        return response()->json([
            'message' => 'API key is missing'
        ], 400);
    }
    if($apiKey !== 'test_api_key_12345'){
        return response()->json([
            'message' => 'Invalid API key'
        ], 401);
    }

    $organizer = [
        'id' => 1,
        'name' => 'John Doe',
        'email' => 'john.doe@example.com'
    ];
    if (!$organizer) {
        return response()->json([
            'message' => 'Invalid API key'
        ], 401);
    }

    return response()->json([
        'id' => $organizer['id'],
        'name' => $organizer['name'],
        'email' => $organizer['email'],
        'api_key' => $apiKey
    ]);
    }
    public function getFields (){

        return response()->json([
            'status' => 'success',
            'message' => 'Fields retrieved successfully',
            'fields' => [
                ['key' => 'first_name', "label" => 'First Name', 'type' => 'string'],
                ['key' => 'last_name', "label" => 'Last Name', 'type' => 'string'],
                ['key' => 'email', "label" => 'Email', 'type' => 'email'],
                ['key' => 'country', "label" => 'Country', 'type' => 'string'],
            ]
        ]);
    }

    public function getEntrants (){

        $entrants = [
            ['first_name' => 'John', 'last_name' => 'Doe', 'email' => 'john.doe@example.com', 'country' => 'USA'],
            ['first_name' => 'Jane', 'last_name' => 'Smith', 'email' => 'jane.smith@example.com', 'country' => 'Canada'],
            ['first_name' => 'Alice', 'last_name' => 'Johnson', 'email' => 'alice.johnson@example.com', 'country' => 'UK'],
        ];

        return response()->json([
            'status' => 'success',
            'message' => 'Entrants retrieved successfully',
            'entrants' => $entrants
        ]);
    }
}
