<?php

namespace App\Supports\Helpers;
class Number {

    /**
     * Return true if the number is within the min and max.
     *
     * @param int|float $number
     * @param int|float $min
     * @param int|float $max
     * @return bool
     */
    public static function isInMinMax($number, $min, $max) {

        return ($number >= $min && $number <= $max);
    }

    /**
     * Is the current value even?
     *
     * @param int $number
     * @return bool
     */
    public static function isEven($number) {

        return ($number % 2 === 0);
    }

    public static function isOdd($number) {

        return !self::isEven($number);
    }

    /**
     * Is the current value negative; less than zero.
     *
     * @param int $number
     * @return bool
     */
    public static function isNegative($number) {

        return ($number < 0);
    }

    /**
     * Is the current value positive; greater than or equal to zero.
     *
     * @param int $number
     * @param bool $zero
     * @return bool
     */
    public static function isPositive($number, $zero = true) {

        return ($zero ? ($number >= 0) : ($number > 0));
    }

    /**
     * Increase the number to the minimum if below threshold.
     *
     * @param int $number
     * @param int $min
     * @return int
     */
    public static function isMinNum($number, $min) {

        if ($number < $min) {
            $number = $min;
        }
        return $number;
    }

    /**
     * Decrease the number to the maximum if above threshold.
     *
     * @param int $number
     * @param int $max
     * @return int
     */
    public static function isMaxNum($number, $max) {

        if ($number > $max) {
            $number = $max;
        }
        return $number;
    }

    /**
     * Return true if the number is outside the min and max.
     *
     * @param int $number
     * @param int $min
     * @param int $max
     * @return bool
     */
    public static function outMinMax($number, $min, $max) {

        return ($number < $min || $number > $max);
    }

    /**
     * Return only digits chars
     *
     * @param $value
     * @return mixed
     */
    public static function onlyDigits($value) {

        // we need to remove - and + because they're allowed in the filter
        $cleaned = str_replace([
            '-',
            '+',
        ], '', $value);
        $cleaned = filter_var($cleaned, FILTER_SANITIZE_NUMBER_INT);
        return $cleaned;
    }

    /**
     * @param string $value
     * @param int $round
     * @return float
     */
    public static function floatInt($value, $round = 10) {

        $cleaned = preg_replace('#[^0-9eE\-\.\,]#ius', '', $value);
        $cleaned = str_replace(',', '.', $cleaned);
        preg_match('#[-+]?[0-9]+(\.[0-9]+)?([eE][-+]?[0-9]+)?#', $cleaned, $matches);
        $result = isset($matches[0]) ? $matches[0] : 0.0;
        $result = round($result, $round);
        return (float)$result;
    }

    /**
     * Increase the number to the minimum if below threshold.
     *
     * @param int $number
     * @param int $min
     * @return int
     */
    public static function minNumberInc($number, $min) {

        if ($number < $min) {
            $number = $min;
        }
        return $number;
    }

    /**
     * Decrease the number to the maximum if above threshold.
     *
     * @param int $number
     * @param int $max
     * @return int
     */
    public static function maxNumberDecrease($number, $max) {

        if ($number > $max) {
            $number = $max;
        }
        return $number;
    }

    /**
     * Limits the number between two bounds.
     *
     * @param int $number
     * @param int $min
     * @param int $max
     * @return int
     */
    public static function limitNumber($number, $min, $max) {

        return self::maxNumberDecrease(self::minNumberInc($number, $min), $max);
    }

    /**
     * Limits the number between two bounds.
     * @param int $number
     * @param int $min
     * @param int $max
     * @return int
     */
    public static function mobileFormat($number) {

        if (is_numeric($number)) {
            if ($number[0] == 0) {
                $number[0] = str_replace("0", "2", $number[0]);
                $number = "9" . $number;
            }
            $number = preg_replace("/([0-9]{2})([0-9]{3})([0-9]{3})([0-9]{4})/", "$1-$2-$3-$4", $number);
            return $number;
        } else {
            return false;
        }
    }

