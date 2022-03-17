# Swagger\Client\DeviceApi

All URIs are relative to *https://localhost:43443/v3*

Method | HTTP request | Description
------------- | ------------- | -------------
[**deviceDeviceTopicGet**](DeviceApi.md#devicedevicetopicget) | **GET** /device/{deviceTopic} | Returns details of tasmota device by topic.
[**devicesPost**](DeviceApi.md#devicespost) | **POST** /devices | Returns a list of tasmota devices.

# **deviceDeviceTopicGet**
> \Swagger\Client\Model\Device deviceDeviceTopicGet($device_topic)

Returns details of tasmota device by topic.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');
// Configure API key authorization: ApiKeyAuth
$config = Swagger\Client\Configuration::getDefaultConfiguration()->setApiKey('X-API-KEY', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = Swagger\Client\Configuration::getDefaultConfiguration()->setApiKeyPrefix('X-API-KEY', 'Bearer');

$apiInstance = new Swagger\Client\Api\DeviceApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$device_topic = "device_topic_example"; // string | 

try {
    $result = $apiInstance->deviceDeviceTopicGet($device_topic);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling DeviceApi->deviceDeviceTopicGet: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **device_topic** | **string**|  |

### Return type

[**\Swagger\Client\Model\Device**](../Model/Device.md)

### Authorization

[ApiKeyAuth](../../README.md#ApiKeyAuth)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **devicesPost**
> map[string,\Swagger\Client\Model\Device] devicesPost()

Returns a list of tasmota devices.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');
// Configure API key authorization: ApiKeyAuth
$config = Swagger\Client\Configuration::getDefaultConfiguration()->setApiKey('X-API-KEY', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = Swagger\Client\Configuration::getDefaultConfiguration()->setApiKeyPrefix('X-API-KEY', 'Bearer');

$apiInstance = new Swagger\Client\Api\DeviceApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);

try {
    $result = $apiInstance->devicesPost();
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling DeviceApi->devicesPost: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters
This endpoint does not need any parameter.

### Return type

[**map[string,\Swagger\Client\Model\Device]**](../Model/Device.md)

### Authorization

[ApiKeyAuth](../../README.md#ApiKeyAuth)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

