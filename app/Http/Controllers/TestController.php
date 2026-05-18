<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class TestController extends Controller
{
   public function index(){

    $data = DB::table('olympic_winners')->limit(10)->get()->toArray();

    return view('home', ['data' => $data]);
   }

   public function createPost(Request $request){

    $data = $request->all();
    return response()->json([
        'status' => 'success',
        'message' => 'Data received successfully',
        'data' => $data
    ]);
   }

    public function testWebhookCallback(Request $request, string $event_id, string $api_collection_name){

        $json = file_get_contents('php://input');
	    $data = json_decode($json, true);

        $method = $_SERVER['REQUEST_METHOD']; // "GET", "POST", etc.

        $zapier_Key = $_SERVER['HTTP_X_ZAPIER_KEY'] ?? null;

        $api_job_uuid = $data[0]['api_job_uuid'] ?? null;

        $zapier_data = [
            'api_job_uuid' => $api_job_uuid,
            'event_id' => $event_id,
            'response_data' => json_encode($data),
        ];

        DB::table('zapier_test')->insert($zapier_data);

        return response()->json([
            'status' => 'success',
            'message' => 'Webhook received successfully',
            'event_id' => $event_id,
            'api_collection_name' => $api_collection_name,
            'method' => $method,
            'zapier_key' => $zapier_Key,
            'data' => $data,
        ]);
    }
}
