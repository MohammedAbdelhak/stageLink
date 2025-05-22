<section class="w-full">


    @include('partials.settings-heading')


    @switch(Auth::user()->type)
        @case('Student')
            @livewire('settings.student-assign-view')
        @break

        @case('Company')
            @livewire('settings.company-assign-view')
        @break

        @case('Department')
            @livewire('settings.department-assign-view')
        @break
    @endswitch

   
</section>
