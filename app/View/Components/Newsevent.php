<?php

namespace App\View\Components;

use App\Models\Content;
use Illuminate\View\Component;

class Newsevent extends Component
{
    /**
     * Create a new component instance.ip
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
        return view('components.newsevent')->with('content', Content::where('publish_status', '1')->where('delete_status', '0')->whereIn('content_type', ['News','Event'])->take(3)->get());
    }
}
