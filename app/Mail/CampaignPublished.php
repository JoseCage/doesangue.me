<?php

namespace DoeSangue\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use DoeSangue\Models\Campaign;
use DoeSangue\Models\User;

class CampaignPublished extends Mailable
{
    use Queueable, SerializesModels;

    protected $campaign;

    protected $user;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Campaign $campaign, User $user)
    {
        $this->campaign = $campaign;
        $this->user = $user;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('email.campaign-published');
    }
}
