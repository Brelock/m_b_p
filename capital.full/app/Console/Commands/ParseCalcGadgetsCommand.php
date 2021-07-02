<?php

namespace App\Console\Commands;

use App\Models\Common\Calculator\CalcGadget;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Orchestra\Parser\Xml\Facade as XmlParser;

class ParseCalcGadgetsCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'gadgets:parse';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Parsing gadgets via ftp connection';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $file = Storage::disk('ftp')->get('exch_comfy/tehnostokComfy.xml');

        $file_name = 'gadgetsForParsing_'.time().rand(100, 999).'.xml';

        $path = 'public/uploads/';

        Storage::disk('local')->put($path.$file_name, $file);

        \File::move(storage_path('app/public/uploads/'.$file_name),public_path('uploads/'.$file_name));

        $xml = XmlParser::load(public_path('uploads/'.$file_name));

        $gadgets = $xml->parse([
            ['uses' => 'Commodity[TypeNomenklatura,Brand,Nomenklatura,Image,Price,Description]'],
        ]);

        CalcGadget::truncate();

        foreach ($gadgets[0] as $gadget){

            CalcGadget::create([
                'category' => $gadget['TypeNomenklatura'],
                'brand' => str_replace ( '  ', ' ', $gadget['Brand']),
                'model' => $gadget['Nomenklatura'],
                'image' => $gadget['Image'],
                'price' => $gadget['Price'],
                'description' => $gadget['Description'],
            ]);
        }

        \File::delete(public_path('uploads/'.$file_name));

    }
}
