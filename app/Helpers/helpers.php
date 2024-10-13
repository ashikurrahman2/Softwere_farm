<?php

if (!function_exists('convertToBanglaDate')) {
    function convertToBanglaDate($date)
    {
        $english = ['0', '1', '2', '3', '4', '5', '6', '7', '8', '9'];
        $bangla = ['০', '১', '২', '৩', '৪', '৫', '৬', '৭', '৮', '৯'];
        
        $months = [
            'January' => 'জানুয়ারি', 'February' => 'ফেব্রুয়ারি', 'March' => 'মার্চ',
            'April' => 'এপ্রিল', 'May' => 'মে', 'June' => 'জুন',
            'July' => 'জুলাই', 'August' => 'অগাস্ট', 'September' => 'সেপ্টেম্বর',
            'October' => 'অক্টোবর', 'November' => 'নভেম্বর', 'December' => 'ডিসেম্বর'
        ];

        $formattedDate = \Carbon\Carbon::parse($date)->format('d F Y');

        $formattedDate = str_replace(array_keys($months), $months, $formattedDate);
        $formattedDate = str_replace($english, $bangla, $formattedDate);

        return $formattedDate;
    }
}
