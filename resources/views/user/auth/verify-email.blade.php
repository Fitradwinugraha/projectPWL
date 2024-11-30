<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verifikasi Email</title>
    <style>
        
        body {
            font-family: 'Arial', sans-serif;
            background-color: #202c34;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 600px;
            margin: 50px auto;
            background-color: #ffffff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        h1 {
            font-size: 24px;
            color: #333333;
            text-align: center;
            margin-bottom: 20px;
        }

        p {
            font-size: 16px;
            color: #555555;
            line-height: 1.6;
            text-align: center;
            margin-bottom: 20px;
        }

        .cta-button {
            display: block;
            width: 200px;
            margin: 0 auto;
            padding: 12px 20px;
            background-color: #4CAF50;
            color: white;
            font-size: 16px;
            text-align: center;
            text-decoration: none;
            border-radius: 5px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            transition: background-color 0.3s ease;
        }

        .cta-buttonn {
            display: block;
            width: 200px;
            margin: 0 auto;
            padding: 12px 20px;
            background-color: #202c34;
            color: white;
            font-size: 16px;
            text-align: center;
            text-decoration: none;
            border-radius: 5px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            transition: background-color 0.3s ease;
        }

        .cta-button:hover {
            background-color: #45a049;
        }

        footer {
            font-size: 14px;
            color: #888888;
            text-align: center;
            margin-top: 30px;
        }

        footer p {
            color: #999999;
            text-decoration: none;
        }

            .image{
                width: auto;
                height: 60px;
                display: block;
                margin: 0 auto;
            }
    </style>
</head>
<body>
    
    <div class="container">
        <img src="{{ asset('assets/img/logos.png') }}" alt="logo" class="image">
        <h1>Verifikasi Email Anda</h1>
        <p>Segera cek email anda untuk aktivasi akun.<br>Terimakasih</p>
        <form method="POST" action="{{ route('verification.send') }}">
    @csrf
    <button type="submit" class="cta-button">Kirim Ulang Verifikasi</button>
</form><br>

        <p>Sudah Verifikasi Email?</p>

    <a href="/home" class="cta-buttonn">Masuk Sekarang</a>


    </div>

    <footer>
        <p>Jika Anda tidak mendaftar di situs kami, abaikan pesan ini.</p>
        <p>&copy; 2024 SwiftBike. Semua hak dilindungi.</p>
    </footer>
</body>
</html>
