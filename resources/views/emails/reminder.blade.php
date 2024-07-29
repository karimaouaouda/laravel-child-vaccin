<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Document</title>
</head>
<body>
<!-- https://play.tailwindcss.com/PLrIiZQn2n -->

<div class="relative flex min-h-screen flex-col items-center justify-center overflow-hidden py-6 sm:py-12 bg-white">
    <div class="max-w-xl px-5 text-center">
        <h2 class="mb-2 text-[42px] font-bold text-zinc-800">Hello <b>{{ $child->owner->name  }}</b></h2>
        <p class="mb-2 text-lg text-zinc-500"> we email you to remind you about your child <b>{{ $child->full_name  }}</b>
            vaccin that it's get sooner</p>
        <a href="{{ url('/dashboard/children/' . $child->id . '/vaccins')  }}" class="mt-3 inline-block w-96 rounded bg-indigo-600 px-5 py-3 font-medium text-white shadow-md shadow-indigo-500/20 hover:bg-indigo-700">more deatails →</a>
    </div>
</div>
</body>
</html>
