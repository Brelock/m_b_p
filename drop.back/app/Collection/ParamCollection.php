<?php

namespace App\Collection;

use App\Import\Collection\OfferParamCollection;
use App\Models\Param;
use App\Models\ParamValue;
use Illuminate\Database\Eloquent\Collection;

class ParamCollection extends Collection {
  /**
   * @param OfferParamCollection $collection
   * @return bool
   */
  public function hasAllTitles(OfferParamCollection $collection): bool {
    return $collection->diffKeys($this->keyBy('title'))->isEmpty();
  }

  /**
   * @param OfferParamCollection $collection
   * @return ParamCollection
   */
  public function syncWithOfferParams(OfferParamCollection $collection): self {
    $newParams = $collection->diffKeys($this->keyBy('title'));

    foreach ($newParams as $title => $value) {
      $newParam = new Param(['title' => $title]);
      $newParam->save();

      $this->push(clone $newParam);
    }

    return $this;
  }

  /**
   * @param OfferParamCollection $collection
   * @return ParamCollection
   */
  public function onlyByOfferParams(OfferParamCollection $collection): self {
    return $this->filter(function ($param) use ($collection) {
      /* @var Param $param */
      return $collection->has($param->title);
    });
  }

  /**
   * @return array
   */
  public function getIds(): array {
    return $this->keyBy('id')->keys()->all();
  }

  /**
   * @param OfferParamCollection $collection
   * @return array
   */
  public function listForSyncParamsInProductModel(OfferParamCollection $collection): array {
    return $this
      ->keyBy('id')
      ->map(function ($param) use ($collection) {
        /* @var Param $param */
        return ['value' => $collection->get($param->title)];
      })
      ->all();
  }

  /**
   * @param  Collection $values
   * @return ParamCollection|Collection
   */
  public function mergeWithValues(Collection $values) {
    return $this->map(function($param) use($values) {
      /* @var Param $param */
      $param->values = $values
        ->filter(function ($paramValue) use ($param) {
          /* @var ParamValue $paramValue */
          return $paramValue->param_id === $param->id;
        })
        ->unique('value');

      return $param;
    });
  }

	/**
	 * @return ParamValueCollection
	 */
  public function unionValues(): ParamValueCollection {
  	$collection = new ParamValueCollection();

  	$this->each(function($param) use(&$collection) {
  		/* @var Param $param */

		  $collection = $collection->merge($param->paramValues->all());
	  });

  	return $collection;
  }

	/**
	 * @param OfferParamCollection $newOfferValues
	 * @return ParamValueCollection
	 */
  public function attachValues(OfferParamCollection $newOfferValues): ParamValueCollection {
  	$collection = new ParamValueCollection();

  	$selfParams = $this->keyBy('title');

	  $newOfferValues->each(function($offerValue, $offerParam) use($selfParams, &$collection) {
	  	/* @var Param $param */
		  $param = $selfParams->get($offerParam);

		  if($param) {
			  $collection->push(
				  $param->paramValues()->save(new ParamValue(['value' => $offerValue]))
			  );
		  }
	  });

	  return $collection;
  }
}