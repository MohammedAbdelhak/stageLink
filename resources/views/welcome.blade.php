<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>StageLink</title>
    @vite('resources/css/app.css')
</head>

<body>
    <div class="w-screen h-screen relative">
        <div class="absolute z-30 w-full h-full">
            <!-- Autoplay, Loop, and Muted Attributes -->
            <img class="w-full h-full object-cover" src="/images/welcomBg.jpg" />
        </div>

        <!-- Overlay -->
        <div class="bg-black opacity-65 absolute z-40 h-full w-full"></div>

        <!-- Content Overlay -->
        <div class="w-full h-full absolute z-50 flex  justify-evenly items-center space-y-2">
            <section class="">
                <div class="py-8 px-4 mx-auto max-w-screen-xl text-center lg:py-16 lg:px-12">
                  
                    <h1 class="mb-4 text-4xl font-extrabold tracking-tight leading-none text-white md:text-5xl lg:text-6xl ">With <span class="text-blue-600">Stage</span><span class="text-sky-500">Link</span> , Find Your Opportunity.</h1>
                    <p class="mb-8 text-lg font-normal text-white lg:text-xl sm:px-16 xl:px-48 ">Manage internships , student applications , certifications easily and securily.</p>
                    <div class="flex justify-center items-center space-x-4 my-5">
                        <a href="/login" class="text-xl font-sans text-white   bg-sky-700 hover:cursor-pointer hover:bg-sky-600 transition duration-300 px-4 py-2 rounded">Login</a>
                        
                        <a href="/register" class="text-xl font-sans  text-white  bg-blue-700 hover:cursor-pointer hover:bg-blue-600 transition duration-300 px-4 py-2 rounded">Register</a>
                    </div>
                    <div class="px-4 mt-5 mx-auto text-center md:max-w-screen-md lg:max-w-screen-lg lg:px-36">
                        <span class="font-semibold text-gray-400 uppercase">In Future Partnership with :</span>
                        <div class="flex  justify-center items-center space-x-2 w-full ">
                           <div class=" mx-auto flex justify-center  w-1/3 "><img class="w-1/3" src="/images/gsh.png" alt=""></div>
                           <div class=" mx-auto flex justify-center  w-1/3 "><img class="w-full" src="/images/setram.png" alt=""></div>     
                           <div class=" mx-auto flex justify-center  w-1/3 "><img class="w-1/3" src="/images/ooredoo.png" alt=""></div>
                        </div>
                    </div> 
                </div>
            </section>
        </div>
    </div>
</body>

</html>
