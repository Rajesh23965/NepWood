<?php

if (!function_exists('convertToNepaliNumerals')) {
    function convertToNepaliNumerals($numbers): string
    {
        $englishNumerals = range(0, 9);
        $nepaliNumerals = ['०', '१', '२', '३', '४', '५', '६', '७', '८', '९'];

        return str_replace($englishNumerals, $nepaliNumerals, $numbers);
    }
}