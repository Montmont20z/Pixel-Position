@props(["job"])

<div class="flex p-4 transition-colors duration-300 border border-transparent rounded-xl bg-white/5 gap-x-6 hover:border-blue-500 group" >
    <x-employer-logo :employer="$job->employer" />

    <div class="flex flex-col flex-1 ">
        <a class="self-start text-sm text-gray-400" > {{ $job->employer->name }} </a>
        <h3 class="mt-3 text-xl font-bold transition-colors duration-300 group-hover:text-blue-500" > 
            <a href="{{ $job->url }}" >
                {{$job->title}} 
            </a>    
        </h3>
        <p class="mt-auto text-sm text-gray-400" > {{ $job->schedule }} - From  {{ $job->salary }} </p>
    </div>
        
    <div class="flex flex-col items-center justify-between " >
        <div class="space-x-2">
            @foreach ($job->tags as $tag)
                <x-tag :tag="$tag" />
            @endforeach
        </div>
    </div>
</div>