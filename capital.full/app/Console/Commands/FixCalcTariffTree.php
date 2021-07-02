<?php

namespace App\Console\Commands;

use App\Models\Common\Calculator\CalcTariff;
use Illuminate\Console\Command;

class FixCalcTariffTree extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'fix-tree:tariff';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Чинит сортировку тарифов';

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
        $this->info('Поехали.');
        CalcTariff::fixTree();
        $this->info('Готово.');
    }
}
