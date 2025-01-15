<?php

declare(strict_types=1);

namespace App\Controller;

use App\Model\UserService;
use Symfony\Bridge\Twig\Attribute\Template;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;

/**
 * RegistrationController.
 *
 * @copyright Copyright (c) 2025, Robert Durica
 * @since     2025-01-14
 */
final class RegistrationController extends AbstractController
{
    public function __construct(
        private readonly UserService $exampleService
    )
    {
    }

    #[Route('/registration', name: 'app_registration')]
    #[Template('registration/index.html.twig')]
    public function index(): array
    {

        $this->exampleService->createUser('www@bbb.com', '11111');


        return [
            'controller_name' => 'RegistrationController',
            'fetchUrl' => $this->generateUrl('fetch', referenceType: UrlGeneratorInterface::ABSOLUTE_URL),
        ];
    }
}
