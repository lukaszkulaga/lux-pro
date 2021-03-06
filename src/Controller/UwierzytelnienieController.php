<?php

namespace App\Controller;

use App\Service\DaneUzytkownikaService;
use App\Service\LoginService;
use Psr\Log\LoggerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Routing\Route as ROUTING;
use Symfony\Component\HttpFoundation\Session\SessionInterface;

use App\Entity\DaneUzytkownikaEntity;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;



class UwierzytelnienieController extends AbstractController
{

    private $daneUzytkownikaService;
    private $loginService;
    private $session;
    private $logger;

    public function  __construct(DaneUzytkownikaService $daneUzytkownikaService,LoginService $loginService,SessionInterface $session, LoggerInterface $logger) {

        $this->daneUzytkownikaService = $daneUzytkownikaService;
        $this->loginService = $loginService;
        $this->session = $session;
        $this->logger = $logger;
    }

    /**
     * @Route("/wyloguj", methods={"GET"})
     */
    public function wylogujGet() {

        if ($this->session->start()) {
            $this->logger->info('/////////////////////////////////////// sesja koniec wyloguj   ');
            $this->session->invalidate();
        }

        return $this->redirect(parent::getParameter('baseUrl')."logowanie");
    }

    /**
     * @Route("/logowanie", methods={"GET"})
     */
    public function logowanieGet() {

        if ($this->session->start()) {
           $this->logger->info('/////////////////////////////////////// sesja koniec logowanie   ');
           $this->session->invalidate();
        }

        return $this->render('logowanie.html.twig', array() );
    }

    /**
     * @Route("/logowanie", methods={"POST"})
     */
    public function logowaniePost( Request $request  ) {

        $login = $request->request->get('nazwaUzytkownika');
        $haslo = $request->request->get('haslo');

        $rezultat = $this->loginService->loginService( $login,$haslo );

        if ( $rezultat ) {
            
            return $this->redirect(parent::getParameter('baseUrl')."stronaUzytkownika");
        } else {

            return $this->redirect(parent::getParameter('baseUrl')."logowanie");
        }
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
    public function rejestracjaPost( Request $request ):Response {

        $adresUriZdjecia = $request->request->get('filesDropAndDrag');
        $imie = $request->request->get('imie');
        $nazwisko = $request->request->get('nazwisko');
        $nazwaUzytkownika = $request->request->get('nazwaUzytkownika');
        $email = $request->request->get('email');
        $nrTelefonu = $request->request->get('telefon');
        $haslo = $request->request->get('haslo');

        $nazwaUzytkownikaService = $this->daneUzytkownikaService->sprawdzNazweUzytkownikaService($nazwaUzytkownika);
        $emailService = $this->daneUzytkownikaService->sprawdzEmailService($email);

        if ($nazwaUzytkownikaService != "") {
            //komunikat
            echo 'bledna nazwa';
        } else if ($emailService != "") {
            //komunikat
            echo 'bledna email';
        } else {

            $this->daneUzytkownikaService->daneUzytkownikaService($adresUriZdjecia,$imie,$nazwisko,$nazwaUzytkownika,$email,$nrTelefonu,$haslo);

            return $this->redirect(parent::getParameter('baseUrl')."logowanie");
        }

        return $this->redirect(parent::getParameter('baseUrl')."rejestracja");

    }

    /**
     * @Route("/przypomnijHaslo", methods={"GET"})
     */
    public function przypomnijHasloGet() {




        return $this->render('przypomnijHaslo.html.twig', array() );
    }
}