    /**
     * Always rounds up (unlike {@see round}).
     *
     * @param float|string $number
     * @param int $precision
     * @return float|int
     */
    public static function roundUp($number, $precision = 0) {

        $fig = (int)str_pad('1', $precision + 1, '0');
        return (ceil((float)$number * $fig) / $fig);
    }

    /**
     * Always rounds down (unlike {@see round}).
     *
     * @param float|string $number
     * @param int $precision
     * @return float|int
     */
    function roundDown($number, $precision = 0) {

        $fig = (int)str_pad('1', $precision + 1, '0');
        return (floor((float)$number * $fig) / $fig);
    }

    /**
     * @param      $phoneNumber
     * @param bool $local
     * @return mixed|string This function will format international (10+ digit), non-international (10 digit)
     * This function will format international (10+ digit), non-international (10 digit)
     * or old school (7 digit) phone numbers.
     * Any numbers other than 10+, 10 or 7 digits will remain unformatted.
     */
    public static function formatPhoneNumber($phoneNumber, $local = true) {

        $phoneNumber = preg_replace('/[^0-9]/', '', $phoneNumber);
        if ($local) {
            if (strlen($phoneNumber) == 11) {
                $countryCode = substr($phoneNumber, -11, 2);
                $areaCode = substr($phoneNumber, -9, 2);
                $lastThree = substr($phoneNumber, -7, 3);
                $lastFour = substr($phoneNumber, -4, 4);
                $phoneNumber = '+' . $countryCode . ' (' . $areaCode . ') ' . '- ' . $lastThree . ' - ' . $lastFour;
            } else {
                if (strlen($phoneNumber) > 10) {
                    $countryCode = substr($phoneNumber, 0, strlen($phoneNumber) - 10);
                    $areaCode = substr($phoneNumber, -10, 3);
                    $nextThree = substr($phoneNumber, -7, 3);
                    $lastFour = substr($phoneNumber, -4, 4);
                    $phoneNumber = '+' . $countryCode . ' (' . $areaCode . ') ' . $nextThree . '-' . $lastFour;
                } else {
                    if (strlen($phoneNumber) == 10) {
                        $areaCode = substr($phoneNumber, 0, 3);
                        $nextThree = substr($phoneNumber, 3, 3);
                        $lastFour = substr($phoneNumber, 6, 4);
                        $phoneNumber = '(' . $areaCode . ') ' . $nextThree . '-' . $lastFour;
                    } else {
                        if (strlen($phoneNumber) == 7) {
                            $nextThree = substr($phoneNumber, 0, 3);
                            $lastFour = substr($phoneNumber, 3, 4);
                            $phoneNumber = $nextThree . '-' . $lastFour;
                        }
                    }
                }
            }
        } else {
            if (strlen($phoneNumber) > 10) {
                $countryCode = substr($phoneNumber, 0, strlen($phoneNumber) - 10);
                $areaCode = substr($phoneNumber, -10, 3);
                $nextThree = substr($phoneNumber, -7, 3);
                $lastFour = substr($phoneNumber, -4, 4);
                $phoneNumber = '+' . $countryCode . ' (' . $areaCode . ') ' . $nextThree . '-' . $lastFour;
            } else {
                if (strlen($phoneNumber) == 10) {
                    $areaCode = substr($phoneNumber, 0, 3);
                    $nextThree = substr($phoneNumber, 3, 3);
                    $lastFour = substr($phoneNumber, 6, 4);
                    $phoneNumber = '(' . $areaCode . ') ' . $nextThree . '-' . $lastFour;
                } else {
                    if (strlen($phoneNumber) == 7) {
                        $nextThree = substr($phoneNumber, 0, 3);
                        $lastFour = substr($phoneNumber, 3, 4);
                        $phoneNumber = $nextThree . '-' . $lastFour;
                    }
                }
            }
        }
        return $phoneNumber;
    }

