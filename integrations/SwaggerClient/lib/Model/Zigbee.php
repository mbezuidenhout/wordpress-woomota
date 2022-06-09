<?php
/**
 * Zigbee
 *
 * PHP version 5
 *
 * @category Class
 * @package  Swagger\Client
 * @author   Swagger Codegen team
 * @link     https://github.com/swagger-api/swagger-codegen
 */

/**
 * Tasmota Device Manager API
 *
 * Device manager for Tasmota devices via MQTT [Source](https://github.com/mbezuidenhout/tasmota.mqtt.device.manager).
 *
 * OpenAPI spec version: 0.1.0
 * Contact: marius.bezuidenhout@gmail.com
 * Generated by: https://github.com/swagger-api/swagger-codegen.git
 * Swagger Codegen version: 3.0.34
 */
/**
 * NOTE: This class is auto generated by the swagger code generator program.
 * https://github.com/swagger-api/swagger-codegen
 * Do not edit the class manually.
 */

namespace Swagger\Client\Model;

use \ArrayAccess;
use \Swagger\Client\ObjectSerializer;

/**
 * Zigbee Class Doc Comment
 *
 * @category Class
 * @package  Swagger\Client
 * @author   Swagger Codegen team
 * @link     https://github.com/swagger-api/swagger-codegen
 */
