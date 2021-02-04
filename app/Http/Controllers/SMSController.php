<?php

namespace App\Http\Controllers;

use App\MyVoucher;
use Illuminate\Http\Request;
use Carbon\Carbon;

class SMSController extends Controller
{

    public function index()
    {
        $bon = Carbon::now()->addDays(7);

        $bonfmt = $bon->format('d/m/Y');
        $mvs = MyVoucher::whereHas('voucher', function ($q) use ($bon) {
            $q->whereDate('end_date', $bon);
        })->with('user')->get();


        foreach ($mvs as $mv) {
            if ($mv->user->tel) {
                $mv->ss = "วอชเชอร์หมายเลข #{$mv->key} ของคุณกำลังหมดอายุภายในวันที่ {$bonfmt} \n https://tripget.kr1t.com/myvoucher/{$mv->id}";
                $sms = new THSMS();
                $sms->send('NOTICE', $mv->user->tel, "วอชเชอร์หมายเลข #{$mv->key} ของคุณกำลังหมดอายุภายในวันที่ {$bonfmt} \n https://tripget.kr1t.com/myvoucher/{$mv->id}");
            }
        }

        return $mvs;
    }
}

class THSMS
{
    var $api_url   = 'http://www.thsms.com/api/rest';
    var $username  = 'cookieptnw';
    var $password  = 'bef055';

    public function getCredit()
    {
        $params['method']   = 'credit';
        $params['username'] = $this->username;
        $params['password'] = $this->password;

        $result = $this->curl($params);

        $xml = @simplexml_load_string($result);

        if (!is_object($xml)) {
            return array(FALSE, 'Respond error');
        } else {

            if ($xml->credit->status == 'success') {
                return array(TRUE, $xml->credit->status);
            } else {
                return array(FALSE, $xml->credit->message);
            }
        }
    }

    public function send($from = '0000', $to = null, $message = null)
    {
        $params['method']   = 'send';
        $params['username'] = $this->username;
        $params['password'] = $this->password;

        $params['from']     = $from;
        $params['to']       = $to;
        $params['message']  = $message;

        if (is_null($params['to']) || is_null($params['message'])) {
            return FALSE;
        }

        $result = $this->curl($params);
        $xml = @simplexml_load_string($result);
        if (!is_object($xml)) {
            return array(FALSE, 'Respond error');
        } else {
            if ($xml->send->status == 'success') {
                return array(TRUE, $xml->send->uuid);
            } else {
                return array(FALSE, $xml->send->message);
            }
        }
    }

    private function curl($params = array())
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $this->api_url);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($params));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

        $response  = curl_exec($ch);
        $lastError = curl_error($ch);
        $lastReq = curl_getinfo($ch);
        curl_close($ch);

        return $response;
    }
}