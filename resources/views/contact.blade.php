<!-- component -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <script src="https://kit.fontawesome.com/c151b27f34.js" crossorigin="anonymous"></script>
    <style>
        .icon::after {
            content: '';
            display: block;
            position: absolute;
            border-top: 23px solid transparent;
            border-bottom: 17px solid transparent;
            border-left: 12px solid #3182ce;
            left: 100%;
            top: 0;
        }
    </style>

</head>

<body class="lg:px-96 md:px-48 px-5 sm:px-20">
    <form action="" class="form bg-white p-6 my-10 relative">

        <div class="icon bg-blue-600 text-white w-6 h-6 absolute flex items-center justify-center p-5" style="left:-40px">
            <i class="fal fa-phone-volume fa-fw text-2xl transform -rotate-45"></i></div>
        <h3 class="text-2xl text-gray-900 font-semibold">Let us call you!</h3>
        <p class="text-gray-600"> To help you choose your property</p>
        <div class="flex space-x-5 mt-3">
            <input type="text" name="" id="" placeholder="Your Name" class="border p-2  w-1/2">
            <input type="tel" name="" id="" placeholder="Your Number" class="border p-2 w-1/2">
        </div>
        <input type="email" name="" id="" placeholder="Your Email" class="border p-2 w-full mt-3">
        <textarea name="" id="" cols="10" rows="3" placeholder="Tell us about desired property"
            class="border p-2 mt-3 w-full"></textarea>
        <p class="font-bold text-sm mt-3">GDPR Agreement *</p>
        <div class="flex items-baseline space-x-2 mt-2">
            <input type="checkbox" name="" id="" class="inline-block">
            <p class="text-gray-600 text-sm">I consent to having this website store my submitted information so they can
                respond to my inquiry.</p>
        </div>
        <input type="submit" value="Submit"
            class="w-full mt-6 bg-blue-600 hover:bg-blue-500 text-white font-semibold p-3">

    </form>

</body>

</html>
