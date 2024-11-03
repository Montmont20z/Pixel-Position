<x-layout>
    <x-page-heading>New Job</x-page-heading>

    <x-forms.form action="/jobs" method="POST" >
        <x-forms.input  label="Title" name="title" placeholder="CEO" />
        <x-forms.input  label="Salary" name="salary" placeholder="$90,000" />
        <x-forms.input  label="Location" name="location" placeholder="Winter Park, Florida" />

        <x-forms.select label="Schedule" name="schedule" >
            <option>Part Time</option>
            <option>Full Time</option>
            <option>Contract</option>
        </x-forms.select>


        <x-forms.input  label="URL" name="url" placeholder="https://linkedin.com/ceo/wanted" />
        <x-forms.checkbox label="Feature (Costs Extra)" name="featured" />

        <x-forms.divider />

        <x-forms.input  label="Tags (comma seperated)" name="tags" placeholder="video producer" />

        <x-forms.button>Create Job</x-forms.button>
    </x-forms.form>
</x-layout>