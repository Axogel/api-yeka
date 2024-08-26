<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Anime Index</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link
        href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&family=Roboto+Mono:wght@400;700&display=swap"
        rel="stylesheet">
</head>

<body class="bg-gray-900 text-white font-['Roboto']">
    <header class="p-6 bg-gradient-to-r from-pink-500 via-red-500 to-yellow-500 text-center">
        <h1 class="text-5xl font-extrabold tracking-wide">Anime World</h1>
        <p class="mt-2 text-xl">Your ultimate destination for kawaii anime adventures!</p>
        <a href="{{ route('auth.login') }}"
            class="mt-4 inline-block px-6 py-3 bg-white text-gray-900 font-semibold rounded-full shadow-lg transition-transform transform hover:scale-105">
            Login
        </a>
    </header>

    <main class="container mx-auto px-6 py-10">
        <h2 class="text-4xl font-bold mb-6 text-pink-300">Popular Anime Series</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            <div
                class="bg-gray-800 rounded-lg shadow-lg overflow-hidden transition-transform transform hover:scale-105">
                <img src="https://example.com/naruto.jpg" alt="Naruto" class="w-full h-48 object-cover">
                <div class="p-4">
                    <h3 class="text-2xl font-semibold text-pink-400">Naruto</h3>
                    <p class="mt-2 text-gray-300">Follow the journey of Naruto Uzumaki, a young ninja striving to become
                        the strongest ninja and the Hokage of his village.</p>
                </div>
            </div>
            <div
                class="bg-gray-800 rounded-lg shadow-lg overflow-hidden transition-transform transform hover:scale-105">
                <img src="https://example.com/attack_on_titan.jpg" alt="Attack on Titan"
                    class="w-full h-48 object-cover">
                <div class="p-4">
                    <h3 class="text-2xl font-semibold text-pink-400">Attack on Titan</h3>
                    <p class="mt-2 text-gray-300">In a world where humanity lives within giant walled cities to protect
                        themselves from Titans, Eren Yeager joins the fight against these terrifying creatures.</p>
                </div>
            </div>
            <div
                class="bg-gray-800 rounded-lg shadow-lg overflow-hidden transition-transform transform hover:scale-105">
                <img src="https://example.com/my_hero_academia.jpg" alt="My Hero Academia"
                    class="w-full h-48 object-cover">
                <div class="p-4">
                    <h3 class="text-2xl font-semibold text-pink-400">My Hero Academia</h3>
                    <p class="mt-2 text-gray-300">In a world where almost everyone has superpowers known as Quirks,
                        follow Izuku Midoriya's journey to becoming the greatest hero.</p>
                </div>
            </div>
            <!-- Add more anime cards here -->
        </div>
    </main>

    <footer class="bg-gray-800 p-6 text-center text-gray-400">
        <p>&copy; 2024 Anime World. All rights reserved.</p>
    </footer>
</body>

</html>
