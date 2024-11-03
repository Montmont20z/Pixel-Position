<x-layout>
    <div class="space-y-10" >
        <section class="text-center">
            <h1 class="pt-6 text-4xl font-bold" >Let's Find Your Next Job</h1>
            {{-- <form action="" class="mt-6">
                <input type="text" placeholder="Find your next job..." class="w-full max-w-xl px-5 py-4 border border-white/10 rounded-xl bg-white/5" />
            </form> --}}
            
            <x-forms.form action="/search" method="GET" class="mt-6" >
                <x-forms.input name="search" placeholder="Web Developer" :label="false" />
            </x-forms.form>


        </section>
        <section class="pt-8" >
            <x-section-heading>Feature Jobs</x-section-heading>
            
            <div class="grid gap-8 mt-6 lg:grid-cols-3">
                @foreach ($featureJobs as $job)
                    <x-job-card :job="$job" />
                @endforeach
            </div>
        </section>
        <section>
            <x-section-heading> Tags </x-section-heading>

            <div class="mt-6 space-x-1" >
                @foreach ($tags as $tag)
                    <x-tag :tag="$tag"  />
                @endforeach
            </div>
        </section>
        <section>
            <x-section-heading> Recent Jobs </x-section-heading>
            
            <div class="mt-6 space-y-6" >
            @foreach ($jobs as $job)
                <x-job-card-wide :job="$job" />
            @endforeach
            </div>
            
        </section>
    </div>
</x-layout>