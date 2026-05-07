<?php

namespace App\View\Components;

use App\Models\Testimonial;
use Illuminate\View\Component;

class TestimonialsComponent extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.testimonials-component')
        ->with('test', Testimonial::latest()->where('status', '1')->take('5')->get());
    }
}
