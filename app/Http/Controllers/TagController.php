<?php

namespace App\Http\Controllers;

use App\Models\Job;
use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Tag $tag)
    {
        // $jobs = Tag::where("")->get();

        return view("result", [ 'jobs' => $tag->jobs ]);  
    }
}
