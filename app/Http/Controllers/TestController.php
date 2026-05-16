<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class TestController extends Controller
{
   public function index(){
    $simpleData = [
        ['name' => 'John Doe', 'email' => 'john.doe@example.com'],
        ['name' => 'Jane Smith', 'email' => 'jane.smith@example.com'],
        ['name' => 'Mike Johnson', 'email' => 'mike.johnson@example.com'],
        ['name' => 'Emily Davis', 'email' => 'emily.davis@example.com'],
        ['name' => 'Chris Brown', 'email' => 'chris.brown@example.com'],
        ['name' => 'Sarah Wilson', 'email' => 'sarah.wilson@example.com'],
        ['name' => 'David Miller', 'email' => 'david.miller@example.com'],
        ['name' => 'Laura Taylor', 'email' => 'laura.taylor@example.com'],
        ['name' => 'Daniel Anderson', 'email' => 'daniel.anderson@example.com'],
        ['name' => 'Olivia Thomas', 'email' => 'olivia.thomas@example.com'],
    ];
    return response()->json([
        'status' => 'success',
        'message' => 'Data retrieved successfully',
        'data' => $simpleData
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
