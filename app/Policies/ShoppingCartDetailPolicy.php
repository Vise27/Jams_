<?php

namespace App\Policies;

use App\Models\ShoppingCartDetail;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class ShoppingCartDetailPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        //
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, ShoppingCartDetail $shoppingCartDetail): bool
    {
        //
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        //
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, ShoppingCartDetail $shoppingCartDetail): bool
    {
        //
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, ShoppingCartDetail $shoppingCartDetail): bool
    {
        //
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, ShoppingCartDetail $shoppingCartDetail): bool
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, ShoppingCartDetail $shoppingCartDetail): bool
    {
        //
    }
}
