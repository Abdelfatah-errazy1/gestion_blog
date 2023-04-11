<?php

namespace App\View\Components;

use Closure;
use App\Models\category;
use Illuminate\View\Component;
use Illuminate\Contracts\View\View;

class CategoryDropdown extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
    // dd(request('category')->name);

        return view('components.category-dropdown',[
            
        'categories' => category::all(),
        'currentCategory'=>category::firstWhere('slug',request('category'))
        ]);
    }
}
