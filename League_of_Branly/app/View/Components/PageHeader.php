<?php

namespace App\View\Components;

use Illuminate\View\Component;

class PageHeader extends Component
{
    public $title;
    public $createRoute;
    public $style;

    public function __construct($title, $style, $createRoute)
    {
        $this->title = $title;
        $this->style = $style;
        $this->createRoute = $createRoute;
    }

    public function render()
    {
        return view('components.page-header');
    }
}
