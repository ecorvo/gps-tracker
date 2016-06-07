<?php

/**
 * This code was generated by
 * \ / _    _  _|   _  _
 * | (_)\/(_)(_|\/| |(/_  v1.0.0
 * /       /
 */

namespace Twilio\Rest\Api\V2010;

use Twilio\Exceptions\TwilioException;
use Twilio\InstanceContext;
use Twilio\Rest\Api\V2010\Account\AddressList;
use Twilio\Rest\Api\V2010\Account\ApplicationList;
use Twilio\Rest\Api\V2010\Account\AuthorizedConnectAppList;
use Twilio\Rest\Api\V2010\Account\AvailablePhoneNumberCountryList;
use Twilio\Rest\Api\V2010\Account\CallList;
use Twilio\Rest\Api\V2010\Account\ConferenceList;
use Twilio\Rest\Api\V2010\Account\ConnectAppList;
use Twilio\Rest\Api\V2010\Account\IncomingPhoneNumberList;
use Twilio\Rest\Api\V2010\Account\MessageList;
use Twilio\Rest\Api\V2010\Account\NotificationList;
use Twilio\Rest\Api\V2010\Account\OutgoingCallerIdList;
use Twilio\Rest\Api\V2010\Account\QueueList;
use Twilio\Rest\Api\V2010\Account\RecordingList;
use Twilio\Rest\Api\V2010\Account\SandboxList;
use Twilio\Rest\Api\V2010\Account\SipList;
use Twilio\Rest\Api\V2010\Account\SmsList;
use Twilio\Rest\Api\V2010\Account\TokenList;
use Twilio\Rest\Api\V2010\Account\TranscriptionList;
use Twilio\Rest\Api\V2010\Account\UsageList;
use Twilio\Rest\Api\V2010\Account\ValidationRequestList;
use Twilio\Values;
use Twilio\Version;

/**
 * @property \Twilio\Rest\Api\V2010\Account\AddressList addresses
 * @property \Twilio\Rest\Api\V2010\Account\ApplicationList applications
 * @property \Twilio\Rest\Api\V2010\Account\AuthorizedConnectAppList authorizedConnectApps
 * @property \Twilio\Rest\Api\V2010\Account\AvailablePhoneNumberCountryList availablePhoneNumbers
 * @property \Twilio\Rest\Api\V2010\Account\CallList calls
 * @property \Twilio\Rest\Api\V2010\Account\ConferenceList conferences
 * @property \Twilio\Rest\Api\V2010\Account\ConnectAppList connectApps
 * @property \Twilio\Rest\Api\V2010\Account\IncomingPhoneNumberList incomingPhoneNumbers
 * @property \Twilio\Rest\Api\V2010\Account\MessageList messages
 * @property \Twilio\Rest\Api\V2010\Account\NotificationList notifications
 * @property \Twilio\Rest\Api\V2010\Account\OutgoingCallerIdList outgoingCallerIds
 * @property \Twilio\Rest\Api\V2010\Account\QueueList queues
 * @property \Twilio\Rest\Api\V2010\Account\RecordingList recordings
 * @property \Twilio\Rest\Api\V2010\Account\SandboxList sandbox
 * @property \Twilio\Rest\Api\V2010\Account\SipList sip
 * @property \Twilio\Rest\Api\V2010\Account\SmsList sms
 * @property \Twilio\Rest\Api\V2010\Account\TokenList tokens
 * @property \Twilio\Rest\Api\V2010\Account\TranscriptionList transcriptions
 * @property \Twilio\Rest\Api\V2010\Account\UsageList usage
 * @property \Twilio\Rest\Api\V2010\Account\ValidationRequestList validationRequests
 * @method \Twilio\Rest\Api\V2010\Account\AddressContext addresses(string $sid)
 * @method \Twilio\Rest\Api\V2010\Account\ApplicationContext applications(string $sid)
 * @method \Twilio\Rest\Api\V2010\Account\AuthorizedConnectAppContext authorizedConnectApps(string $connectAppSid)
 * @method \Twilio\Rest\Api\V2010\Account\AvailablePhoneNumberCountryContext availablePhoneNumbers(string $countryCode)
 * @method \Twilio\Rest\Api\V2010\Account\CallContext calls(string $sid)
 * @method \Twilio\Rest\Api\V2010\Account\ConferenceContext conferences(string $sid)
 * @method \Twilio\Rest\Api\V2010\Account\ConnectAppContext connectApps(string $sid)
 * @method \Twilio\Rest\Api\V2010\Account\IncomingPhoneNumberContext incomingPhoneNumbers(string $sid)
 * @method \Twilio\Rest\Api\V2010\Account\MessageContext messages(string $sid)
 * @method \Twilio\Rest\Api\V2010\Account\NotificationContext notifications(string $sid)
 * @method \Twilio\Rest\Api\V2010\Account\OutgoingCallerIdContext outgoingCallerIds(string $sid)
 * @method \Twilio\Rest\Api\V2010\Account\QueueContext queues(string $sid)
 * @method \Twilio\Rest\Api\V2010\Account\RecordingContext recordings(string $sid)
 * @method \Twilio\Rest\Api\V2010\Account\SandboxContext sandbox()
 * @method \Twilio\Rest\Api\V2010\Account\TranscriptionContext transcriptions(string $sid)
 */
