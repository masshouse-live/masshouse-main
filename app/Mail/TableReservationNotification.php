<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class TableReservationNotification extends Mailable
{
    use Queueable, SerializesModels;

    public $customerName;
    public $date;
    public $fromTime;
    public $toTime;
    public $tableIndex;
    public $icsContent;

    public function __construct($customerName, $date, $fromTime, $toTime, $tableIndex, $icsContent)
    {
        $this->customerName = $customerName;
        $this->date = $date;
        $this->fromTime = $fromTime;
        $this->toTime = $toTime;
        $this->tableIndex = $tableIndex;
        $this->icsContent = $icsContent; // Store the ICS content
    }

    public function build()
    {
        return $this->subject('Table Reservation Confirmation')
            ->view('emails.table_reservation_notification')
            ->attachData($this->icsContent, 'reservation.ics', [
                'mime' => 'text/calendar',
            ]);
    }
}
