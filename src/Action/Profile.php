<?php
namespace Bolt\Extensions\Action;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Twig_Environment;
use Doctrine\ORM\EntityManager;
use Bolt\Extensions\Entity;


class Profile
{
    
    public function __construct(Twig_Environment $renderer, EntityManager $em)
    {
        $this->renderer = $renderer;
        $this->em = $em;
    }
    
    public function __invoke(Request $request)
    {
        $user = $request->attributes->get('user');
        $repo = $this->em->getRepository(Entity\Package::class);
        $packages = $repo->findBy(['account'=>$user], ['created'=>'DESC']);
        return new Response($this->renderer->render("profile.html", ['packages'=>$packages, 'user'=>$user]));

    }
}