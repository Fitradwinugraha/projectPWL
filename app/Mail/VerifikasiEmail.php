<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\User;

class VerifikasiEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $user;
    public $verificationToken;

    public function __construct(User $user, string $verificationToken)
    {
        $this->user = $user;
        $this->verificationToken = $verificationToken;
    }

    public function build()
    {
        $verificationUrl = url('/verify-email/' . $this->verificationToken);

        return $this->subject('Verifikasi Email SwiftBike')
                    ->view('emails.verifikasi')
                    ->with([
                        'nama' => $this->user->nama,
                        'verificationUrl' => $verificationUrl
                    ]);
    }
}