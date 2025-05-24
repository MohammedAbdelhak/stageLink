<div class="h-full  ">
    <x-admin.companies-header />
    <div class="w-full h-4/5 ">

       

        <div class="relative overflow-x-auto shadow-md sm:rounded-lg  w-full">


            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-200 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            Name
                        </th>
                        <th scope="col" class="px-6 py-3">
                            description
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Field of business
                        </th>
                        <th scope="col" class="px-6 py-3">
                            location
                        </th>
                        <th scope="col" class="px-6 py-3">
                            status
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Date
                        </th>

                        <th class="px-6 py-3" >
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
                                    {{ $item->name }}
                                </th>
                                <th scope="row"
                                    class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{ $item->description }}
                                </th>
                                <th scope="row"
                                    class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white truncate">
                                    {{ $item->field_of_bussines }}
                                </th>


                                <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white ">
                                    @if ($item->status == 'accepted')
                                    <div class="bg-emerald-500 text-white px-2 py-1 rounded-lg text-center font-medium">Active</div>
                                    @else
                                    <div class="bg-red-400 text-white px-2 py-1 rounded-lg text-center font-medium">Inactive</div>

                                    @endif
                                </td>


                                <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white ">
                                    {{ $item->location }}
                                </td>

                                <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white ">
                                    {{ $item->created_at }}
                                </td>
                                <td class="px-6 py-4">
                                    <div class="flex justify-start items-center space-x-2">
                                        @if ($item->status == 'pending')
                                            <div>
                                                <flux:modal.trigger name="refuse-company-{{ $item->id }}">
                                                    <flux:button :icon="'x'" class="hover:cursor-pointer">
                                                    </flux:button>
                                                </flux:modal.trigger>

                                                <flux:modal name="refuse-company-{{ $item->id }}"
                                                    class="md:w-96">
                                                    <div class="space-y-6">
                                                        <div>
                                                            <flux:heading size="lg">Refuse Company Request 
                                                            </flux:heading>
                                                            <flux:subheading>Are you sure you want to refuse the company creation request and delete it?
                                                            </flux:subheading>
                                                        </div>

                                                        <div class="flex">
                                                            <flux:spacer />
                                                            <flux:modal.close>
                                                                <flux:button type="submit" variant="primary"
                                                                    class="bg-emerald-500 hover:bg-emerald-400 hover:cursor-pointer"
                                                                    wire:click="refuseCompany({{ $item->id }})">
                                                                    Confirm
                                                                </flux:button>
                                                            </flux:modal.close>
                                                        </div>
                                                    </div>
                                                </flux:modal>
                                            </div>
                                            <div>
                                                <flux:modal.trigger name="accept-company-{{ $item->id }}">
                                                    <flux:button :icon="'check'"
                                                        class="bg-emerald-500  hover:cursor-pointer">
                                                    </flux:button>
                                                </flux:modal.trigger>

                                                <flux:modal name="accept-company-{{ $item->id }}"
                                                    class="md:w-96">
                                                    <div class="space-y-6">
                                                        <div>
                                                            <flux:heading size="lg">Accept Company Request
                                                            </flux:heading>
                                                            <flux:subheading>Are you sure you want to accept this
                                                                company creation request?
                                                            </flux:subheading>
                                                        </div>

                                                        <div class="flex">
                                                            <flux:spacer />
                                                            <flux:modal.close>
                                                                <flux:button type="submit" variant="primary"
                                                                    class="bg-emerald-500 hover:bg-emerald-400 hover:cursor-pointer"
                                                                    wire:click="acceptCompany({{ $item->id }})">
                                                                    Confirm
                                                                </flux:button>
                                                            </flux:modal.close>
                                                        </div>
                                                    </div>
                                                </flux:modal>
                                            </div>
                                        @else
                                            <div class="flex justify-center items-center text-center w-full">--</div>
                                        @endif
                                    </div>
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
