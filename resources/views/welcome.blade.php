<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Exam Social Media</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="flex items-center justify-center min-h-screen bg-gray-100">
    <div class="text-center">
        <h1 class="text-3xl font-bold text-gray-800 mb-4">Welcome to Senyum Society</h1>

        <img src="https://media.discordapp.net/attachments/285049657954926592/1298991993082347586/senyumin_ae_blay.png?ex=673154d1&is=67300351&hm=941218fadb57bed86229b2cdbd8f5c84c237be64e372d093090eeb4fd9eed4e4&=&format=webp&quality=lossless" class="w-32 h-auto mx-auto mb-6" alt="Logo"/>

        <a href="{{ route('login') }}" class="inline-block px-4 py-2 font-bold text-white bg-gray-700 rounded hover:bg-gray-800">Log in</a>
        <a href="{{ route('register') }}" class="inline-block px-4 py-2 ml-4 font-bold text-white bg-gray-700 rounded hover:bg-gray-800">Register</a>
    </div>
</body>
</html>
