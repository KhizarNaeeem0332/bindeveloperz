<?php

namespace App\Supports\Helpers;
class Str {

    public static $encoding = 'UTF-8';

    public static function isMBString() {

        static $isLoaded;
        if (null === $isLoaded) {
            $isLoaded = extension_loaded('mbstring');
            if ($isLoaded) {
                mb_internal_encoding(self::$encoding);
            }
        }
        return $isLoaded;
    }

    public static function lower($string) {

        if (self::isMBString()) {
            return mb_strtolower($string, self::$encoding);
        } else {
            return strtolower($string);
        }
    }

    public static function initCap($str) {

        if (self::isMBString()) {
            return mb_convert_case($str, MB_CASE_TITLE, self::$encoding);
        } else {
            return ucwords($str);
        }
    }

    public static function upper($str) {
        return strtoupper(trim($str));
    }

    public static function upperFirst($str) {
        return ucfirst(trim($str));
    }

    public static function escape($inp) {
        if (is_array($inp)) {
            return array_map(__METHOD__, $inp);
        }
        if (!empty($inp) && is_string($inp)) {
            return str_replace([
                '\\',
                "\0",
                "\n",
                "\r",
                "'",
                '"',
                "\x1a",
            ], [
                '\\\\',
                '\\0',
                '\\n',
                '\\r',
                "\\'",
                '\\"',
                '\\Z',
            ], $inp);
        }
        return $inp;

    }

    public static function isEmpty($str) {

        $s = trim($str);
        if ((empty($s) and !is_numeric($s)) or (is_numeric($s) and $s == null)) {
            return true;
        } else {
            return false;
        }
    }

    public static function trimSpaces($value, $extendMode = false) {

        $result = (string)trim($value);
        if ($extendMode) {
            $result = trim($result, chr(0xE3) . chr(0x80) . chr(0x80));
            $result = trim($result, chr(0xC2) . chr(0xA0));
            $result = trim($result);
        }
        return $result;
    }

    public static function strLen($string) {

        if (self::isMBString()) {
            return mb_strlen($string, self::$encoding);
        } else {
            return strlen($string);
        }
    }

    public static function alpha($value) {

        return preg_replace('#[^[:alpha:]]#', '', $value);
    }

    public static function alphaNum($value) {

        return preg_replace('#[^[:alnum:]]#', '', $value);
    }

    public static function base64($value) {

        return (string)preg_replace('#[^A-Z0-9\/+=]#i', '', $value);
    }

    public static function deHyphenate($name, $ucfirst = false, $delimiter = '-') {

        $s = str_replace($delimiter, '', ucwords($name, $delimiter));
        return $ucfirst ? $s : lcfirst($s);
    }

    public static function cameLize($string) {

        $sentence = preg_replace('/[\W_]+/', ' ', $string);
        return lcfirst(str_replace(' ', '', ucwords($sentence)));
    }

    public static function deCamelize($name, $ucwords = false, $delimiter = ' ') {

        $w = preg_split('/(?<!^)(?=[A-Z])|(?<!\d)(?=\d)/', $name);
        return implode($delimiter, $ucwords ? array_map('ucfirst', $w) : array_map('lcfirst', $w));
    }

    public static function snakeCase($string) {
        $sentence = strtolower(preg_replace('/([a-z0-9])([A-Z])/', '$1 $2', $string));
        return preg_replace('/[\W\_]+/', '_', $sentence);
    }

    public static function kababCase($string) {
        $sentence = strtolower(preg_replace('/([a-z0-9])([A-Z])/', '$1 $2', $string));
        return preg_replace('/[\W\_]+/', '-', $sentence);
    }

    public static function unCase($string) {
        $snake = strtolower(preg_replace('/([a-z0-9])([A-Z])/', '$1 $2', $string));
        $sentence = preg_replace('/[-_\s]+/', ' ', $snake);
        return $sentence;
    }

    public static function emailToLink($string) {

        return preg_replace("/[_A-Za-z0-9-]+(\.[_A-Za-z0-9-]+)*@[A-Za-z0-9-]+(\.[A-Za-z0-9-]+)*(\.[A-Za-z]{2,3})/", "<a href=\"mailto:\\0\">\\0</a>", $string);
    }

