<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class QueuedTestMail extends Mailable
{
    use Queueable;
    use SerializesModels;

    public function build(): self
    {
        return $this->subject('Queued Test Email')
            ->view('emails.queued-test');
    }
}
