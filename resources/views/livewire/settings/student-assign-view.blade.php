<section class="w-full">
    @include('partials.settings-heading')

    <x-settings.layout :heading="__('University')" :subheading="__('Select Your   University, Department & Faculty')">
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

            {{-- University Dropdown --}}


            <flux:select wire:model.live="university" placeholder="Choose University...">
                <flux:select.option>select university...</flux:select.option>

                @foreach ($universities as $uni)
                    <flux:select.option value="{{ $uni }}">{{ $uni }}</flux:select.option>
                @endforeach
            </flux:select>


            {{-- Faculty Dropdown --}}
            <flux:select wire:model.live="faculty" placeholder="Choose faculty...">
                <flux:select.option>select faculty...</flux:select.option>
                @foreach ($faculties as $fac)
                    <flux:select.option>{{ $fac }}</flux:select.option>
                @endforeach
            </flux:select>



            <flux:select wire:model.live="department" placeholder="Choose department...">
                <flux:select.option>select department...</flux:select.option>

                @foreach ($departments as $dep)
                    <flux:select.option>{{ $dep }}</flux:select.option>
                @endforeach
            </flux:select>
            {{-- Department Dropdown --}}




            {{-- Submit Button --}}
            <div class="pt-4">
                <button wire:click="submitAssignment"
                    class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
                    Submit Assignment
                </button>
            </div>
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
        </div>
    </x-settings.layout>
</section>