    public static function ordinal($cdnl) {

        $test_c = abs($cdnl) % 10;
        $ext = ((abs($cdnl) % 100 < 21 && abs($cdnl) % 100 > 4) ? 'th' : (($test_c < 4) ? ($test_c < 3) ? ($test_c < 2) ? ($test_c < 1) ? 'th' : 'st' : 'nd' : 'rd' : 'th'));
        return $cdnl . $ext;
    }

    public static function extractEmails($string) {

        preg_match_all("/[\._a-zA-Z0-9-]+@[\._a-zA-Z0-9-]+/i", $string, $matches);
        return $matches[0];
    }

    public static function tweetReplace($content) {

        $twtreplace = preg_replace('/([^a-zA-Z0-9-_&])@([0-9a-zA-Z_]+)/', "$1<a href=\"http://twitter.com/$2\" target=\"_blank\" rel=\"nofollow\">@$2</a>", $content);
        return $twtreplace;
    }

    public static function randHexColor() {

        return sprintf('#%05X', mt_rand(0, 0xFFFFFF));
    }

    public static function isValidEmail($email) {

        return filter_var($email, FILTER_VALIDATE_EMAIL);
    }

    public static function toolTip($title = '') {
        return (' data-toggle="tooltip" title="' . $title . '" ');
    }

    public static function nvl($value, $ifnull) {

        if ($value == null) {
            return $ifnull;
        } else {
            return $value;
        }
    }

    public static function getGender($str) {

        return $str == 'm' ? 'Male' : 'Female';
    }

    public static function selected($key, $value) {

        return $key == $value ? 'selected' : '';
    }

    public static function checked($key, $value) {

        return $key == $value ? 'checked' : '';
    }

    public static function have($var, $default = null) {
        return isset($var) ? $var : $default;
    }

    public static function isStringOrArray($str) {
        return is_string($str) ? explode(',', $str) : $str;

    }

    public static function multiStrReplace($search = [], $replace, $string) {
        return str_replace($search, $replace, $string);
    }

    public static function replaceSpecialSymbols($with = '_', $string) {

        $hyphens = str_replace(' ', $with, $string); // spaces with hyphens.
        $spcials = preg_replace('/[^A-Za-z0-9\-]/', $with, $hyphens); //special chars.
        return preg_replace('/-+/', $with, $spcials); // multiple hyphens with single one
    }

    public static function emailToUsername($emailAddress) {

        $string = strstr($emailAddress, '@', true);
        $hyphens = str_replace('-', '', $string);
        return preg_replace('/[^A-Za-z0-9\-]/', '', $hyphens);

    }

    public static function highlightKeyword($str, $search) {
        $highlightcolor = "text-danger";
        $occurrences = substr_count(strtolower($str), strtolower($search));
        $newstring = $str;
        $match = [];
        for ($i = 0; $i < $occurrences; $i++) {
            $match[$i] = stripos($str, $search, $i);
            $match[$i] = substr($str, $match[$i], strlen($search));
            $newstring = str_replace($match[$i], '[#]' . $match[$i] . '[@]', strip_tags($newstring));
        }
        $newstring = str_replace('[#]', '<span class=' . $highlightcolor . '>', $newstring);
        $newstring = str_replace('[@]', '</span>', $newstring);
        return $newstring;

    }

    public static function generateStrongPassword($length = 9, $add_dashes = false, $available_sets = 'luds') {
        $sets = [];
        if (strpos($available_sets, 'l') !== false) {
            $sets[] = 'abcdefghjkmnpqrstuvwxyz';
        }
        if (strpos($available_sets, 'u') !== false) {
            $sets[] = 'ABCDEFGHJKMNPQRSTUVWXYZ';
        }
        if (strpos($available_sets, 'd') !== false) {
            $sets[] = '23456789';
        }
        if (strpos($available_sets, 's') !== false) {
            $sets[] = '!@#$%&*?';
        }
        $all = '';
        $password = '';
        foreach ($sets as $set) {
            $password .= $set[array_rand(str_split($set))];
            $all .= $set;
        }
        $all = str_split($all);
        for ($i = 0; $i < $length - count($sets); $i++) {
            $password .= $all[array_rand($all)];
        }
        $password = str_shuffle($password);
        if (!$add_dashes) {
            return $password;
        }
        $dash_len = floor(sqrt($length));
        $dash_str = '';
        while (strlen($password) > $dash_len) {
            $dash_str .= substr($password, 0, $dash_len) . '-';
            $password = substr($password, $dash_len);
        }
        $dash_str .= $password;
        return $dash_str;
    }

