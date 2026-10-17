<?php

declare(strict_types=1);

namespace App\Controller;

final class ProfileController extends AppController
{
    public function index(): void
    {
        $this->render('profile', [
            'pageTitle' => 'Your profile',
            'profileUser' => '[your username]',
        ]);
    }

    public function show(string $username): void
    {
        $this->render('profile', [
            'pageTitle' => 'Profile',
            'profileUser' => $username,
        ]);
    }
}
