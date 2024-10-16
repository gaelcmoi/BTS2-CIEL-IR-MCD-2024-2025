<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Carousel extends Component
{
    public $images;
    public $name;
    public $type;

    /**
     * Create a new component instance.
     */
    public function __construct($name, $type)
    {
        $this->name = $name;
        $this->type = $type;
        $this->images = $this->getImages();
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.carousel');
    }

    private function getImages()
    {
        $path = public_path('img/' . strtolower(str_replace(' ', '_', $this->type)) . '/' . strtolower(str_replace(' ', '_', $this->name)));
        $images = [];

        if (is_dir($path)) {
            $files = scandir($path);
            foreach ($files as $file) {
                if (in_array(pathinfo($file, PATHINFO_EXTENSION), ['jpg', 'jpeg', 'png', 'gif', 'webp'])) {
                    $images[] = asset('img/' . strtolower(str_replace(' ', '_', $this->type)) . '/' . strtolower(str_replace(' ', '_', $this->name)) . '/' . $file);
                }
            }
        }

        return $images;
    }
}
