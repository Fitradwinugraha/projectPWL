@extends('layouts.user')

@section('banner')
    <section class="bg-[#eee] py-24">
        <div class="container mx-auto flex flex-col items-center justify-center p-6">
            <!-- <div class="w-full md:w-1/2 flex justify-center mb-6 md:mb-0">
                <img src="https://via.placeholder.com/300" alt="logo-himakom" class="max-w-full h-auto" />
            </div> -->
            <div class="w-full md:w-1/2 flex justify-center mb-6 md:mb-0">
                <img src="{{ asset('assets/img/logos.png') }}" alt="logo" class="max-w-full h-auto" />
            </div>
            <div class="w-full md:w-1/2 text-center mt-12">
                <h1 class="text-4xl md:text-5xl font-extrabold text-gray-800">
                    Dare to Dream, Strive for Greatness
                </h1>
                <div class="mt-10">
                    <a href="#about" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-6 border rounded inline-block">
                        Get Started
                    </a>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('about') 
    <section class="bg-gray-800 p-6 " id="about">
        <div class="container mx-auto flex flex-col justify-center items-center px-4 py-10">
            <div class="relative flex flex-col items-center justify-center mt-4 mb-10">
                <h1 class="absolute text-6xl md:text-8xl font-extrabold text-gray-300 opacity-25 select-none">
                    About
                </h1>
                <h1 class="relative text-2xl md:text-4xl font-extrabold text-white">
                    About Us
                </h1>
            </div>
            <div class="text-white">
                <h1 class="text-2xl font-bold mb-4">Apa itu Swift Bike ?</h1>
                <p class="text-justify">
                Swift Bike adalah layanan penyewaan motor terpercaya yang berkomitmen untuk memberikan pengalaman berkendara yang nyaman dan aman bagi setiap pelanggan. Kami memahami kebutuhan Anda akan transportasi yang fleksibel dan efisien, baik untuk keperluan pribadi maupun bisnis.
                </p>
                <p class="text-justify">
                Dengan berbagai pilihan motor terbaru dan berkualitas, kami menawarkan tarif sewa yang kompetitif dan layanan pelanggan yang ramah. Tim kami siap membantu Anda memilih motor yang sesuai dengan kebutuhan Anda, serta memberikan informasi dan tips berkendara yang berguna.
                </p>
            </div>
            <div class="flex flex-col lg:flex-row lg:justify-between w-full mt-7 text-white">
                <div class="md:w-1/2">
                    <h1 class="text-2xl font-bold mb-4">Keuntungan yang apa saja yang didapatkan jika menggunakan Swift Bike !</h1>
                    <div class="mb-10">
                        <ul class="text-justify list-disc px-4">
                            <li>Kualitas Terbaik</li>
                            <li>Harga Bersaing</li>
                            <li>Proses Sewa Mudah</li>
                            <li>---</li>
                        </ul>
                    </div>
                </div>
                <!-- <div class="flex items-center justify-center">
                    <img src="https://via.placeholder.com/300" alt="logo-himakom" class="max-w-full h-[150px]"/>
                </div> -->
                <div class="flex items-center justify-center">
                    <img src="{{ asset('assets/img/logos.png') }}" alt="logo" class="max-w-full h-[75px]"/>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('content')
    <section class="bg-[#eee] p-6">
        <div class="relative flex flex-col items-center justify-center mt-4 mb-10">
            <h1 class="absolute text-6xl md:text-8xl font-extrabold text-gray-300 opacity-75 select-none">
                Available
            </h1>
            <h1 class="relative text-2xl md:text-4xl font-extrabold text-gray-800">
                BIKES
            </h1>
        </div>

        <div class="flex justify-center space-x-4 mb-6">
            <button onclick="filterCards('all')" class="px-4 py-2 bg-blue-500 text-white rounded"><i class="fas fa-list"></i></button>
            <button onclick="filterCards('Honda')" class="px-4 py-2 bg-blue-500 text-white rounded">Honda</button>
            <button onclick="filterCards('Yamaha')" class="px-4 py-2 bg-blue-500 text-white rounded">Yamaha</button>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6" id="bikes">
            <!-- Honda Cards -->
            <div class="card Honda bg-white shadow-lg rounded-lg overflow-hidden transform hover:scale-105 transition duration-300">
                <img src="https://via.placeholder.com/300" alt="Honda Beat" class="w-full h-48 object-cover">
                <div class="p-4">
                    <h3 class="text-lg font-bold text-gray-900">Honda Beat</h3>
                    <p class="text-gray-700">Lampung</p>
                    <p class="text-green-500 font-semibold mt-2">Rp 100,000</p>
                </div>
                <div class="flex items-center justify-center py-4">
                    <button onclick="window.location.href='/transaksi'" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-6 border rounded inline-block">Pesan Sekarang</button>
                    <a href="https://wa.me/6281375839812" target="_blank">
                        <i class="fab fa-whatsapp text-2xl bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-6 border rounded inline-block ml-2"></i>
                    </a>
                </div>
            </div>
            <div class="card Honda bg-white shadow-lg rounded-lg overflow-hidden transform hover:scale-105 transition duration-300">
                <img src="https://via.placeholder.com/300" alt="Honda Vario" class="w-full h-48 object-cover">
                <div class="p-4">
                    <h3 class="text-lg font-bold text-gray-900">Honda Vario</h3>
                    <p class="text-gray-700">Lampung</p>
                    <p class="text-green-500 font-semibold mt-2">Rp 100,000</p>
                </div>
                <div class="flex items-center justify-center py-4">
                    <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-6 border rounded inline-block">Pesan Sekarang</button>
                    <a href="https://wa.me/6281375839812" target="_blank">
                        <i class="fab fa-whatsapp text-2xl bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-6 border rounded inline-block ml-2"></i>
                    </a>
                </div>
            </div>
            <div class="card Honda bg-white shadow-lg rounded-lg overflow-hidden transform hover:scale-105 transition duration-300">
                <img src="https://via.placeholder.com/300" alt="Honda Scoopy" class="w-full h-48 object-cover">
                <div class="p-4">
                    <h3 class="text-lg font-bold text-gray-900">Honda Scoopy</h3>
                    <p class="text-gray-700">Lampung</p>
                    <p class="text-green-500 font-semibold mt-2">Rp 100,000</p>
                </div>
                <div class="flex items-center justify-center py-4">
                    <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-6 border rounded inline-block">Pesan Sekarang</button>
                    <a href="https://wa.me/6281375839812" target="_blank">
                        <i class="fab fa-whatsapp text-2xl bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-6 border rounded inline-block ml-2"></i>
                    </a>
                </div>
            </div>

            <!-- Yamaha Cards -->
            <div class="card Yamaha bg-white shadow-lg rounded-lg overflow-hidden transform hover:scale-105 transition duration-300">
                <img src="https://via.placeholder.com/300" alt="Yamaha NMAX" class="w-full h-48 object-cover">
                <div class="p-4">
                    <h3 class="text-lg font-bold text-gray-900">Yamaha NMAX</h3>
                    <p class="text-gray-700">Lampung</p>
                    <p class="text-green-500 font-semibold mt-2">Rp 100,000</p>
                </div>
                <div class="flex items-center justify-center py-4">
                    <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-6 border rounded inline-block">Pesan Sekarang</button>
                    <a href="https://wa.me/6281375839812" target="_blank">
                        <i class="fab fa-whatsapp text-2xl bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-6 border rounded inline-block ml-2"></i>
                    </a>
                </div>
            </div>
            <div class="card Yamaha bg-white shadow-lg rounded-lg overflow-hidden transform hover:scale-105 transition duration-300">
                <img src="https://via.placeholder.com/300" alt="Yamaha Mio" class="w-full h-48 object-cover">
                <div class="p-4">
                    <h3 class="text-lg font-bold text-gray-900">Yamaha Mio</h3>
                    <p class="text-gray-700">Lampung</p>
                    <p class="text-green-500 font-semibold mt-2">Rp 100,000</p>
                </div>
                <div class="flex items-center justify-center py-4">
                    <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-6 border rounded inline-block">Pesan Sekarang</button>
                    <a href="https://wa.me/6281375839812" target="_blank">
                        <i class="fab fa-whatsapp text-2xl bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-6 border rounded inline-block ml-2"></i>
                    </a>
                </div>
            </div>
            <div class="card Yamaha bg-white shadow-lg rounded-lg overflow-hidden transform hover:scale-105 transition duration-300">
                <img src="https://via.placeholder.com/300" alt="Yamaha Aerox" class="w-full h-48 object-cover">
                <div class="p-4">
                    <h3 class="text-lg font-bold text-gray-900">Yamaha Aerox</h3>
                    <p class="text-gray-700">Lampung</p>
                    <p class="text-green-500 font-semibold mt-2">Rp 100,000</p>
                </div>
                <div class="flex items-center justify-center py-4">
                    <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-6 border rounded inline-block">Pesan Sekarang</button>
                    <a href="https://wa.me/6281375839812" target="_blank">
                        <i class="fab fa-whatsapp text-2xl bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-6 border rounded inline-block ml-2"></i>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <script>
        function filterCards(category) {
            const cards = document.querySelectorAll('.card');
            cards.forEach(card => {
                if (category === 'all' || card.classList.contains(category)) {
                    card.style.display = 'block';
                } else {
                    card.style.display = 'none';
                }
            });
        }
    </script>
@endsection