<?php

namespace Oaattia\BlogBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class SecurityController extends Controller
{
    public function loginAction()
    {
        $authUtils = $this->get('security.authentication_utils');

        // get the login error if there is one
        $error = $authUtils->getLastAuthenticationError();

        // last username entered by the user
        $lastUsername = $authUtils->getLastUsername();

        return $this->render('BlogBundle:Security:login.html.twig', [
            'last_username' => $lastUsername,
            'error'         => $error,
        ]);
    }
}
