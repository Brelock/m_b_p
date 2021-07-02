<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\SettingsRequest;
use App\Models\Settings;
use App\Services\Actions\SettingsServiceAction;
use App\Http\Controllers\Controller;
use Illuminate\View\View;

class SettingController extends Controller {
	/**
	 * @var SettingsServiceAction
	 */
	protected $service;

	/**
	 * SettingController constructor.
	 *
	 * @param SettingsServiceAction $service
	 */
	public function __construct(SettingsServiceAction $service) {
		$this->service = $service;
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param SettingsRequest $request
	 * @return \Illuminate\Http\RedirectResponse
	 */
	public function store(SettingsRequest $request) {
		$this->service->createSettings($request->createDto());

		return back()->with('success', 'Settings saved!');
	}

	/**
	 * @return View
	 */
	public function edit() :View {
		$setting = Settings::getInstanceModel();

		return view('admin.settings.index', ['setting' => $setting]);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param Settings $setting
	 * @param SettingsRequest $request
	 * @return \Illuminate\Http\RedirectResponse
	 */
	public function update(Settings $setting, SettingsRequest $request) {
		$this->service->updateSetting($setting, $request->createDto());
		return back()->with('success', 'Settings updated!');
	}
}