    public static function boolTrueFalse($val) {

        return (bool)$val ? 'true' : 'false';
    }

    

    public static function isBool($string) {

        return is_string($string) && in_array(strtolower($string), [
                'true',
                'false',
                'yes',
                'no',
                'on',
                'off',
            ]);
    }

    public static function search($str, $pattern, &$match = null) {

        if (preg_match($pattern, $str, $m, PREG_OFFSET_CAPTURE)) {
            list($match, $ofs) = $m[0];
            return $ofs;
        }
        return false;
    }

    public static function strReplace($search, $replace, $subject) {

        $pos = strpos($subject, $search);
        if ($pos !== false) {
            return substr_replace($subject, $replace, $pos, strlen($search));
        }
        $subject = trim($subject);
        return $subject;
    }

    public static function humanise($string) {

        $spacedOut = str_replace([
            '-',
            '_',
        ], ' ', $string);
        $talkingInCaps = ucwords($spacedOut);
        return trim($talkingInCaps);
    }

    public static function stringToHexColour($word) {

        return substr(bin2hex(metaphone($word, 6)), 0, 6);
    }

    public static function stripTags($string) {

        return strip_tags($string);

    }

    public static function splitCamelCase($input, $separator = '_', $toLower = true) {

        $original = $input;
        $output = preg_replace([
            '/(?<=[^A-Z])([A-Z])/',
            '/(?<=[^0-9])([0-9])/',
        ], '_$0', $input);
        $output = preg_replace('#_{1,}#', $separator, $output);
        $output = trim($output);
        if ($toLower) {
            $output = strtolower($output);
        }
        if (strlen($output) == 0) {
            return $original;
        }
        return $output;
    }

    public static function strToInt($value) {

        $cleaned = preg_replace('#[^0-9-+.,]#', '', $value);
        preg_match('#[-+]?[0-9]+#', $cleaned, $matches);
        $result = isset($matches[0]) ? $matches[0] : 0;
        return (int)$result;
    }

    public static function cut($text, $limit, $more = '...') {

        if (strlen($text) > $limit) {
            $chars = floor(($limit - strlen($more)) / 2);
            $p = strpos($text, ' ', $chars) + 1;
            $d = $p < 1 ? 0 : $p - $chars;
            return substr($text, 0, $chars + $d) . $more . substr($text, -$chars + $d);
        }
        return $text;
    }

    public static function trimHTMLText($text, $maxSize, $marker = '') {

        if (mb_strlen($text) <= $maxSize) {
            return $text;
        }
        $text = mb_substr($text, 0, $maxSize);
        $a = mb_strrpos($text, '>');
        $b = mb_strrpos($text, '<');
        if ($b !== false && ($a === false || $a < $b)) {
            $text = mb_substr($text, 0, $b);
        }
        $a = mb_split('/ /', $text);
        array_pop($a);
        $text = join(' ', $a) . $marker;
        $tags = [];
        if (preg_match_all('#<.*?>#u', $text, $matches)) {
            foreach ($matches[0] as $match) {
                if (mb_substr($match, 1, 1) == '/') {
                    array_pop($tags);
                } else {
                    if (mb_substr($match, -2, 1) != '/') {
                        array_push($tags, trim(mb_substr($match, 1, mb_strlen($match) - 2)));
                    }
                }
            }
            $tags = array_reverse($tags);
            foreach ($tags as $tag) {
                $a = mb_strpos($tag, ' ');
                if ($a) {
                    $tag = mb_substr($tag, 0, $a);
                }
                $text .= "
</$tag>";
            }
        }
        return $text;
    }

    public static function randomString($length, $human_friendly = true, $include_symbols = false, $unique_chars = false) {

        $nice_chars = 'ABCDEFGHJKLMNPQRSTUVWXYZabcdefhjkmnprstuvwxyz23456789';
        $all_an = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz1234567890';
        $symbols = '!@#$%^&*()~_-=+{}[]|:;<>,.?/"\'\\`';
        $string = '';
        if ($human_friendly) {
            $pool = $nice_chars;
        } else {
            $pool = $all_an;
            if ($include_symbols) {
                $pool .= $symbols;
            }
        }
        if ($unique_chars && strlen($pool) < $length) {
            throw new LengthException('$length exceeds the size of the pool and $unique_chars is enabled');
        }
        $pool = str_split($pool);
        shuffle($pool);
        for ($i = 0; $i < $length; $i++) {
            if ($unique_chars) {
                $string .= array_shift($pool);
            } else {
                $string .= $pool[0];
                shuffle($pool);
            }
        }
        return $string;
    }

