@php
    $colors = [
        'A' => '#087311',
        'B' => '#20B31B',
        'C' => '#FFE600',
        'D' => '#F77205',
        'E' => '#E80707',
    ];
    $bgColor = $colors[$grade->name] ?? '#ccc';

    $sizes = [
        'small' => [
            'padding' => '6px',
            'font' => '1.8rem',
            'icon' => '0.3rem',
            'border' => '1px',
            'barHeight' => '8px',
            'inner-radius' => '5px'
        ],
        'medium' => [
            'padding' => '10px',
            'font' => '3rem',
            'icon' => '0.5rem',
            'border' => '2px',
            'barHeight' => '10px',
            'inner-radius' => '12px'
        ],
        'large' => [
            'padding' => '14px',
            'font' => '6rem',
            'icon' => '1rem',
            'border' => '3px',
            'barHeight' => '12px',
            'inner-radius' => '20px'
        ]
    ];

    $style = $sizes[$size] ?? $sizes['medium'];
@endphp

<div style="border: {{ $style['border'] }} solid {{ $bgColor }}; padding: {{ $style['padding'] }}; border-radius: {{ $style['inner-radius'] }}; margin-top: 3px;">
    <div style="font-size: {{ $style['icon'] }}; margin: 0; display: flex ; align-items: center; font-weight: bolder; color: #461082; margin-bottom: 4px">
        <span class="bi bi-check" style="background: #461082; color: #ffffff; margin-right: 4px; line-height: 1.2; border-radius: 5px;"></span>
        <span style="line-height: 1;">Comparek <br>Score</span>
    </div>
    <div style="background: {{ $bgColor }}; color: #fff; padding: 4px; font-size: large; font-weight: bolder; border-radius: {{ $style['inner-radius'] .' '. $style['inner-radius']}} 0px 0px;">
        <p style="font-size: {{ $style['font'] }}; text-align: center; line-height: 0.9; margin: 0">{{ $grade->name }}</p>
    </div>
    <div style="margin: 0; display: flex;">
        <span style="background: #087311; width: 20%; height: {{ $style['barHeight'] }}; display: inline-block; border-radius: 0 0 0 1vw;"></span>
        <span style="background: #20B31B; width: 20%; height: {{ $style['barHeight'] }}; display: inline-block;"></span>
        <span style="background: #FFE600; width: 20%; height: {{ $style['barHeight'] }}; display: inline-block;"></span>
        <span style="background: #F77205; width: 20%; height: {{ $style['barHeight'] }}; display: inline-block;"></span>
        <span style="background: #E80707; width: 20%; height: {{ $style['barHeight'] }}; display: inline-block; border-radius: 0 0 1vw 0;"></span>
    </div>
</div>
