<?php

namespace App\Livewire;

use App\Models\TelecomOperator;

class TelecomOperatorsTable extends DataTableComponent
{
    const MODEL = TelecomOperator::class;

    public $filters = [
        'name' => '',
        'website_url' => ''
    ];

    protected function query(): \Illuminate\Database\Eloquent\Builder
    {
        return TelecomOperator::query();
    }

    protected function filters(): array
    {
        return [
            'name' => 'text',
            'website_url' => 'text',
        ];
    }

    protected function columns(): array
    {
        return [
            'name' => 'Name',
            'website_url' => 'Website',
            'is_active' => 'Active',
            'created_at' => 'Created',
        ];
    }
}
