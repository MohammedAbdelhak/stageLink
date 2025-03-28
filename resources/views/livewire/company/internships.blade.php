<div class="h-full">
    <x-application.header />
    <div class="w-full h-4/5 ">
        {{-- <table class="w-full border-collapse border border-gray-300 ">
            <thead>
                <tr>
                    <th class="border p-2 rounded-lt-2xl">Title</th>
                    <th class="border p-2">Description</th>
                    <th class="border p-2">N° Places</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $item)
                    <tr>
                        <td class="border p-2">{{ $item->title }}</td>
                        <td class="border p-2"></td>
                        <td class="border p-2"></td>
                    </tr>
            </tbody>
        </table> --}}


        <div class="relative overflow-x-auto shadow-md sm:rounded-lg w-full">

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
            @endforeach --}}

                <div class="flex justify-end items-center my-3">
                    <flux:button icon="mouse-pointer-2" variant="primary" class="hover:cursor-pointer">Add New Internship</flux:button>
                </div>

            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-200 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            Title
                        </th>
                        <th scope="col" class="px-6 py-3">
                           Department
                        </th>
                        
                        <th scope="col" class="px-6 py-3">
                            Description
                        </th>
                        
                        <th scope="col" class="px-6 py-3">
                            N° Places
                        </th>
                      
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $item)
                    <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-700 border-b dark:border-gray-700 border-gray-200">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $item->title }}
                        </th>
                        <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white ">
                            {{ $item->department->name }}
                        </td>
                       
                        <td class="px-6 py-4">
                            {{ Str::limit($item->description, 50) }}
                        </td>
                        <td class="px-6 py-4 font-medium">
                            {{ $item->places_available }}
                        </td>
                      
                    </tr>
                  
                     @endforeach
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
