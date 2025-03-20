<div class="h-full">

    <x-internship.details-header :internship="$internship" />
    <div class="grid-col lg:grid-cols-none lg:flex justify-between items-center w-full ">

        <div class="w-full lg:w-2/3 ">
            <flux:subheading size="lg" class="mb-6"> Internship Description :</flux:subheading>

            <flux:subheading size="xl" class="mb-6">{{ $internship->description  }}</flux:subheading>
            <flux:subheading size="lg" class="mb-6 flex space-x-1"> <div>For Students of the</div> <div class="font-bold">
                 {{ $internship->department?->name .",".$internship->department?->faculty.",".$internship->department?->university   }} </div></flux:subheading>

        </div>
        <div class="w-full lg:w-1/3  border-t lg:border-t-0 lg:border-l border-gray-300 dark:border-zinc-600 h-full pt-5  lg:p-5 grid grid-cols-1">
            <flux:subheading size="lg">Company Information :</flux:subheading>
            <flux:heading size="xl" level="1">{{ $internship->company->name  }}</flux:heading>
            <flux:subheading size="lg" class="mb-6">{{ $internship->company->description  }}</flux:subheading>
            <flux:subheading size="lg" class="mb-6">{{ $internship->company->location  }}</flux:subheading>
        
            
        </div>

    </div>
</div>
