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
$ads = $DaartADS->GetADS(CHOOSING_AD_SIZE);

```
- You will receive a list with all the information for the show ADS (Include _AdDetails_ & _CallBack_ Link)
```json
[
      {
        "AdDetails": {
          "Cid": "CLICK_ID",
          "Source": "YOUR_ID",
          "image": "BANNER_OF_ADS",
          "adsize": "CHOSEN_AD_SIZE",
          "platform": "AUTOMATICALLY_OBTAIN",
          "os": "AUTOMATICALLY_OBTAIN"
        },
        "CallBack": "CALLBACK_YOU_WILL_SEND_YOUR_CLIENT_INTO_IT"
      }
]
```

- For whatever purpose, you may utilise the static AdCallBack() function to construct your own callback:
```php
$DaartADS::AdCallBack(CLICK_ID,YOUR_ID,CHOSEN_AD_SIZE);
```

### A complete demo is available at ```Demo/demo.php```

## AdSize:
| SizeID | Width * Height |
|--------|----------------|
| 1      | 720 * 480      |
| 2      | 728 * 90       |
| 3      | 480 * 320      |
| 4      | 492 * 328      |
| 5      | 468 * 60       |
| 6      | 360 * 240      |
| 7      | 320 * 100      |
| 8      | 320 * 50       |
| 9      | 300 * 250      |
| 10     | 295 * 98       |
| 11     | 160 * 600      |
