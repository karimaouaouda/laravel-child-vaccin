<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <style>
        .swiper-wrapper {
            height: max-content !important;

            width: max-content;
        }

        .swiper-button-next,
        .swiper-button-prev {
            top: 25%;
            z-index: 1000;
        }

        .swiper-button-next {
            right: -0px !important;
        }

        .swiper-button-prev {
            left: 0px !important;
        }

        .swiper-button-prev:after,
        .swiper-rtl .swiper-button-next:after {
            content: "" !important;
        }

        .mySwiper {
            max-width: 320px !important;
            margin: 0 auto !important;
        }

        .swiper-button-next:after,
        .swiper-rtl .swiper-button-prev:after {
            content: "" !important;
        }

        .mySwiper .swiper-slide.swiper-slide-thumb-active>.swiper-slide\:w-16 {
            --tw-scale-x: 1;
            --tw-scale-y: 1;
            transform: translate(var(--tw-translate-x), var(--tw-translate-y)) rotate(var(--tw-rotate)) skewX(var(--tw-skew-x)) skewY(var(--tw-skew-y)) scaleX(var(--tw-scale-x)) scaleY(var(--tw-scale-y));
        }

        .mySwiper .swiper-slide.swiper-slide-thumb-active>.swiper-slide\:border-indigo-600 {
            --tw-border-opacity: 1;
            border-color: rgb(79 70 229 / var(--tw-border-opacity));
        }

        .teamswiper .swiper-wrapper {
            height: max-content !important;
            padding-bottom: 64px !important;
        }

        .teamswiper .swiper-horizontal>.swiper-scrollbar,
        .teamswiper .swiper-scrollbar.swiper-scrollbar-horizontal {
            max-width: 140px !important;
            height: 3px !important;
            bottom: 25px !important;
            left: 50% !important;
            transform: translateX(-50%) !important;
        }

        .teamswiper .swiper-pagination-fraction {
            bottom: 0 !important;
            padding-top: 16px !important;
        }

        .teamswiper .swiper-slide.swiper-slide-active>.slide\:border-indigo-600 {
            --tw-border-opacity: 1;
            border-color: rgb(79 70 229 / var(--tw-border-opacity));
        }

        .teamswiper .swiper-pagination-total {
            color: rgb(156 163 175) !important;
        }

        .teamswiper .swiper-scrollbar-drag {
            background: rgb(79 70 229);
        }

        .teamswiper .swiper-pagination-fraction {
            bottom: 0 !important;
        }

        .teamswiper .swiper-button-prev:after,
        .teamswiper .swiper-rtl .swiper-button-next:after {
            content: '' !important;
        }

        .teamswiper .swiper-button-prev {
            top: 93% !important;
            left: 35% !important;
            z-index: 100 !important;
        }

        .teamswiper .swiper-button-next {
            top: 93% !important;
            right: 35% !important;
            z-index: 100 !important;
        }

        .teamswiper .swiper-button-next:after,
        .teamswiper .swiper-rtl .swiper-button-prev:after {
            content: '' !important;
        }

        .teamswiper .swiper-button-next svg,
        .teamswiper .swiper-button-prev svg {
            width: 24px !important;
            height: 24px !important;
        }
    </style>
    <title>Document</title>
</head>

