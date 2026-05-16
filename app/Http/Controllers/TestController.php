<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class TestController extends Controller
{
   public function index(){

    $dta = DB::table('olympic_winners')->limit(10)->get();

    return response()->json([
        'status' => 'success',
        'message' => 'Data retrieved successfully',
        'data' => $dta
    ]);
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

        $data = $request->all();
        $json = file_get_contents('php://input');

	        $data_3 = json_decode($json, true);

        Log::info('Webhook callback received', [
            'type' => var_dump($request->all()),
            'event_id' => $event_id,
            'api_collection_name' => $api_collection_name,
            'api_job_uuid' => $request->input('api_job_uuid'),
            'data' => $data,
            'php data' => json_decode(file_get_contents('php://input')),
		'php data 2' => file_get_contents('php://input'),
		'php data 3' => $data_3,
	'php data 4' => $data_3[0]['api_job_uuid']

        ]);

     return response()->json([
          'status' => 'success',
          'message' => 'Webhook callback received successfully.',
          'event_id' => $event_id,
          'api_collection_name' => $api_collection_name,
          'api_job_uuid' => $request->input('api_job_uuid'),
          'data' => $data,
        'php data' => json_decode(file_get_contents('php://input')),
	'php data 2' => file_get_contents('php://input'),
	'php data 3' => $data_3
     ]);
    }
}
