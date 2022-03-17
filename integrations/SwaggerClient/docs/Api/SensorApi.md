# Swagger\Client\SensorApi

All URIs are relative to *https://localhost:43443/v3*

Method | HTTP request | Description
------------- | ------------- | -------------
[**sensorTypeDeviceTopicSensorTypeGet**](SensorApi.md#sensortypedevicetopicsensortypeget) | **GET** /sensorType/{deviceTopic}/{sensorType} | Returns all data for specific sensor type.
[**sensorTypesDeviceTopicGet**](SensorApi.md#sensortypesdevicetopicget) | **GET** /sensorTypes/{deviceTopic} | Returns an array of sensor types.
[**sensorsDeviceTopicGet**](SensorApi.md#sensorsdevicetopicget) | **GET** /sensors/{deviceTopic} | Returns all sensor data from device.

# **sensorTypeDeviceTopicSensorTypeGet**
> map[string,object] sensorTypeDeviceTopicSensorTypeGet($device_topic, $sensor_type)

Returns all data for specific sensor type.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');
// Configure API key authorization: ApiKeyAuth
$config = Swagger\Client\Configuration::getDefaultConfiguration()->setApiKey('X-API-KEY', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = Swagger\Client\Configuration::getDefaultConfiguration()->setApiKeyPrefix('X-API-KEY', 'Bearer');

$apiInstance = new Swagger\Client\Api\SensorApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$device_topic = "device_topic_example"; // string | 
$sensor_type = "sensor_type_example"; // string | 

try {
    $result = $apiInstance->sensorTypeDeviceTopicSensorTypeGet($device_topic, $sensor_type);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling SensorApi->sensorTypeDeviceTopicSensorTypeGet: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **device_topic** | **string**|  |
 **sensor_type** | **string**|  |

### Return type

**map[string,object]**

### Authorization

[ApiKeyAuth](../../README.md#ApiKeyAuth)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **sensorTypesDeviceTopicGet**
> string[] sensorTypesDeviceTopicGet($device_topic)

Returns an array of sensor types.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');
// Configure API key authorization: ApiKeyAuth
$config = Swagger\Client\Configuration::getDefaultConfiguration()->setApiKey('X-API-KEY', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = Swagger\Client\Configuration::getDefaultConfiguration()->setApiKeyPrefix('X-API-KEY', 'Bearer');

$apiInstance = new Swagger\Client\Api\SensorApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$device_topic = "device_topic_example"; // string | 

try {
    $result = $apiInstance->sensorTypesDeviceTopicGet($device_topic);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling SensorApi->sensorTypesDeviceTopicGet: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **device_topic** | **string**|  |

### Return type

**string[]**

### Authorization

[ApiKeyAuth](../../README.md#ApiKeyAuth)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **sensorsDeviceTopicGet**
> map[string,map[string,null]] sensorsDeviceTopicGet($device_topic)

Returns all sensor data from device.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');
// Configure API key authorization: ApiKeyAuth
$config = Swagger\Client\Configuration::getDefaultConfiguration()->setApiKey('X-API-KEY', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = Swagger\Client\Configuration::getDefaultConfiguration()->setApiKeyPrefix('X-API-KEY', 'Bearer');

$apiInstance = new Swagger\Client\Api\SensorApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$device_topic = "device_topic_example"; // string | 

try {
    $result = $apiInstance->sensorsDeviceTopicGet($device_topic);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling SensorApi->sensorsDeviceTopicGet: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **device_topic** | **string**|  |

### Return type

[**map[string,map[string,null]]**](../Model/map.md)

### Authorization

[ApiKeyAuth](../../README.md#ApiKeyAuth)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

