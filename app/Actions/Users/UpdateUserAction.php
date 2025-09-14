<?php

declare(strict_types=1);

namespace App\Actions\Users;

use App\Models\User;
use Illuminate\Support\Facades\DB;

final readonly class UpdateUserAction
{
    /**
     * @param array{
     *     // Define your data structure here
     * } $data
     */
    public function handle(User $user, array $data): User
    {

        /** @var User $updatedUser */
        $updatedUser = DB::transaction(function () use ($user, $data): User|null {
            $user->update($data);

            return $user->fresh();
        });

        return $updatedUser;
    }
}
