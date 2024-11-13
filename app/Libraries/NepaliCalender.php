<?php

class NepaliCalender {

    private static $instance;

    public static function getInstance() {
        if (is_null(self::$instance)) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    // Data for nepali date
    private $_bs = array(
        0 => array(2000, 30, 32, 31, 32, 31, 30, 30, 30, 29, 30, 29, 31),
        1 => array(2001, 31, 31, 32, 31, 31, 31, 30, 29, 30, 29, 30, 30),
        2 => array(2002, 31, 31, 32, 32, 31, 30, 30, 29, 30, 29, 30, 30),
        3 => array(2003, 31, 32, 31, 32, 31, 30, 30, 30, 29, 29, 30, 31),
        4 => array(2004, 30, 32, 31, 32, 31, 30, 30, 30, 29, 30, 29, 31),
        5 => array(2005, 31, 31, 32, 31, 31, 31, 30, 29, 30, 29, 30, 30),
        6 => array(2006, 31, 31, 32, 32, 31, 30, 30, 29, 30, 29, 30, 30),
        7 => array(2007, 31, 32, 31, 32, 31, 30, 30, 30, 29, 29, 30, 31),
        8 => array(2008, 31, 31, 31, 32, 31, 31, 29, 30, 30, 29, 29, 31),
        9 => array(2009, 31, 31, 32, 31, 31, 31, 30, 29, 30, 29, 30, 30),
        10 => array(2010, 31, 31, 32, 32, 31, 30, 30, 29, 30, 29, 30, 30),
        11 => array(2011, 31, 32, 31, 32, 31, 30, 30, 30, 29, 29, 30, 31),
        12 => array(2012, 31, 31, 31, 32, 31, 31, 29, 30, 30, 29, 30, 30),
        13 => array(2013, 31, 31, 32, 31, 31, 31, 30, 29, 30, 29, 30, 30),
        14 => array(2014, 31, 31, 32, 32, 31, 30, 30, 29, 30, 29, 30, 30),
        15 => array(2015, 31, 32, 31, 32, 31, 30, 30, 30, 29, 29, 30, 31),
        16 => array(2016, 31, 31, 31, 32, 31, 31, 29, 30, 30, 29, 30, 30),
        17 => array(2017, 31, 31, 32, 31, 31, 31, 30, 29, 30, 29, 30, 30),
        18 => array(2018, 31, 32, 31, 32, 31, 30, 30, 29, 30, 29, 30, 30),
        19 => array(2019, 31, 32, 31, 32, 31, 30, 30, 30, 29, 30, 29, 31),
        20 => array(2020, 31, 31, 31, 32, 31, 31, 30, 29, 30, 29, 30, 30),
        21 => array(2021, 31, 31, 32, 31, 31, 31, 30, 29, 30, 29, 30, 30),
        22 => array(2022, 31, 32, 31, 32, 31, 30, 30, 30, 29, 29, 30, 30),
        23 => array(2023, 31, 32, 31, 32, 31, 30, 30, 30, 29, 30, 29, 31),
        24 => array(2024, 31, 31, 31, 32, 31, 31, 30, 29, 30, 29, 30, 30),
        25 => array(2025, 31, 31, 32, 31, 31, 31, 30, 29, 30, 29, 30, 30),
        26 => array(2026, 31, 32, 31, 32, 31, 30, 30, 30, 29, 29, 30, 31),
        27 => array(2027, 30, 32, 31, 32, 31, 30, 30, 30, 29, 30, 29, 31),
        28 => array(2028, 31, 31, 32, 31, 31, 31, 30, 29, 30, 29, 30, 30),
        29 => array(2029, 31, 31, 32, 31, 32, 30, 30, 29, 30, 29, 30, 30),
        30 => array(2030, 31, 32, 31, 32, 31, 30, 30, 30, 29, 29, 30, 31),
        31 => array(2031, 30, 32, 31, 32, 31, 30, 30, 30, 29, 30, 29, 31),
        32 => array(2032, 31, 31, 32, 31, 31, 31, 30, 29, 30, 29, 30, 30),
        33 => array(2033, 31, 31, 32, 32, 31, 30, 30, 29, 30, 29, 30, 30),
        34 => array(2034, 31, 32, 31, 32, 31, 30, 30, 30, 29, 29, 30, 31),
        35 => array(2035, 30, 32, 31, 32, 31, 31, 29, 30, 30, 29, 29, 31),
        36 => array(2036, 31, 31, 32, 31, 31, 31, 30, 29, 30, 29, 30, 30),
        37 => array(2037, 31, 31, 32, 32, 31, 30, 30, 29, 30, 29, 30, 30),
        38 => array(2038, 31, 32, 31, 32, 31, 30, 30, 30, 29, 29, 30, 31),
        39 => array(2039, 31, 31, 31, 32, 31, 31, 29, 30, 30, 29, 30, 30),
        40 => array(2040, 31, 31, 32, 31, 31, 31, 30, 29, 30, 29, 30, 30),
        41 => array(2041, 31, 31, 32, 32, 31, 30, 30, 29, 30, 29, 30, 30),
        42 => array(2042, 31, 32, 31, 32, 31, 30, 30, 30, 29, 29, 30, 31),
        43 => array(2043, 31, 31, 31, 32, 31, 31, 29, 30, 30, 29, 30, 30),
        44 => array(2044, 31, 31, 32, 31, 31, 31, 30, 29, 30, 29, 30, 30),
        45 => array(2045, 31, 32, 31, 32, 31, 30, 30, 29, 30, 29, 30, 30),
        46 => array(2046, 31, 32, 31, 32, 31, 30, 30, 30, 29, 29, 30, 31),
        47 => array(2047, 31, 31, 31, 32, 31, 31, 30, 29, 30, 29, 30, 30),
        48 => array(2048, 31, 31, 32, 31, 31, 31, 30, 29, 30, 29, 30, 30),
        49 => array(2049, 31, 32, 31, 32, 31, 30, 30, 30, 29, 29, 30, 30),
        50 => array(2050, 31, 32, 31, 32, 31, 30, 30, 30, 29, 30, 29, 31),
        51 => array(2051, 31, 31, 31, 32, 31, 31, 30, 29, 30, 29, 30, 30),
        52 => array(2052, 31, 31, 32, 31, 31, 31, 30, 29, 30, 29, 30, 30),
        53 => array(2053, 31, 32, 31, 32, 31, 30, 30, 30, 29, 29, 30, 30),
        54 => array(2054, 31, 32, 31, 32, 31, 30, 30, 30, 29, 30, 29, 31),
        55 => array(2055, 31, 31, 32, 31, 31, 31, 30, 29, 30, 29, 30, 30),
        56 => array(2056, 31, 31, 32, 31, 32, 30, 30, 29, 30, 29, 30, 30),
        57 => array(2057, 31, 32, 31, 32, 31, 30, 30, 30, 29, 29, 30, 31),
        58 => array(2058, 30, 32, 31, 32, 31, 30, 30, 30, 29, 30, 29, 31),
        59 => array(2059, 31, 31, 32, 31, 31, 31, 30, 29, 30, 29, 30, 30),
        60 => array(2060, 31, 31, 32, 32, 31, 30, 30, 29, 30, 29, 30, 30),
        61 => array(2061, 31, 32, 31, 32, 31, 30, 30, 30, 29, 29, 30, 31),
        62 => array(2062, 30, 32, 31, 32, 31, 31, 29, 30, 29, 30, 29, 31),
        63 => array(2063, 31, 31, 32, 31, 31, 31, 30, 29, 30, 29, 30, 30),
        64 => array(2064, 31, 31, 32, 32, 31, 30, 30, 29, 30, 29, 30, 30),
        65 => array(2065, 31, 32, 31, 32, 31, 30, 30, 30, 29, 29, 30, 31),
        66 => array(2066, 31, 31, 31, 32, 31, 31, 29, 30, 30, 29, 29, 31),
        67 => array(2067, 31, 31, 32, 31, 31, 31, 30, 29, 30, 29, 30, 30),
        68 => array(2068, 31, 31, 32, 32, 31, 30, 30, 29, 30, 29, 30, 30),
        69 => array(2069, 31, 32, 31, 32, 31, 30, 30, 30, 29, 29, 30, 31),
        70 => array(2070, 31, 31, 31, 32, 31, 31, 29, 30, 30, 29, 30, 30),
        71 => array(2071, 31, 31, 32, 31, 31, 31, 30, 29, 30, 29, 30, 30),
        72 => array(2072, 31, 32, 31, 32, 31, 30, 30, 29, 30, 29, 30, 30),
        73 => array(2073, 31, 32, 31, 32, 31, 30, 30, 30, 29, 29, 30, 31),
        74 => array(2074, 31, 31, 31, 32, 31, 31, 30, 29, 30, 29, 30, 30),
        75 => array(2075, 31, 31, 32, 31, 31, 31, 30, 29, 30, 29, 30, 30),
        76 => array(2076, 31, 32, 31, 32, 31, 30, 30, 30, 29, 29, 30, 30),
        77 => array(2077, 31, 32, 31, 32, 31, 30, 30, 30, 29, 30, 29, 31),
        78 => array(2078, 31, 31, 31, 32, 31, 31, 30, 29, 30, 29, 30, 30),
        79 => array(2079, 31, 31, 32, 31, 31, 31, 30, 29, 30, 29, 30, 30),
        80 => array(2080, 31, 32, 31, 32, 31, 30, 30, 30, 29, 29, 30, 30),
        81 => array(2081, 31, 32, 31, 32, 31, 30, 30, 30, 29, 30, 29, 31),//corrected this line
        82 => array(2082, 30, 32, 31, 32, 31, 30, 30, 30, 29, 30, 30, 30),
        83 => array(2083, 31, 31, 32, 31, 31, 30, 30, 30, 29, 30, 30, 30),
        84 => array(2084, 31, 31, 32, 31, 31, 30, 30, 30, 29, 30, 30, 30),
        85 => array(2085, 31, 32, 31, 32, 30, 31, 30, 30, 29, 30, 30, 30),
        86 => array(2086, 30, 32, 31, 32, 31, 30, 30, 30, 29, 30, 30, 30),
        87 => array(2087, 31, 31, 32, 31, 31, 31, 30, 30, 29, 30, 30, 30),
        88 => array(2088, 30, 31, 32, 32, 30, 31, 30, 30, 29, 30, 30, 30),
        89 => array(2089, 30, 32, 31, 32, 31, 30, 30, 30, 29, 30, 30, 30),
        90 => array(2090, 30, 32, 31, 32, 31, 30, 30, 30, 29, 30, 30, 30)
    );
    private $_nep_date = array('year' => '', 'month' => '', 'date' => '', 'day' => '', 'nmonth' => '', 'num_day' => '');
    private $_eng_date = array('year' => '', 'month' => '', 'date' => '', 'day' => '', 'emonth' => '', 'num_day' => '');
    public $debug_info = "";

    /**
     * Return day
     *
     * @param int $day
     * @return string
     */
    private function _get_nepali_day_of_week($day) {
        switch ($day) {
            case 1:
                $day = "&#2310;&#2311;&#2340;&#2348;&#2366;&#2352;";
                break;

            case 2:
                $day = "&#2360;&#2379;&#2350;&#2348;&#2366;&#2352;";
                break;

            case 3:
                $day = "&#2350;&#2306;&#2327;&#2354;&#2348;&#2366;&#2352;";
                break;

            case 4:
                $day = "&#2348;&#2369;&#2343;&#2348;&#2366;&#2352;";
                break;

            case 5:
                $day = "&#2348;&#2367;&#2361;&#2368;&#2348;&#2366;&#2352;";
                break;

            case 6:
                $day = "&#2358;&#2369;&#2325;&#2381;&#2352;&#2348;&#2366;&#2352;";
                break;

            case 7:
                $day = "&#2358;&#2344;&#2367;&#2348;&#2366;&#2352;";
                break;
        }
        return $day;
    }

    private function _get_day_of_week($day) {
        switch ($day) {
            case 1:
                $day = "Sunday";
                break;

            case 2:
                $day = "Monday";
                break;

            case 3:
                $day = "Tuesday";
                break;

            case 4:
                $day = "Wednesday";
                break;

            case 5:
                $day = "Thursday";
                break;

            case 6:
                $day = "Friday";
                break;

            case 7:
                $day = "Saturday";
                break;
        }
        return $day;
    }

    /**
     * Return english month name
     *
     * @param int $m
     * @return string
     */
    private function _get_english_month($m) {
        $eMonth = FALSE;
        switch ($m) {
            case 1:
                $eMonth = "January";
                break;
            case 2:
                $eMonth = "February";
                break;
            case 3:
                $eMonth = "March";
                break;
            case 4:
                $eMonth = "April";
                break;
            case 5:
                $eMonth = "May";
                break;
            case 6:
                $eMonth = "June";
                break;
            case 7:
                $eMonth = "July";
                break;
            case 8:
                $eMonth = "August";
                break;
            case 9:
                $eMonth = "September";
                break;
            case 10:
                $eMonth = "October";
                break;
            case 11:
                $eMonth = "November";
                break;
            case 12:
                $eMonth = "December";
        }
        return $eMonth;
    }

    /**
     * Return nepali month name
     *
     * @param int $m
     * @return string
     */
    private function _get_nepali_month($m) {
        $n_month = FALSE;

        switch ($m) {
            case 1:
                $n_month = "Baishak";
                break;

            case 2:
                $n_month = "Jestha";
                break;

            case 3:
                $n_month = "Ashad";
                break;

            case 4:
                $n_month = "Shrawn";
                break;

            case 5:
                $n_month = "Bhadra";
                break;

            case 6:
                $n_month = "Ashwin";
                break;

            case 7:
                $n_month = "kartik";
                break;

            case 8:
                $n_month = "Mangshir";
                break;

            case 9:
                $n_month = "Poush";
                break;

            case 10:
                $n_month = "Magh";
                break;

            case 11:
                $n_month = "Falgun";
                break;

            case 12:
                $n_month = "Chaitra";
                break;
        }
        return $n_month;
    }

    public function _get_nepali_month_in_nepali($m) {
        $n_month = FALSE;

        switch ($m) {
            case 1:
                $n_month = "&#2357;&#2376;&#2358;&#2366;&#2326;";
                break;

            case 2:
                $n_month = "&#2332;&#2375;&#2359;&#2381;&#2336;";
                break;

            case 3:
                $n_month = "&#2309;&#2360;&#2366;&#2352;";
                break;

            case 4:
                $n_month = "&#2358;&#2381;&#2352;&#2366;&#2357;&#2339;";
                break;

            case 5:
                $n_month = "&#2349;&#2366;&#2342;&#2381;&#2352;";
                break;

            case 6:
                $n_month = "&#2310;&#2358;&#2381;&#2357;&#2367;&#2344;";
                break;

            case 7:
                $n_month = "&#2325;&#2366;&#2352;&#2381;&#2340;&#2367;&#2325;";
                break;

            case 8:
                $n_month = "&#2350;&#2306;&#2360;&#2367;&#2352;";
                break;

            case 9:
                $n_month = "&#2346;&#2369;&#2360;";
                break;

            case 10:
                $n_month = "&#2350;&#2366;&#2328;";
                break;

            case 11:
                $n_month = "&#2347;&#2366;&#2354;&#2381;&#2327;&#2369;&#2344;";
                break;

            case 12:
                $n_month = "&#2330;&#2376;&#2340;&#2381;&#2352;";
                break;
        }
        return $n_month;
    }

    /**
     * Check if date range is in english
     *
     * @param int $yy
     * @param int $mm
     * @param int $dd
     * @return bool
     */
    private function _is_in_range_eng($yy, $mm, $dd) {
        if ($yy < 1944 || $yy > 2033) {
            return 'Supported only between 1944-2022';
        }

        if ($mm < 1 || $mm > 12) {
            return 'Error! month value can be between 1-12 only';
        }

        if ($dd < 1 || $dd > 31) {
            return 'Error! day value can be between 1-31 only';
        }

        return TRUE;
    }

    /**
     * Check if date is with in nepali data range
     *
     * @param int $yy
     * @param int $mm
     * @param int $dd
     * @return bool
     */
    private function _is_in_range_nep($yy, $mm, $dd) {
        if ($yy < 2000 || $yy > 2089) {
            return 'Supported only between 2000-2089';
        }

        if ($mm < 1 || $mm > 12) {
            return 'Error! month value can be between 1-12 only';
        }

        if ($dd < 1 || $dd > 32) {
            return 'Error! day value can be between 1-31 only';
        }

        return TRUE;
    }

    /**
     * Calculates wheather english year is leap year or not
     *
     * @param int $year
     * @return bool
     */
    public function is_leap_year($year) {
        $a = $year;
        if ($a % 100 == 0) {
            if ($a % 400 == 0) {
                return TRUE;
            } else {
                return FALSE;
            }
        } else {
            if ($a % 4 == 0) {
                return TRUE;
            } else {
                return FALSE;
            }
        }
    }

    /**
     * currently can only calculate the date between AD 1944-2033...
     *
     * @param int $yy
     * @param int $mm
     * @param int $dd
     * @return array
     */
    public function eng_to_nep($date) {
        $date = strtotime($date);
        $yy = date('Y',$date);
        $mm = date('m',$date);
        $dd = date('d',$date);
        
        // Check for date range
        $chk = $this->_is_in_range_eng($yy, $mm, $dd);

        if ($chk !== TRUE) {
            die($chk);
        } else {
            // Month data.
            $month = array(31, 28, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31);

            // Month for leap year
            $lmonth = array(31, 29, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31);

            $def_eyy = 1944; // initial english date.
            $def_nyy = 2000;
            $def_nmm = 9;
            $def_ndd = 17 - 1; // inital nepali date.
            $total_eDays = 0;
            $total_nDays = 0;
            $a = 0;
            $day = 7 - 1;
            $m = 0;
            $y = 0;
            $i = 0;
            $j = 0;
            $numDay = 0;

            // Count total no. of days in-terms year
            for ($i = 0; $i < ($yy - $def_eyy); $i++) { //total days for month calculation...(english)
                if ($this->is_leap_year($def_eyy + $i) === TRUE) {
                    for ($j = 0; $j < 12; $j++) {
                        $total_eDays += $lmonth[$j];
                    }
                } else {
                    for ($j = 0; $j < 12; $j++) {
                        $total_eDays += $month[$j];
                    }
                }
            }

            // Count total no. of days in-terms of month
            for ($i = 0; $i < ($mm - 1); $i++) {
                if ($this->is_leap_year($yy) === TRUE) {
                    $total_eDays += $lmonth[$i];
                } else {
                    $total_eDays += $month[$i];
                }
            }

            // Count total no. of days in-terms of date
            $total_eDays += $dd;


            $i = 0;
            $j = $def_nmm;
            $total_nDays = $def_ndd;
            $m = $def_nmm;
            $y = $def_nyy;

            // Count nepali date from array
            while ($total_eDays != 0) {
                $a = $this->_bs[$i][$j];

                $total_nDays++;  //count the days
                $day++;    //count the days interms of 7 days

                if ($total_nDays > $a) {
                    $m++;
                    $total_nDays = 1;
                    $j++;
                }

                if ($day > 7) {
                    $day = 1;
                }

                if ($m > 12) {
                    $y++;
                    $m = 1;
                }

                if ($j > 12) {
                    $j = 1;
                    $i++;
                }

                $total_eDays--;
            }

            $numDay = $day;

            $this->_nep_date['year'] = $y;
            $this->_nep_date['month'] = $m;
            $this->_nep_date['date'] = $total_nDays;
            $this->_nep_date['date_in_nepali'] = $this->getNepaliLetterOfDate($total_nDays);
            $this->_nep_date['nday_in_english'] = $this->_get_nepali_day_of_week($day);
            $this->_nep_date['nday_in_nepali'] = $this->_get_nepali_day_of_week($day);
            $this->_nep_date['eday'] = $this->_get_day_of_week($day);
            $this->_nep_date['nmonth_in_english'] = $this->_get_nepali_month($m);
            $this->_nep_date['nmonth_in_nepali'] = $this->_get_nepali_month_in_nepali($m);
            $this->_nep_date['num_day'] = $numDay;
            $this->_nep_date['num_day'] = $numDay;

            return $this->_nep_date;
        }
    }
    function getNepaliLetterOfDate($string){
        $letterArray = str_split($string);
        $arrayDay = array('0'=>'&#2406;',
                       '1'=>'&#2407;',
                       '2'=>'&#2408;',
                       '3'=>'&#2409;',
                       '4'=>'&#2410;',
                       '5'=>'&#2411;',
                       '6'=>'&#2412;',
                       '7'=>'&#2413;',
                       '8'=>'&#2414;',
                       '9'=>'&#2415;');
        $strNepaliDate="";
        foreach($letterArray as $letter){
            $strNepaliDate .= $arrayDay[$letter];
        }
        return $strNepaliDate;
    }

    /**
     * Currently can only calculate the date between BS 2000-2089
     *
     * @param int $yy
     * @param int $mm
     * @param int $dd
     * @return array
     */
    public function nep_to_eng($yy, $mm, $dd) {
        $def_eyy = 1943;
        $def_emm = 4;
        $def_edd = 14 - 1; // initial english date.
        $def_nyy = 2000;
        $def_nmm = 1;
        $def_ndd = 1;  // iniital equivalent nepali date.
        $total_eDays = 0;
        $total_nDays = 0;
        $a = 0;
        $day = 4 - 1;
        $m = 0;
        $y = 0;
        $i = 0;
        $k = 0;
        $numDay = 0;

        $month = array(
            0,
            31,
            28,
            31,
            30,
            31,
            30,
            31,
            31,
            30,
            31,
            30,
            31
        );
        $lmonth = array(
            0,
            31,
            29,
            31,
            30,
            31,
            30,
            31,
            31,
            30,
            31,
            30,
            31
        );

        // Check for date range
        $chk = $this->_is_in_range_nep($yy, $mm, $dd);

        if ($chk !== TRUE) {
            die($chk);
        } else {
            // Count total days in-terms of year
            for ($i = 0; $i < ($yy - $def_nyy); $i++) {
                for ($j = 1; $j <= 12; $j++) {
                    $total_nDays += $this->_bs[$k][$j];
                }
                $k++;
            }

            // Count total days in-terms of month
            for ($j = 1; $j < $mm; $j++) {
                $total_nDays += $this->_bs[$k][$j];
            }

            // Count total days in-terms of dat
            $total_nDays += $dd;

            // Calculation of equivalent english date...
            $total_eDays = $def_edd;
            $m = $def_emm;
            $y = $def_eyy;
            while ($total_nDays != 0) {
                if ($this->is_leap_year($y)) {
                    $a = $lmonth[$m];
                } else {
                    $a = $month[$m];
                }

                $total_eDays++;
                $day++;

                if ($total_eDays > $a) {
                    $m++;
                    $total_eDays = 1;
                    if ($m > 12) {
                        $y++;
                        $m = 1;
                    }
                }

                if ($day > 7) {
                    $day = 1;
                }

                $total_nDays--;
            }

            $numDay = $day;

            $this->_eng_date['year'] = $y;
            $this->_eng_date['month'] = $m;
            $this->_eng_date['date'] = $total_eDays;
            $this->_eng_date['day'] = $this->_get_nepali_day_of_week($day);
            $this->_eng_date['nmonth'] = $this->_get_english_month($m);
            $this->_eng_date['num_day'] = $numDay;

            return $this->_eng_date;
        }
    }
	
	
	/* added for Calendar by Ritesh*/
	/* _get_nepali_month_in_nepali() function made public instead of private*/
	
	public function daysinmonth($year){

        /* returns the number of days of the month of the respective year and month */

        if($year =='2070'){
        $days_in_month = array(0, 31, 31, 31, 32, 31, 31, 29, 30, 30, 29, 30, 30);
        }else if($year=='2071'){
        $days_in_month = array(0, 31, 31, 32, 31, 31, 31, 30, 29, 30, 29, 30, 30);
        }else if($year=='2072'){
        $days_in_month = array(0, 31, 32, 31, 32, 31, 30, 30, 29, 30, 29, 30, 30);
        }else if($year=='2073'){
        $days_in_month = array(0, 31, 32, 31, 32, 31, 30, 30, 30, 29, 29, 30, 31);
        }else if($year=='2074'){
        $days_in_month = array(0, 31, 31, 31, 32, 31, 31, 30, 29, 30, 29, 30, 30);
        }else if($year=='2075'){
        $days_in_month = array(0, 31, 31, 32, 31, 31, 31, 30, 29, 30, 29, 30, 30);
        }
        else if($year=='2076'){
        $days_in_month = array(0, 31, 32, 31, 32, 31, 30, 30, 30, 29, 29, 30, 30);
        }else
        {
            $days_in_month = array(0, 31, 32, 31, 32, 31, 30, 30, 30, 29, 29, 30, 30);
            //
        }
		return $days_in_month;
    }
	public function startdate($year){

        /* returns the start DAY of the month of the respective year and month */        
        if($year =='2070'){
        $firstday = array(0,0,3,6,2,6,2,5,6,1,3,4,6);
        }else if($year=='2071'){
        $firstday = array(0,1,4,0,4,0,3,6,1,2,4,5,0);
        }else if($year=='2072'){
        $firstday = array(0,2,5,2,5,2,5,0,2,3,5,6,1);
        }else if($year=='2073'){
        $firstday = array(0,3,6,3,6,3,6,1,3,5,6,0,2);
        }else if($year=='2074'){
        $firstday = array(0,5,1,4,0,4,0,3,5,6,1,2,4);
        }else if($year=='2075'){
        $firstday = array(0,6,2,5,2,5,1,4,6,0,2,3,5);
        }   
        else if($year=='2076'){
        $firstday = array(0,0,3,0,3,0,3,5,0,2,3,4,6);
        }
        else if($year=='2077'){
        $firstday = array(0,1,4,1,4,1,4,6,1,3,4,6,0);
        }else if($year=='2078'){
        $firstday = array(0,3,6,2,5,2,5,1,3,4,6,0,2);
        }
        else{
           $firstday = array(0,0,3,0,3,0,3,5,0,2,3,4,6);
           //temp
        }
       

    return $firstday;
    }
	
	 public function get_relative_english_months($month){

        switch ($month) {
            case 1:
                $n_month = "Apr/May";
                break;

            case 2:
                $n_month = "May/Jun";
                break;

            case 3:
                $n_month = "Jun/Jul";
                break;

            case 4:
                $n_month = "Jul/Aug";
                break;

            case 5:
                $n_month = "Aug/Sep";
                break;

            case 6:
                $n_month = "Sep/Oct";
                break;

            case 7:
                $n_month = "Oct/Nov";
                break;

            case 8:
                $n_month = "Nov/Dec";
                break;

            case 9:
                $n_month = "Dec/Jan";
                break;

            case 10:
                $n_month = "Jan/Feb";
                break;

            case 11:
                $n_month = "Feb/Mar";
                break;

            case 12:
                $n_month = "Mar/Apr";
                break;
        }
        return $n_month;

    }
	public function _get_short_nepali_day_of_week($day) {
        switch ($day) {
            case 1:
                $day = "&#2310;&#2311;&#2340;";
                break;

            case 2:
                $day = "&#2360;&#2379;&#2350;";
                break;

            case 3:
                $day = "&#2350;&#2306;&#2327;&#2354;";
                break;

            case 4:
                $day = "&#2348;&#2369;&#2343;";
                break;

            case 5:
                $day = "&#2348;&#2367;&#2361;&#2368;";
                break;

            case 6:
                $day = "&#2358;&#2369;&#2325;&#2381;&#2352;";
                break;

            case 7:
                $day = "&#2358;&#2344;&#2367;";
                break;
        }
        return $day;
    }
	
	public function readable_date($date){
        $new_date = explode('-', $date);
        $year = $new_date[0];
        $month = $new_date[1];
        $day = $new_date[2];

        $nep_month = $this->_get_nepali_month_in_nepali($month);
        
        $nep_day = $this->getNepaliLetterOfDate($day);
        $nep_year = $this->getNepaliLetterOfDate($year);
    
        $final_date = $nep_month." ".$nep_day;

        return $final_date;

    }


}