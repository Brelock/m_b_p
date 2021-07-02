<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class ParseCalcGadgetsJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
//        if ($request->has('gadgets')){
//
//            $file = $request->gadgets;
//
//            $file_name = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME).'_'.time().'.'.$file->getClientOriginalExtension();
//
//            $path = 'public/uploads/';
//
//            Storage::putFileAs($path, $file, $file_name);
//
//            $xml = XmlParser::load(asset('storage/uploads/'.$file_name));
//
//            $gadgets = $xml->parse([
//                ['uses' => 'Commodity[TypeNomenklatura,Brand,Nomenklatura,Image,Price,Description]'],
//            ]);
//
//            CalcGadget::truncate();
//
//            foreach ($gadgets[0] as $gadget){
//
//                CalcGadget::create([
//                    'category' => $gadget['TypeNomenklatura'],
//                    'brand' => $gadget['Brand'],
//                    'model' => $gadget['Nomenklatura'],
//                    'image' => $gadget['Image'],
//                    'price' => $gadget['Price'],
//                    'description' => $gadget['Description'],
//                ]);
//            }
//        }
    }
}
