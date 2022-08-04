<?php

use Twilio\Rest\Client;

class textMessage {

    public static function send($sendPhone,$twilioPhone,$message){
        $client = new Client(ACCOUNT_SID, AUTH_TOKEN);
                $client->messages->create(
                  // the number you'd like to send the message to
                $sendPhone,
                array(
                // A Twilio phone number you purchased at twilio.com/console
                'from' => $twilioPhone,
                // the body of the text message you'd like to send
                'body' => $message
              )
        );
    }
}
