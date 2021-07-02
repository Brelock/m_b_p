<?php

namespace App\Policies;

use App\User;
use App\Product;
use Illuminate\Auth\Access\HandlesAuthorization;

class ProductPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any product.
     *
     * @param  App\User  $user
     * @return bool
     */
    public function viewAny(User $user)
    {
        return false;
    }

    /**
     * Determine whether the user can view the product.
     *
     * @param  App\User  $user
     * @param  App\Product  $product
     * @return bool
     */
    public function view(User $user, Product $product)
    {
        return false;
    }

    /**
     * Determine whether the user can create a product.
     *
     * @param  App\User  $user
     * @return bool
     */
    public function create(User $user)
    {
        return false;
    }

    /**
     * Determine whether the user can update the product.
     *
     * @param  App\User  $user
     * @param  App\Product  $product
     * @return bool
     */
    public function update(User $user, Product $product)
    {
        return false;
    }

    /**
     * Determine whether the user can delete the product.
     *
     * @param  App\User  $user
     * @param  App\Product  $product
     * @return bool
     */
    public function delete(User $user, Product $product)
    {
        return false;
    }

    /**
     * Determine whether the user can restore the product.
     *
     * @param  App\User  $user
     * @param  App\Product  $product
     * @return bool
     */
    public function restore(User $user, Product $product)
    {
        return false;
    }

    /**
     * Determine whether the user can permanently delete the product.
     *
     * @param  App\User  $user
     * @param  App\Product  $product
     * @return bool
     */
    public function forceDelete(User $user, Product $product)
    {
        return false;
    }
}
