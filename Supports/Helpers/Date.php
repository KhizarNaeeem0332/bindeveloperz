<?php

namespace App\Supports\Helpers;
use DateTime;
use DateTimeZone;

class Date {

    const MINUTE = 60;
    const HOUR = 3600;
    const DAY = 86400;
    const WEEK = 604800; // 7 days
    const MONTH = 2592000; // 30 days
    const YEAR = 31536000; // 365 days
    const SQL_FORMAT = 'Y-m-d H:i:s';
    const SQL_NULL = '0000-00-00 00:00:00';

    /**
     * @param mixed $time
     * @param null $timeZone
     * @return DateTime
     */
    public static function factory($time = null, $timeZone = null) {

        $timeZone = self::timeZone($timeZone);
        if ($time instanceof DateTime) {
            return $time->setTimezone($timeZone);
        }
        $dateTime = new DateTime('@' . self::toStamp($time));
        $dateTime->setTimezone($timeZone);
        return $dateTime;
    }

    /**
     * Returns the current date and time in YYYY-MM-DD HH:MM:SS format.
     * @return string
     */
    public static function dateTime() {

        return date('Y-m-d H:i:s');
    }

    /**
     * Returns the current date in YYYY-MM-DD format.
     * @return string
     */
    public static function todayDate() {

        return date('Y-m-d');
    }

    /**
     * Convert time for sql format
     * @param null|int $time
     * @return string
     */
    public static function sqlTime($time = null) {

        return self::factory($time)->format(self::SQL_FORMAT);
    }

    /**
     * Return a DateTimeZone object based on the current timezone.
     * @param mixed $timezone
     * @return \DateTimeZone
     */
    public static function timeZone($timezone = null) {

        if ($timezone instanceof DateTimeZone) {
            return $timezone;
        }
        $timezone = $timezone ? : date_default_timezone_get();
        return new DateTimeZone($timezone);
    }

    /**
     * Check if string is date
     * @param string $date
     * @return bool
     * @SuppressWarnings(PHPMD.ShortMethodName)
     */
    public static function is($date) {

        $time = strtotime($date);
        return $time > 0;
    }

    /**
     * Convert to timestamp
     * @param string|DateTime $time
     * @param bool $currentIsDefault
     * @return int
     */
    public static function toStamp($time = null, $currentIsDefault = true) {

        if ($time instanceof DateTime) {
            return $time->format('U');
        }
        if (!empty($time)) {
            if (is_numeric($time)) {
                $time = (int)$time;
            } else {
                $time = strtotime($time);
            }
        }
        if (!$time) {
            if ($currentIsDefault) {
                $time = time();
            } else {
                $time = 0;
            }
        }
        return $time;
    }

    /**
     * @param string|int $date
     * @param string $format
     * @return string
     */
    public static function humanDate($date, $format = 'd M Y H:i') {

        return self::factory($date)->format($format);
    }

    /**
     * Returns true if date passed is within this week.
     * @param string|int $time
     * @return bool
     */
    public static function isThisWeek($time) {

        return (self::factory($time)->format('W-Y') === self::factory()->format('W-Y'));
    }

    /**
     * Returns true if date passed is within this month.
     * @param string|int $time
     * @return bool
     */
    public static function isThisMonth($time) {

        return (self::factory($time)->format('m-Y') === self::factory()->format('m-Y'));
    }

    /**
     * Returns true if date passed is within this year.
     * @param string|int $time
     * @return bool
     */
    public static function isThisYear($time) {

        return (self::factory($time)->format('Y') === self::factory()->format('Y'));
    }

    /**
     * Returns true if date passed is tomorrow.
     * @param string|int $time
     * @return bool
     */
    public static function isTomorrow($time) {

        return (self::factory($time)->format('Y-m-d') === self::factory('tomorrow')->format('Y-m-d'));
    }

    /**
     * Returns true if date passed is today.
     * @param string|int $time
     * @return bool
     */
    public static function isToday($time) {

        return (self::factory($time)->format('Y-m-d') === self::factory()->format('Y-m-d'));
    }

    /**
     * Returns true if date passed was yesterday.
     * @param string|int $time
     * @return bool
     */
    public static function isYesterday($time) {

        return (self::factory($time)->format('Y-m-d') === self::factory('yesterday')->format('Y-m-d'));
    }

