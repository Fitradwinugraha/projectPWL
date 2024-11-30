<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verifikasi Email</title>
</head>
<body>
    <h1>Verifikasi Email Anda</h1>
    <p>Terima kasih telah mendaftar. Silakan cek email Anda untuk tautan verifikasi.</p>
    <form method="POST" action="{{ route('verification.resend') }}">
        @csrf
        <button type="submit">Kirim Ulang Email Verifikasi</button>
    </form>
</body>
</html>
