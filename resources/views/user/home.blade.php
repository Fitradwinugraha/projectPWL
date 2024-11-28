@extends('layouts.user')

@section('banner')
<div className="absolute inset-0 bg-black bg-opacity-50"></div>
    <section class="bg-[#eee] py-24">
        <div class="container mx-auto flex flex-col items-center justify-center p-6">
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
                            <li>Proses Cepat</li>
                        </ul>
                    </div>
                </div>
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

        <div x-data="{
                search: '',
                motors: {{ $motors->map(fn($motor) => [
                    'id' => $motor->id,
                    'nama_motor' => $motor->nama_motor,
                    'tahun_pembuatan' => $motor->tahun_pembuatan,
                    'merek_motor' => $motor->merek_motor,
                    'jumlah' => $motor->jumlah,
                    'harga_sewa' => $motor->harga_sewa,
                    'foto_motor' => asset('uploads/' . $motor->foto_motor),
                    'no_telepon' => $motor->no_telepon ?? '081375839812',
                ]) }}
            }">

                <div class="mb-8">
                    <input 
                        type="text" 
                        x-model="search" 
                        placeholder="Cari motor..." 
                        class="w-full p-4 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none"
                    />
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-8" id="bikes">
                    <template x-for="motor in motors.filter(item => item.nama_motor.toLowerCase().includes(search.toLowerCase()))" :key="motor.id">
                        <div class="card bg-white shadow-lg rounded-lg overflow-hidden p-6 group">
                            <div class="relative overflow-hidden rounded-lg mb-4">
                                <img :src="motor.foto_motor" :alt="motor.nama_motor"
                                    class="w-full h-60 object-cover transition-transform duration-300 group-hover:scale-125">
                            </div>
                            
                            <div class="p-4">
                                <h3 class="text-xl font-semibold text-gray-900 mb-2" x-text="`${motor.nama_motor} (${motor.tahun_pembuatan})`"></h3>
                                <p class="text-gray-600 text-sm mb-2">Merek: <span class="font-semibold" x-text="motor.merek_motor"></span></p>
                                <p class="text-red-600 font-semibold text-sm mb-4">Unit Tersedia: <strong x-text="motor.jumlah"></strong></p>
                                <p class="text-green-500 font-bold text-lg" x-text="`Rp ${new Intl.NumberFormat('id-ID').format(motor.harga_sewa)} / hari`"></p>
                                
                                <div class="mt-6 flex items-center justify-center gap-8">
                                    @if(auth()->check())
                                        <a :href="`{{ url('transaksi') }}/${motor.id}`" 
                                        class="bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded-lg text-center transition-colors duration-200 flex items-center justify-center sm:w-auto">
                                        <i class="fas fa-shopping-cart mr-2"></i> Pesan Sekarang
                                        </a>
                                    @else
                                        <a href="{{ route('login') }}" 
                                        class="bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded-lg text-center transition-colors duration-200 flex items-center justify-center sm:w-auto">
                                        <i class="fas fa-shopping-cart mr-2"></i> Pesan Sekarang
                                        </a>
                                    @endif

                                    <a :href="`https://wa.me/62${motor.no_telepon.substring(1)}?text=Halo,%20saya%20ingin%20menyewa%20motor%20${encodeURIComponent(motor.nama_motor)}.`"
                                    class="bg-green-600 hover:bg-green-700 text-white font-semibold flex items-center justify-center py-2 px-4 rounded-lg text-center transition-colors duration-200 sm:w-auto"
                                    target="_blank">
                                    <i class="fab fa-whatsapp mr-2"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </template>
                </div>
            </div>

        </div>
    </section>
@endsection

