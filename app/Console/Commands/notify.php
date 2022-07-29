<?php

namespace App\Console\Commands;

use App\Mail\NotfiyEmails;
use App\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class notify extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'notfiy:email';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'send email notfiy all users every days';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        //

        //$user=User::select("email")->get();
        $emails=User::pluck('email')->toArray();
        $data=['title'=>'Programming','Body'=>'PHP'];
        foreach ($emails as $email):
            // How to send emails to Laravel

            Mail::To($email)->send(new NotfiyEmails($data));
            endforeach;
    }
}