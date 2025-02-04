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
            'Poste Maroc' => "Al Barid Bank",
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
            'حزب العدالة والتنمية' =>  'حزب العدالة والتنمية',
            'حزب الأصالة والمعاصرة' =>  'حزب الأصالة والمعاصرة',
            'حزب الاستقلال'  => 'حزب الاستقلال',
            'حزب الاتحاد الاشتراكي للقوات الشعبية'  => 'حزب الاتحاد الاشتراكي للقوات الشعبية',
            'حزب الحركة الشعبية' =>  'حزب الحركة الشعبية',
            'حزب الاتحاد الدستوري' =>  'حزب الاتحاد الدستوري',
            'حزب التقدم والاشتراكية' =>  'حزب التقدم والاشتراكية',
            'حزب التجمع الوطني للأحرار'  => 'حزب التجمع الوطني للأحرار',
            'الحزب الاشتراكي الموحد' =>  'الحزب الاشتراكي الموحد',
            'حزب الديمقراطية العمالية'  => 'حزب الديمقراطية العمالية',
            'حزب البيئة والتنمية المستدامة' =>  'حزب البيئة والتنمية المستدامة',
            'حزب الحركة الوطنية للإصلاح والتنمية'  => 'حزب الحركة الوطنية للإصلاح والتنمية',
            'حزب الديمقراطيين الجدد' => 'حزب الديمقراطيين الجدد'
        ];
    }
}

/**
 * datatablas lang
 **/

if (!function_exists('datatables_lang')) {
    function datatables_lang()
    {
        return [
            'sProcessing' => trans('datatables.sProcessing'),
            'sLengthMenu' => trans('datatables.sLengthMenu'),
            'sZeroRecords' => trans('datatables.sZeroRecords'),
            'sInfo' => trans('datatables.sInfo'),
            'sInfoEmpty' => trans('datatables.sInfoEmpty'),
            'sInfoFiltered' => trans('datatables.sInfoFiltered'),
            'sSearch' => trans('datatables.sSearch'),
            'oPaginate' => [
                'sFirst' => trans('datatables.sFirst'),
                'sLast' => trans('datatables.sLast'),
                'sNext' => trans('datatables.sNext'),
                'sPrevious' => trans('datatables.sPrevious'),
            ],
        ];
    }
}


// status
if (!function_exists('status')) {
    function statues()
    {
        return [
            "enabled" => __('global.enabled'),
            "disabled" => __('global.disabled'),
        ];
    }
}
