<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\View\View;
use Spatie\TranslationLoader\LanguageLine;

class LanguageLineController extends Controller {
	/**
	 * @return View
	 */
	public function edit(): View {
		$lines = LanguageLine::all()->groupBy('group');

		return view('admin.language_lines.edit', compact('lines'));
	}

  /**
   * @param Request $request
   * @return \Illuminate\Http\RedirectResponse
   */
	public function update(Request $request) {
		$input = $request->except('_method', '_token');
		foreach ($input as $group => $lines) {
			foreach ($lines as $key => $line) {
				LanguageLine::where('group', $group)->where('key', $key)->update(['text' => json_encode($line)]);
			}
		}

		Artisan::call('cache:clear');

		return redirect()->route('admin.language.lines.edit')->with(['message' => 'Словари обновлены.', 'class' => 'success']);
	}
}
