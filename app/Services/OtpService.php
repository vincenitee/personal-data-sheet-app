<?php

namespace App\Services;

use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendOtpMail;

class OtpService
{
    protected $expiryMinutes = 5;

    public function generateOtp($email)
    {
        $otp = rand(100000, 999999); // Generate a 6-digit OTP
        $key = $this->getCacheKey($email);

        Cache::put($key, $otp, now()->addMinutes($this->expiryMinutes));

        Mail::to($email)->send(new SendOtpMail($otp));

        return $otp;
    }

    public function verifyOtp($email, $otp)
    {
        $key = $this->getCacheKey($email);
        if (Cache::get($key) == $otp) {
            Cache::forget($key); // Remove OTP after successful verification
            return true;
        }
        return false;
    }

    private function getCacheKey($email)
    {
        return "otp_{$email}";
    }
}
