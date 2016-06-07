<?php

/**
 * This code was generated by
 * \ / _    _  _|   _  _
 * | (_)\/(_)(_|\/| |(/_  v1.0.0
 * /       /
 */

namespace Twilio\Tests\Integration\Trunking\V1\Trunk;

use Twilio\Exceptions\DeserializeException;
use Twilio\Exceptions\TwilioException;
use Twilio\Http\Response;
use Twilio\Tests\HolodeckTestCase;
use Twilio\Tests\Request;

class IpAccessControlListTest extends HolodeckTestCase {
    public function testFetchRequest() {
        $this->holodeck->mock(new Response(500, ''));
        
        try {
            $this->twilio->trunking->v1->trunks("TRaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa")
                                       ->ipAccessControlLists("ALaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa")->fetch();
        } catch (DeserializeException $e) {}
          catch (TwilioException $e) {}
        
        $this->assertTrue($this->holodeck->hasRequest(new Request(
            'get',
            'https://trunking.twilio.com/v1/Trunks/TRaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa/IpAccessControlLists/ALaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa'
        )));
    }

    public function testFetchResponse() {
        $this->holodeck->mock(new Response(
            200,
            '
            {
                "account_sid": "ACaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa",
                "trunk_sid": "TKaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa",
                "date_created": "Fri, 17 Jul 2015 21:25:15 +0000",
                "date_updated": "Fri, 17 Jul 2015 21:25:15 +0000",
                "friendly_name": "aaaa",
                "sid": "ALaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa",
                "url": "https://trunking.twilio.com/v1/Trunks/TKaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa/IpAccessControlLists/ALaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa"
            }
            '
        ));
        
        $actual = $this->twilio->trunking->v1->trunks("TRaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa")
                                             ->ipAccessControlLists("ALaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa")->fetch();
        
        $this->assertNotNull($actual);
    }

    public function testDeleteRequest() {
        $this->holodeck->mock(new Response(500, ''));
        
        try {
            $this->twilio->trunking->v1->trunks("TRaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa")
                                       ->ipAccessControlLists("ALaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa")->delete();
        } catch (DeserializeException $e) {}
          catch (TwilioException $e) {}
        
        $this->assertTrue($this->holodeck->hasRequest(new Request(
            'delete',
            'https://trunking.twilio.com/v1/Trunks/TRaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa/IpAccessControlLists/ALaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa'
        )));
    }

    public function testDeleteResponse() {
        $this->holodeck->mock(new Response(
            204,
            null
        ));
        
        $actual = $this->twilio->trunking->v1->trunks("TRaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa")
                                             ->ipAccessControlLists("ALaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa")->delete();
        
        $this->assertTrue($actual);
    }

    public function testCreateRequest() {
        $this->holodeck->mock(new Response(500, ''));
        
        try {
            $this->twilio->trunking->v1->trunks("TRaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa")
                                       ->ipAccessControlLists->create("ALaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa");
        } catch (DeserializeException $e) {}
          catch (TwilioException $e) {}
        
        $values = array(
            'IpAccessControlListSid' => "ALaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa",
        );
        
        $this->assertTrue($this->holodeck->hasRequest(new Request(
            'post',
            'https://trunking.twilio.com/v1/Trunks/TRaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa/IpAccessControlLists',
            null,
            $values
        )));
    }

    public function testCreateResponse() {
        $this->holodeck->mock(new Response(
            200,
            '
            {
                "account_sid": "ACaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa",
                "trunk_sid": "TKaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa",
                "date_created": "Fri, 17 Jul 2015 21:25:15 +0000",
                "date_updated": "Fri, 17 Jul 2015 21:25:15 +0000",
                "friendly_name": "aaaa",
                "sid": "ALaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa",
                "url": "https://trunking.twilio.com/v1/Trunks/TKaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa/IpAccessControlLists/ALaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa"
            }
            '
        ));
        
        $actual = $this->twilio->trunking->v1->trunks("TRaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa")
                                             ->ipAccessControlLists->create("ALaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa");
        
        $this->assertNotNull($actual);
    }

    public function testReadRequest() {
        $this->holodeck->mock(new Response(500, ''));
        
        try {
            $this->twilio->trunking->v1->trunks("TRaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa")
                                       ->ipAccessControlLists->read();
        } catch (DeserializeException $e) {}
          catch (TwilioException $e) {}
        
        $this->assertTrue($this->holodeck->hasRequest(new Request(
            'get',
            'https://trunking.twilio.com/v1/Trunks/TRaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa/IpAccessControlLists'
        )));
    }

    public function testReadFullResponse() {
        $this->holodeck->mock(new Response(
            200,
            '
            {
                "end": 0,
                "first_page_uri": "https://trunking.twilio.com/v1/Trunks/TKaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa/IpAccessControlLists?PageSize=50&Page=0",
                "ip_access_control_lists": [
                    {
                        "account_sid": "ACaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa",
                        "trunk_sid": "TKaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa",
                        "date_created": "Fri, 17 Jul 2015 21:25:15 +0000",
                        "date_updated": "Fri, 17 Jul 2015 21:25:15 +0000",
                        "friendly_name": "aaaa",
                        "sid": "ALaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa",
                        "url": "https://trunking.twilio.com/v1/Trunks/TKaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa/IpAccessControlLists/ALaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa"
                    }
                ],
                "last_page_uri": "https://trunking.twilio.com/v1/Trunks/TKaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa/IpAccessControlLists?PageSize=50&Page=0",
                "next_page_uri": null,
                "page": 0,
                "page_size": 50,
                "previous_page_uri": null,
                "start": 0,
                "total": 1,
                "uri": "https://trunking.twilio.com/v1/Trunks/TKaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa/IpAccessControlLists?PageSize=50&Page=0"
            }
            '
        ));
        
        $actual = $this->twilio->trunking->v1->trunks("TRaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa")
                                             ->ipAccessControlLists->read();
        
        $this->assertTrue(count($actual) > 0);
    }

    public function testReadEmptyResponse() {
        $this->holodeck->mock(new Response(
            200,
            '
            {
                "end": 0,
                "first_page_uri": "https://trunking.twilio.com/v1/Trunks/TKaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa/IpAccessControlLists?PageSize=50&Page=0",
                "ip_access_control_lists": [],
                "next_page_uri": null,
                "page": 0,
                "page_size": 50,
                "previous_page_uri": null,
                "start": 0,
                "uri": "https://trunking.twilio.com/v1/Trunks/TKaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa/IpAccessControlLists?PageSize=50&Page=0"
            }
            '
        ));
        
        $actual = $this->twilio->trunking->v1->trunks("TRaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa")
                                             ->ipAccessControlLists->read();
        
        $this->assertNotNull($actual);
    }
}