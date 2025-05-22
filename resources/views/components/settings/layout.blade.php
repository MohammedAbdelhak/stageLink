<div class="flex items-start max-md:flex-col">
    <div class="mr-10 w-full pb-4 md:w-[220px]">
        <flux:navlist>
            <flux:navlist.item :href="route('settings.profile')" wire:navigate>{{ __('Profile') }}</flux:navlist.item>
            <flux:navlist.item :href="route('settings.password')" wire:navigate>{{ __('Password') }}</flux:navlist.item>
            <flux:navlist.item :href="route('settings.appearance')" wire:navigate>{{ __('Appearance') }}
            </flux:navlist.item>
            @switch(Auth::user()->type)
                @case('Student')
                    <flux:navlist.item :href="route('settings.assignUni')" wire:navigate>{{ __('University') }}
                    </flux:navlist.item>
                @break

                @case('Company')
                    <flux:navlist.item :href="route('settings.assignComp')" wire:navigate>{{ __('Company') }}
                    </flux:navlist.item>
                @break

                @case('Department')
                    <flux:navlist.item :href="route('settings.assignDep')" wire:navigate>{{ __('Department') }}
                    </flux:navlist.item>
                @break
            @endswitch
        </flux:navlist>
    </div>

    <flux:separator class="md:hidden" />

    <div class="flex-1 self-stretch max-md:pt-6">
        <flux:heading>{{ $heading ?? '' }}</flux:heading>
        <flux:subheading>{{ $subheading ?? '' }}</flux:subheading>

        <div class="mt-5 w-full max-w-lg">
            {{ $slot }}
        </div>
    </div>
</div>
