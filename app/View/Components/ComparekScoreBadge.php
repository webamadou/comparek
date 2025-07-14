<?php

namespace App\View\Components;

use App\Enums\ScoreGrade;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ComparekScoreBadge extends Component
{
    public ScoreGrade $grade;
    public string $size;

    /**
     * Create a new component instance.
     */
    public function __construct(ScoreGrade $grade, string $size = 'small')
    {
        $this->grade = $grade;
        $this->size = $size;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.comparek-score-badge');
    }
}