    public static function convertTime($date, $format = 'h:i') {

        $newtime = date($format, strtotime($date));
        return $newtime;
    }

    public static function minToHoursMin($time, $format = '%02d:%02d') {

        if ($time < 1) {
            return false;
        }
        $hours = floor($time / 60);
        $minutes = ($time % 60);
        return sprintf($format, $hours, $minutes);
    }

    /**
     * Extracts the date part from a date encoded in ISO8601 format.
     * Ex: datePart('2012-10-05 18:23:45') returns '2012-10-05'.
     * @param String $isoDateStr
     * @return String An empty string if the date is not valid.
     */
    public static function datePart($isoDateStr) {

        return substr($isoDateStr, 0, strpos($isoDateStr, ' '));
    }

    /**
     * Extracts the time part from a date encoded in ISO8601 format.
     * Ex: timePart('2012-10-05 18:23:45') returns '18:23:45'.
     * @param String $isoDateStr
     * @return String An empty string if the date is not valid.
     */
    public static function timePart($isoDateStr) {

        return substr($isoDateStr, strpos($isoDateStr, ' ') + 1);
    }

    /**
     * Tests if the given string encodes a valid date and time in the specified format.
     * <p>By default, it tests the ISO8601 format.
     * <p>**Note:** wrong dates, like 30 of February, will fail validation.
     * @param string $date
     * @param string $format
     * @return int
     */
    public static function isDateTime($date, $format = 'Y-m-d H:i:s') {

        $d = DateTime::createFromFormat($format, $date);
        return $d && $d->format($format) == $date;
    }

    /**
     * Tests if the given string encodes a valid date in the specified format.
     * <p>By default, it tests the ISO8601 format.
     * <p>**Note:** wrong dates or times, like 30 of February, will fail validation.
     * @param string $date
     * @param string $format
     * @return int
     */
    public static function isDate($date, $format = 'Y-m-d') {

        return self::isDateTime($date, $format);
    }

    /**
     * @param $timestamp
     * @return false|string
     */
    public static function formatTime($timestamp) {

        /*Sample Future Output :
            30 seconds to go
            1 minute to go
            5 hours to go
            Tomorrow at 2:25pm
            June 30, 2022 5:34pm
            Sample Past Output :
            0 seconds ago
            32 minutes ago
            20 hours ago
            Yesterday at 5:26pm
            Monday at 10:28am
            June 25 at 5:23am
            March 30, 2010 at 5:34pm*/
        // Get time difference and setup arrays
        $difference = time() - $timestamp;
        $periods = [
            "second",
            "minute",
            "hour",
            "day",
            "week",
            "month",
            "years",
        ];
        $lengths = [
            "60",
            "60",
            "24",
            "7",
            "4.35",
            "12",
        ];
        // Past or present
        if ($difference >= 0) {
            $ending = "ago";
        } else {
            $difference = -$difference;
            $ending = "to go";
        }
        // Figure out difference by looping while less than array length
        // and difference is larger than lengths.
        $arr_len = count($lengths);
        for ($j = 0; $j < $arr_len && $difference >= $lengths[$j]; $j++) {
            $difference /= $lengths[$j];
        }
        // Round up
        $difference = round($difference);
        // Make plural if needed
        if ($difference != 1) {
            $periods[$j] .= "s";
        }
        // Default format
        $text = "$difference $periods[$j] $ending";
        // over 24 hours
        if ($j > 2) {
            // future date over a day formate with year
            if ($ending == "to go") {
                if ($j == 3 && $difference == 1) {
                    $text = "Tomorrow at " . date("g:i a", $timestamp);
                } else {
                    $text = date("F j, Y \a\\t g:i a", $timestamp);
                }
                return $text;
            }
            if ($j == 3 && $difference == 1) // Yesterday
            {
                $text = "Yesterday at " . date("g:i a", $timestamp);
            } else {
                if ($j == 3) // Less than a week display -- Monday at 5:28pm
                {
                    $text = date("l \a\\t g:i a", $timestamp);
                } else {
                    if ($j < 6 && !($j == 5 && $difference == 12)) // Less than a year display -- June 25 at 5:23am
                    {
                        $text = date("F j \a\\t g:i a", $timestamp);
                    } else // if over a year or the same month one year ago -- June 30, 2010 at 5:34pm
                    {
                        $text = date("F j, Y \a\\t g:i a", $timestamp);
                    }
                }
            }
        }
        return $text;
    }
    //
    // retrieve total count of weeks in a year
    //
    // param: (int) $year the year in which you wanna get the week count; if not int (for example from date('Y') it is automatically casted
    //
    // --- NOTE:
    // seen a lot of stuff around but nothing as fast;
    // mktime() is a very performant operation and the loop
    // is executed max 13 times
    //
    //
    // see: http://www.php.net/mktime
    // see: http://www.php.net/intval
    //
    public static function totalWeeks($year) {

        if (!is_int($year)) {
            $year = intval($year);
        }
        $i = 31;
        while (date('w', mktime(23, 59, 59, 12, $i, $year)) != 0) {
            $i--;
        }
        return date('W', mktime(23, 59, 59, 12, $i, $year));
    }

