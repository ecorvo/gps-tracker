<?php

/**
 * This code was generated by
 * \ / _    _  _|   _  _
 * | (_)\/(_)(_|\/| |(/_  v1.0.0
 * /       /
 */

namespace Twilio\Tests\Integration\IpMessaging\V1\Service\Channel;

use Twilio\Exceptions\DeserializeException;
use Twilio\Exceptions\TwilioException;
use Twilio\Http\Response;
use Twilio\Tests\HolodeckTestCase;
use Twilio\Tests\Request;

class MessageTest extends HolodeckTestCase {
    public function testFetchRequest() {
        $this->holodeck->mock(new Response(500, ''));
        
        try {
            $this->twilio->ipMessaging->v1->services("ISaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa")
                                          ->channels("CHaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa")
                                          ->messages("IMaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa")->fetch();
        } catch (DeserializeException $e) {}
          catch (TwilioException $e) {}
        
        $this->assertTrue($this->holodeck->hasRequest(new Request(
            'get',
            'https://ip-messaging.twilio.com/v1/Services/ISaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa/Channels/CHaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa/Messages/IMaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa'
        )));
    }

    public function testCreateRequest() {
        $this->holodeck->mock(new Response(500, ''));
        
        try {
            $this->twilio->ipMessaging->v1->services("ISaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa")
                                          ->channels("CHaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa")
                                          ->messages->create("body");
        } catch (DeserializeException $e) {}
          catch (TwilioException $e) {}
        
        $values = array(
            'Body' => "body",
        );
        
        $this->assertTrue($this->holodeck->hasRequest(new Request(
            'post',
            'https://ip-messaging.twilio.com/v1/Services/ISaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa/Channels/CHaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa/Messages',
            null,
            $values
        )));
    }

    public function testReadRequest() {
        $this->holodeck->mock(new Response(500, ''));
        
        try {
            $this->twilio->ipMessaging->v1->services("ISaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa")
                                          ->channels("CHaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa")
                                          ->messages->read();
        } catch (DeserializeException $e) {}
          catch (TwilioException $e) {}
        
        $this->assertTrue($this->holodeck->hasRequest(new Request(
            'get',
            'https://ip-messaging.twilio.com/v1/Services/ISaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa/Channels/CHaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa/Messages'
        )));
    }
}