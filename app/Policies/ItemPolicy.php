<?php

namespace App\Policies;

use App\Models\MasterItem;
use App\Models\User;

class ItemPolicy
{
    /**
     * Determine if the user can view the item.
     */
    public function view(User $user, MasterItem $item)
    {
        return $user->is_admin || $user->id === $item->user_id;
    }

    /**
     * Determine if the user can update the item.
     */
    public function update(User $user, MasterItem $item)
    {
        return $user->is_admin || $user->id === $item->user_id;
    }

    /**
     * Determine if the user can delete the item.
     */
    public function delete(User $user, MasterItem $item)
    {
        return $user->is_admin || $user->id === $item->user_id;
    }
}