    public static function returnBool($val, $label = [
        "No",
        "Yes",
    ]) {

        if ($val == 0) {
            return $label[0];
        } else {
            return $label[1];
        }
    }

    public static function stripPAB($str, $opbr = '(', $clbr = ')') {

        $rstr = trim($str);
        $leftchar = substr($rstr, 0, 1);
        $rightchar = substr($rstr, -1, 1);
        if (($opbr == '(' and ($leftchar == '(' or $leftchar == '{' or $leftchar == '[')) or $leftchar == $opbr) {
            $rstr = substr($rstr, 1);
        }
        if (($clbr == ')' and ($rightchar == ')' or $rightchar == '}' or $rightchar == ']')) or $rightchar == $clbr) {
            $rstr = substr($rstr, 0, -1);
        }
        return $rstr;
    }

    public static function toString($str) {
        $get_magic_quotes_exists = '';
        if ($str == null) {
            return 'NULL';
        }
        if (function_exists('get_magic_quotes_gpc')) {
            $get_magic_quotes_exists = true;
        }
        if ($get_magic_quotes_exists == true and get_magic_quotes_gpc() == 1) {
            return "'" . self::stripPAB($str, "'", "'") . "'";
        } else {
            return "'" . (self::stripPAB($str, "'", "'")) . "'";
        }
    }

    public static function stripSpace($string) {

        return preg_replace('/\s+/', '', $string);
    }

    public static function get_gravatar($email, $size = 32) {
        if (Http::isHttps()) {
            $url = 'https://secure.gravatar.com/';
        } else {
            $url = 'http://www.gravatar.com/';
        }
        $url .= 'avatar/' . md5($email) . '?s=' . (int)abs($size);
        return $url;
    }

    public static function cleanString($string, $toLower = true, $addslashes = false) {

        $string = Slug::removeAccents($string);
        $string = strip_tags($string);
        $string = trim($string);
        if ($addslashes) {
            $string = addslashes($string);
        }
        if ($toLower) {
            $string = self::lower($string);
        }
        return $string;
    }

    public static function strToBool($val) {

        return is_string($val) ? $val !== '' && $val !== 'false' && $val !== '0' && $val !== 'no' && $val !== 'off' : self::strToBool($val);
    }

    public static function _unique($prefix = 'unique') {

        $prefix = rtrim(trim($prefix), '-');
        $random = mt_rand(10000000, 99999999);
        $result = $random;
        if ($prefix) {
            $result = $prefix . '-' . $random;
        }
        return $result;
    }

    public static function random($length = 10, $isReadable = true) {

        $result = '';
        if ($isReadable) {
            $vocal = [
                'a',
                'e',
                'i',
                'o',
                'u',
                '0',
            ];
            $conso = [
                'b',
                'c',
                'd',
                'f',
                'g',
                'h',
                'j',
                'k',
                'l',
                'm',
                'n',
                'p',
                'r',
                's',
                't',
                'v',
                'w',
                'x',
                'y',
                'z',
                '1',
                '2',
                '3',
                '4',
                '5',
                '6',
                '7',
                '8',
                '9',
            ];
            $max = $length / 2;
            for ($pos = 1; $pos <= $max; $pos++) {
                $result .= $conso[mt_rand(0, count($conso) - 1)];
                $result .= $vocal[mt_rand(0, count($vocal) - 1)];
            }
        } else {
            $chars = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";
            for ($pos = 0; $pos < $length; $pos++) {
                $result .= $chars[mt_rand() % strlen($chars)];
            }
        }
        return $result;
    }

    public static function zeroPad($number, $length) {

        return str_pad($number, $length, '0', STR_PAD_LEFT);
    }

    public static function truncateSafe($string, $length, $append = '...') {

        $result = self::sub($string, 0, $length);
        $lastSpace = self::rpos($result, ' ');
        if ($lastSpace !== false && $string != $result) {
            $result = self::sub($result, 0, $lastSpace);
        }
        if ($result != $string) {
            $result .= $append;
        }
        return $result;
    }

    public static function limitChars($string, $limit = 100, $append = '...') {

        if (self::strlen($string) <= $limit) {
            return $string;
        }
        return rtrim(self::sub($string, 0, $limit)) . $append;
    }

