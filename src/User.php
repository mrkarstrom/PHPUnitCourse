<?php

class User
{

    public $first_name;

    public $last_name;

    /**
     * Email address
     * @var string
     */
    public $email;

    /**
     * Mailer object
     * @var Mailer
     */
    protected $mailer;

    /**
     * Set the mailer dependency
     * 
     * @param Mailer $mailer The mailer object
     * 
     */
    public function setMailer(Mailer $mailer)
    {
        $this->mailer = $mailer;
    }

    public function getFullName()
    {
        return trim("$this->first_name $this->last_name");
    }

    /**
     * Send the user a message
     * 
     * @param string $message The message
     * 
     * @return boolean True if sent, false otherwise
     * 
     */
    public function notify($message)
    {
        // $mailer = new Mailer;

        // return $mailer->sendMessage($this->email, $message);
        return $this->mailer->sendMessage($this->email, $message);
    }
}