class AccountContext extends InstanceContext {
    protected $_addresses = null;
    protected $_applications = null;
    protected $_authorizedConnectApps = null;
    protected $_availablePhoneNumbers = null;
    protected $_calls = null;
    protected $_conferences = null;
    protected $_connectApps = null;
    protected $_incomingPhoneNumbers = null;
    protected $_messages = null;
    protected $_notifications = null;
    protected $_outgoingCallerIds = null;
    protected $_queues = null;
    protected $_recordings = null;
    protected $_sandbox = null;
    protected $_sip = null;
    protected $_sms = null;
    protected $_tokens = null;
    protected $_transcriptions = null;
    protected $_usage = null;
    protected $_validationRequests = null;

    /**
     * Initialize the AccountContext
     * 
     * @param \Twilio\Version $version Version that contains the resource
     * @param string $sid Fetch by unique Account Sid
     * @return \Twilio\Rest\Api\V2010\AccountContext 
     */
    public function __construct(Version $version, $sid) {
        parent::__construct($version);
        
        // Path Solution
        $this->solution = array(
            'sid' => $sid,
        );
        
        $this->uri = '/Accounts/' . $sid . '.json';
    }

    /**
     * Fetch a AccountInstance
     * 
     * @return AccountInstance Fetched AccountInstance
     */
    public function fetch() {
        $params = Values::of(array());
        
        $payload = $this->version->fetch(
            'GET',
            $this->uri,
            $params
        );
        
        return new AccountInstance(
            $this->version,
            $payload,
            $this->solution['sid']
        );
    }

    /**
     * Update the AccountInstance
     * 
     * @param array $options Optional Arguments
     * @return AccountInstance Updated AccountInstance
     */
    public function update(array $options = array()) {
        $options = new Values($options);
        
        $data = Values::of(array(
            'FriendlyName' => $options['friendlyName'],
            'Status' => $options['status'],
        ));
        
        $payload = $this->version->update(
            'POST',
            $this->uri,
            array(),
            $data
        );
        
        return new AccountInstance(
            $this->version,
            $payload,
            $this->solution['sid']
        );
    }

    /**
     * Access the addresses
     * 
     * @return \Twilio\Rest\Api\V2010\Account\AddressList 
     */
    protected function getAddresses() {
        if (!$this->_addresses) {
            $this->_addresses = new AddressList(
                $this->version,
                $this->solution['sid']
            );
        }
        
        return $this->_addresses;
    }

    /**
     * Access the applications
     * 
     * @return \Twilio\Rest\Api\V2010\Account\ApplicationList 
     */
    protected function getApplications() {
        if (!$this->_applications) {
            $this->_applications = new ApplicationList(
                $this->version,
                $this->solution['sid']
            );
        }
        
        return $this->_applications;
    }

    /**
     * Access the authorizedConnectApps
     * 
     * @return \Twilio\Rest\Api\V2010\Account\AuthorizedConnectAppList 
     */
    protected function getAuthorizedConnectApps() {
        if (!$this->_authorizedConnectApps) {
            $this->_authorizedConnectApps = new AuthorizedConnectAppList(
                $this->version,
                $this->solution['sid']
            );
        }
        
        return $this->_authorizedConnectApps;
    }

    /**
     * Access the availablePhoneNumbers
     * 
     * @return \Twilio\Rest\Api\V2010\Account\AvailablePhoneNumberCountryList 
     */
    protected function getAvailablePhoneNumbers() {
        if (!$this->_availablePhoneNumbers) {
            $this->_availablePhoneNumbers = new AvailablePhoneNumberCountryList(
                $this->version,
                $this->solution['sid']
            );
        }
        
        return $this->_availablePhoneNumbers;
    }

    /**
     * Access the calls
     * 
     * @return \Twilio\Rest\Api\V2010\Account\CallList 
     */
    protected function getCalls() {
        if (!$this->_calls) {
            $this->_calls = new CallList(
                $this->version,
                $this->solution['sid']
            );
        }
        
        return $this->_calls;
    }

    /**
     * Access the conferences
     * 
     * @return \Twilio\Rest\Api\V2010\Account\ConferenceList 
     */
    protected function getConferences() {
        if (!$this->_conferences) {
            $this->_conferences = new ConferenceList(
                $this->version,
                $this->solution['sid']
            );
        }
        
        return $this->_conferences;
    }

    /**
     * Access the connectApps
     * 
     * @return \Twilio\Rest\Api\V2010\Account\ConnectAppList 
     */
    protected function getConnectApps() {
        if (!$this->_connectApps) {
            $this->_connectApps = new ConnectAppList(
                $this->version,
                $this->solution['sid']
            );
        }
        
        return $this->_connectApps;
    }

    /**
     * Access the incomingPhoneNumbers
     * 
     * @return \Twilio\Rest\Api\V2010\Account\IncomingPhoneNumberList 
     */
    protected function getIncomingPhoneNumbers() {
        if (!$this->_incomingPhoneNumbers) {
            $this->_incomingPhoneNumbers = new IncomingPhoneNumberList(
                $this->version,
                $this->solution['sid']
            );
        }
        
        return $this->_incomingPhoneNumbers;
    }

