<?php

namespace App\Console;

use App\Console\Commands\DeleteZipFiles;
use App\Console\Commands\DownloadRozetkaXml;
use App\Console\Commands\ImportRozetkaXml;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\DB;

class Kernel extends ConsoleKernel {
  /**
   * The Artisan commands provided by your application.
   *
   * @var array
   */
  protected $commands = [
    //
  ];

  /**
   * Define the application's command schedule.
   *
   * @param  \Illuminate\Console\Scheduling\Schedule $schedule
   * @return void
   */
  protected function schedule(Schedule $schedule) {
//     $schedule->command('inspire')->everyFifteenMinutes();

    //$schedule->command(DownloadRozetkaXml::class)->daily();
  
    $schedule->command(ImportRozetkaXml::class)->dailyAt('07:00');
    $schedule->command(ImportRozetkaXml::class)->dailyAt('12:30');
    $schedule->command(ImportRozetkaXml::class)->dailyAt('15:30');
    $schedule->command(ImportRozetkaXml::class)->dailyAt('19:30');
    
    $schedule->command(DeleteZipFiles::class)->everyFifteenMinutes();

    $schedule->call(function () {
      $jobs = DB::table('failed_jobs')->where('failed_at', '<=', now()->subDay())->get();

      foreach ($jobs as $job) {
        Artisan::call('queue:retry', [
          'id' => $job->id
        ]);
      }

    })->daily();
  }

  /**
   * Register the commands for the application.
   *
   * @return void
   */
  protected function commands() {
    $this->load(__DIR__ . '/Commands');

    require base_path('routes/console.php');
  }
}
