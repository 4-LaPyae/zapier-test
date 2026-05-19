<?php

namespace App\Http\Controllers;

use App\Jobs\SendQueuedEmail;
use App\Jobs\SendZapierWebhook;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;

class QueueTestController extends Controller
{
    public function sendQueuedEmail(Request $request)
    {
        $validated = $request->validate([
            'email' => ['required', 'email'],
        ]);

        SendQueuedEmail::dispatch($validated['email']);

        return response()->json([
            'status' => 'queued',
            'email' => $validated['email'],
        ]);
    }

    public function sendZapierWebhook(Request $request)
    {
        $validated = $request->validate([
            'payload' => ['required', 'array'],
        ]);
        // dd($validated['payload']);

        $webhookUrl = 'https://hooks.zapier.com/hooks/catch/27638527/4o2r5u1/';

        if ($webhookUrl === '') {
            return response()->json([
                'status' => 'error',
                'message' => 'ZAPIER_WEBHOOK_URL is not configured.',
            ], 500);
        }

        SendZapierWebhook::dispatch($webhookUrl, $validated['payload']);

        return response()->json([
            'status' => 'queued',
        ]);
    }
}
