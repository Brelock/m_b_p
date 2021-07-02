<?php

namespace App\Models\Admin;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Auth;

class User extends Authenticatable {
	use Notifiable;

	const PUBLISHED = 1;
	const UNPUBLISHED = 0;

	const MANAGER = 2;
	const ADMIN = 3;
	const USER = 1;
	const SPECIAL_MANAGER = 4;

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [
		'name',
		'email',
		'password',
		'published',
		'role',
	];

	/**
	 * The attributes that should be hidden for arrays.
	 *
	 * @var array
	 */
	protected $hidden = [
		'password',
		'remember_token',
	];

	public function changeUserPassword($request) {
		$this->name = $request->get('name');
		$this->email = $request->get('email');
		$this->password = bcrypt($request->get('new_password'));
		$this->published = $request->get('published');


		if ($this->save() && Auth::id() == $this->id) {
			Auth::logout();
		}
	}

	public function createUser($request) {
		$this->name = $request->get('name');
		$this->email = $request->get('email');
		$this->password = bcrypt($request->get('password'));
		$this->published = $request->get('published');

		if ($this->save()) {
			return true;
		}
	}

	public function updateUser($request) {
		$this->name = $request->get('name');
		$this->email = $request->get('email');
		$this->published = $request->get('published');

		if ($this->save()) {
			if ($request->get('published') == self::UNPUBLISHED) {
				if (User::all()->count() > 1 && Auth::id() == $request->get('id')) {
					Auth::logout();
				}
			}

			return true;
		}

		return false;
	}

	public function isPublished() {
		return $this->published;
	}

	/**
	 * @return bool
	 */
	public function isSpecialManager() {
		return $this->role == self::SPECIAL_MANAGER;
	}
}
