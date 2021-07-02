<?php

namespace App\Http\Controllers;

use App\Enums\StaticPageTypes;
use App\Models\StaticPage;

class StaticPageController extends Controller {

  /**
   * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
   */
  public function contacts() {
  	$contacts = StaticPage::query()
		  ->where('type', StaticPageTypes::CONTACTS)
		  ->first();
		$schedule = StaticPage::query()
			->where('type', StaticPageTypes::SCHEDULE)
			->first();
		$pickUp = StaticPage::query()
			->where('type', StaticPageTypes::PICKUP)
			->first();

    return view('statics.contacts', compact('contacts', 'schedule', 'pickUp'));
  }

  /**
   * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
   */
  public function deliveries() {
  	$payment = StaticPage::query()
		  ->where('type', StaticPageTypes::PAYMENT)
		  ->first();
	  $schedule = StaticPage::query()
		  ->where('type', StaticPageTypes::SCHEDULE)
		  ->first();
	  $delivery = StaticPage::query()
		  ->where('type', StaticPageTypes::DELIVERY)
		  ->first();
	  $pickUp = StaticPage::query()
		  ->where('type', StaticPageTypes::PICKUP)
		  ->first();
    return view('statics.deliveries', compact('payment', 'schedule', 'delivery', 'pickUp'));
  }
}
