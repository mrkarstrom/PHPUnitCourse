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
        $mailer = new Mailer;

        return $mailer->sendMessage($this->email, $message);
    }
}
