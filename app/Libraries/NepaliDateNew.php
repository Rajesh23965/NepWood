<?php

namespace App\Libraries;

include_once APPPATH . 'Libraries/NepaliCalender.php';

class NepaliDateNew
{

    protected $nepaliCalender;

    public function __construct()
    {
        $this->nepaliCalender = new \NepaliCalender(); // Ensure the correct namespace is used
    }

    public function getNepaliDate($date)
    {
        $ndate = $this->nepaliCalender->eng_to_nep($date);
        $ndate = $this->getNepaliNumber($ndate['year']) . ' ' . ($ndate['nmonth_in_nepali']) . ' ' . ($ndate['date_in_nepali'] . ' गते , ' . $ndate['nday_in_nepali']);

        return $ndate;
    }

    public function getNepaliNumber($str)
    {
        $find = array('0', '1', '2', '3', '4', '5', '6', '7', '8', '9');
        $replace = array('०', '१', '२', '३', '४', '५', '६', '७', '८', '९');
        return str_replace($find, $replace, $str);
    }

    public function getEnglishDate($date)
    {

        $currentBsDate = implode(',', $date);
        list($year, $month, $day) = explode('-', $currentBsDate);
        $edate = $this->nepaliCalender->nep_to_eng($year, $month, $day); // Ensure the correct instance is used
        $date = $edate['year'] . '-' . $edate['month'] . '-' . $edate['date'];
        return $date;
    }

    public function getNepaliDateInEnglishFont($englishDate)
    {
        $ndate = $this->nepaliCalender->eng_to_nep($englishDate);
        $ndate = $ndate['year'] . '-' . sprintf('%02d', $ndate['month']) . '-' . sprintf('%02d', $ndate['date']);
        return $ndate;
    }
}