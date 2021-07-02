<?php

namespace App\Console\Commands;

use App\Models\Settings;
use App\Services\Actions\NovaPoshta\SettingsServiceAction;
use Illuminate\Console\Command;

class SyncNovaPoshtaBaseSender extends Command {
  /**
   * The name and signature of the console command.
   *
   * @var string
   */
  protected $signature = 'novaPoshta:sender';

  /**
   * The console command description.
   *
   * @var string
   */
  protected $description = 'Sync data of sender by delivery from Nova Poshta API.';

  /**
   * @var SettingsServiceAction
   */
  protected $settingsService;

  /**
   * Create a new command instance.
   *
   * @param  SettingsServiceAction $settingsService
   *
   * @return void
   */
  public function __construct(SettingsServiceAction $settingsService) {
    $this->settingsService = $settingsService;

    parent::__construct();
  }

  /**
   * Execute the console command.
   *
   * @return void
   *
   * @throws \App\NovaPoshta\Exceptions\NovaPoshtaException
   * @throws \GuzzleHttp\Exception\GuzzleException
   */
  public function handle() {
    $this->settingsService->updateSender(Settings::getInstanceModel());
  }
}
