<?php

namespace App\Policies;

use App\User;
use App\Category;
use Illuminate\Auth\Access\HandlesAuthorization;

class CategoryPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any category.
     *
     * @param  App\User  $user
     * @return bool
     */
    public function viewAny(User $user)
    {
        return false;
    }

    /**
     * Determine whether the user can view the category.
     *
     * @param  App\User  $user
     * @param  App\Category  $category
     * @return bool
     */
    public function view(User $user, Category $category)
    {
        return false;
    }

    /**
     * Determine whether the user can create a category.
     *
     * @param  App\User  $user
     * @return bool
     */
    public function create(User $user)
    {
        return false;
    }

    /**
     * Determine whether the user can update the category.
     *
     * @param  App\User  $user
     * @param  App\Category  $category
     * @return bool
     */
    public function update(User $user, Category $category)
    {
        return false;
    }

    /**
     * Determine whether the user can delete the category.
     *
     * @param  App\User  $user
     * @param  App\Category  $category
     * @return bool
     */
    public function delete(User $user, Category $category)
    {
        return false;
    }

    /**
     * Determine whether the user can restore the category.
     *
     * @param  App\User  $user
     * @param  App\Category  $category
     * @return bool
     */
    public function restore(User $user, Category $category)
    {
        return false;
    }

    /**
     * Determine whether the user can permanently delete the category.
     *
     * @param  App\User  $user
     * @param  App\Category  $category
     * @return bool
     */
    public function forceDelete(User $user, Category $category)
    {
        return false;
    }
}
