<?php

namespace App\Mail;

use App\Models\Project;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\View\View;

class RequestMail extends Mailable
{
    use SerializesModels;

    /**
     * @var Project
     */
    private Project $project;

    /**
     * @param Project $project
     */
    public function __construct(Project $project)
    {
        $this->project = $project;
    }



    public function build()
    {
        return $this->view('emails.request_email')
            ->with(
                ['project' => $this->project]
            );
    }
}
