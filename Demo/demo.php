<?php
require __DIR__ . "/../vendor/autoload.php";

// Your api key needs to be initialised here.
$DaartADS = new \javadi\DaartAgency\DaartAds(YOUR_API_KEY);

// For Get ADS:
$ads = $DaartADS->GetADS(CHOOSING_AD_SIZE);

// You will receive a list with all the information for the show ADS (Include AdDetails & CallBack Link):
/*
    [
      {
        "AdDetails": {
          "Cid": CLICK_ID,
          "Source": YOUR_ID,
          "image": BANNER_OF_ADS,
          "adsize": CHOSEN_AD_SIZE,
          "platform": AUTOMATICALLY_OBTAIN,
          "os": AUTOMATICALLY_OBTAIN
        },
        "CallBack": CALLBACK_YOU_WILL_SEND_YOUR_CLIENT_INTO_IT
      }
    ]
*/


// An illustration of an image and callback:
foreach ($ads as $ad) {
    echo "<a href='{$ad['CallBack']}' target='_blank'><img src='{$ad['AdDetails']['image']}' alt='Daart Ads Banner'></a>";
}

// For whatever purpose, you may utilise the static AdCallBack() function to construct your own callback:
echo $DaartADS::AdCallBack(CLICK_ID,YOUR_ID,CHOSEN_AD_SIZE);