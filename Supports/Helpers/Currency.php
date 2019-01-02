<?php

namespace App\Supports\Helpers;
class Currency {

    public static function currencySymbol($cc = 'USD') {

        $cc = strtoupper($cc);
        $currency = [
            "USD" => "&#36;", "AUD" => "&#36;", "BRL" => "R&#36;", "CAD" => "C&#36;", "CZK" => "K&#269;", "DKK" => "kr", "EUR" => "&euro;", "HKD" => "&#36", "HUF" => "Ft", "ILS" => "&#x20aa;", "PKR" => "&#8360;", "JPY" => "&yen;", "MYR" => "RM", "MXN" => "&#36", "NOK" => "kr", "NZD" => "&#36", "PHP" => "&#x20b1;", "PLN" => "&#122;&#322;", "GBP" => "&pound;", "SEK" => "kr", "CHF" => "Fr", "TWD" => "&#36;", "THB" => "&#3647;", "TRY" => "&#8378;",
        ];
        if (array_key_exists($cc, $currency)) {
            return $currency[$cc];
        }
        return true;
    }

    public static function CurrencyRate($from_Currency, $to_Currency, $amount) {

        $amount = urlencode($amount);
        $from_Currency = urlencode($from_Currency);
        $to_Currency = urlencode($to_Currency);
        $url = "http://www.google.com/finance/converter?a=$amount&from=$from_Currency&to=$to_Currency";
        $ch = curl_init();
        $timeout = 0;
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/4.0 (compatible; MSIE 8.0; Windows NT 6.1)");
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
        $rawdata = curl_exec($ch);
        curl_close($ch);
        $data = explode('bld>', $rawdata);
        $data = explode($to_Currency, $data[1]);
        return round($data[0], 2);
    }

    /**
     * currencyFormat
     * @param        $num , $sym
     * @param string $sym
     * @return string
     */
    public static function currencyFormat($num, $sym = 'Rs') {

        $params = '';
        if ($sym == null or $sym == '$') {
            if (isset($params['currency'])) {
                $sym = $params['currency'];
            } else {
                $sym = '$';
            }
        }
        if ($num == 0) {
            return $sym . ' 0.0';
        } else {
            $amnt = Number::numberFormat($num, 5, ' ', 0);
            if ($amnt != null) {
                return $sym . ' ' . $amnt;
            } else {
                return null;
            }
        }
    }

    /**
     * Format amount of money based on locale
     * @param  float $amount
     * @param  string $currency
     * @return string
     */
    public static function formatMoney($amount, $currency = 'Ã¢â€šÂ¬') {

        $symbols = [
            'Ã¢â€šÂ¬', '$', 'Ã‚Â£', 'Ã‚Â¥', 'Ã¢â€šÂ¤', 'kr', 'Ã¢â€šÂº',
        ];
        switch ($currency) {
            case 'de':
            case 'tr':
            case 'pt':
                $amount = number_format($amount, 2, ',', '.');
                $space = ' ';
                $format = is_string($currency) ? $amount . $space . $currency : $amount;
                break;
            case 'it':
            case 'nl':
                $amount = number_format($amount, 2, ',', '.');
                $space = ' ';
                $format = is_string($currency) ? $currency . $space . $amount : $amount;
                break;
            case 'fr':
                $amount = number_format($amount, 2, ',', ' ');
                $space = ' ';
                $format = is_string($currency) ? $amount . $space . $currency : $amount;
                break;
            case 'ru':
                $amount = number_format($amount, 2, ',', ' ');
                $space = in_array($currency, $symbols) ? '' : ' ';
                $format = is_string($currency) ? $amount . $space . $currency : $amount;
                break;
            default:
            case 'en':
                $amount = number_format($amount, 2, '.', ',');
                $space = in_array($currency, $symbols) ? '' : ' ';
                $format = is_string($currency) ? $currency . $space . $amount : $amount;
                break;
        }
        return $format;
    }

}