    public static function limitWords($string, $limit = 100, $append = '...') {

        preg_match('/^\s*+(?:\S++\s*+){1,' . $limit . '}/u', $string, $matches);
        if (!Arr::key(0, $matches) || self::strlen($string) === self::strlen($matches[0])) {
            return $string;
        }
        return rtrim($matches[0]) . $append;
    }

    public static function float($value, $round = 10) {

        $cleaned = preg_replace('#[^0-9eE\-\.\,]#ius', '', $value);
        $cleaned = str_replace(',', '.', $cleaned);
        preg_match('#[-+]?[0-9]+(\.[0-9]+)?([eE][-+]?[0-9]+)?#', $cleaned, $matches);
        $result = isset($matches[0]) ? $matches[0] : 0.0;
        $result = round($result, $round);
        return (float)$result;
    }

    public static function like($pattern, $string, $caseSensitive = true) {

        if ($pattern == $string) {
            return true;
        }
        // Preg flags
        $flags = $caseSensitive ? '' : 'i';
        // Escape any regex special characters
        $pattern = preg_quote($pattern, '#');
        // Unescape * which is our wildcard character and change it to .*
        $pattern = str_replace('\*', '.*', $pattern);
        return (bool)preg_match('#^' . $pattern . '$#' . $flags, $string);
    }

    public static function slug($text = '', $isCache = false) {

        static $cache = [];
        if (!$isCache) {
            return Slug::filter($text);
        } else {
            if (!array_key_exists($text, $cache)) { // Not Arr::key() for performance
                $cache[$text] = Slug::filter($text);
            }
        }
        return $cache[$text];
    }

    public static function pos($haystack, $needle, $offset = 0) {

        if (self::isMBString()) {
            return mb_strpos($haystack, $needle, $offset, self::$encoding);
        } else {
            return strpos($haystack, $needle, $offset);
        }
    }

    public static function rpos($haystack, $needle, $offset = 0) {

        if (self::isMBString()) {
            return mb_strrpos($haystack, $needle, $offset, self::$encoding);
        } else {
            return strrpos($haystack, $needle, $offset);
        }
    }

    public static function ipos($haystack, $needle, $offset = 0) {

        if (self::isMBString()) {
            return mb_stripos($haystack, $needle, $offset, self::$encoding);
        } else {
            return stripos($haystack, $needle, $offset);
        }
    }

    public static function strstr($haystack, $needle, $beforeNeedle = false) {

        if (self::isMBString()) {
            return mb_strstr($haystack, $needle, $beforeNeedle, self::$encoding);
        } else {
            return strstr($haystack, $needle, $beforeNeedle);
        }
    }

    public static function istr($haystack, $needle, $beforeNeedle = false) {

        if (self::isMBString()) {
            return mb_stristr($haystack, $needle, $beforeNeedle, self::$encoding);
        } else {
            return stristr($haystack, $needle, $beforeNeedle);
        }
    }

    public static function rchr($haystack, $needle, $part = null) {

        if (self::isMBString()) {
            return mb_strrchr($haystack, $needle, $part, self::$encoding);
        } else {
            return strrchr($haystack, $needle);
        }
    }

    public static function sub($string, $start, $length = 0) {

        if (self::isMBString()) {
            if (0 == $length) {
                $length = self::strlen($string);
            }
            return mb_substr($string, $start, $length, self::$encoding);
        } else {
            return substr($string, $start, $length);
        }
    }

    public static function subCount($haystack, $needle) {

        if (self::isMBString()) {
            return mb_substr_count($haystack, $needle, self::$encoding);
        } else {
            return substr_count($haystack, $needle);
        }
    }

    public static function isStart($haystack, $needle, $caseSensitive = false) {

        if ($caseSensitive) {
            return $needle === '' || self::pos($haystack, $needle) === 0;
        } else {
            return $needle === '' || self::ipos($haystack, $needle) === 0;
        }
    }

    public static function isEnd($haystack, $needle, $caseSensitive = false) {

        if ($caseSensitive) {
            return $needle === '' || self::sub($haystack, -self::strlen($needle)) === $needle;
        } else {
            $haystack = self::lower($haystack);
            $needle = self::lower($needle);
            return $needle === '' || self::sub($haystack, -self::strlen($needle)) === $needle;
        }
    }

    public static function beginsWith($str, $substr) {

        return substr($str, 0, strlen($substr)) == $substr;
    }

    public static function endsWith($str, $substr) {

        return substr($str, -strlen($substr)) == $substr;
    }

}