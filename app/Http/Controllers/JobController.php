<?php

namespace App\Http\Controllers;

use App\Models\Job;
use App\Models\Tag;
use App\Http\Requests\StoreJobRequest;
use App\Http\Requests\UpdateJobRequest;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;

class JobController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $jobs = Job::inRandomOrder()->get();
        $featureJobs = Job::where('feature', true)->latest()->limit(value: 12)->get();

        return view("jobs.index", [
            "featureJobs" => $featureJobs,
            "jobs" => $jobs,
            "tags" => Tag::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("jobs.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedAttributes = $request->validate([
            "title"=> ["required"],
            "salary"=> ["required"],
            "location"=> ["required"],
            "schedule"=> ["required", Rule::in(["Part Time", "Full Time", "Contract"])],
            "url"=> ["required", 'active_url'],
            "tags"=> ['nullable'],
        ]);

        $validatedAttributes['feature'] = $request->has('feature');
        
        // dd(Arr::except($validatedAttributes, 'tags'));

        $job = Auth::user()->employer->jobs()->create(Arr::except($validatedAttributes, 'tags'));
        
        if ($validatedAttributes['tags'] ?? false) {
            foreach(explode(',', $validatedAttributes['tags']) as $tag ){
                $job->tag($tag);
            }
        }

        return redirect('/');
    }

    
}
