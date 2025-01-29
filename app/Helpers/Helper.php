<?php

/**
 * side bar active links
 */

if (!function_exists(function: 'setOpened')) {
    function setOpened(array $routes)
    {
        if (is_array($routes)) {
            foreach ($routes as $route) {
                if (request()->routeIs($route)) {
                    return 'open';
                }
            }
        }
    }
}

/**
 * sidebar active links
 *  */

if (!function_exists(function: 'setActive')) {
    function setActive(string $route, string $except = null)
    {
        // Check if the current route matches the given route and the exception is null
        if (request()->routeIs($route) && $except == null) {
            return 'active';
        }

        // Check if the current route matches the given route and the exception does not match
        if ($except !== null && request()->routeIs($route) && !request()->routeIs($except)) {
            return 'active';
        }

        return ''; // Return an empty string if no conditions are met
    }
}

/**
 * morroco bank agencies
 */

if (!function_exists("moroccoBankAgencies")) {
    function moroccoBankAgencies()
    {
        $bankAgencies = [
            'BMCE Bank' => 'BMCE Bank',
            'Attijariwafa Bank' => 'Attijariwafa Bank',
            'Banque Populaire' => 'Banque Populaire',
            'CIH Bank' => 'CIH Bank',
            'Crédit du Maroc' => 'Crédit du Maroc',
            'Bank of Africa (BOA)' => 'Bank of Africa (BOA)',
            'Société Générale Maroc' => 'Société Générale Maroc',
            'Al Barid Bank' => 'Al Barid Bank',
            'CDG Capital' => 'CDG Capital',
            'UMNIA Bank' => 'UMNIA Bank',
            'Bank Assafa' => 'Bank Assafa',
            'WafaCash' => 'WafaCash',
            'Poste Maroc'=> "Al Barid Bank",
        ];

        return $bankAgencies;
    }
}


/**
 * pilitical parties list
 */

if (!function_exists("political_parties")) {
    function political_parties()
    {
        return [
            1 => 'حزب العدالة والتنمية',
            2 => 'حزب الأصالة والمعاصرة',
            3 => 'حزب الاستقلال',
            4 => 'حزب الاتحاد الاشتراكي للقوات الشعبية',
            5 => 'حزب الحركة الشعبية',
            6 => 'حزب الاتحاد الدستوري',
            7 => 'حزب التقدم والاشتراكية',
            8 => 'حزب التجمع الوطني للأحرار',
            9 => 'الحزب الاشتراكي الموحد',
            10 => 'حزب الديمقراطية العمالية',
            11 => 'حزب البيئة والتنمية المستدامة',
            12 => 'حزب الحركة الوطنية للإصلاح والتنمية',
            13 => 'حزب الديمقراطيين الجدد'
        ];
    }
}
