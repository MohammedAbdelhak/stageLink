<div class="h-full">
    <x-application.header />
    <div class="w-full h-4/5 ">



        <div class="relative overflow-x-auto shadow-md sm:rounded-lg  w-full">

            {{-- @foreach ($data as $item)
                <a href="{{ route('internship.details', ['id' => $item->id]) }}"
                    class=" p-6 bg-white border border-gray-200 rounded-lg shadow-sm dark:bg-gray-800 dark:border-gray-700 hover:scale-95 hover:cursor-pointer transition duration-200">
                    <div>
                        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white"> {{ $item->title }}</h5>
                    </div>
                    <div class="mb-3  font-normal text-gray-700 dark:text-gray-400">
                        {{"@" . $item->company->name }}
                    </div>
                    <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">    {{ Str::limit($item->description, 100) }}</p>
                    <div 
                        class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        Apply Now
                        <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M1 5h12m0 0L9 1m4 4L9 9" />
                        </svg>
                    </div>
                </a>
            @endforeach
 --}}
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-200 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            Intenrship
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Student
                        </th>

                        <th scope="col" class="px-6 py-3">
                            Status
                        </th>

                        <th scope="col" class="px-6 py-3">
                            Date
                        </th>
                        <th>
                            Actions
                        </th>

                    </tr>
                </thead>
                <tbody>
                    @if (sizeOf($data) > 0)
                        @foreach ($data as $item)
                            <tr
                                class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-700 border-b dark:border-gray-700 border-gray-200">
                                <th scope="row"
                                    class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{ $item->internship->title }}
                                </th>
                                <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white ">
                                    {{ $item->student->firstname }} {{ $item->student->lastname }}
                                </td>

                                <td class="px-6 py-4">
                                    @switch($item->status)
                                        @case('pending')
                                            <div class="p-2 rounded bg-accent w-fit text-center text-white font-medium">
                                                {{ $item->status }}</div>
                                        @break

                                        @case('accepted')
                                            <div class="p-2 rounded bg-emerald-500 w-fit text-center text-white font-medium">
                                                {{ $item->status }}</div>
                                        @break

                                        @default
                                            <div class="p-2 rounded bg-red-500 w-fit text-center text-white font-medium">
                                                {{ $item->status }}</div>
                                    @endswitch
                                </td>
                                <td class="px-6 py-4 font-medium">
                                    {{ $item->created_at }}
                                </td>
                                <td>

                                    @if ($item->status == 'pending')
                                        <flux:modal.trigger name="accept-application-{{ $item->id }}">
                                            <flux:button :icon="'calendar-check'" class="hover:cursor-pointer">
                                            </flux:button>
                                        </flux:modal.trigger>

                                        <flux:modal name="accept-application-{{ $item->id }}" class="md:w-96">
                                            <div class="space-y-6">
                                                <div>
                                                    <flux:heading size="lg">Accepting Application </flux:heading>
                                                    <flux:subheading>Are you sure you wan to Accept to this internship
                                                        Application ?</flux:subheading>
                                                </div>

                                                <div class="flex">
                                                    <flux:spacer />
                                                    <flux:modal.close>
                                                        <flux:button type="submit" variant="primary"
                                                            class="bg-emerald-500 hover:bg-emerald-400 hover:cursor-pointer"
                                                            wire:click="acceptApplication({{ $item->id }})">Confirm
                                                        </flux:button>
                                                    </flux:modal.close>
                                                </div>
                                            </div>
                                        </flux:modal>


                                        <flux:modal.trigger name="refuse-application-{{ $item->id }}">
                                            <flux:button :icon="'square-x'" class="hover:cursor-pointer">
                                            </flux:button>
                                        </flux:modal.trigger>

                                        <flux:modal name="refuse-application-{{ $item->id }}" class="md:w-96">
                                            <div class="space-y-6">
                                                <div>
                                                    <flux:heading size="lg">Application Refusal </flux:heading>
                                                    <flux:subheading>Are you sure you wan to Refuse to this internship
                                                        Application ?</flux:subheading>
                                                </div>

                                                <div class="flex">
                                                    <flux:spacer />
                                                    <flux:modal.close>
                                                        <flux:button type="submit" variant="danger"
                                                            wire:click="refuseApplication({{ $item->id }})">Confirm
                                                        </flux:button>
                                                    </flux:modal.close>
                                                </div>
                                            </div>
                                        </flux:modal>
                                    @endif

                                    <flux:modal.trigger name="show-profile-{{ $item->id }}">
                                        <flux:button :icon="'square-user'" class="hover:cursor-pointer"></flux:button>
                                    </flux:modal.trigger>

                                    <flux:modal name="show-profile-{{ $item->id }}" variant="flyout">
                                        <div class="space-y-6">
                                            <div>
                                                <flux:heading size="lg">{{ $item->student->firstname }}
                                                    {{ $item->student->lastname }}</flux:heading>
                                                <flux:subheading>{{ $item->student->department->university }}
                                                </flux:subheading>
                                                <flux:subheading>{{ $item->student->department->faculty }}
                                                </flux:subheading>
                                                <flux:subheading>{{ $item->student->department->name }}
                                                </flux:subheading>
                                            </div>


                                        </div>
                                    </flux:modal>

                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr
                            class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-700 border-b dark:border-gray-700 border-gray-200">

                            <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white ">
                                No Records To Show Yet.
                            </td>

                            <td class="px-6 py-4">
                            </td>
                            <td class="px-6 py-4 font-medium">
                            </td>
                            <td class="px-6 py-4">
                            </td>
                            <td class="px-6 py-4">
                            </td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
        {{-- pagination --}}
        <div class="flex w-full justify-end pt-3">
            <!-- Previous Button -->
            <div wire:click="previousPage"
                class="flex items-center justify-center px-3 h-8 me-3 text-sm font-medium text-gray-600 bg-white border border-gray-300 rounded-lg hover:bg-gray-100 hover:cursor-pointer     hover:text-gray-700 dark:bg-gray-700 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
                <svg class="w-3.5 h-3.5 me-2 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                    fill="none" viewBox="0 0 14 10">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M13 5H1m0 0 4 4M1 5l4-4" />
                </svg>
                Previous
            </div>
            <div wire:click="nextPage"
                class="flex items-center justify-center px-3 h-8 text-sm font-medium text-gray-600 bg-white border border-gray-300 rounded-lg hover:bg-gray-100 hover:cursor-pointer     hover:text-gray-700 dark:bg-gray-700 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
                Next
                <svg class="w-3.5 h-3.5 ms-2 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                    fill="none" viewBox="0 0 14 10">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M1 5h12m0 0L9 1m4 4L9 9" />
                </svg>
            </div>
        </div>
        {{-- <div class="flex justify-between mt-4">
            <button wire:click="firstPage" class="px-4 py-2 bg-gray-300">First</button>
            <button wire:click="previousPage" class="px-4 py-2 bg-gray-300">Previous</button>
            <button wire:click="nextPage" class="px-4 py-2 bg-gray-300">Next</button>
            <button wire:click="lastPage" class="px-4 py-2 bg-gray-300">Last</button>
        </div> --}}
    </div>

</div>
