<?php

namespace App\Console\Commands;

use App\Models\Settings;
use App\Services\Actions\NovaPoshta\SettingsServiceAction;
use Illuminate\Console\Command;

class SyncNovaPoshtaBaseSenderLocation extends Command {
  /**
   * The name and signature of the console command.
   *
   * @var string
   */
  protected $signature = 'novaPoshta:senderLocation';

  /**
   * The console command description.
   *
   * @var string
   */
  protected $description = 'Sync city and warehouse of sender by delivery to Nova Poshta API.';

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
   * @return mixed
   */
  public function handle() {
    $this->settingsService->updateSenderLocation(
      Settings::getInstanceModel(), env('NOVAPOSHTA_SENDER_CITY_ID'), env('NOVAPOSHTA_SENDER_WAREHOUSE_ID')
    );
  }
}