    /**
     * @return array
     */
    public static function next7Days() {

        // create array of day names. You can change these to whatever you want
        $days = [
            'Monday',
            'Tuesday',
            'Wednesday',
            'Thursday',
            'Friday',
            'Saturday',
            'Sunday',
        ];
        $today = date('N');
        for ($i = 1; $i < $today; $i++) {
            // take the first element off the array
            $shift = array_shift($days);
            // ... and add it to the end of the array
            array_push($days, $shift);
        }
        // returns the sorted array
        return $days;
    }

    /**
     * Checks wether a date is between an interval
     * Usage:
     * // check if today is older than 2008/12/31
     * var_dump(currentDayIsInInterval('2008/12/31'));
     * // check if today is younger than 2008/12/31
     * var_dump(currentDayIsInInterval(null,'2008/12/31'));
     * // check if today is between 2008/12/01 and 2008/12/31
     * var_dump(currentDayIsInInterval('2008/12/01','2008/12/31'));
     * Will trigger errors if date is in wrong format, notices if $begin > $end
     * @param string $begin Date string as YYYY/mm/dd
     * @param string $end Date string as YYYY/mm/dd
     * @return bool
     */
    public static function currentDayIsInInterval($begin = '', $end = '') {

        $preg_exp = '"[0-9][0-9][0-9][0-9]/[0-9][0-9]/[0-9][0-9]"';
        $preg_error = 'Wrong parameter passed to function ' . __FUNCTION__ . ' : Invalide date
format. Please use YYYY/mm/dd.';
        $interval_error = 'First parameter in ' . __FUNCTION__ . ' should be smaller than
second.';
        if (empty($begin)) {
            $begin = 0;
        } else {
            if (preg_match($preg_exp, $begin)) {
                $begin = (int)str_replace('/', '', $begin);
            } else {
                trigger_error($preg_error, E_USER_ERROR);
            }
        }
        if (empty($end)) {
            $end = 99999999;
        } else {
            if (preg_match($preg_exp, $end)) {
                $end = (int)str_replace('/', '', $end);
            } else {
                trigger_error($preg_error, E_USER_ERROR);
            }
        }
        if ($end < $begin) {
            trigger_error($interval_error, E_USER_WARNING);
        }
        $time = time();
        $now = (int)(date('Y', $time) . date('m', $time) . date('j', $time));
        if ($now > $end or $now < $begin) {
            return false;
        }
        return true;
    }

    public static function dateAgo($strdate) {

        $time = strtotime($strdate);
        $now = time();
        $ago = $now - $time;
        if ($now > $time) {
            if ($ago < 60) {
                $when = round($ago);
                $s = ($when == 1) ? "second" : "seconds";
                return "$when $s ago";
            } else {
                if ($ago < 3600) {
                    $when = round($ago / 60);
                    $m = ($when == 1) ? "minute" : "minutes";
                    return "$when $m ago";
                } else {
                    if ($ago >= 3600 && $ago < 86400) {
                        $when = round($ago / 60 / 60);
                        $h = ($when == 1) ? "hour" : "hours";
                        return "$when $h ago";
                    } else {
                        if ($ago >= 86400 && $ago < 2629743.83) {
                            $when = round($ago / 60 / 60 / 24);
                            $d = ($when == 1) ? "day" : "days";
                            return "$when $d ago";
                        } else {
                            if ($ago >= 2629743.83 && $ago < 31556926) {
                                $when = round($ago / 60 / 60 / 24 / 30.4375);
                                $m = ($when == 1) ? "month" : "months";
                                return "$when $m ago";
                            } else {
                                $when = round($ago / 60 / 60 / 24 / 365);
                                $y = ($when == 1) ? "year" : "years";
                                return "$when $y ago";
                            }
                        }
                    }
                }
            }
        } else {
            return $strdate;
        }
    }

