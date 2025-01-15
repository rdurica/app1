<?php declare(strict_types=1);

namespace App\Model\Services;

use App\Entity\User;
use App\Model\UserService;
use Doctrine\DBAL\Exception\UniqueConstraintViolationException;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

/**
 * ExampleService.
 *
 * @copyright Copyright (c) 2025, Robert Durica
 * @since     2025-01-14
 */
final class ExampleService implements UserService
{
    public function __construct(
        private readonly UserPasswordHasherInterface $passwordHasher,
        private readonly EntityManagerInterface $entityManager
    )
    {
    }
    public function createUser(string $email, string $plainPassword): void
    {
        try {
            $user = new User()
                ->setEmail($email)
                ->setRoles(['ROLE_USER', 'ROLE_ADMIN', 'ROLE_SUPER_ADMIN']);

            $hashedPassword = $this->passwordHasher->hashPassword(
                $user,
                $plainPassword
            );

            $user->setPassword($hashedPassword);

            $this->entityManager->persist($user);
            $this->entityManager->flush();

        } catch (UniqueConstraintViolationException){
            //skip.
        }
    }
}
