<?php

namespace App\Jobs;

use App\Events\NodeSubmitted;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class ProcessSendUser implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $user;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
        $this->user = User::inRandomOrder()->first();
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        //
        event(new NodeSubmitted($this->user));
    }
}
