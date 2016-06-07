<?php

/**
 * This code was generated by
 * \ / _    _  _|   _  _
 * | (_)\/(_)(_|\/| |(/_  v1.0.0
 * /       /
 */

namespace Twilio\Rest;

use Twilio\Domain;
use Twilio\Exceptions\TwilioException;
use Twilio\Rest\IpMessaging\V1;

/**
 * @property \Twilio\Rest\IpMessaging\V1 v1
 */
class IpMessaging extends Domain {
    protected $_v1 = null;

    /**
     * Construct the IpMessaging Domain
     * 
     * @param \Twilio\Rest\Client $client Twilio\Rest\Client to communicate with
     *                                    Twilio
     * @return \Twilio\Rest\IpMessaging Domain for IpMessaging
     */
    public function __construct(Client $client) {
        parent::__construct($client);
        
        $this->baseUrl = 'https://ip-messaging.twilio.com';
    }

    /**
     * @return \Twilio\Rest\IpMessaging\V1 Version v1 of ip_messaging
     */
    protected function getV1() {
        if (!$this->_v1) {
            $this->_v1 = new V1($this);
        }
        return $this->_v1;
    }

    /**
     * Magic getter to lazy load version
     * 
     * @param string $name Version to return
     * @return \Twilio\Version The requested version
     * @throws \Twilio\Exceptions\TwilioException For unknown versions
     */
    public function __get($name) {
        if (property_exists($this, '_' . $name)) {
            $method = 'get' . ucfirst($name);
            return $this->$method();
        }
        
        throw new TwilioException('Unknown version ' . $name);
    }

    /**
     * Magic caller to get resource contexts
     * 
     * @param string $name Resource to return
     * @param array $arguments Context parameters
     * @return \Twilio\InstanceContext The requested resource context
     * @throws \Twilio\Exceptions\TwilioException For unknown resource
     */
    public function __call($name, $arguments) {
        $property = $this->$name;
        if (method_exists($property, 'getContext')) {
            return call_user_func_array(array($property, 'getContext'), $arguments);
        }
        
        throw new TwilioException('Resource does not have a context');
    }

    /**
     * @return \Twilio\Rest\IpMessaging\V1\CredentialList 
     */
    public function credentials() {
        return $this->v1->credentials;
    }

    /**
     * @return \Twilio\Rest\IpMessaging\V1\ServiceList 
     */
    public function services() {
        return $this->v1->services;
    }

    /**
     * Provide a friendly representation
     * 
     * @return string Machine friendly representation
     */
    public function __toString() {
        return '[Twilio.IpMessaging]';
    }
}