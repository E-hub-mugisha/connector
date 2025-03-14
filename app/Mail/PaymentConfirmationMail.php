<?php

namespace App\Mail;

use App\Models\ServiceBooking;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class PaymentConfirmationMail extends Mailable
{
    use Queueable, SerializesModels;

    public $booking;

    /**
     * Create a new message instance.
     *
     * @param  ServiceBooking  $booking
     * @return void
     */
    public function __construct(ServiceBooking $booking)
    {
        $this->booking = $booking;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.payment_confirmation') // Use Markdown for the email template
                    ->subject('Payment Confirmation')  // Set the subject for the email
                    ->with([
                        'booking' => $this->booking,
                        // You can pass other variables here that you want to use in the email view
                    ]);
    }
}
