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
        $this->DAART_DEFAULT_API_URL = "https://daartads.com/advertising/apiAdv4.php";
    }

    /**
     * @param string $url The API Url
     * @param array $data Data that should send with request
     * @return array
     * @throws \Exception If CURL Request failed
     */
    private function CURL_REQUEST(string $url, array $data): array
    {
        try {
            $ch = curl_init($url);

            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $data);

            $response = curl_exec($ch);
            $error    = curl_error($ch);
            $errno    = curl_errno($ch);

            return json_decode(preg_replace('/[[:^print:]]/', '', $response),true)['data'];
        }
        catch (\Exception $curl_err)
        {
            throw new \Exception("Error on CURL Request <br> " . $curl_err->getMessage());
        }
    }


    /**
     * @param string $AdSize standard ad size as it appears in README files or API docs
     * @throws \Exception if CURL Request failed
     */
    public function GetADS(string $AdSize): array
    {
        $res = [];
        foreach ($this->CURL_REQUEST($this->DAART_DEFAULT_API_URL, ["token" => $this->_token, "adsize" => $AdSize]) as $ad) {
            $res[] = [
                "AdDetails" => $ad,
                "CallBack" => self::AdCallBack($ad['Cid'],$ad['Source'],$ad['adsize'])
            ];
        }
        return $res;
    }

    /**
     * @param int $CID Response of GetADS() Method
     * @param string $Source Response of GetADS() Method
     * @param int $AdSize Ad Size you've selected for the GetADS() Method
     * @return string Daart Callback URL
     */
    public static function AdCallBack(int $CID, string $Source, int $AdSize): string
    {
        return "https://daartads.com/CP.php?Cid=$CID&Source=$Source&adsize=$AdSize";
    }

}