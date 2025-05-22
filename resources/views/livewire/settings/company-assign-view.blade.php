<x-settings.layout :heading="'Company Assignment'" :subheading="__('')">
    <div class="max-w-xl mx-auto space-y-6">
        <div class="flex justify-start items-center space-x-2 w-full  ">
            <div>Your Assignment Status : </div>
            @switch($currentUser->status)
                @case('pending')
                    <div class="px-3 py-1 font-medium bg-gray-300 text-gray-700 rounded-lg ">Pending</div>
                @break

                @case('active')
                    <div class="px-3 py-1 font-medium bg-emerald-500 text-white rounded-lg ">Assigned</div>
                @break

                @case('unassigned')
                    <div class="px-3 py-1 font-medium bg-gray-300 text-gray-700 rounded-lg ">Unassigned</div>
                @break
            @endswitch
        </div>
        {{-- Select Existing Company --}}

        <flux:select wire:model.live="selectedCompany" placeholder="Select Existing Company">
            <flux:select.option>select company...</flux:select.option>

            @foreach ($companies as $id => $name)
                <flux:select.option value="{{ $id }}">{{ $name }}</flux:select.option>
            @endforeach
        </flux:select>

        <div class="pt-4">
            <button wire:click="assignCompany" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
                Submit Assignment
            </button>
        </div>



        <hr class="my-4">

        {{-- Add New Company --}}
        @if ($currentUser->status == 'unassigned')
            <div>
                <h3 class="text-lg font-bold mb-2">Add New Company</h3>
                <div class="mt-2 space-y-6">

                    <flux:input label="Company Name" wire:model="name" />
                    <x-textarea label="Description" wire:model="description" />
                    <flux:input label="Business Field" wire:model="field" />


                    <flux:select label="Location" wire:model.live="wilaya" placeholder="Select Location">
                        <flux:select.option>select wilaya...</flux:select.option>

                        @foreach ($wilayas as $wil)
                            <flux:select.option value="{{ $wil }}">{{ $wil }}</flux:select.option>
                        @endforeach
                    </flux:select>

                </div>

                <button wire:click="createCompany"
                    class="mt-4 px-4 py-2 bg-green-600 text-white rounded hover:bg-green-700">
                    Create and Assign
                </button>
            </div>

            {{-- Flash Messages --}}
            @if (session()->has('message'))
                <div class="mt-4 text-green-600">
                    {{ session('message') }}
                </div>
            @endif

            @if (session()->has('error'))
                <div class="mt-4 text-red-600">
                    {{ session('error') }}
                </div>
            @endif
        @endif
    </div>
</x-settings.layout>
