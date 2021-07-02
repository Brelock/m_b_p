<?php

namespace App\Console\Commands;

use App\Enums\DirectoriesStorage;
use App\Services\FileService;
use Illuminate\Console\Command;

class DeleteZipFiles extends Command {
	/**
	 * The name and signature of the console command.
	 *
	 * @var string
	 */
	protected $signature = 'delete:zipFiles';

	/**
	 * The console command description.
	 *
	 * @var string
	 */
	protected $description = 'Delete zip files';

	/**
	 * @var FileService
	 */
	protected $fileService;

	/**
	 * DeleteZipFiles constructor.
	 *
	 * @param FileService $fileService
	 */
	public function __construct(FileService $fileService) {
		$this->fileService = $fileService;

		parent::__construct();
	}

  /**
   * Execute the console command.
   */
	public function handle() {
		$this->info("Start cleaning archive...\n");

		$this->fileService->getDisk()->delete(
      $this->fileService->oldModifiedFiles(
        DirectoriesStorage::ARCHIVE_FILE_PATH, env('FRESH_TIME_ARCHIVE_FILE')
      )
    );

		$this->info("Finish cleaning archive!\n");
	}
}
