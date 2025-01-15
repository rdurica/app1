<?php declare(strict_types=1);

namespace App\Model;

/**
 * UserService.
 *
 * @copyright Copyright (c) 2025, Robert Durica
 * @since     2025-01-14
 */
interface UserService
{
    /**
     * Create user
     */
    public function createUser(string $email, string $plainPassword): void;
}