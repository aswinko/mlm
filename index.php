<?php
    session_start();
    if(isset($_SESSION['user'])){
        header("Location: ./dashboard/index.php"); 
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BEKART</title>
    <link rel="icon" href="../assets/icons/bekartlogo.svg" type="image/svg+xml">
    <!-- tailwind css -->
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tw-elements/dist/css/index.min.css" />
</head>
<body class="bg-slate-50">
    
    <?php include('./includes/navbar.php'); ?>
    <!-- <div class="md:container md:mx-auto"> -->
        <!-- Section: Hero Block -->
        <section class="mb-4 grid content-center md:grid-cols-2 grid-cols-1 gap-4 h-screen" id="hero">
            <div class="grid place-items-center">
                <img class="md:w-[70%] w-[50%]" src="./assets/icons/Success.svg" alt="logo">    
            </div>
            <div class="text-center text-gray-800 md:pt-24 pt-8 px-10">
                <h1 class="text-4xl md:text-5xl xl:text-6xl font-bold tracking-tight mb-12">Let's stand together for a <br /><span class="text-purple-500">better change</span></h1>
                <a class="inline-block px-7 py-3 mr-2 bg-purple-500 text-white font-medium text-sm leading-snug uppercase rounded shadow-md hover:bg-purple-600 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out" data-mdb-ripple="true" data-mdb-ripple-color="light" href="./register.php" role="button">Get started</a>
                <!-- <a class="inline-block px-7 py-3 bg-transparent text-blue-600 font-medium text-sm leading-snug uppercase rounded hover:text-blue-700 hover:bg-gray-100 focus:bg-gray-100 focus:outline-none focus:ring-0 active:bg-gray-200 transition duration-150 ease-in-out" data-mdb-ripple="true" data-mdb-ripple-color="light" href="#!" role="button">Learn more</a> -->
            </div>
            <!-- <div class="flex justify-center pt-8">
                <img class="md:w-[70%] w-[50%]" src="./assets/icons/Success.svg" alt="logo">
            </div> -->
        </section>
        <!-- Section: hero Block -->

        <!-- Section: features Block -->
        <section class="mb-32 bg-gray-50 text-gray-800 text-center px-8" id="features">
            <h2 class="text-3xl font-bold mb-20">Why is it so great?</h2>

            <div class="grid lg:gap-x-12 lg:grid-cols-3">
                <div class="mb-12 lg:mb-0">
                    <div class="rounded-lg shadow-lg h-full block bg-white">
                    <div class="flex justify-center">
                        <div class="p-4 bg-purple-500 rounded-full shadow-lg inline-block -mt-8">
                            <svg class="w-8 h-8 text-white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                <path fill="currentColor"
                                d="M192 208c0-17.67-14.33-32-32-32h-16c-35.35 0-64 28.65-64 64v48c0 35.35 28.65 64 64 64h16c17.67 0 32-14.33 32-32V208zm176 144c35.35 0 64-28.65 64-64v-48c0-35.35-28.65-64-64-64h-16c-17.67 0-32 14.33-32 32v112c0 17.67 14.33 32 32 32h16zM256 0C113.18 0 4.58 118.83 0 256v16c0 8.84 7.16 16 16 16h16c8.84 0 16-7.16 16-16v-16c0-114.69 93.31-208 208-208s208 93.31 208 208h-.12c.08 2.43.12 165.72.12 165.72 0 23.35-18.93 42.28-42.28 42.28H320c0-26.51-21.49-48-48-48h-32c-26.51 0-48 21.49-48 48s21.49 48 48 48h181.72c49.86 0 90.28-40.42 90.28-90.28V256C507.42 118.83 398.82 0 256 0z">
                                </path>
                            </svg>
                        </div>
                    </div>
                    <div class="p-6">
                        <h5 class="text-lg font-semibold mb-4">Service</h5>
                        <p class="text-justify">
                        Bekart ensures basic services that are expected of every e-commerce site, i.e, a broad selection range, 
                        timely delivery and on-time customer assistance, unfailingly every time. We go a step further to deliver 
                        products at a price range just above the production rate.
                        </p>
                    </div>
                    </div>
                </div>

                <div class="mb-12 lg:mb-0">
                    <div class="rounded-lg shadow-lg h-full block bg-white">
                    <div class="flex justify-center">
                        <div class="p-4 bg-purple-500 rounded-full shadow-lg inline-block -mt-8">
                            <svg class="w-8 h-8 text-white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                <path fill="currentColor"
                                d="M466.5 83.7l-192-80a48.15 48.15 0 0 0-36.9 0l-192 80C27.7 91.1 16 108.6 16 128c0 198.5 114.5 335.7 221.5 380.3 11.8 4.9 25.1 4.9 36.9 0C360.1 472.6 496 349.3 496 128c0-19.4-11.7-36.9-29.5-44.3zM256.1 446.3l-.1-381 175.9 73.3c-3.3 151.4-82.1 261.1-175.8 307.7z">
                                </path>
                            </svg>
                        </div>
                    </div>
                    <div class="p-6">
                        <h5 class="text-lg font-semibold mb-4">Genuine Quality</h5>
                        <p class="text-justify">
                        Bekart is a dynamic e-commerce website that provides an array of genuine and quality products, 
                        ranging from grocery to fashion to electronics and everything in between, at the lowest possible rate. 
                        The choice of brands is a combination of all brands available online and offline. Including the known & 
                        trusted, the new & emerging brands of all shapes and sizes.
                        </p>
                    </div>
                    </div>
                </div>

                <div class="">
                    <div class="rounded-lg shadow-lg h-full block bg-white">
                    <div class="flex justify-center">
                        <div class="p-4 bg-purple-500 rounded-full shadow-lg inline-block -mt-8">
                        <svg class="w-8 h-8 text-white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                            <path fill="currentColor"
                            d="M505.12019,19.09375c-1.18945-5.53125-6.65819-11-12.207-12.1875C460.716,0,435.507,0,410.40747,0,307.17523,0,245.26909,55.20312,199.05238,128H94.83772c-16.34763.01562-35.55658,11.875-42.88664,26.48438L2.51562,253.29688A28.4,28.4,0,0,0,0,264a24.00867,24.00867,0,0,0,24.00582,24H127.81618l-22.47457,22.46875c-11.36521,11.36133-12.99607,32.25781,0,45.25L156.24582,406.625c11.15623,11.1875,32.15619,13.15625,45.27726,0l22.47457-22.46875V488a24.00867,24.00867,0,0,0,24.00581,24,28.55934,28.55934,0,0,0,10.707-2.51562l98.72834-49.39063c14.62888-7.29687,26.50776-26.5,26.50776-42.85937V312.79688c72.59753-46.3125,128.03493-108.40626,128.03493-211.09376C512.07526,76.5,512.07526,51.29688,505.12019,19.09375ZM384.04033,168A40,40,0,1,1,424.05,128,40.02322,40.02322,0,0,1,384.04033,168Z" />
                        </svg>
                        </div>
                    </div>
                    <div class="p-6">
                        <h5 class="text-lg font-semibold mb-4">Extremely fast</h5>
                        <p class="text-justify">
                        Bekart is an effort to utilise technology creatively, to deliver products at the 
                        least possible rate. It has been made possible primarily through the platform provided 
                        by e-commerce and our well-constructed mutually beneficial ecosystem of business.
                        </p>
                    </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Section: features Block -->


        <!-- Section: signup Block -->
        <section class="mb-32">
            <style>
            @media (min-width: 992px) {
                #cta-img-nml-50 {
                margin-left: 50px;
                }
            }
            </style>

            <div class="flex flex-wrap">
                <div class="grow-0 shrink-0 basis-auto w-full lg:w-5/12 mb-12 lg:mb-0">
                    <div class="flex lg:py-12">
                    <img src="./assets/female-manager-with-client.jpg" class="w-full rounded-lg shadow-lg"
                        id="cta-img-nml-50" style="z-index: 10" alt="" />
                    </div>
                </div>

                <div class="grow-0 shrink-0 basis-auto w-full lg:w-7/12">
                    <div
                    class="bg-purple-500 h-full rounded-lg p-6 lg:pl-12 text-white flex items-center text-center lg:text-left">
                    <div class="lg:pl-12">
                        <h2 class="text-3xl font-bold mb-6">What are you waiting for?</h2>
                        <p class="mb-6 pb-2 lg:pb-0 text-justify">
                        Our workforce, on the other hand, ensures the quality of each product showcased on our online store.
                        Bekart functions by connecting people. It relies on the traditional marketing system of word of mouth
                        to reach out to new customers. Each of our customers has the privilege to save as they buy and earn as they 
                        connect. We have designed a system where the profits are shared with our customers, associates and other affiliates.
                        </p>
                        <a type="button" href="./register.php" class="inline-block px-7 py-3 border-2 border-white text-white font-medium text-sm leading-snug uppercase rounded-full hover:bg-black hover:bg-opacity-5 focus:outline-none focus:ring-0 transition duration-150 ease-in-out" data-mdb-ripple="true" data-mdb-ripple-color="light">Sign up now</a>
                    </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Section: signup Block -->


        <!-- Section: support Block -->
        <section class="mb-32 text-gray-800" id="support">

            <div class="relative overflow-hidden bg-no-repeat bg-cover"
            style="background-position: 50%; background-image: url('./assets/cool-background.png'); height: 300px;">
            </div>
            <div class="container text-gray-800 px-4 md:px-12">
                <div class="block rounded-lg shadow py-10 md:py-12 px-2 md:px-6"
                    style="margin-top: -100px; background: hsla(0, 0%, 100%, 0.8); backdrop-filter: blur(30px);">
                    <div class="flex flex-wrap">
                    <div class="grow-0 shrink-0 basis-auto w-full xl:w-5/12 px-3 lg:px-6 mb-12 xl:mb-0">
                        <form>
                        <div class="form-group mb-6">
                            <input type="text" class="form-control block
                            w-full
                            px-3
                            py-1.5
                            text-base
                            font-normal
                            text-gray-700
                            bg-white bg-clip-padding
                            border border-solid border-gray-300
                            rounded
                            transition
                            ease-in-out
                            m-0
                            focus:text-gray-700 focus:bg-white focus:border-purple-500 focus:outline-none" id="exampleInput7"
                            placeholder="Name">
                        </div>
                        <div class="form-group mb-6">
                            <input type="email" class="form-control block
                            w-full
                            px-3
                            py-1.5
                            text-base
                            font-normal
                            text-gray-700
                            bg-white bg-clip-padding
                            border border-solid border-gray-300
                            rounded
                            transition
                            ease-in-out
                            m-0
                            focus:text-gray-700 focus:bg-white focus:border-purple-500 focus:outline-none" id="exampleInput8"
                            placeholder="Email address">
                        </div>
                        <div class="form-group mb-6">
                            <textarea class="
                            form-control
                            block
                            w-full
                            px-3
                            py-1.5
                            text-base
                            font-normal
                            text-gray-700
                            bg-white bg-clip-padding
                            border border-solid border-gray-300
                            rounded
                            transition
                            ease-in-out
                            m-0
                            focus:text-gray-700 focus:bg-white focus:border-purple-500 focus:outline-none
                        " id="exampleFormControlTextarea13" rows="3" placeholder="Message"></textarea>
                        </div>
                        <div class="form-group form-check text-center mb-6">
                            <input type="checkbox"
                            class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-purple-500 checked:border-purple-500 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain mr-2 cursor-pointer"
                            id="exampleCheck87" checked>
                            <label class="form-check-label inline-block text-gray-800" for="exampleCheck87">Send me a copy of this
                            message</label>
                        </div>
                        <button type="submit" class="
                        w-full
                        px-6
                        py-2.5
                        bg-purple-600
                        text-white
                        font-medium
                        text-xs
                        leading-tight
                        uppercase
                        rounded
                        shadow-md
                        hover:bg-purple-600 hover:shadow-lg
                        focus:bg-purple-600 focus:shadow-lg focus:outline-none focus:ring-0
                        active:bg-purple-600 active:shadow-lg
                        transition
                        duration-150
                        ease-in-out">Send</button>
                        </form>
                    </div>
                    <div class="grow-0 shrink-0 basis-auto w-full xl:w-7/12">
                        <div class="flex flex-wrap">
                        <div class="mb-12 grow-0 shrink-0 basis-auto w-full md:w-6/12 px-3 lg:px-6">
                            <div class="flex items-start">
                            <div class="shrink-0">
                                <div class="p-4 bg-purple-500 rounded-md shadow-md w-14 h-14 flex items-center justify-center">
                                <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="headset" class="w-5 text-white"
                                    role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                    <path fill="currentColor"
                                    d="M192 208c0-17.67-14.33-32-32-32h-16c-35.35 0-64 28.65-64 64v48c0 35.35 28.65 64 64 64h16c17.67 0 32-14.33 32-32V208zm176 144c35.35 0 64-28.65 64-64v-48c0-35.35-28.65-64-64-64h-16c-17.67 0-32 14.33-32 32v112c0 17.67 14.33 32 32 32h16zM256 0C113.18 0 4.58 118.83 0 256v16c0 8.84 7.16 16 16 16h16c8.84 0 16-7.16 16-16v-16c0-114.69 93.31-208 208-208s208 93.31 208 208h-.12c.08 2.43.12 165.72.12 165.72 0 23.35-18.93 42.28-42.28 42.28H320c0-26.51-21.49-48-48-48h-32c-26.51 0-48 21.49-48 48s21.49 48 48 48h181.72c49.86 0 90.28-40.42 90.28-90.28V256C507.42 118.83 398.82 0 256 0z">
                                    </path>
                                </svg>
                                </div>
                            </div>
                            <div class="grow ml-6">
                                <p class="font-bold mb-1">Technical support</p>
                                <p class="text-gray-500">contact@bekart.online</p>
                                <p class="text-gray-500">+91 95447 01100</p>
                            </div>
                            </div>
                        </div>
                        <div class="mb-12 grow-0 shrink-0 basis-auto w-full md:w-6/12 px-3 lg:px-6">
                            <div class="flex items-start">
                            <div class="shrink-0">
                                <div class="p-4 bg-purple-500 rounded-md shadow-md w-14 h-14 flex items-center justify-center">
                                <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="dollar-sign"
                                    class="w-3 text-white" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 288 512">
                                    <path fill="currentColor"
                                    d="M209.2 233.4l-108-31.6C88.7 198.2 80 186.5 80 173.5c0-16.3 13.2-29.5 29.5-29.5h66.3c12.2 0 24.2 3.7 34.2 10.5 6.1 4.1 14.3 3.1 19.5-2l34.8-34c7.1-6.9 6.1-18.4-1.8-24.5C238 74.8 207.4 64.1 176 64V16c0-8.8-7.2-16-16-16h-32c-8.8 0-16 7.2-16 16v48h-2.5C45.8 64-5.4 118.7.5 183.6c4.2 46.1 39.4 83.6 83.8 96.6l102.5 30c12.5 3.7 21.2 15.3 21.2 28.3 0 16.3-13.2 29.5-29.5 29.5h-66.3C100 368 88 364.3 78 357.5c-6.1-4.1-14.3-3.1-19.5 2l-34.8 34c-7.1 6.9-6.1 18.4 1.8 24.5 24.5 19.2 55.1 29.9 86.5 30v48c0 8.8 7.2 16 16 16h32c8.8 0 16-7.2 16-16v-48.2c46.6-.9 90.3-28.6 105.7-72.7 21.5-61.6-14.6-124.8-72.5-141.7z">
                                    </path>
                                </svg>
                                </div>
                            </div>
                            <div class="grow ml-6">
                                <p class="font-bold mb-1">Sales questions</p>
                                <p class="text-gray-500">contact@bekart.online</p>
                                <p class="text-gray-500">+91 95447 21100</p>
                            </div>
                            </div>
                        </div>
                        <div class="mb-12 md:mb-0 grow-0 shrink-0 basis-auto w-full md:w-6/12 px-3 lg:px-6">
                            <div class="flex align-start">
                            <div class="shrink-0">
                                <div class="p-4 bg-purple-600 rounded-md shadow-md w-14 h-14 flex items-center justify-center">
                                <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="newspaper"
                                    class="w-5 text-white" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
                                    <path fill="currentColor"
                                    d="M552 64H88c-13.255 0-24 10.745-24 24v8H24c-13.255 0-24 10.745-24 24v272c0 30.928 25.072 56 56 56h472c26.51 0 48-21.49 48-48V88c0-13.255-10.745-24-24-24zM56 400a8 8 0 0 1-8-8V144h16v248a8 8 0 0 1-8 8zm236-16H140c-6.627 0-12-5.373-12-12v-8c0-6.627 5.373-12 12-12h152c6.627 0 12 5.373 12 12v8c0 6.627-5.373 12-12 12zm208 0H348c-6.627 0-12-5.373-12-12v-8c0-6.627 5.373-12 12-12h152c6.627 0 12 5.373 12 12v8c0 6.627-5.373 12-12 12zm-208-96H140c-6.627 0-12-5.373-12-12v-8c0-6.627 5.373-12 12-12h152c6.627 0 12 5.373 12 12v8c0 6.627-5.373 12-12 12zm208 0H348c-6.627 0-12-5.373-12-12v-8c0-6.627 5.373-12 12-12h152c6.627 0 12 5.373 12 12v8c0 6.627-5.373 12-12 12zm0-96H140c-6.627 0-12-5.373-12-12v-40c0-6.627 5.373-12 12-12h360c6.627 0 12 5.373 12 12v40c0 6.627-5.373 12-12 12z">
                                    </path>
                                </svg>
                                </div>
                            </div>
                            <div class="grow ml-6">
                                <p class="font-bold mb-1">Press</p>
                                <p class="text-gray-500">contact@bekart.online</p>
                                <p class="text-gray-500">+91 95447 21100</p>
                            </div>
                            </div>
                        </div>
                        <div class="grow-0 shrink-0 basis-auto w-full md:w-6/12 px-3 lg:px-6">
                            <div class="flex align-start">
                            <div class="shrink-0">
                                <div class="p-4 bg-purple-600 rounded-md shadow-md w-14 h-14 flex items-center justify-center">
                                <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="bug" class="w-5 text-white"
                                    role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                    <path fill="currentColor"
                                    d="M511.988 288.9c-.478 17.43-15.217 31.1-32.653 31.1H424v16c0 21.864-4.882 42.584-13.6 61.145l60.228 60.228c12.496 12.497 12.496 32.758 0 45.255-12.498 12.497-32.759 12.496-45.256 0l-54.736-54.736C345.886 467.965 314.351 480 280 480V236c0-6.627-5.373-12-12-12h-24c-6.627 0-12 5.373-12 12v244c-34.351 0-65.886-12.035-90.636-32.108l-54.736 54.736c-12.498 12.497-32.759 12.496-45.256 0-12.496-12.497-12.496-32.758 0-45.255l60.228-60.228C92.882 378.584 88 357.864 88 336v-16H32.666C15.23 320 .491 306.33.013 288.9-.484 270.816 14.028 256 32 256h56v-58.745l-46.628-46.628c-12.496-12.497-12.496-32.758 0-45.255 12.498-12.497 32.758-12.497 45.256 0L141.255 160h229.489l54.627-54.627c12.498-12.497 32.758-12.497 45.256 0 12.496 12.497 12.496 32.758 0 45.255L424 197.255V256h56c17.972 0 32.484 14.816 31.988 32.9zM257 0c-61.856 0-112 50.144-112 112h224C369 50.144 318.856 0 257 0z">
                                    </path>
                                </svg>
                                </div>
                            </div>
                            <div class="grow ml-6">
                                <p class="font-bold mb-1">Bug report</p>
                                <p class="text-gray-500">contact@bekart.online</p>
                                <p class="text-gray-500">+91 95447 01100</p>
                            </div>
                            </div>
                        </div>
                        </div>
                    </div>
                    </div>
                </div>
            </div>

        </section>
        <!-- Section: support Block --> 
    <!-- </div> -->
    <!-- Container -->

    <footer class="text-center text-white bg-purple-500">
        <div class="container p-6">
            <div class="">
                <p class="flex justify-center items-center">
                <span class="mr-4">Register for free</span>
                <a type="button" href="./register.php" class="inline-block px-6 py-2 border-2 border-white text-white font-medium text-xs leading-tight uppercase rounded-full hover:bg-black hover:bg-opacity-5 focus:outline-none focus:ring-0 transition duration-150 ease-in-out">
                    Sign up!
                </a>
                </p>
            </div>
        </div>

        <div class="text-center p-4" style="background-color: rgba(0, 0, 0, 0.2);">
        © 2022 Copyright:
        <a class="text-white" href="#">BEKART</a>
        </div>
        </footer>



    <!-- //for dropdowns -->
    <script src="https://cdn.jsdelivr.net/npm/tw-elements/dist/js/index.min.js"></script>
</body>
</html>