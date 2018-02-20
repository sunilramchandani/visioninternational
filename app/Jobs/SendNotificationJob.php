<?php

namespace App\Jobs;

use Mail;
use App\Mail\EmailNotification;
use App\News;
use App\Subscribe;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class SendNotificationJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $title;
    protected $author;
    protected $body;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($title, $author, $body)
    {
        $this->title = $title;
        $this->author = $author;
        $this->body = $body;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $emails = Subscribe::select('email')
        ->pluck('email')->all();

        $dataResult = [
            'title'  => $this->title,
            'author' => $this->author,
            'body' => $this->body,
        ];
        
        foreach ($emails as $email){
        
        Mail::send('admin.news.email_sent', $dataResult, function ($mail) use($dataResult, $email) {
            $mail->from('careers@visioninternational.skyrocketph.technology');
            $mail->to($email)->subject($dataResult['title']);
        });
    }
    }
}