    /**
     * @param $timestamp
     * @return false|mixed|string
     */
    public static function fuzzyDate($timestamp) {

        $myDays = [
            "Sun",
            "Mon",
            "Tues",
            "Wed",
            "Thurs",
            "Fri",
            "Sat",
        ];
        if (preg_match("/[-\/:]/", $timestamp)) {
            $timestamp = strtotime($timestamp);
        }
        if ($timestamp > time()) // All future dates
        {
            return date('m/d/y', $timestamp);
        } else {
            if ($timestamp >= mktime(0, 0, 0)) // Today
            {
                return 'Today';
            } else {
                if ($timestamp >= mktime(0, 0, 0) - 86400) // Yesterday
                {
                    return 'Yesterday';
                } else {
                    if ($timestamp >= mktime(0, 0, 0) - 86400 * 7) // Within 7 days
                    {
                        return $myDays[date('w', $timestamp)];
                    } else {
                        if ($timestamp >= mktime(0, 0, 0, 1, 1)) // Within 1 year
                        {
                            return date('M d', $timestamp);
                        } else // Older than 1 year
                        {
                            return date('m/d/y', $timestamp);
                        }
                    }
                }
            }
        }
    }

    /**
     * @param $date
     * @return string
     */
    public static function timeAgo($date) {

        if (empty($date)) {
            return "No date provided";
        }
        $periods = [
            "second",
            "minute",
            "hour",
            "day",
            "week",
            "month",
            "year",
            "decade",
        ];
        $lengths = [
            "60",
            "60",
            "24",
            "7",
            "4.35",
            "12",
            "10",
        ];
        $now = time();
        $unix_date = strtotime($date);
        if (empty($unix_date)) {
            return "";
        }
        if ($now > $unix_date) {
            $difference = $now - $unix_date;
            $tense = "ago";
        } else {
            $difference = $unix_date - $now;
            $tense = "from now";
        }
        for ($j = 0; $difference >= $lengths[$j] && $j < count($lengths) - 1; $j++) {
            $difference /= $lengths[$j];
        }
        $difference = round($difference);
        if ($difference != 1) {
            $periods[$j] .= "s";
        }
        return "$difference $periods[$j] {$tense}";
    }

    /**
     * @param $date1
     * @param $date2
     * @return float|int
     */
    public static function pTotalDaysBetweenDates($date1, $date2) {

        $startTimeStamp = strtotime($date1);
        $endTimeStamp = strtotime($date2);
        $timeDiff = abs($endTimeStamp - $startTimeStamp);
        $numberDays = $timeDiff / 86400;
        $numberDays = intval($numberDays);
        return $numberDays;
    }

    /**
     * @param $date
     * @return string
     */
    public static function nTotalDaysBetweenDates($date) {

        $today = new DateTime(date("Y-m-d"));
        $newdate = new DateTime($date);
        $interval = $today->diff($newdate);
        $tdays = $interval->format("%r%a");
        return $tdays;
    }

    /**
     * @param string $birthdate
     * @return false|string
     */
    public static function getAge($birthdate = '0000-00-00') {

        if ($birthdate == '0000-00-00') {
            return 'Unknown';
        }
        $bits = explode('-', $birthdate);
        $age = date('Y') - $bits[0] - 1;
        $arr[1] = 'm';
        $arr[2] = 'd';
        for ($i = 1; $arr[$i]; $i++) {
            $n = date($arr[$i]);
            if ($n < $bits[$i]) {
                break;
            }
            if ($n > $bits[$i]) {
                ++$age;
                break;
            }
        }
        return $age;
    }

    /**
     * @param $month
     * @param $year
     * @return int
     */
    public static function weekInMonth($month, $year) {

        $startDate = new DateTime();
        $startDate->setDate($year, $month, 1);
        $loopDate = $startDate;
        $week = 1;
        for ($i = $startDate->format('d'); $i <= cal_days_in_month(CAL_GREGORIAN, $month, $year); $i++) {
            if ($loopDate->format('w') % 7 == 0) {
                $week++;
            }
            $loopDate->modify('+1 day');
        }
        return $week;
    }

