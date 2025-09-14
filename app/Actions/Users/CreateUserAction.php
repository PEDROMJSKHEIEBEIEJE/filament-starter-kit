<?php

declare(strict_types=1);

namespace App\Actions\Users;

use App\Models\User;
use Illuminate\Support\Facades\DB;

final readonly class CreateUserAction
{
    /**
     * @param array{
     *     // Define your data structure here
     * } $data
     */
    public function handle(array $data): User
    {
        /** @var User $createdUser */
        $createdUser = DB::transaction(fn (): User => User::create($data));

        return $createdUser;
    }
}
