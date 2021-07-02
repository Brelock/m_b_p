<?php

namespace App\Console\Commands;

use App\Models\Common\Office;
use Illuminate\Console\Command;

class ParseAddressOffice extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'parse:address';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Parse address to office';

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
        $offices = Office::query()->get();
        $this->info(count($offices));
        foreach($offices as $office) {
            $addressUk = $office->address_uk;

            $streetTypeUk = stristr($addressUk, ' ', true);
            $streetUk = trim(stristr($addressUk, ' '));

            $addressRu = $office->address_ru;
            $streetTypeRu = stristr($addressRu, ' ', true);
            $streetRu = trim(stristr($addressRu, ' '));

            $office
                ->fill([
                    'address_uk' => $streetUk,
                    'street_type_uk' => $streetTypeUk,
                    'address_ru' => $streetRu,
                    'street_type_ru' => $streetTypeRu,
                ])
                ->save();
        }
        $this->info('Done!!!');
    }
}
