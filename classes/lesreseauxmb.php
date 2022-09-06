<?php
// classe pour pouvoir appeler l'API
class lesreseauxmb {
    public static function requestAPI($POST){
        $API_URL = "https://www.lesreseauxmb.ca/api/accounting/index.php";
        $UA = "Mozilla/5.0";
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL,$API_URL);
        curl_setopt($ch, CURLOPT_FRESH_CONNECT, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Expect:'));
        curl_setopt($ch, CURLOPT_USERAGENT, $UA);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $POST);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
        $result = curl_exec($ch);
    
        if(preg_match('#SbdCloud_ERROR#i', $result)){
            echo $result;
            exit();
        } else{
            $RESPONSE = str_replace('<div class="SbdCloud_RESPONSE">', '', str_replace('</div>', '', $result));
            return $RESPONSE;
        }
    
        if(curl_errno($ch))
        {
            echo 'Erreur Curl : ' . curl_error($ch);
        }
        curl_close($ch);
    }
}

// appel de la classe pour l'API
$sbdcloud_id = sbdcloud::requestAPI([
    'APIKEY' => API_KEY_SBDCLOUD,
    'OBJECT' => 'CreateClient',
    'CLIENTSGROUP' => '1398',
    'DISPLAYNAME' => $customer->firstname.' '.$customer->lastname,
    'EMAIL' => $customer->email,
    'ADDRESS' => $customer->address,
    'CITY' => $customer->city,
    'ZIPCODE' => $customer->postalcode,
    'TERRITORY' => "1946",
    'PHONE1' => $customer->mobilephone,
    'PHONE2' => '',
    'OTHER' => '',
    'NOTES' => '',
]);
