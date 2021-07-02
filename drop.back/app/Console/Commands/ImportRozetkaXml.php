<?php

namespace App\Console\Commands;

use App\Collection\CategoryCollection;
use App\Import\Analyzer\BaseAnalyzer;
use App\Import\Seeder\BaseSeeder;
use Illuminate\Console\Command;

class ImportRozetkaXml extends Command {
  /**
   * The name and signature of the console command.
   *
   * @var string
   */
  protected $signature = 'import:rozetkaXml';

  /**
   * The console command description.
   *
   * @var string
   */
  protected $description = 'Import data to database from XML file.';

  /**
   * @var BaseAnalyzer
   */
  protected $importAnalyzer;

  /**
   * @var BaseSeeder
   */
  protected $importSeeder;

  /**
   * Create a new command instance.
   *
   * @param BaseAnalyzer $importAnalyzer
   * @param BaseSeeder $importSeeder
   *
   * @return void
   */
  public function __construct(BaseAnalyzer $importAnalyzer, BaseSeeder $importSeeder) {
    parent::__construct();

    $this->importAnalyzer = $importAnalyzer;
    $this->importSeeder = $importSeeder;
  }

  /**
   * Execute the console command.
   *
   * @return mixed
   */
  public function handle() {
    $this->info("Start importing file...\n");

    /* @var CategoryCollection $categories */
//     $categories = Category::query()->get();
    $categories = $this->importSeeder
      ->categorySeeder($this->importAnalyzer->getCategories())
      ->run();

    $this->importSeeder
      ->productSeeder($this->importAnalyzer->getOffers(), $categories)
      ->run();

    $this->info("File is successfully imported!\n");
  }
}
