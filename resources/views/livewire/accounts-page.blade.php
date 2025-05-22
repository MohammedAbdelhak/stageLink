<div class="h-full  ">
    <x-accounts-header />
    <div class="w-full h-4/5 ">



        <div class="relative overflow-x-auto shadow-md sm:rounded-lg  w-full">


            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-200 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            Name
                        </th>

                        <th scope="col" class="px-6 py-3">
                            Status
                        </th>
                        @if ($currentUser->type == 'Department')
                            <th scope="col" class="px-6 py-3">
                                Type
                            </th>
                        @endif
                        <th scope="col" class="px-6 py-3">
                            Email
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
                    @if (sizeOf($accounts) > 0)
                        @foreach ($data as $account)
                            <tr
                                class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-700 border-b dark:border-gray-700 border-gray-200">
                                <th scope="row"
                                    class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{ $account->firstname }} {{ $account->lastname }}
                                </th>
                                <th scope="row"
                                    class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    @switch($account->status)
                                        @case('pending')
                                            <div class="px-3 py-1 w-fit font-medium bg-gray-300 text-gray-700 rounded-lg ">
                                                Pending
                                            </div>
                                        @break

                                        @case('active')
                                            <div class="px-3 py-1 w-fit font-medium bg-emerald-500 text-white rounded-lg ">
                                                Active
                                            </div>
                                        @break

                                        @case('unassigned')
                                            <div class="px-3 py-1 w-fit font-medium bg-gray-300 text-gray-700 rounded-lg ">
                                                Unassigned
                                            </div>
                                        @break
                                    @endswitch
                                </th>
                                @if ($currentUser->type == 'Department')
                                    <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white ">
                                        {{ $account->type }}
                                    </td>
                                @endif

                                <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white ">
                                    {{ $account->email }}
                                </td>

                                <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white ">
                                    {{ $account->created_at }}
                                </td>



                                <td class=" py-4">
                                    <div class="flex w-full justify-start  items-center space-x-3">
                                        @if($account->status == "pending")
                                        <div wire:click="assign({{ $account->id }})" class="text-emerald-500 ">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke-width="1.75" stroke="currentColor" class="w-7">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M9 12.75 11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                            </svg>

                                        </div>
                                        @endif
                                        @if($account->status != "unassigned")
                                        <div wire:click="unassign({{ $account->id }})" class="text-red-500 "><svg xmlns="http://www.w3.org/2000/svg"
                                                fill="none" viewBox="0 0 24 24" stroke-width="1.75"
                                                stroke="currentColor" class="w-7">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M6 18 18 6M6 6l12 12" />
                                            </svg>
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

    </div>

</div>