<body class="font-inter">
    <nav class="py-5  relative z-50 w-full  bg-gray-50 transition-all duration-500 border-b border-gray-200">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="w-full flex  flex-col lg:flex-row">
                <div class=" flex justify-between  lg:flex-row">
                    <a href="javascript:;" class="cursor-pointer flex items-center">
                        <img src="{{ asset('./' . env('APP_LOGO')) }}" alt="logo">
                    </a>
                    <button data-collapse-toggle="navbar-default" type="button"
                        class="inline-flex items-center p-2 ml-3 text-sm text-gray-500 rounded-lg lg:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 "
                        aria-controls="navbar-default" aria-expanded="false">
                        <span class="sr-only">Open main menu</span>
                        <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z"
                                clip-rule="evenodd"></path>
                        </svg>
                    </button>
                </div>
                <div class="hidden w-full lg:flex lg:pl-11 " id="navbar-default">
                    <ul class="lg:flex items-center flex-col mt-4 lg:mt-0 lg:flex-row">
                        <li>
                            <a href="javascript:;"
                                class="text-gray-500 cursor-pointer text-base lg:text-base font-medium hover:text-indigo-700 transition-all duration-500 mb-2 block lg:mr-6 md:mb-0 lg:text-left text-center">
                                Home</a>
                        </li>
                        <li>
                            <a href="javascript:;"
                                class="text-gray-500 cursor-pointer text-base lg:text-base font-medium hover:text-indigo-700 transition-all duration-500 mb-2 block lg:mr-6 md:mb-0 lg:text-left text-center">
                                About
                                us</a>
                        </li>
                

                    </ul>
                    <div class="flex items-center  justify-center lg:flex-1 lg:justify-end">
                        <button
                            class=" bg-indigo-50 text-indigo-600 rounded-full cursor-pointer font-semibold text-center shadow-xs transition-all duration-500 py-3 px-6 text-sm hover:bg-indigo-100">
                            {{ __('welcome.start_button')  }}
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <section class="py-14 lg:py-24 relative z-0 bg-gray-50">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8 relative text-center">
            <h1
                class="max-w-2xl mx-auto text-center font-manrope font-bold text-4xl  text-gray-900 mb-5 md:text-5xl md:leading-normal">
                Control your Finances with our <span class="text-indigo-600">Smart Tool </span>
            </h1>
            <p class="max-w-sm mx-auto text-center text-base font-normal leading-7 text-gray-500 mb-9">Invest
                intelligently
                and discover a better way to manage your entire wealth easily.</p>


        </div>
    </section>

    <section class="py-14 lg:py-24 relative">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8 relative ">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-9">
                <div class="img-box">
                    <img src="https://pagedone.io/asset/uploads/1702034769.png" alt="About Us tailwind page"
                        class="max-lg:mx-auto">
                </div>
                <div class="lg:pl-[100px] flex items-center">
                    <div class="data w-full">
                        <h2
                            class="font-manrope font-bold text-4xl lg:text-5xl text-black mb-9 max-lg:text-center relative">
                            About
                            Us </h2>
                        <p class="font-normal text-xl leading-8 text-gray-500 max-lg:text-center max-w-2xl mx-auto">
                            Driven by a passion for seamless user experiences, we've meticulously curated pagedone
                            to empower creators, designers, and developers alike. Our mission is to provide a
                            comprehensive toolkit,
                            enabling you to build intuitive, beautiful interfaces that resonate with users on every
                            interaction.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="py-14 lg:py-24 relative">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8 relative ">
            <div class="grid grid-cols-1 lg:grid-cols-2 lg:gap-9 ">

                <div class="lg:pr-24 flex items-center">
                    <div class="data w-full">
                        <img src="https://pagedone.io/asset/uploads/1702034785.png" alt="About Us tailwind page"
                            class="block lg:hidden mb-9 mx-auto">
                        <h2 class="font-manrope font-bold text-4xl lg:text-5xl text-black mb-9 max-lg:text-center">We
                            are Creative Since 2005</h2>
                        <p class="font-normal text-xl leading-8 text-gray-500 max-lg:text-center max-w-2xl mx-auto">
                            Pagedone isn’t just a collection of components and guidelines; it's a philosophy. We go
                            beyond aesthetics, prioritizing accessibility, scalability, and usability. Every element,
                            from the tiniest
                            detail to the grandest layout, is meticulously crafted to enhance functionality and elevate
                            user
                            satisfaction.
                        </p>
                    </div>
                </div>
                <div class="img-box ">
                    <img src="https://pagedone.io/asset/uploads/1702034785.png" alt="About Us tailwind page"
                        class="hidden lg:block ">
                </div>
            </div>
        </div>
    </section>

    <section class="py-20 bg-white">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <h2 class="font-manrope text-4xl text-center text-gray-900 font-bold mb-14">Our results in numbers</h2>
            <div class="flex flex-col gap-5 xl:gap-8 lg:flex-row lg:justify-between">
                <div
                    class="w-full max-lg:max-w-2xl mx-auto lg:mx-0 lg:w-1/3 bg-white p-6 rounded-2xl shadow-md shadow-gray-100">
                    <div class="flex gap-5">
                        <div class="font-manrope text-2xl font-bold text-indigo-600">
                            240%
                        </div>
                        <div class="flex-1">
                            <h4 class="text-xl text-gray-900 font-semibold mb-2">Company growth</h4>
                            <p class="text-xs text-gray-500 leading-5">Company's remarkable growth journey as we
                                continually innovate and drive towards new heights of success.</p>
                        </div>
                    </div>
                </div>
                <div
                    class="w-full max-lg:max-w-2xl mx-auto lg:mx-0 lg:w-1/3 bg-white p-6 rounded-2xl shadow-md shadow-gray-100">
                    <div class="flex gap-5">
                        <div class="font-manrope text-2xl font-bold text-indigo-600">
                            175+
                        </div>
                        <div class="flex-1">
                            <h4 class="text-xl text-gray-900 font-semibold mb-2">Company growth</h4>
                            <p class="text-xs text-gray-500 leading-5">Our very talented team members are the
                                powerhouse
                                of pagedone and pillars of our success. </p>
                        </div>
                    </div>
                </div>
                <div
                    class="w-full max-lg:max-w-2xl mx-auto lg:mx-0 lg:w-1/3 bg-white p-6 rounded-2xl shadow-md shadow-gray-100">
                    <div class="flex gap-5">
                        <div class="font-manrope text-2xl font-bold text-indigo-600">
                            625+
                        </div>
                        <div class="flex-1">
                            <h4 class="text-xl text-gray-900 font-semibold mb-2">Projects Completed</h4>
                            <p class="text-xs text-gray-500 leading-5">We have accomplished more than 625 projects
                                worldwide and we are still counting many more.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <section class="py-20 ">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="bg-indigo-600 rounded-2xl p-8 xl:p-11">
                <h2 class="font-manrope text-4xl text-white text-center font-bold mb-4">Subscribe to the latest offer
                </h2>
                <p class="text-indigo-200 text-center mb-11 max-lg:max-w-2xl mx-auto">Join our community of subscribers
                    and receive regular
                    updates delivered straight to your inbox. It's quick, easy, and free</p>
                <div
                    class="max-w-md mx-auto lg:bg-transparent lg:border border-gray-300 rounded-3xl max-lg:py-3 lg:rounded-full lg:h-12 lg:p-1.5 lg:flex-row gap-6 lg:gap-0 flex-col flex items-center justify-between">
                    <input type="text" name="email"
                        class="py-2 px-6 focus:ring-0 border-none focus:border-none bg-transparent rounded-full max-lg:border border-gray-300  text-gray-100 max-lg:text-center placeholder:text-gray-500 focus:outline-none flex-1 w-full lg:w-auto lg:py-2 lg:px-6 lg:bg-transparent"
                        placeholder="Enter your email..">
                    <button type="submit"
                        class="py-2 px-5 text-sm bg-indigo-500 shadow-md rounded-full  text-white font-semibold hover:bg-indigo-700">Subscribe</button>
                </div>
            </div>
        </div>
    </section>

    <footer class="w-full">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <!--Grid-->
            <div class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-6 gap-8 py-10 max-md:max-w-sm max-md:mx-auto">
                <div class="col-span-full mb-10 lg:col-span-2 lg:mb-0">
                    <a href="javascript:;" class="cursor-pointer flex justify-center lg:justify-start">
                        <img src="{{ asset('./' . env('APP_LOGO')) }}" alt="logo">
                    </a>
                    <p class="py-8 text-sm text-gray-500 lg:max-w-xs text-center lg:text-left">Trusted in more than 100
                        countries & 5 million customers. Have any query ?</p>
                    <a href="javascript:;"
                        class="py-2.5 cursor-pointer px-5 h-9 block w-fit bg-indigo-600 rounded-full shadow-sm text-xs text-white mx-auto transition-all  duration-500 hover:bg-indigo-700 lg:mx-0">
                        Contact us
                    </a>
                </div>
                <!--End Col-->
                <div class="lg:mx-auto">
                    <h4 class="text-lg text-gray-900 font-medium mb-7 ">Pagedone</h4>
                    <ul class="text-sm  transition-all duration-500">
                        <li class="mb-6">
                            <a href="javascript:;" class="cursor-pointer text-gray-600 hover:text-gray-900">Home</a>
                        </li>
                        <li class="mb-6">
                            <a href="javascript:;" class="cursor-pointer  text-gray-600 hover:text-gray-900">About</a>
                        </li>
                        <li>
                            <a href="javascript:;"
                                class="cursor-pointer  text-gray-600 hover:text-gray-900">Pricing</a>
                        </li>
                    </ul>
                </div>
                <!--End Col-->
                <div class="lg:mx-auto">
                    <h4 class="text-lg text-gray-900 font-medium mb-7">Products</h4>
                    <ul class="text-sm  transition-all duration-500">
                        <li class="mb-6">
                            <a href="javascript:;" class="cursor-pointer text-gray-600 hover:text-gray-900">Figma UI
                                System</a>
                        </li>
                        <li class="mb-6">
                            <a href="javascript:;" class="cursor-pointer  text-gray-600 hover:text-gray-900">Icons
                                Assets</a>
                        </li>
                        <li>
                            <a href="javascript:;"
                                class="cursor-pointer  text-gray-600 hover:text-gray-900">Responsive
                                Blocks</a>
                        </li>
                    </ul>
                </div>
                <!--End Col-->
                <div class="lg:mx-auto">
                    <h4 class="text-lg text-gray-900 font-medium mb-7">Support</h4>
                    <ul class="text-sm  transition-all duration-500">
                        <li class="mb-6">
                            <a href="javascript:;" class="cursor-pointer text-gray-600 hover:text-gray-900">Customer
                                Support</a>
                        </li>
                        <li class="mb-6">
                            <a href="javascript:;" class="cursor-pointer  text-gray-600 hover:text-gray-900">Terms &
                                Conditions</a>
                        </li>
                        <li>
                            <a href="javascript:;" class="cursor-pointer  text-gray-600 hover:text-gray-900">Privacy
                                Policy</a>
                        </li>
                    </ul>
                </div>
                <!--End Col-->
                <div class="lg:mx-auto">
                    <h4 class="text-lg text-gray-900 font-medium mb-7">Subscribe</h4>
                    <p class="text-sm text-gray-500 leading-6 mb-7">Subscribe to get the latest news from us</p>
                    <a href="javascript:;"
                        class="flex cursor-pointer items-center justify-center gap-2 border border-indigo-600 rounded-full py-3 px-6 w-fit text-sm text-indigo-600 font-semibold transition-all duration-500 hover:bg-indigo-50">
                        Subscribe<svg width="15" height="12" viewBox="0 0 15 12" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M1.25 6L13.25 6M9.5 10.5L13.4697 6.53033C13.7197 6.28033 13.8447 6.15533 13.8447 6C13.8447 5.84467 13.7197 5.71967 13.4697 5.46967L9.5 1.5"
                                stroke="#4F46E5" stroke-width="1.8" stroke-linecap="round"
                                stroke-linejoin="round" />
                        </svg>
                    </a>
                </div>
            </div>
            <!--Grid-->
            <div class="py-7 border-t border-gray-200">
                <div class="flex items-center justify-center flex-col lg:justify-between lg:flex-row">
                    <span class="text-sm text-gray-500 ">©pagedone 2024, All rights reserved.</span>
                    <div class="flex mt-4 space-x-4 sm:justify-center sm:mt-0 ">
                        <a href="javascript:;"
                            class="w-8 cursor-pointer h-8 rounded-full transition-all duration-500 flex justify-center items-center bg-black/80 hover:bg-black">
                            <svg class="w-5 h-5 text-white group-hover:text-white" width="32" height="32"
                                viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M18.1139 14.2985L26.3866 4.88892H24.4263L17.2431 13.0591L11.5059 4.88892H4.88867L13.5645 17.2437L4.88867 27.1111H6.84915L14.4348 18.4831L20.4937 27.1111H27.1109L18.1134 14.2985H18.1139ZM15.4288 17.3526L14.5497 16.1223L7.55554 6.333H10.5667L16.2111 14.2333L17.0902 15.4636L24.4272 25.7327H21.416L15.4288 17.3531V17.3526Z"
                                    fill="currentColor" />
                            </svg>
                        </a>
                        <a href="javascript:;"
                            class="group cursor-pointer relative w-8 h-8 rounded-full transition-all duration-500 flex justify-center items-center hover:bg-gray-900 before:content[''] before:absolute before:bg-[url('././images/footer/instagram.png')] before:w-full before:h-full before:-z-10">
                            <svg class="w-8 h-8 text-white " width="26" height="26" viewBox="0 0 26 26"
                                fill="none" xmlns="http://www.w3.org/2000/svg">
                                <g clip-path="url(#clip0_8797_65643)">
                                    <rect class="fill-url(#paint0_linear_8797_65643) h-tr group-hover:fill-black"
                                        x="0.0585938" width="26" height="26" rx="13"
                                        fill="url(#paint0_linear_8797_65643)" />
                                    <path
                                        d="M10.6324 13.0004C10.6324 11.6936 11.6921 10.6339 12.9998 10.6339C14.3074 10.6339 15.3677 11.6936 15.3677 13.0004C15.3677 14.3072 14.3074 15.3669 12.9998 15.3669C11.6921 15.3669 10.6324 14.3072 10.6324 13.0004ZM9.35232 13.0004C9.35232 15.0137 10.9853 16.6457 12.9998 16.6457C15.0143 16.6457 16.6472 15.0137 16.6472 13.0004C16.6472 10.9871 15.0143 9.35513 12.9998 9.35513C10.9853 9.35513 9.35232 10.9871 9.35232 13.0004ZM15.9392 9.21059C15.9392 9.37908 15.9891 9.5438 16.0827 9.68393C16.1763 9.82406 16.3094 9.9333 16.4651 9.99784C16.6208 10.0624 16.7922 10.0793 16.9576 10.0465C17.1229 10.0137 17.2749 9.93264 17.3941 9.81355C17.5134 9.69446 17.5946 9.5427 17.6276 9.37746C17.6605 9.21223 17.6437 9.04093 17.5793 8.88525C17.5148 8.72956 17.4056 8.59647 17.2655 8.50281C17.1253 8.40915 16.9606 8.35912 16.792 8.35905H16.7916C16.5656 8.35916 16.3489 8.4489 16.1891 8.60856C16.0293 8.76822 15.9394 8.98475 15.9392 9.21059ZM10.13 18.7788C9.4375 18.7473 9.06108 18.632 8.81094 18.5346C8.4793 18.4056 8.24267 18.2519 7.99389 18.0036C7.7451 17.7553 7.5911 17.5191 7.46256 17.1876C7.36505 16.9377 7.24969 16.5614 7.21821 15.8693C7.18377 15.121 7.17689 14.8962 7.17689 13.0005C7.17689 11.1047 7.18434 10.8805 7.21821 10.1316C7.24975 9.43947 7.36596 9.0639 7.46256 8.81328C7.59167 8.48184 7.74544 8.24535 7.99389 7.99672C8.24233 7.74808 8.47873 7.59417 8.81094 7.46571C9.06097 7.36825 9.4375 7.25297 10.13 7.2215C10.8788 7.18709 11.1037 7.18021 12.9998 7.18021C14.8958 7.18021 15.121 7.18765 15.8704 7.2215C16.5629 7.25302 16.9387 7.36916 17.1895 7.46571C17.5211 7.59417 17.7577 7.74842 18.0065 7.99672C18.2553 8.24501 18.4087 8.48184 18.5378 8.81328C18.6354 9.06316 18.7507 9.43947 18.7822 10.1316C18.8166 10.8805 18.8235 11.1047 18.8235 13.0005C18.8235 14.8962 18.8166 15.1204 18.7822 15.8693C18.7507 16.5614 18.6347 16.9376 18.5378 17.1876C18.4087 17.5191 18.255 17.7556 18.0065 18.0036C17.7581 18.2517 17.5211 18.4056 17.1895 18.5346C16.9394 18.6321 16.5629 18.7474 15.8704 18.7788C15.1216 18.8133 14.8967 18.8201 12.9998 18.8201C11.1029 18.8201 10.8786 18.8133 10.13 18.7788ZM10.0712 5.94436C9.31504 5.97878 8.79832 6.09861 8.34706 6.27409C7.87972 6.45532 7.4841 6.69845 7.08876 7.09293C6.69342 7.4874 6.45077 7.88342 6.26944 8.35048C6.09384 8.80175 5.97394 9.31787 5.9395 10.0736C5.9045 10.8305 5.89648 11.0725 5.89648 13.0004C5.89648 14.9283 5.9045 15.1703 5.9395 15.9272C5.97394 16.683 6.09384 17.199 6.26944 17.6503C6.45077 18.1171 6.69347 18.5136 7.08876 18.9079C7.48404 19.3022 7.87972 19.545 8.34706 19.7267C8.79917 19.9022 9.31504 20.022 10.0712 20.0564C10.829 20.0909 11.0707 20.0994 12.9998 20.0994C14.9288 20.0994 15.1709 20.0914 15.9283 20.0564C16.6846 20.022 17.2009 19.9022 17.6525 19.7267C18.1195 19.545 18.5154 19.3023 18.9108 18.9079C19.3061 18.5134 19.5483 18.1171 19.7301 17.6503C19.9057 17.199 20.0262 16.6829 20.06 15.9272C20.0945 15.1697 20.1025 14.9283 20.1025 13.0004C20.1025 11.0725 20.0945 10.8305 20.06 10.0736C20.0256 9.31782 19.9057 8.80146 19.7301 8.35048C19.5483 7.8837 19.3055 7.48803 18.9108 7.09293C18.5161 6.69782 18.1195 6.45532 17.6531 6.27409C17.2009 6.09861 16.6845 5.97821 15.9289 5.94436C15.1715 5.90994 14.9294 5.90137 13.0003 5.90137C11.0713 5.90137 10.829 5.90937 10.0712 5.94436Z"
                                        fill="white" />
                                </g>
                                <defs>
                                    <linearGradient id="paint0_linear_8797_65643" x1="25.5589" y1="26"
                                        x2="-0.441125" y2="-6.99847e-07" gradientUnits="userSpaceOnUse">
                                        <stop stop-color="#FBE18A" />
                                        <stop offset="0.21" stop-color="#FCBB45" />
                                        <stop offset="0.38" stop-color="#F75274" />
                                        <stop offset="0.52" stop-color="#D53692" />
                                        <stop offset="0.74" stop-color="#8F39CE" />
                                        <stop offset="1" stop-color="#5B4FE9" />
                                    </linearGradient>
                                    <clipPath id="clip0_8797_65643">
                                        <rect width="26" height="26" rx="13" fill="white" />
                                    </clipPath>
                                </defs>
                            </svg>
                        </a>
                        <a href="javascript:;"
                            class="relative  w-8 h-8 rounded-full transition-all duration-500 flex justify-center items-center bg-[#337FFF]  hover:bg-gray-900 ">
                            <svg class="w-[1rem] h-[1rem] text-white" viewBox="0 0 8 14" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M7.04111 7.81204L7.41156 5.46043H5.1296V3.93188C5.1296 3.28886 5.44818 2.66054 6.46692 2.66054H7.51899V0.657999C6.90631 0.560385 6.28723 0.507577 5.66675 0.5C3.78857 0.5 2.56239 1.62804 2.56239 3.66733V5.46043H0.480469V7.81204H2.56239V13.5H5.1296V7.81204H7.04111Z"
                                    fill="currentColor" />
                            </svg>
                        </a>
                        <a href="javascript:;"
                            class="relative  w-8 h-8 rounded-full transition-all duration-500 flex justify-center items-center bg-[#FF0000]  hover:bg-gray-900 ">
                            <svg class="w-[1.25rem] h-[0.875rem] text-white" viewBox="0 0 16 12" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M13.9191 1.10651C14.558 1.27906 15.0602 1.78251 15.2299 2.42069C15.5388 3.57887 15.5388 5.99687 15.5388 5.99687C15.5388 5.99687 15.5388 8.41487 15.2299 9.57306C15.0578 10.2136 14.5556 10.7171 13.9191 10.8872C12.7638 11.1969 8.12875 11.1969 8.12875 11.1969C8.12875 11.1969 3.49603 11.1969 2.33844 10.8872C1.69952 10.7147 1.19735 10.2112 1.0276 9.57306C0.71875 8.41487 0.71875 5.99687 0.71875 5.99687C0.71875 5.99687 0.71875 3.57887 1.0276 2.42069C1.1997 1.78015 1.70188 1.27669 2.33844 1.10651C3.49603 0.796875 8.12875 0.796875 8.12875 0.796875C8.12875 0.796875 12.7638 0.796875 13.9191 1.10651ZM10.4981 5.99687L6.6481 8.22578V3.76796L10.4981 5.99687Z"
                                    fill="white" />
                            </svg>

                        </a>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/pagedone@1.1.2/src/js/pagedone.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>
    <script>
        var swiper = new Swiper(".mySwiper", {
            loop: true,
            spaceBetween: -10,
            slidesPerView: 3,
            watchSlidesProgress: true,
        });
        var swiper2 = new Swiper(".mySwiper2", {
            loop: true,
            spaceBetween: 32,
            thumbs: {
                swiper: swiper,
            },
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },
        });
    </script>
    <script>
        var swiper = new Swiper(".teamswiper", {
            slidesPerView: 1,
            spaceBetween: 32,
            centeredSlides: false,
            slidesPerGroupSkip: 1,
            grabCursor: true,
            loop: true,
            keyboard: {
                enabled: true,
            },
            breakpoints: {
                769: {
                    slidesPerView: 2,
                    slidesPerGroup: 1,
                },
            },
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },
            scrollbar: {
                el: ".swiper-scrollbar",
            },
            pagination: {
                el: ".swiper-pagination",
                type: "fraction",
            },
        });
    </script>

</body>

</html>