class Zigbee implements ModelInterface, ArrayAccess
{
    const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $swaggerModelName = 'Zigbee';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $swaggerTypes = [
        'device' => 'string',
'name' => 'string',
'model_id' => 'string',
'temperature' => 'float',
'humidity' => 'float',
'battery_percentage' => 'int',
'last_seen' => 'int',
'last_seen_epoch' => 'int',
'reachable' => 'bool'    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $swaggerFormats = [
        'device' => null,
'name' => null,
'model_id' => null,
'temperature' => null,
'humidity' => null,
'battery_percentage' => null,
'last_seen' => null,
'last_seen_epoch' => null,
'reachable' => null    ];

    /**
     * Array of property to type mappings. Used for (de)serialization
     *
     * @return array
     */
    public static function swaggerTypes()
    {
        return self::$swaggerTypes;
    }

    /**
     * Array of property to format mappings. Used for (de)serialization
     *
     * @return array
     */
    public static function swaggerFormats()
    {
        return self::$swaggerFormats;
    }

    /**
     * Array of attributes where the key is the local name,
     * and the value is the original name
     *
     * @var string[]
     */
    protected static $attributeMap = [
        'device' => 'Device',
'name' => 'Name',
'model_id' => 'ModelId',
'temperature' => 'Temperature',
'humidity' => 'Humidity',
'battery_percentage' => 'BatteryPercentage',
'last_seen' => 'LastSeen',
'last_seen_epoch' => 'LastSeenEpoch',
'reachable' => 'Reachable'    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'device' => 'setDevice',
'name' => 'setName',
'model_id' => 'setModelId',
'temperature' => 'setTemperature',
'humidity' => 'setHumidity',
'battery_percentage' => 'setBatteryPercentage',
'last_seen' => 'setLastSeen',
'last_seen_epoch' => 'setLastSeenEpoch',
'reachable' => 'setReachable'    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'device' => 'getDevice',
'name' => 'getName',
'model_id' => 'getModelId',
'temperature' => 'getTemperature',
'humidity' => 'getHumidity',
'battery_percentage' => 'getBatteryPercentage',
'last_seen' => 'getLastSeen',
'last_seen_epoch' => 'getLastSeenEpoch',
'reachable' => 'getReachable'    ];

    /**
     * Array of attributes where the key is the local name,
     * and the value is the original name
     *
     * @return array
     */
    public static function attributeMap()
    {
        return self::$attributeMap;
    }

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @return array
     */
    public static function setters()
    {
        return self::$setters;
    }

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @return array
     */
    public static function getters()
    {
        return self::$getters;
    }

    /**
     * The original name of the model.
     *
     * @return string
     */
    public function getModelName()
    {
        return self::$swaggerModelName;
    }

    

    /**
     * Associative array for storing property values
     *
     * @var mixed[]
     */
    protected $container = [];

    /**
     * Constructor
     *
     * @param mixed[] $data Associated array of property values
     *                      initializing the model
     */
    public function __construct(array $data = null)
    {
        $this->container['device'] = isset($data['device']) ? $data['device'] : null;
        $this->container['name'] = isset($data['name']) ? $data['name'] : null;
        $this->container['model_id'] = isset($data['model_id']) ? $data['model_id'] : null;
        $this->container['temperature'] = isset($data['temperature']) ? $data['temperature'] : null;
        $this->container['humidity'] = isset($data['humidity']) ? $data['humidity'] : null;
        $this->container['battery_percentage'] = isset($data['battery_percentage']) ? $data['battery_percentage'] : null;
        $this->container['last_seen'] = isset($data['last_seen']) ? $data['last_seen'] : null;
        $this->container['last_seen_epoch'] = isset($data['last_seen_epoch']) ? $data['last_seen_epoch'] : null;
        $this->container['reachable'] = isset($data['reachable']) ? $data['reachable'] : null;
    }

    /**
     * Show all the invalid properties with reasons.
     *
     * @return array invalid properties with reasons
     */
    public function listInvalidProperties()
    {
        $invalidProperties = [];

        return $invalidProperties;
    }

    /**
     * Validate all the properties in the model
     * return true if all passed
     *
     * @return bool True if all properties are valid
     */
    public function valid()
    {
        return count($this->listInvalidProperties()) === 0;
    }


    /**
     * Gets device
     *
     * @return string
     */
    public function getDevice()
    {
        return $this->container['device'];
    }

    /**
     * Sets device
     *
     * @param string $device device
     *
     * @return $this
     */
    public function setDevice($device)
    {
        $this->container['device'] = $device;

        return $this;
    }

    /**
     * Gets name
     *
     * @return string
     */
    public function getName()
    {
        return $this->container['name'];
    }

    /**
     * Sets name
     *
     * @param string $name name
     *
     * @return $this
     */
    public function setName($name)
    {
        $this->container['name'] = $name;

        return $this;
    }

    /**
     * Gets model_id
     *
     * @return string
     */
    public function getModelId()
    {
        return $this->container['model_id'];
    }

    /**
     * Sets model_id
     *
     * @param string $model_id model_id
     *
     * @return $this
     */
    public function setModelId($model_id)
    {
        $this->container['model_id'] = $model_id;

        return $this;
    }

    /**
     * Gets temperature
     *
     * @return float
     */
    public function getTemperature()
    {
        return $this->container['temperature'];
    }

    /**
     * Sets temperature
     *
     * @param float $temperature temperature
     *
     * @return $this
     */
    public function setTemperature($temperature)
    {
        $this->container['temperature'] = $temperature;

        return $this;
    }

    /**
     * Gets humidity
     *
     * @return float
     */
    public function getHumidity()
    {
        return $this->container['humidity'];
    }

    /**
     * Sets humidity
     *
     * @param float $humidity humidity
     *
     * @return $this
     */
    public function setHumidity($humidity)
    {
        $this->container['humidity'] = $humidity;

        return $this;
    }

    /**
     * Gets battery_percentage
     *
     * @return int
     */
    public function getBatteryPercentage()
    {
        return $this->container['battery_percentage'];
    }

    /**
     * Sets battery_percentage
     *
     * @param int $battery_percentage battery_percentage
     *
     * @return $this
     */
    public function setBatteryPercentage($battery_percentage)
    {
        $this->container['battery_percentage'] = $battery_percentage;

        return $this;
    }

    /**
     * Gets last_seen
     *
     * @return int
     */
    public function getLastSeen()
    {
        return $this->container['last_seen'];
    }

    /**
     * Sets last_seen
     *
     * @param int $last_seen Last seen in seconds since queried
     *
     * @return $this
     */
    public function setLastSeen($last_seen)
    {
        $this->container['last_seen'] = $last_seen;

        return $this;
    }

    /**
     * Gets last_seen_epoch
     *
     * @return int
     */
    public function getLastSeenEpoch()
    {
        return $this->container['last_seen_epoch'];
    }

    /**
     * Sets last_seen_epoch
     *
     * @param int $last_seen_epoch Last seen at seconds since unix epoch UTC
     *
     * @return $this
     */
    public function setLastSeenEpoch($last_seen_epoch)
    {
        $this->container['last_seen_epoch'] = $last_seen_epoch;

        return $this;
    }

    /**
     * Gets reachable
     *
     * @return bool
     */
    public function getReachable()
    {
        return $this->container['reachable'];
    }

    /**
     * Sets reachable
     *
     * @param bool $reachable reachable
     *
     * @return $this
     */
    public function setReachable($reachable)
    {
        $this->container['reachable'] = $reachable;

        return $this;
    }
    /**
     * Returns true if offset exists. False otherwise.
     *
     * @param integer $offset Offset
     *
     * @return boolean
     */
    public function offsetExists($offset)
    {
        return isset($this->container[$offset]);
    }

    /**
     * Gets offset.
     *
     * @param integer $offset Offset
     *
     * @return mixed
     */
    public function offsetGet($offset)
    {
        return isset($this->container[$offset]) ? $this->container[$offset] : null;
    }

    /**
     * Sets value based on offset.
     *
     * @param integer $offset Offset
     * @param mixed   $value  Value to be set
     *
     * @return void
     */
    public function offsetSet($offset, $value)
    {
        if (is_null($offset)) {
            $this->container[] = $value;
        } else {
            $this->container[$offset] = $value;
        }
    }

    /**
     * Unsets offset.
     *
     * @param integer $offset Offset
     *
     * @return void
     */
    public function offsetUnset($offset)
    {
        unset($this->container[$offset]);
    }

    /**
     * Gets the string presentation of the object
     *
     * @return string
     */
    public function __toString()
    {
        if (defined('JSON_PRETTY_PRINT')) { // use JSON pretty print
            return json_encode(
                ObjectSerializer::sanitizeForSerialization($this),
                JSON_PRETTY_PRINT
            );
        }

        return json_encode(ObjectSerializer::sanitizeForSerialization($this));
    }
}
