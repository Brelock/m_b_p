<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class UpdateProductParamTable extends Command {
	/**
	 * The name and signature of the console command.
	 *
	 * @var string
	 */
	protected $signature = 'update:productParamTable';

	/**
	 * The console command description.
	 *
	 * @var string
	 */
	protected $description = 'Update product_param table and insert data into param_value table in DB';

	/**
	 * Create a new command instance.
	 *
	 * @return void
	 */
	public function __construct() {
		parent::__construct();
	}

	/**
	 * Execute the console command.
	 *
	 * @return mixed
	 */
	public function handle() {
		$this->info("Start updating data");

		/** insert data to param_value table from product_param table */
		DB::statement('INSERT INTO `param_value` (`param_value`.`param_id`, `param_value`.`value`)
      SELECT `param_id`, `value` FROM `product_param` 
			GROUP BY `product_param`.`param_id`, `product_param`.`value`');

		/** update param_value_id in product_param from param_value */
    DB::statement('UPDATE `product_param`
	  JOIN `param_value` ON `param_value`.`param_id`=`product_param`.`param_id`
	  AND `param_value`.`value`=`product_param`.`value`
	  SET `product_param`.`param_value_id`=`param_value`.`id`');

    /** drop value column from product_param table */
		DB::statement('ALTER TABLE `product_param` DROP COLUMN `product_param`.`value`');

		$this->info("Finish updating data");
	}
}
