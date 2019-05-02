<?php

namespace App\Classes;

use App\Singleton;
use Swift_Mailer;
use Swift_Message;
use Swift_SmtpTransport;

class Logger
{
    use Singleton;
    public $date;
    public $error;
    public $file;
    public $logFile;
    public $line;

    public function __construct()
    {
        $this->logFile = 'Log.txt';
    }

    public function log($ex)
    {
        $res = fopen($this->logFile, 'a');
        $this->date = date('l jS \of F h:i:s A');
        $this->error = $ex->getMessage();
        $this->file = $ex->getFile();
        $this->line = $ex->getLine();
        foreach ($this as $value) {
            if ($value != 'Log.txt') {
                fwrite($res, $value . "\n");
            }
        }
        fclose($res);
    }

    public function sendMailToAdmin($ex)
    {
        $transport = (new Swift_SmTpTransport('smtp.gmail.com', 465, 'SSL'))
            ->setUsername('lesha.dvornikov1@gmail.com')
            ->setPassword('LehaLeha0138');
        $mailer = new Swift_Mailer($transport);
        $message = new Swift_Message();
        $message->setSubject('DB Error');
        $message->setFrom(['lesha.dvornikov1@gmail.com' => 'Aleksey']);
        $message->setTo('lesha.dvornikov1@gmail.com', 'Aleksey');
        $message->addPart('<b>Time:</b>' . date('l jS \of F h:i:s A').
            '<br>'.$ex->getMessage().
            '<br>'.$ex->getFile().
            '<br>'.$ex->getLine()
            , 'text/html');
        $mailer->send($message);
    }

}
