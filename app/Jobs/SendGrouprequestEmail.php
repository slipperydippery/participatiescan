<?php

namespace App\Jobs;

use Mail;
use Illuminate\Bus\Queueable;
use App\Mail\EmailGrouprequest;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class SendGrouprequestEmail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $user;
    protected $group;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($user, $group)
    {
        $this->user = $user;
        $this->group = $group;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $email = new EmailGrouprequest($this->user, $this->group);
        Mail::to($this->user->email)->send($email);
    }
}
