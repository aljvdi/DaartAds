<?php
/**
 * @package DaartAds
 * @version 1.0
 * @author Alex Javadi
 */


namespace javadi\DaartAgency;

class DaartAds
{
    private string $_token;
    private string $DAART_DEFAULT_API_URL;

    /**
     * @param string $DaartAds_APIKey Daart Ads API KEY
     */
    public function __construct(string $DaartAds_APIKey)
    {
        $this->_token = $DaartAds_APIKey;
        $this->DAART_DEFAULT_API_URL = "https://api.daartads.com/api/v1/GetAds";
    }

    /**
     * @param string $url The API Url
     * @return array
     * @throws \Exception If CURL Request failed
     */
    private function CURL_REQUEST(string $url): array
    {
        $ch = curl_init($url);
        try {
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_HTTPHEADER, ["Authorization: Bearer $this->_token"]);

            $response = curl_exec($ch);
            return json_decode($response,true);
        }
        catch (\Exception $curl_err)
        {
            $error  = curl_error($ch);
            throw new \Exception("Error on CURL Request <br> " . $error);
        } finally {
            curl_close($ch);
        }
    }


    /**
     * @param bool $forMobile Do you want to display advertisements on mobile devices?
     * @throws \Exception if CURL Request failed
     */
    public function GetADS(bool $forMobile = false): array
    {
        return $this->CURL_REQUEST($forMobile ? $this->DAART_DEFAULT_API_URL . "?forMobile" : $this->DAART_DEFAULT_API_URL)['Result'];
    }

}