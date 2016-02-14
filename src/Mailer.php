<?php namespace browner12\mailer;

use Illuminate\Contracts\Mail\Mailer as MailerContract;

abstract class Mailer
{
    /**
     * @var string
     */
    protected $name;

    /**
     * @var string
     */
    protected $email;

    /**
     * @var string
     */
    protected $subject;

    /**
     * @var string
     */
    protected $view;

    /**
     * @var array
     */
    protected $defaultData = [];

    /**
     * @var array
     */
    protected $data = [];

    /**
     * @var array
     */
    protected $attachments = [];

    /**
     * @var \Illuminate\Contracts\Mail\Mailer
     */
    private $mailer;

    /**
     * constructor
     *
     * @param \Illuminate\Contracts\Mail\Mailer $mailer
     */
    public function __construct(MailerContract $mailer)
    {
        //assign
        $this->mailer = $mailer;

        //global variables for email
        $this->defaultData = [
            '_name'  => config('site.name'),
            '_email' => config('site.email'),
            '_phone' => config('site.phone'),
        ];
    }

    /**
     * send email
     *
     * @param bool $queue
     * @return bool
     */
    final public function send($queue = true)
    {
        //php cannot 'use' this variables yet
        $name = $this->name;
        $email = $this->email;
        $subject = $this->subject;
        $attachments = $this->attachments;

        //data
        $data = array_merge($this->defaultData, $this->data);

        //queue email
        if ($queue) {

            $this->mailer->queueOn('email', $this->view, $data,
                function ($message) use ($name, $email, $subject, $attachments) {

                    //set recipient
                    $message->to($email, $name);

                    //set subject
                    $message->subject($subject);

                    //set attachments
                    foreach ($attachments as $attachment) {
                        $message->attach($attachment);
                    }
                });
        }

        //send email
        else {

            $this->mailer->send($this->view, $data,
                function ($message) use ($name, $email, $subject, $attachments) {

                    //set recipient
                    $message->to($email, $name);

                    //set subject
                    $message->subject($subject);

                    //set attachments
                    foreach ($attachments as $attachment) {
                        $message->attach($attachment);
                    }
                });
        }

        //make sure to clear out recipient info, so we don't accidentally send multiple times to same person
        unset($this->name, $this->email, $this->user);
    }

    /**
     * return the output of the email
     *
     * @return string
     */
    final public function view()
    {
        //merge data
        $data = array_merge($this->defaultData, $this->data);

        //return output
        return view($this->view, $data)->render();
    }
}
