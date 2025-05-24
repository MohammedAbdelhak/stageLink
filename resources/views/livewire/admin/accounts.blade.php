<div class="h-full  ">
    <x-admin.accounts-header />
    <div class="w-full h-4/5 ">

        <div class="w-full my-2 flex justify-end items-center">
            <div class="w-1/6 ">

                <flux:select size="sm" placeholder="Filter Data" wire:model.live="filter">
                    <flux:select.option value="all">All</flux:select.option>
                    <flux:select.option value="Student">Student</flux:select.option>
                    <flux:select.option value="Company">Company</flux:select.option>
                    <flux:select.option value="Department">Department</flux:select.option>

                </flux:select>

            </div>


        </div>

        <div class="relative overflow-x-auto shadow-md sm:rounded-lg  w-full">


            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-200 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            Name
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Phone
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Email
                        </th>
                        <th scope="col" class="px-6 py-3">
                            status
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Type
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Date
                        </th>

                        <th class="pr-6">
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
                                    {{ $item->firstname }} {{ $item->lastname }}
                                </th>
                                <th scope="row"
                                    class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{ $item->phone }}
                                </th>
                                <th scope="row"
                                    class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white truncate">
                                    {{ $item->email }}
                                </th>


                                <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white ">
                                    @if ($item->status == 'active')
                                    <div class="bg-emerald-500 text-white px-2 py-1 rounded-lg text-center font-medium">Active</div>
                                    @else
                                    <div class="bg-red-400 text-white px-2 py-1 rounded-lg text-center font-medium">Inactive</div>

                                    @endif
                                </td>


                                <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white ">
                                    {{ $item->type }}
                                </td>

                                <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white ">
                                    {{ $item->created_at }}
                                </td>
                                <td class=" py-4">
                                    <div class="flex justify-start items-center space-x-2">
                                        @if ($item->status == 'active')
                                            <div>
                                                <flux:modal.trigger name="deactivate-account-{{ $item->id }}">
                                                    <flux:button :icon="'x'" class="hover:cursor-pointer">
                                                    </flux:button>
                                                </flux:modal.trigger>

                                                <flux:modal name="deactivate-account-{{ $item->id }}"
                                                    class="md:w-96">
                                                    <div class="space-y-6">
                                                        <div>
                                                            <flux:heading size="lg">Deactivating Account
                                                            </flux:heading>
                                                            <flux:subheading>Are you sure you want to deactivate this
                                                                account?
                                                            </flux:subheading>
                                                        </div>

                                                        <div class="flex">
                                                            <flux:spacer />
                                                            <flux:modal.close>
                                                                <flux:button type="submit" variant="primary"
                                                                    class="bg-emerald-500 hover:bg-emerald-400 hover:cursor-pointer"
                                                                    wire:click="deactivateAccount({{ $item->id }})">
                                                                    Confirm
                                                                </flux:button>
                                                            </flux:modal.close>
                                                        </div>
                                                    </div>
                                                </flux:modal>
                                            </div>
                                        @else
                                            <div>
                                                <flux:modal.trigger name="activate-account-{{ $item->id }}">
                                                    <flux:button :icon="'check'"
                                                        class="bg-emerald-500  hover:cursor-pointer">
                                                    </flux:button>
                                                </flux:modal.trigger>

                                                <flux:modal name="activate-account-{{ $item->id }}"
                                                    class="md:w-96">
                                                    <div class="space-y-6">
                                                        <div>
                                                            <flux:heading size="lg">Deactivating Account
                                                            </flux:heading>
                                                            <flux:subheading>Are you sure you want to activate this
                                                                account?
                                                            </flux:subheading>
                                                        </div>

                                                        <div class="flex">
                                                            <flux:spacer />
                                                            <flux:modal.close>
                                                                <flux:button type="submit" variant="primary"
                                                                    class="bg-emerald-500 hover:bg-emerald-400 hover:cursor-pointer"
                                                                    wire:click="activateAccount({{ $item->id }})">
                                                                    Confirm
                                                                </flux:button>
                                                            </flux:modal.close>
                                                        </div>
                                                    </div>
                                                </flux:modal>
                                            </div>
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
