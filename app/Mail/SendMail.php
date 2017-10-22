<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use Carbon\Carbon;
class SendMail extends Mailable
{
    use Queueable, SerializesModels;
    public $listBillDetail;
    public $bill;
    public $email;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    
    public function __construct($listBillDetail,$bill,$email)
    {
        $this->listBillDetail = $listBillDetail;
        $this->bill = $bill;
        $this->email = $email;
       
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        
        return $this->view('Page.mail',compact('listBillDetail','bill','email'))->to($this->email)->from('datnguyenctk40@gmail.com','Yasuo')->subject('Đơn đặt hàng của bạn');
    }
}
