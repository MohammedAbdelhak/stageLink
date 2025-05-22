<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="dark">

<head>
    @include('partials.head')
</head>

<body class="min-h-screen bg-white antialiased dark:bg-linear-to-b dark:from-neutral-950 dark:to-neutral-900">
    <div
        class="relative grid h-dvh flex-col items-center justify-center px-8 sm:px-0 lg:max-w-none lg:grid-cols-2 lg:px-0">
        {{-- side 1 --}}
        <div class="bg-muted relative hidden h-full flex-col  text-white lg:flex dark:border-r dark:border-neutral-800">
            <a href="{{ route('home') }}" class="absolute  m-10 z-20 flex items-center text-lg font-medium" wire:navigate>
                <div class="mr-2 h-20 w-20">
                    <img src="/images/stageLinkLogo.png" alt="" />

                </div>
            </a>

            <div class="relative h-full bg-white"></div>
        </div>

        {{-- side 2 --}}
        <div class="w-full lg:p-8">
            <div class="mx-auto flex w-full flex-col justify-center space-y-6 sm:w-[350px]">
                {{ $slot }}
            </div>
        </div>
    </div>
    @fluxScripts
</body>

</html>