    /*echo '<p>Jan '.weeks_in_month(1, 2017).'</p>';*/
    public static function getYears($limit = '') {
        $data = range(date("Y"), date("Y", strtotime("now - $limit years")));
        return $data;
    }

    public static function getSeason() {

        $today = new DateTime();
        echo 'Today is: ' . $today->format('m-d-Y') . '<br />';
        // get the season dates
        $spring = new DateTime('March 20');
        $summer = new DateTime('June 20');
        $fall = new DateTime('September 22');
        $winter = new DateTime('December 21');
        switch (true) {
            case $today >= $spring && $today < $summer:
                echo 'It\'s Spring!';
                break;
            case $today >= $summer && $today < $fall:
                echo 'It\'s Summer!';
                break;
            case $today >= $fall && $today < $winter:
                echo 'It\'s Fall!';
                break;
            default:
                echo 'It\' Winter!';
        }
    }

    public static function seasonBaseBg() {

        // Locate the icons
        $icons = [
            "spring" => "spring.png",
            "summer" => "summer.png",
            "autumn" => "autumn.png",
            "winter" => "winter.png",
        ];
        // What is today's date - number
        $day = date("z");
        //  Days of spring
        $spring_starts = date("z", strtotime("March 21"));
        $spring_ends = date("z", strtotime("June 20"));
        # Days of summer
        $summer_starts = date("z", strtotime("June 21"));
        $summer_ends = date("z", strtotime("September 22"));
        //  Days of autumn
        $autumn_starts = date("z", strtotime("September 23"));
        $autumn_ends = date("z", strtotime("December 20"));
        //  If $day is between the days of spring, summer, autumn, and winter
        if ($day >= $spring_starts && $day <= $spring_ends) :
            $season = "spring";
        elseif ($day >= $summer_starts && $day <= $summer_ends) :
            $season = "summer";
        elseif ($day >= $autumn_starts && $day <= $autumn_ends) :
            $season = "autumn";
        else :
            $season = "winter";
        endif;
        $image_path = $icons[$season];
        echo $image_path;
    }

    public static function dateFormat($date = null, $format = null) {

        switch ($format) {
            case 'f1' :
                return self::factory($date)->format('Y/m/d');
                break;
            case 'f2':
                return self::factory($date)->format('Y-m-d H:i:s');
                break;
            case 'f3':
                return self::factory($date)->format('M d, Y');
                break;
            case 'f4':
                return self::factory($date)->format('F d, Y');
                break;
            case 'f5':
                return self::factory($date)->format('D d M, Y h:i:sa');
                break;
            case 'f6':
                return self::factory($date)->format('l F d, Y');
                break;
            case 'f7':
                return self::factory($date)->format('l F d, Y, h:i:s');
                break;
            case 'f8':
                return self::factory($date)->format('l F d, Y, h:i A');
                break;
            case 'f9':
                return self::factory($date)->format('Y-m-d H:i:sP');
                break;
            case 'f10':
                return self::factory($date)->format('l jS \of F Y h:i:s A');
                break;
            case 'f11':
                return self::factory($date)->format('d F, Y');
                break;
            case 'f12':
                return self::factory($date)->format('F, Y');
                break;
            default:
                return self::factory($date)->format('Y-m-d');

        }
    }

    public static function dateToSQL($date) {
        return date('Y-m-d', strtotime(str_replace('/', '-', $date)));

    }

    public static function datetimeToSQL($date) {
        return date('Y-m-d H:i:s', strtotime(str_replace('/', '-', $date)));

    }

    public static function sqlDateToInput($date) {
        return date('d/m/Y', strtotime(str_replace('-', '/', $date)));

    }

    public static function sqlDateTimeToInput($date) {
        return date('d/m/Y H:i:s', strtotime(str_replace('-', '/', $date)));

    }

    public static function datesBetween($startDate, $endDate) {
        $start = strtotime($startDate);
        $stop = strtotime($endDate);
        $dates = [];
        for ($seconds = $start; $seconds <= $stop; $seconds += 86400) {
            $dates[] = date("Y-m-d", $seconds);
        }
        return $dates;
    }

