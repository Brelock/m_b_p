<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class CheckPhone implements Rule {
	/**
	 * @param string $attribute
	 * @param mixed $value
	 *
	 * @return bool
	 */
	public function passes($attribute, $value): bool {
		if (!empty($value)) {
			if (!preg_match('/^\((0)[0-9]{2}\) [0-9]{3}-[0-9]{2}-[0-9]{2}/', $value)) {
				return false;
			}
		}
		return true;
	}

	/**
	 * Get the validation error message.
	 *
	 * @return string
	 */
	public function message(): string {
		return 'Номер телефона введен не верно';
	}
}
