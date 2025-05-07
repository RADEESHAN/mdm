<?php

namespace App\Policies;

use App\Models\MasterBrand;
use App\Models\User;

class BrandPolicy
{
    /**
     * Determine if the user can view the brand.
     */
    public function view(User $user, MasterBrand $brand)
    {
        return $user->is_admin || $user->id === $brand->user_id;
    }

    /**
     * Determine if the user can update the brand.
     */
    public function update(User $user, MasterBrand $brand)
    {
        return $user->is_admin || $user->id === $brand->user_id;
    }

    /**
     * Determine if the user can delete the brand.
     */
    public function delete(User $user, MasterBrand $brand)
    {
        return $user->is_admin || $user->id === $brand->user_id;
    }
}