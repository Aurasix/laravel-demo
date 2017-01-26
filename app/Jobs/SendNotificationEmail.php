<?php

namespace App\Jobs;

use Log;
use App\Jobs\Job;
use App\Models\User;
use App\Models\Article;
use Illuminate\Contracts\Mail\Mailer;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendNotificationEmail extends Job implements ShouldQueue
{
    use InteractsWithQueue, SerializesModels;

    protected $article;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(Article $article)
    {
        $this->article = $article;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle(Mailer $mailer)
    {
        $users = User::where('receiveNews', true)
                ->where('id', '!=', $this->article->userId)->get();

        foreach ($users as $user) {
            try {
                $mailer->send('emails.article', ['article' => $this->article, 'user' => $user], function ($m) use ($user) {
                    $m->subject('[Impulse] New Article published')
                        ->to($user->email);
                });

                Log::info('Email queue to user: ' . $user->getFullName());
            } catch(\Exception $e) {
                Log::info('Error when sending email to user: ' . $user->getFullName());
            }
        }
    }
}