    public static function daysBetweenDays($startDate, $endDate) {
        $date1 = date_create($startDate);
        $date2 = date_create($endDate);
        $diff = date_diff($date1, $date2);
        return $diff;
    }

    public static function getDaysWeeks($date, $total, $postfix = "w") {

        $enddate = "";
        if ($postfix == "w") {
            $enddate = date('Y-m-d', date(strtotime("+" . $total . " week", strtotime($date))));
        }
        if ($postfix == "m") {
            $enddate = date('Y-m-d', date(strtotime("+" . $total . " month", strtotime($date))));
        }
        $date = new DateTime($enddate);
        $today = new DateTime($date);
        $interval = $today->diff($date);
        $tdays = $interval->format("%r%a");
        return $tdays;
    }

    public static function getEndDate($date, $total, $postfix = "w") {

        $enddate = "";
        if (strtolower($postfix == "w")) {
            $enddate = date('Y-m-d', date(strtotime("+" . $total . " week", strtotime($date))));
        }
        if (strtolower($postfix == "m")) {
            $enddate = date('Y-m-d', date(strtotime("+" . $total . " month", strtotime($date))));
        }
        return $enddate;
    }

    public static function weeksBetweenDates($date1, $date2) {

        if ($date1 > $date2) {
            return self::weeksBetweenDates($date2, $date1);
        }
        $first = DateTime::createFromFormat('Y-m-d', $date1);
        $second = DateTime::createFromFormat('Y-m-d', $date2);
        return floor($first->diff($second)->days / 7);
    }

    public static function weeksBetweenMonth($date, $months) {

        $first = DateTime::createFromFormat('Y-m-d', $date);
        $second = DateTime::createFromFormat('Y-m-d', self::getEndDate($date, $months, 'm'));
        return floor($first->diff($second)->days / 7);
    }

    public static function weekDays($date) {

        $date = new DateTime($date);
        return $date->format("W");
    }

    /**
     * Convert to timestamp
     * @param string|DateTime $time
     * @param bool $currentIsDefault
     * @return int
     */
    public static function toTimestamp($time = null, $currentIsDefault = true) {

        if ($time instanceof DateTime) {
            return $time->format('U');
        }
        if (!empty($time)) {
            if (is_numeric($time)) {
                $time = (int)$time;
            } else {
                $time = strtotime($time);
            }
        }
        if (!$time) {
            if ($currentIsDefault) {
                $time = time();
            } else {
                $time = 0;
            }
        }
        return $time;
    }

    /**
     * @param $fyear
     * @param $fmonth
     * @param $fday
     * @param $tyear
     * @param $tmonth
     * @param $tday
     * @return number
     */
    public static function daysBetween($fyear, $fmonth, $fday, $tyear, $tmonth, $tday) {

        return abs((mktime(0, 0, 0, $fmonth, $fday, $fyear) - mktime(0, 0, 0, $tmonth, $tday, $tyear)) / (60 * 60 * 24));
    }

    public static function dayBefore($fyear, $fmonth, $fday) {

        return date("Y-m-d", mktime(0, 0, 0, $fmonth, $fday - 1, $fyear));
    }

    public static function nextDay($fyear, $fmonth, $fday) {

        return date("Y-m-d", mktime(0, 0, 0, $fmonth, $fday + 1, $fyear));
    }

    /**
     * @param $fyear
     * @param $fmonth
     * @param $fday
     * @return int
     */
    public static function weekDay($fyear, $fmonth, $fday) //0 is monday
    {

        return (((mktime(0, 0, 0, $fmonth, $fday, $fyear) - mktime(0, 0, 0, 7, 17, 2006)) / (60 * 60 * 24)) + 700000) % 7;
    }

    public static function priorMonday($fyear, $fmonth, $fday) {

        return date("Y-m-d", mktime(0, 0, 0, $fmonth, $fday - self::weekday($fyear, $fmonth, $fday), $fyear));
    }

