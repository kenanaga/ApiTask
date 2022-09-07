<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendMailUser;
use App\Models\Packages;

class AcceptPackagesJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    private $items, $userid;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($items,$userid)
    {
        $this->items = $items;
        $this->userid = $userid;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {   
        foreach ($this->items as $item) {
            Packages::create([
            'tracking_code' =>$item['tracking_code'],
            'user_id'=>$this->userid,
            'shipping_price' =>$item['shipping_price'],
            'price' =>$item['price'],
            'category' =>$item['category'],
            'first_name' =>$item['first_name'],
            'last_name'=>$item['last_name'],
            'phone_number' =>$item['phone_number'],
            'email' =>$item['email']
            ]); 

            Mail::to($item['email'])->send(new SendMailUser($item));
           
        }
    }
}
