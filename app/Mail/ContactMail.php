<?php

namespace App\Mail;

use App\Models\Project;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\View\View;

class ContactMail extends Mailable
{
    use SerializesModels;

    /**
     * @var string
     */
    private string $name;

    /**
     * @var string
     */
    private string $email;

    /**
     * @var string
     */
    private string $message;

    /**
     * @param string $name
     * @param string $email
     * @param string $message
     */
    public function __construct(string $name, string $email, string $message)
    {

        $this->name = $name;
        $this->email = $email;
        $this->message = $message;
    }

    /**
     * @return ContactMail
     */
    public function build()
    {
        return $this->view('emails.contact_email')
            ->with(
                [
                    'name' => $this->name,
                    'email' => $this->email,
                    'text' => $this->message
                ]
            );
    }
}
