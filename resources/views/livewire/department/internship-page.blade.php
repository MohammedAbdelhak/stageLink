<div class="h-full">

    <x-internship.details-header :internship="$internship" />
    <div class="grid-col lg:grid-cols-none lg:flex justify-between items-center w-full ">

        <div class="w-full lg:w-2/3 ">
            <flux:subheading size="lg" class="mb-6"> Internship Description :</flux:subheading>

            <flux:subheading size="xl" class="mb-6">{{ $internship->description }}</flux:subheading>
            <flux:subheading size="lg" class="mb-6 flex space-x-1">
                <div>For Students of the</div>
                <div class="font-bold">
                    {{ $internship->department?->name . ',' . $internship->department?->faculty . ',' . $internship->department?->university }}
                </div>
            </flux:subheading>
            @if ($internship->places_available > 0)
                <flux:subheading size="lg" class="mb-6 flex space-x-1">
                    <div>Number Of Places Available : </div>
                    <div class="font-bold">
                        {{ $internship->places_available }} </div>
                </flux:subheading>
                <flux:modal.trigger name="confirm-internship-application">
                    <flux:button icon="mouse-pointer-2" variant="primary">Apply To Internship</flux:button>
                </flux:modal.trigger>


                <flux:modal name="confirm-internship-application" class="md:w-96">
                    <div class="space-y-6">
                        <div>
                            <flux:heading size="lg">Application Confirmation</flux:heading>
                            <flux:subheading>Are you sure you wan to apply to this internship opportunity ?</flux:subheading>
                        </div>

                        <div class="flex">
                            <flux:spacer />

                            <flux:button type="submit" variant="primary" wire:click="confirmApplication">Confirm</flux:button>
                        </div>
                    </div>
                </flux:modal>

            @else
                <flux:subheading size="lg" class="mb-6 flex space-x-1">
                    <div class="font-bold"> No Places Available </div>
                </flux:subheading>
            @endif

        </div>
        <div
            class="w-full lg:w-1/3  border-t lg:border-t-0 lg:border-l border-gray-300 dark:border-zinc-600 h-full pt-5  lg:p-5 grid grid-cols-1">
            <flux:subheading size="lg">Company Information :</flux:subheading>
            <flux:heading size="xl" level="1">{{ $internship->company->name }}</flux:heading>
            <flux:subheading size="lg" class="mb-6">{{ $internship->company->description }}</flux:subheading>
            <flux:subheading size="lg" class="mb-6">{{ $internship->company->location }}</flux:subheading>


        </div>

    </div>
</div>
