<?php

namespace App\View\Components;

use Illuminate\View\Component;

class TableGridView extends Component
{
    public $items;
    public $columns;
    public $routePrefix;
    public $title;
    public $createRoute;
    public $showCreateButton;
    public $viewMode;

    public function __construct($items, $columns, $routePrefix, $title, $createRoute = null, $viewMode = "grid")
    {
        $this->items = $items;
        $this->columns = $columns;
        $this->routePrefix = $routePrefix;
        $this->title = $title;
        $this->createRoute = $createRoute;
        $this->showCreateButton = $createRoute !== null;
        $this->viewMode = $viewMode;
    }

    public function render()
    {
        return view('components.table-grid-view');
    }
}
