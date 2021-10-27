<?php

namespace App\Controller;

use App\Service\DaneUzytkownikaService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Routing\Route as ROUTING;
use Symfony\Component\HttpFoundation\Session\SessionInterface;


class UwierzytelnienieController extends AbstractController
{


    private $daneUzytkownikaService;

    public function  __construct(DaneUzytkownikaService $daneUzytkownikaService) {

        $this->daneUzytkownikaService = $daneUzytkownikaService;
    }


    /**
     * @Route("/logowanie", methods={"GET"})
     */
    public function logowanieGet() {




        return $this->render('logowanie.html.twig', array() );

    }

    /**
     * @Route("/logowanie", methods={"POST"})
     */
    public function logowaniePost() {




        return $this->redirect(parent::getParameter('baseUrl')."stronaUzytkownika");

    }

    /**
     * @Route("/rejestracja", methods={"GET"})
     */
    public function rejestracjaGet() {




        return $this->render('rejestracja.html.twig', array() );

    }

    /**
     * @Route("/rejestracja", methods={"POST"})
     */
    public function rejestracjaPost(Request $request ):Response {


        $adresUriZdjecia = $request->request->get('filesDropAndDrag');

        $this->daneUzytkownikaService->daneUzytkownikaService($adresUriZdjecia);


        return $this->redirect(parent::getParameter('baseUrl')."logowanie");

    }

    /**
     * @Route("/przypomnijHaslo", methods={"GET"})
     */
    public function przypomnijHasloGet() {




        return $this->render('przypomnijHaslo.html.twig', array() );

    }

}