<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Http;

class SendZapierWebhook implements ShouldQueue
{
    use Dispatchable;
    use InteractsWithQueue;
    use Queueable;
    use SerializesModels;

    public function __construct(private string $webhookUrl, private array $payload)
    {
    }

    public function handle(): void
    {
        $response = Http::timeout(10)->post($this->webhookUrl, $this->payload);

        if ($response->failed()) {
            throw new \RuntimeException('Zapier webhook request failed.');
        }
    }
}
