<?php

namespace AddressbookBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('@Addressbook/Default/index.html.twig');
    }
}