    public static function numberFormat($num) {
            return number_format($num);

    }

    public static function recordPerPage() {

        return [
            "10" => "10",
            "50" => "50",
            "100" => "100",
            "150" => "150",
            "200" => "200",
            "250" => "250",
            "300" => "300",
            "350" => "350",
            "400" => "400",
            "450" => "450",
            "500" => "500",
        ];
    }

    public static function numberShortFormat($n, $precision = 1) {
        if ($n < 900) {
            // 0 - 900
            $n_format = number_format($n, $precision);
            $suffix = '';
        } else {
            if ($n < 900000) {
                // 0.9k-850k
                $n_format = number_format($n / 1000, $precision);
                $suffix = 'K';
            } else {
                if ($n < 900000000) {
                    // 0.9m-850m
                    $n_format = number_format($n / 1000000, $precision);
                    $suffix = 'M';
                } else {
                    if ($n < 900000000000) {
                        // 0.9b-850b
                        $n_format = number_format($n / 1000000000, $precision);
                        $suffix = 'B';
                    } else {
                        // 0.9t+
                        $n_format = number_format($n / 1000000000000, $precision);
                        $suffix = 'T';
                    }
                }
            }
        }
        if ($precision > 0) {
            $dotzero = '.' . str_repeat('0', $precision);
            $n_format = str_replace($dotzero, '', $n_format);
        }
        return $n_format . $suffix;
    }

    public static function amountToWord($amount, $currency = 'PKR') {

        $no = round($amount);
        $hundred = null;
        $digits_1 = strlen($no);
        $i = 0;
        $str = [];
        $words = [
            '0' => '',
            '1' => 'one',
            '2' => 'two',
            '3' => 'three',
            '4' => 'four',
            '5' => 'five',
            '6' => 'six',
            '7' => 'seven',
            '8' => 'eight',
            '9' => 'nine',
            '10' => 'ten',
            '11' => 'eleven',
            '12' => 'twelve',
            '13' => 'thirteen',
            '14' => 'fourteen',
            '15' => 'fifteen',
            '16' => 'sixteen',
            '17' => 'seventeen',
            '18' => 'eighteen',
            '19' => 'nineteen',
            '20' => 'twenty',
            '30' => 'thirty',
            '40' => 'forty',
            '50' => 'fifty',
            '60' => 'sixty',
            '70' => 'seventy',
            '80' => 'eighty',
            '90' => 'ninety',
        ];
        $digits = [
            '',
            'hundred',
            'thousand',
            'lakh',
            'crore',
        ];
        while ($i < $digits_1) {
            $divider = ($i == 2) ? 10 : 100;
            $amount = floor($no % $divider);
            $no = floor($no / $divider);
            $i += ($divider == 10) ? 1 : 2;
            if ($amount) {
                $plural = (($counter = count($str)) && $amount > 9) ? 's' : null;
                $hundred = ($counter == 1 && $str[0]) ? ' and ' : null;
                $str [] = ($amount < 21) ? $words[$amount] . " " . $digits[$counter] . $plural . " " . $hundred : $words[floor($amount / 10) * 10] . " " . $words[$amount % 10] . " " . $digits[$counter] . $plural . " " . $hundred;
            } else {
                $str[] = null;
            }
        }
        $str = array_reverse($str);
        $result = implode('', $str);
        return $currency . ' ' . $result;

    }

    public static function roundHalfFive($no) {

        $no = strval($no);
        $no = explode('.', $no);
        $decimal = floatval('0.' . substr($no[1], 0, 2)); // cut only 2 number
        if ($decimal > 0) {
            if ($decimal <= 0.5) {
                return floatval($no[0]) + 0.5;
            } elseif ($decimal > 0.5 && $decimal <= 0.99) {
                return floatval($no[0]) + 1;
            }
        } else {
            return floatval($no);
        }

    }

}