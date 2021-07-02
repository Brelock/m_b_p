<?php

namespace App\Console\Commands;

use App\Models\ProductPicture;
use App\Services\FileService;
use Illuminate\Console\Command;

class CreateThumbnailPictures extends Command {
  /**
   * The name and signature of the console command.
   *
   * @var string
   */
  protected $signature = 'pictures:thumbnail';

  /**
   * The console command description.
   *
   * @var string
   */
  protected $description = 'Create thumbnail version pictures of products.';

  /**
   * @var FileService
   */
  protected $fileService;

  /**
   * Create a new command instance.
   *
   * @param  FileService $fileService
   * @return void
   */
  public function __construct(FileService $fileService) {
    $this->fileService = $fileService;

    parent::__construct();
  }

  /**
   * Execute the console command.
   *
   * @return mixed
   */
  public function handle() {
    $this->info("Start creating thumbnail version pictures...\n");

    ProductPicture::onlyWithoutThumbnail()
      ->each(function($picture) {
        try {
          /* @var ProductPicture $picture */
          if($picture->createThumbnailVersion($this->fileService))
            $this->info("Thumbnail created for {$picture->id}...\n");
          else
            $this->info("Fail thumbnail created for {$picture->id}...\n");
        } catch(\Exception $exception) {
          $this->info($exception->getMessage());
        }
      }, 15);

    $this->info("End creating thumbnail version pictures...\n");
  }
}
