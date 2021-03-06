<?php
namespace Bolt\Extensions\Action;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Twig_Environment;
use Doctrine\ORM\EntityManager;
use Bolt\Extensions\Entity;


class Home
{
    public $renderer;
    public $em;
    
    public function __construct(Twig_Environment $renderer, EntityManager $em)
    {
        $this->renderer = $renderer;
        $this->em = $em;
    }
    
    public function __invoke(Request $request)
    {
        $repo = $this->em->getRepository(Entity\Package::class);
        $latest = $repo->findBy(['approved'=>true], ['created'=>'DESC'], 10);
        $starred = $repo->mostStarred(5);
        $downloaded = $repo->mostDownloaded(5);
        return new Response($this->renderer->render("index.html", [
            'latest' => $latest, 
            'starred' => $starred,
            'downloaded' => $downloaded
        ]));

    }
}