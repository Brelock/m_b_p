<?php

namespace App\Http\Requests;

use App\Models\Project;
use Illuminate\Validation\Rule;

class PictureReorderRecordFormRequest extends ReorderRecordFormRequest {
  /**
   * Determine if the user is authorized to make this request.
   *
   * @return bool
   */
  public function authorize() {
    return true;
  }

  /**
   * Get the validation rules that apply to the request.
   *
   * @return array
   */
  public function rules() {
    return array_merge(parent::rules(), [
    	'currentProjectId' => [
    		'required',
		    'integer',
		    Rule::exists((new Project())->getTable(), 'id'),
		    'same:desiredProjectId'
	    ],
	    'desiredProjectId' => [
    		'required',
		    'integer',
		    Rule::exists((new Project())->getTable(), 'id'),
		    'same:currentProjectId'
	    ]
    ]);
  }

}
