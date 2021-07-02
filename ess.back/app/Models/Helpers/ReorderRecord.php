<?php

namespace App\Models\Helpers;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

/**
 * Trait to models for recalculates the sorting index in the desired position.
 *
 * @package App\Helpers
 */
trait ReorderRecord {
  /**
   * Attribute in model for store sort index.
   *
   * @return string
   */
  protected function getReorderAttribute() {
    return 'display_order';
  }

  /**
   * Recalculates the sorting index in the desired position.
   *
   * Step #1 – Determine the position:
   *
   * ```php
   * // Determine if the user is moving the item up or down in the listing
   * $move = $desired_position > $current_position ? 'down' : 'up';
   * ```
   *
   * Step #2 – Update the dragged item
   *
   * ```php
   * // Set the display_order for the dragged item to be 0 so we can update this record later by display_order = 0
   * $query = "UPDATE todos
   *           SET display_order = 0
   *           WHERE display_order = :current_position
   *           AND user_id = :user_id";
   * ```
   *
   * Step #3 – Move the item down
   *
   * ```php
   * // Move down: Update the items between the current position and the desired position, decreasing each item by 1 to make space for the new item
   * if ($move == 'down') {
   *    $query = "UPDATE todos
   *              SET display_order = (display_order - 1)
   *              WHERE display_order > :current_position
   *              AND display_order <= :desired_position
   *              AND user_id = :user_id";
   * }
   * ```
   *
   * Step #4 – Move the item up
   *
   * ```php
   * / Move up: Update the items between the desired position and the current position, increasing each item by 1 to make space for the new item
   * if ($move == 'up') {
   *    $query = "UPDATE todos
   *              SET display_order = (display_order + 1)
   *              WHERE display_order >= :desired_position
   *              AND display_order < :current_position
   *              AND user_id = :user_id";
   * }
   * ```
   *
   * Step #5 – Update the dragged item to the desired position
   *
   * ```php
   * // Update the item that was dragged and set it to be the desired position now that the slot is opend up
   * $query = "UPDATE todos
   *           SET display_order = :desired_position
   *           WHERE display_order = 0
   *           AND user_id = :user_id";
   * ```
   *
   * With this approach the server will do a total of three queries for every change to the display order no matter how many items are in the list.
   * Examples typically tell you to iterate over every item to do an update query to set the new order.
   * That approach results in total queries = total amount of items.
   * This new approach is a significant improvement and has reduced a lot of our large data sets from 40+ queries down to three.
   *
   * @param integer $desiredPosition
   * @param string|false $otherReorderColumn
   * @return bool
   */
  public function move($desiredPosition, $otherReorderColumn = false) {
    /* @var $this Model|self */
    $tbName = $this->getTable();
    $reorderColumn = $otherReorderColumn === false ? $this->getReorderAttribute() : $otherReorderColumn;

    // move the item down
    /* @var $this Model|self */
    if($this->getAttribute($reorderColumn) < $desiredPosition) {
      /* @var $this Model|self */
      DB::statement("
        update {$tbName} p
        set p.{$reorderColumn} = (p.{$reorderColumn} - 1)
        where p.{$reorderColumn} <= ? and 
              p.{$reorderColumn} > ?;
      ", [$desiredPosition, $this->getAttribute($reorderColumn)]);
    } else {
      // move the item up
      /* @var $this Model|self */
      DB::statement("
        update {$tbName} p
        set p.{$reorderColumn} = (p.{$reorderColumn} + 1)
        where p.{$reorderColumn} >= ? and 
              p.{$reorderColumn} < ?;
      ", [$desiredPosition, $this->getAttribute($reorderColumn)]);
    }

    /* @var $this Model|self */
    $this->setAttribute($reorderColumn, $desiredPosition);

    /* @var $this Model|self */
    return $this->save();
  }

  /**
   * Get max sort index from all records and increased it by one.
   *
   * @return int
   */
  public function generateOrderIndex() {
    /* @var $this Model|self */
    $max = static::query()->max($this->getReorderAttribute());
    return $max > 0 ? $max+1 : 1;
  }

  /**
   * Set sort index to attribute model.
   *
   * @param integer $orderIndex
   * @return void
   */
  public function setOrderIndex($orderIndex) {
    /* @var $this Model|self */
    $this->setAttribute($this->getReorderAttribute(), $orderIndex);
  }
}