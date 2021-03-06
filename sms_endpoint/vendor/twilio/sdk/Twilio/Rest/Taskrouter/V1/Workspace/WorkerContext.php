<?php

/**
 * This code was generated by
 * \ / _    _  _|   _  _
 * | (_)\/(_)(_|\/| |(/_  v1.0.0
 * /       /
 */

namespace Twilio\Rest\Taskrouter\V1\Workspace;

use Twilio\Exceptions\TwilioException;
use Twilio\InstanceContext;
use Twilio\Rest\Taskrouter\V1\Workspace\Worker\WorkerStatisticsList;
use Twilio\Values;
use Twilio\Version;

/**
 * @property \Twilio\Rest\Taskrouter\V1\Workspace\Worker\WorkerStatisticsList statistics
 * @method \Twilio\Rest\Taskrouter\V1\Workspace\Worker\WorkerStatisticsContext statistics()
 */
class WorkerContext extends InstanceContext {
    protected $_statistics = null;

    /**
     * Initialize the WorkerContext
     * 
     * @param \Twilio\Version $version Version that contains the resource
     * @param string $workspaceSid The workspace_sid
     * @param string $sid The sid
     * @return \Twilio\Rest\Taskrouter\V1\Workspace\WorkerContext 
     */
    public function __construct(Version $version, $workspaceSid, $sid) {
        parent::__construct($version);
        
        // Path Solution
        $this->solution = array(
            'workspaceSid' => $workspaceSid,
            'sid' => $sid,
        );
        
        $this->uri = '/Workspaces/' . $workspaceSid . '/Workers/' . $sid . '';
    }

    /**
     * Fetch a WorkerInstance
     * 
     * @return WorkerInstance Fetched WorkerInstance
     */
    public function fetch() {
        $params = Values::of(array());
        
        $payload = $this->version->fetch(
            'GET',
            $this->uri,
            $params
        );
        
        return new WorkerInstance(
            $this->version,
            $payload,
            $this->solution['workspaceSid'],
            $this->solution['sid']
        );
    }

    /**
     * Update the WorkerInstance
     * 
     * @param array $options Optional Arguments
     * @return WorkerInstance Updated WorkerInstance
     */
    public function update(array $options = array()) {
        $options = new Values($options);
        
        $data = Values::of(array(
            'ActivitySid' => $options['activitySid'],
            'Attributes' => $options['attributes'],
            'FriendlyName' => $options['friendlyName'],
        ));
        
        $payload = $this->version->update(
            'POST',
            $this->uri,
            array(),
            $data
        );
        
        return new WorkerInstance(
            $this->version,
            $payload,
            $this->solution['workspaceSid'],
            $this->solution['sid']
        );
    }

    /**
     * Deletes the WorkerInstance
     * 
     * @return boolean True if delete succeeds, false otherwise
     */
    public function delete() {
        return $this->version->delete('delete', $this->uri);
    }

    /**
     * Access the statistics
     * 
     * @return \Twilio\Rest\Taskrouter\V1\Workspace\Worker\WorkerStatisticsList 
     */
    protected function getStatistics() {
        if (!$this->_statistics) {
            $this->_statistics = new WorkerStatisticsList(
                $this->version,
                $this->solution['workspaceSid'],
                $this->solution['sid']
            );
        }
        
        return $this->_statistics;
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
        return '[Twilio.Taskrouter.V1.WorkerContext ' . implode(' ', $context) . ']';
    }
}