<?php

namespace App\Services;

use Exception;
use App\Models\User;
use App\Enums\UserRole;
use App\Enums\UserStatus;
use App\Enums\SubmissionStatus;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class UserService
{

    // Creates new user
    public function store(array $userData): User
    {
        if (isset($userData['password'])) {
            $userData['password'] = Hash::make($userData['password']);
        }

        return User::create($userData);
    }

    /**
     * Updates the user's information
     *
     * @param int $userId
     * @param array $data
     * @return bool
     */
    public function update(int $userId, array $data): bool
    {
        DB::beginTransaction();

        try {
            $user = User::findOrFail($userId);
            $user->update($data);

            DB::commit();
            return true;
        } catch (Exception $e) {
            DB::rollBack();
            return false;
        }
    }


    /**
     * Updates the status of a user.
     *
     * @param int $userId
     * @param SubmissionStatus $status
     * @return ?User
     */
    public function updateStatus(int $userId, UserStatus $status): ?User
    {
        try {
            $user = User::findOrFail($userId);
            $user->update(['status' => $status->value]);

            return $user->refresh(); // Ensure we return updated data
        } catch (ModelNotFoundException $e) {
            // Log the error if needed
            \Log::error('Failed to update user status: ' . $e->getMessage());

            return null; // Return null if the user isn't found
        }
    }

    /**
     * Assigns a role to a user.
     *
     * @param User $user
     * @param UserRole $role
     * @return User
     */
    public function assignRole(User $user, UserRole $role): User
    {
        $user->assignRole($role->value); // Ensure the correct value is passed
        return $user;
    }

    /**
     * Deletes a user
     * @param User $user
     * @return bool
     */
    public function destroy(User $user): bool{
        DB::beginTransaction();

        try{
            $user->delete();
            DB::commit();
            return true;
        } catch(Exception $e){
            DB::rollBack();

            \Log::error('Failed to delete the user ', ['error' => $e->getMessage()]);

            return false;
        }
    }
}