@section('faq')

    <section class="bg-gray-100 py-12" id="faq">
        <div class="container mx-auto max-w-2xl p-4">
            <div class="relative flex flex-col items-center justify-center mt-4 mb-10">
                <h1 class="absolute text-6xl md:text-8xl font-extrabold text-gray-300 opacity-75 select-none">
                    FAQ
                </h1>
                <h1 class="relative text-2xl md:text-4xl font-extrabold text-gray-800">
                    FAQ
                </h1>
            </div>
            <div class="text-center mb-10">
                <p class="text-gray-600">Pertanyaan yang sering diajukan oleh customers !</p>
            </div>
            <div class="space-y-6">
                <!-- Chat Bubble 1 -->
                <div class="flex items-end space-x-4">
                    <img src="{{ asset('assets/img/user-img.png') }}" alt="User Profile" class="w-10 h-10 rounded-full">
                    <div class="relative bg-green-500 text-white p-4 rounded-2xl rounded-bl-none shadow-md max-w-sm">
                        <p class="text-sm font-medium">Bagaimana cara melakukan pemesanan motor?</p>
                        <span class="absolute -bottom-2 -left-2 w-3 h-3 bg-green-500 rotate-45"></span>
                    </div>
                </div>
                <div class="flex justify-end items-end space-x-4">
                    <div class="relative bg-gray-200 text-gray-900 p-4 rounded-2xl rounded-br-none shadow-md max-w-sm">
                        <p class="text-sm font-medium">Anda dapat melakukan pemesanan motor melalui website kami.</p>
                        <div class="text-right text-xs text-gray-500 mt-1">
                            <span>12:00</span>
                            <i class="fas fa-check text-blue-500 ml-1"></i>
                        </div>
                        <span class="absolute -bottom-2 -right-2 w-3 h-3 bg-gray-200 rotate-45"></span>
                    </div>
                    <img src="{{ asset('assets/img/admin-img.png') }}" alt="Support Profile" class="w-10 h-auto">
                </div>
                <div class="flex justify-end items-end space-x-4">
                    <div class="relative bg-gray-200 text-gray-900 p-4 rounded-2xl rounded-br-none shadow-md max-w-sm">
                        <p class="text-sm font-medium">Pilih motor yang Anda inginkan, tentukan tanggal sewa, dan lakukan pembayaran.</p>
                        <div class="text-right text-xs text-gray-500 mt-1">
                            <span>12:01</span>
                            <i class="fas fa-check text-blue-500 ml-1"></i>
                        </div>
                        <span class="absolute -bottom-2 -right-2 w-3 h-3 bg-gray-200 rotate-45"></span>
                    </div>
                    <img src="{{ asset('assets/img/admin-img.png') }}" alt="Support Profile" class="w-10 h-auto">
                </div>

                <!-- Chat Bubble 2 -->
                <div class="flex items-end space-x-4">
                    <img src="{{ asset('assets/img/user-img.png') }}" alt="User Profile" class="w-10 h-10 rounded-full">
                    <div class="relative bg-green-500 text-white p-4 rounded-2xl rounded-bl-none shadow-md max-w-sm">
                        <p class="text-sm font-medium">Apa yang harus dilakukan jika motor mengalami kerusakan?</p>
                        <span class="absolute -bottom-2 -left-2 w-3 h-3 bg-green-500 rotate-45"></span>
                    </div>
                </div>
                <div class="flex justify-end items-end space-x-4">
                    <div class="relative bg-gray-200 text-gray-900 p-4 rounded-2xl rounded-br-none shadow-md max-w-sm">
                        <p class="text-sm font-medium">Jika motor mengalami kerusakan, harap segera hubungi kami melalui layanan WhatsApp yang tersedia untuk mendapatkan bantuan lebih lanjut.</p>
                        <div class="text-right text-xs text-gray-500 mt-1">
                            <span>12:05</span>
                            <i class="fas fa-check text-blue-500 ml-1"></i>
                        </div>
                        <span class="absolute -bottom-2 -right-2 w-3 h-3 bg-gray-200 rotate-45"></span>
                    </div>
                    <img src="{{ asset('assets/img/admin-img.png') }}" alt="Support Profile" class="w-10 h-auto">
                </div>

                <!-- Chat Bubble 3 -->
                <div class="flex items-end space-x-4">
                    <img src="{{ asset('assets/img/user-img.png') }}" alt="User Profile" class="w-10 h-10 rounded-full">
                    <div class="relative bg-green-500 text-white p-4 rounded-2xl rounded-bl-none shadow-md max-w-sm">
                        <p class="text-sm font-medium">Apakah ada jaminan untuk motor yang disewa?</p>
                        <span class="absolute -bottom-2 -left-2 w-3 h-3 bg-green-500 rotate-45"></span>
                    </div>
                </div>
                <div class="flex justify-end items-end space-x-4">
                    <div class="relative bg-gray-200 text-gray-900 p-4 rounded-2xl rounded-br-none shadow-md max-w-sm">
                        <p class="text-sm font-medium">Kami menyediakan motor dalam kondisi terbaik.</p>
                        <div class="text-right text-xs text-gray-500 mt-1">
                            <span>12:10</span>
                            <i class="fas fa-check text-blue-500 ml-1"></i>
                        </div>
                        <span class="absolute -bottom-2 -right-2 w-3 h-3 bg-gray-200 rotate-45"></span>
                    </div>
                    <img src="{{ asset('assets/img/admin-img.png') }}" alt="Support Profile" class="w-10 h-auto">
                </div>
                <div class="flex justify-end items-end space-x-4">
                    <div class="relative bg-gray-200 text-gray-900 p-4 rounded-2xl rounded-br-none shadow-md max-w-sm">
                        <p class="text-sm font-medium">Jika ada kerusakan yang terjadi akibat kelalaian pengguna, Anda akan dikenakan biaya perbaikan.</p>
                        <div class="text-right text-xs text-gray-500 mt-1">
                            <span>12:10</span>
                            <i class="fas fa-check text-blue-500 ml-1"></i>
                        </div>
                        <span class="absolute -bottom-2 -right-2 w-3 h-3 bg-gray-200 rotate-45"></span>
                    </div>
                    <img src="{{ asset('assets/img/admin-img.png') }}" alt="Support Profile" class="w-10 h-auto">
                </div>
            </div>
        </div>
    </section>


    <div class="fixed bottom-6 left -6 z-50">
        <a href="https://wa.me/6281375839812" target="_blank" class="bg-green-500 text-white flex items-center justify-center p-4 rounded-full shadow-lg hover:bg-green-600 transform animate-bounce duration-1000">
            <i class="fab fa-whatsapp text-3xl"></i>
        </a>
    </div>


@endsection