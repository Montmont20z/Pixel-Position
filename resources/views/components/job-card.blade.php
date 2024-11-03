@props(["job"])

<div class="flex flex-col p-4 text-center transition-colors duration-300 border border-transparent rounded-xl bg-white/5 hover:border-blue-500 group" >
    <div class="self-start text-sm" > {{ $job->employer->name }} </div>
    <div class="flex flex-col items-center py-8 " >
        <h3 class="text-lg font-bold transition-colors duration-300 group-hover:text-blue-500" > 
            <a href="{{ $job->url }}" >
                {{$job->title}} 
            </a>
        </h3>
        <p class="mt-4 text-sm" > {{ $job->schedule }} - From  {{ $job->salary }} </p>
    </div>

    <div class="flex items-center justify-between mt-auto" >
        <div class="space-x-2 space-y-2" >
            @foreach ($job->tags as $tag)
                <x-tag size="small" :$tag />
            @endforeach
            
            <x-employer-logo :employer="$job->employer" />
        </div>
    </div>
</div>