    /**
     * @param $time
     * @return false|int
     */
    public static function pubDate2Timestamp($time) {

        // Thu, 21 Aug 2008 01:14:36 PDT
        // => date("D, j M Y H:i:s T");
        $time = explode(' ', $time);
        $chrono = explode(':', $time[4]);
        $month = [
            'Jan' => 1,
            'Feb' => 2,
            'Mar' => 3,
            'Apr' => 4,
            'May' => 5,
            'Jun' => 6,
            'Jul' => 7,
            'Aug' => 8,
            'Sep' => 9,
            'Oct' => 10,
            'Nov' => 11,
            'Dec' => 12,
        ];
        $mktime = mktime($chrono[0], $chrono[1], $chrono[2], $month[$time[2]], $time[1], $time[3], $time[5]);
        return $mktime;
    }

    /**
     * @param $start
     * @param $stop
     * @return bool|int|string
     */
    public static function getMonth($start, $stop) {

        $aSta = substr($start, 0, 4);
        $aSto = substr($stop, 0, 4);
        $mSta = substr($start, 4, 2);
        $mSto = substr($stop, 4, 2);
        if ($aSta == $aSto) {
            return $mSto - $mSta + 1;
        } else {
            if (($aSto - $aSta) == 1) {
                return 12 - $mSta + $mSto + 1;
            } else {
                return (12 - $mSta + $mSto + 1) + ($aSto - $aSta - 1) * 12;
            }
        }
    }

    /**
     * @param $seconds
     */
    public static function splitSeconds($seconds) {

        // get the minutes
        $minutes = floor($seconds / 60);
        $seconds_left = $seconds % 60;
        // get the hours
        $hours = floor($minutes / 60);
        $minutes_left = $minutes % 60;
        // (test) show the result
        echo "$hours hours $minutes_left minutes and $seconds_left seconds";
    }

    /**
     * @param $date
     * @param $shift
     * @return false|string
     */
    public static function mysqlDateShift($date, $shift) {

        return date("Y-m-d H:i:s", strtotime($shift, strtotime($date)));
    }

    /**
     * @param $secs
     * @return string
     */
    public static function secsToStr($secs) {

        $r = '';
        if ($secs >= 86400) {
            $days = floor($secs / 86400);
            $secs = $secs % 86400;
            $r = $days . ' day';
            if ($days <> 1) {
                $r .= 's';
            }
            if ($secs > 0) {
                $r .= ', ';
            }
        }
        if ($secs >= 3600) {
            $hours = floor($secs / 3600);
            $secs = $secs % 3600;
            $r .= $hours . ' hour';
            if ($hours <> 1) {
                $r .= 's';
            }
            if ($secs > 0) {
                $r .= ', ';
            }
        }
        if ($secs >= 60) {
            $minutes = floor($secs / 60);
            $secs = $secs % 60;
            $r .= $minutes . ' minute';
            if ($minutes <> 1) {
                $r .= 's';
            }
            if ($secs > 0) {
                $r .= ', ';
            }
        }
        $r .= $secs . ' second';
        if ($secs <> 1) {
            $r .= 's';
        }
        return $r;
    }

    /**
     * @param $time
     * @return mixed
     */
    public static function time2Seconds($time) {

        preg_match_all('/(\d+ [a-z]+)/', $time, $matches);
        $matches = $matches[0];
        $formats = [];
        foreach ($matches as $format) {
            preg_match('/(\d+)\s?([a-z]+)/', $format, $f);
            $time = $f[1];
            $type = $f[2];
            $formats[$type] = $time;
        }
        $output = [
            'years' => 0,
            'months' => 0,
            'days' => 0,
            'hours' => 0,
            'minutes' => 0,
            'seconds' => 0,
        ];
        foreach ($formats as $format => $time) {
            if ($time == 0) {
                continue;
            }
            switch ($format) {
                case 'year':
                case 'years':
                    $output['years'] = $time * 12 * 30 * 24 * 60 * 60;
                    break;
                case 'month':
                case 'months':
                    $output['months'] = $time * 30 * 24 * 60 * 60;
                    break;
                case 'day':
                case 'days':
                    $output['days'] = $time * 24 * 60 * 60;
                    break;
                case 'hour':
                case 'hours':
                    $output['hours'] = $time * 60 * 60;
                    break;
                case 'minute':
                case 'minutes':
                    $output['minutes'] = $time * 60;
                    break;
                case 'second':
                case 'seconds':
                    $output['seconds'] = $time;
                    break;
            }
        }
        return $output['years'] + $output['months'] + $output['days'] + $output['hours'] + $output['minutes'] + $output['seconds'];
    }

}