    /**
     * Access the messages
     * 
     * @return \Twilio\Rest\Api\V2010\Account\MessageList 
     */
    protected function getMessages() {
        if (!$this->_messages) {
            $this->_messages = new MessageList(
                $this->version,
                $this->solution['sid']
            );
        }
        
        return $this->_messages;
    }

    /**
     * Access the notifications
     * 
     * @return \Twilio\Rest\Api\V2010\Account\NotificationList 
     */
    protected function getNotifications() {
        if (!$this->_notifications) {
            $this->_notifications = new NotificationList(
                $this->version,
                $this->solution['sid']
            );
        }
        
        return $this->_notifications;
    }

    /**
     * Access the outgoingCallerIds
     * 
     * @return \Twilio\Rest\Api\V2010\Account\OutgoingCallerIdList 
     */
    protected function getOutgoingCallerIds() {
        if (!$this->_outgoingCallerIds) {
            $this->_outgoingCallerIds = new OutgoingCallerIdList(
                $this->version,
                $this->solution['sid']
            );
        }
        
        return $this->_outgoingCallerIds;
    }

    /**
     * Access the queues
     * 
     * @return \Twilio\Rest\Api\V2010\Account\QueueList 
     */
    protected function getQueues() {
        if (!$this->_queues) {
            $this->_queues = new QueueList(
                $this->version,
                $this->solution['sid']
            );
        }
        
        return $this->_queues;
    }

    /**
     * Access the recordings
     * 
     * @return \Twilio\Rest\Api\V2010\Account\RecordingList 
     */
    protected function getRecordings() {
        if (!$this->_recordings) {
            $this->_recordings = new RecordingList(
                $this->version,
                $this->solution['sid']
            );
        }
        
        return $this->_recordings;
    }

    /**
     * Access the sandbox
     * 
     * @return \Twilio\Rest\Api\V2010\Account\SandboxList 
     */
    protected function getSandbox() {
        if (!$this->_sandbox) {
            $this->_sandbox = new SandboxList(
                $this->version,
                $this->solution['sid']
            );
        }
        
        return $this->_sandbox;
    }

    /**
     * Access the sip
     * 
     * @return \Twilio\Rest\Api\V2010\Account\SipList 
     */
    protected function getSip() {
        if (!$this->_sip) {
            $this->_sip = new SipList(
                $this->version,
                $this->solution['sid']
            );
        }
        
        return $this->_sip;
    }

    /**
     * Access the sms
     * 
     * @return \Twilio\Rest\Api\V2010\Account\SmsList 
     */
    protected function getSms() {
        if (!$this->_sms) {
            $this->_sms = new SmsList(
                $this->version,
                $this->solution['sid']
            );
        }
        
        return $this->_sms;
    }

    /**
     * Access the tokens
     * 
     * @return \Twilio\Rest\Api\V2010\Account\TokenList 
     */
    protected function getTokens() {
        if (!$this->_tokens) {
            $this->_tokens = new TokenList(
                $this->version,
                $this->solution['sid']
            );
        }
        
        return $this->_tokens;
    }

    /**
     * Access the transcriptions
     * 
     * @return \Twilio\Rest\Api\V2010\Account\TranscriptionList 
     */
    protected function getTranscriptions() {
        if (!$this->_transcriptions) {
            $this->_transcriptions = new TranscriptionList(
                $this->version,
                $this->solution['sid']
            );
        }
        
        return $this->_transcriptions;
    }

    /**
     * Access the usage
     * 
     * @return \Twilio\Rest\Api\V2010\Account\UsageList 
     */
    protected function getUsage() {
        if (!$this->_usage) {
            $this->_usage = new UsageList(
                $this->version,
                $this->solution['sid']
            );
        }
        
        return $this->_usage;
    }

    /**
     * Access the validationRequests
     * 
     * @return \Twilio\Rest\Api\V2010\Account\ValidationRequestList 
     */
    protected function getValidationRequests() {
        if (!$this->_validationRequests) {
            $this->_validationRequests = new ValidationRequestList(
                $this->version,
                $this->solution['sid']
            );
        }
        
        return $this->_validationRequests;
    }

    /**
     * Magic getter to lazy load subresources
     * 
     * @param string $name Subresource to return
     * @return \Twilio\ListResource The requested subresource
     * @throws \Twilio\Exceptions\TwilioException For unknown subresources
     */
    public function __get($name) {
        if (property_exists($this, '_' . $name)) {
            $method = 'get' . ucfirst($name);
            return $this->$method();
        }
        
        throw new TwilioException('Unknown subresource ' . $name);
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
     * Provide a friendly representation
     * 
     * @return string Machine friendly representation
     */
    public function __toString() {
        $context = array();
        foreach ($this->solution as $key => $value) {
            $context[] = "$key=$value";
        }
        return '[Twilio.Api.V2010.AccountContext ' . implode(' ', $context) . ']';
    }
}