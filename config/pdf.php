<?php

return [
    'mode'                     => '',
    'format'                   => 'A4',
    'default_font_size'        => '12',
    'default_font'             => 'cairo',
    'margin_left'              => 10,
    'margin_right'             => 10,
    'margin_top'               => 10,
    'margin_bottom'            => 10,
    'margin_header'            => 0,
    'margin_footer'            => 0,
    'orientation'              => 'P',
    'title'                    => 'Laravel mPDF',
    'subject'                  => '',
    'author'                   => '',
    'watermark'                => '',
    'show_watermark'           => false,
    'show_watermark_image'     => false,
    'watermark_font'           => 'cairo',
    'display_mode'             => 'fullpage',
    'watermark_text_alpha'     => 0.1,
    'watermark_image_path'     => '',
    'watermark_image_alpha'    => 0.2,
    'watermark_image_size'     => 'D',
    'watermark_image_position' => 'P',
    'custom_font_dir'          => public_path("assets/back/fonts/"),
    'custom_font_data'         => [
        'amiri' => [
            'R' => 'amiri/Amiri-Regular.ttf',  // Replace with actual file name if it's different
            'B' => 'amiri/Amiri-Bold.ttf',
            'I' => 'amiri/Amiri-Italic.ttf',
            'BI' => 'amiri/Amiri-BoldItalic.ttf',
        ],
        'inter' => [
            'R'  => 'inter/inter-v18-latin-regular.woff2',  // Regular font
            'B'  => 'inter/inter-v18-latin-700.woff2',      // Bold font
            'BI' => 'inter/inter-v18-latin-800.woff2',      // Bold Italic (if available)
            'I'  => 'inter/inter-v18-latin-600.woff2',      // Italic font
        ],
        'cairo' => [
            'R' => 'cairo/Cairo-Regular.ttf',  // Replace with actual file name if it's different
            'B' => 'cairo/Cairo-Bold.ttf',
            'L' => 'cairo/Cairo-Light.ttf',
            'SB' => 'cairo/Cairo-SemiBold.ttf',
        ],
    ],
    'auto_language_detection'  => true,
    'temp_dir'                 => storage_path('app'),
    'pdfa'                     => false,
    'pdfaauto'                 => false,
    'use_active_forms'         => false,
];
