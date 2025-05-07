<?php

namespace App\Policies;

use App\Models\MasterCategory;
use App\Models\User;

class CategoryPolicy
{
    /**
     * Determine if the user can view the category.
     */
    public function view(User $user, MasterCategory $category)
    {
        return $user->is_admin || $user->id === $category->user_id;
    }

    /**
     * Determine if the user can update the category.
     */
    public function update(User $user, MasterCategory $category)
    {
        return $user->is_admin || $user->id === $category->user_id;
    }

    /**
     * Determine if the user can delete the category.
     */
    public function delete(User $user, MasterCategory $category)
    {
        return $user->is_admin || $user->id === $category->user_id;
    }
}