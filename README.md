# DaartAds PHP library
You can use this library to access the DaartAds APIs.

## Requirements
- PHP >= 7.3
- Your server has to have CURL enabled. [(How to enable CURL)](https://www.geeksforgeeks.org/how-to-enable-curl-in-php/)

## Installation
```shell
composer require javadi/daart-ads
```

## Usage
```php
require __DIR__ . "/../vendor/autoload.php";

// Your api key needs to be initialised here.
$DaartADS = new \javadi\DaartAgency\DaartAds(YOUR_API_KEY);

// For Get ADS:
$ads = $DaartADS->GetADS();

```
- You will receive a list with all the information for the show ADS
```json
{
  "image_url": "IMAGE_LINK",
  "url": "REDIRECT_LINK"
}
```

> From versions V1.1 and after, we'll provide the redirect link for you; you don't need to construct it yourself.

### A complete demo is available at [```Demo/demo.php```](./demo/demo.php)
