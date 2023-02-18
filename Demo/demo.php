<?php
require __DIR__ . "/../vendor/autoload.php";

// Your api key needs to be initialised here.
use javadi\DaartAgency\DaartAds;
$DaartADS = new DaartAds(YOUR_API_KEY);

// For Get ADS:
$ads = $DaartADS->GetADS();

// You will receive a list with all the information for the show ADS (Include AdDetails & CallBack Link):
/*
    {
        "image_url": "IMAGE_LINK",
        "url": "REDIRECT_LINK"
    }
*/


// An illustration of an image and callback:
echo "<a href='{$ads['url']}' target='_blank'><img src='{$ads['image_url']}' alt='Daart Ads Banner'></a>";

// From versions V1.1 and after, we'll provide the redirect link for you; you don't need to construct it yourself.