<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\Response;

class AdminPolicy
{
    /**
     * Determine whether the user can view any models.
     * Визначте, чи може користувач переглядати будь-які моделі.
     */
    public function viewAny(User $user): bool
    {
        //
    }

    /**
     * Determine whether the user can view the model.
     * Визначте, чи може користувач переглядати модель.
     */
    public function view(User $user, User $model): bool
    {
        return $model->role === 'admin';
    }

    /**
     * Determine whether the user can create models.
     * Визначте, чи може користувач створювати моделі.
     */
    public function create(User $user): bool
    {
        //
    }

    /**
     * Determine whether the user can update the model.
     * Визначте, чи може користувач оновити модель.
     */
    public function update(User $user, User $model): bool
    {
        //
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, User $model): bool
    {
        //
    }

    /**
     * Determine whether the user can restore the model.
     * Визначте, чи може користувач відновити модель.
     */
    public function restore(User $user, User $model): bool
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     * Визначте, чи може користувач назавжди видалити модель.
     */
    public function forceDelete(User $user, User $model): bool
    {
        //
    }
}
