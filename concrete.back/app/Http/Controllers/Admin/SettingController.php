<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\SettingRequest;
use App\Models\Setting;
use App\Services\Actions\SettingServiceAction;
use App\Http\Controllers\Controller;
use Illuminate\View\View;

class SettingController extends Controller {
	/**
	 * @var SettingServiceAction
	 */
	protected $service;

	/**
	 * SettingController constructor.
	 *
	 * @param SettingServiceAction $service
	 */
	public function __construct(SettingServiceAction $service) {
		$this->service = $service;
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param SettingRequest $request
	 * @return \Illuminate\Http\RedirectResponse
	 */
	public function store(SettingRequest $request) {
		$this->service->createSetting($request->createDto());

		return back()->with('success', 'Settings saved!');
	}

	/**
	 * @return View
	 */
	public function edit() :View {
		$setting = Setting::query()->first();

		return view('admin.settings.index', ['setting' => $setting]);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param Setting $setting
	 * @param SettingRequest $request
	 * @return \Illuminate\Http\RedirectResponse
	 */
	public function update(Setting $setting, SettingRequest $request) {
		$this->service->updateSetting($setting, $request->createDto());
		return back()->with('success', 'Settings updated!');
	}
}
