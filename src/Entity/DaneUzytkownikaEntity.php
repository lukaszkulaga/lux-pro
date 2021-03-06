<?php

namespace App\Entity;
use Doctrine\ORM\Mapping as ORM;

/**
 * Test
 *
 * @ORM\Table(name="daneUzytkownika")
 * @ORM\Entity(repositoryClass="App\Repository\daneUzytkownikaRepository")
 */
class DaneUzytkownikaEntity
{
    /**
     * @var int
     *
     * @ORM\Column(name="IdUzytkownika", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $idUzytkownika;

    /**
     * @var string
     *
     * @ORM\Column(name="Imie", type="string", length=255)
     */
    private $imie;

    /**
     * @var string
     *
     * @ORM\Column(name="Rola", type="string", length=255)
     */
    private $rola;

    /**
     * @var string
     *
     * @ORM\Column(name="Nazwisko", type="string", length=255)
     */
    private $nazwisko;

    /**
     * @var string
     *
     * @ORM\Column(name="NazwaUzytkownika", type="string", length=255)
     */
    private $nazwaUzytkownika;

    /**
     * @var string
     *
     * @ORM\Column(name="Email", type="string", length=255)
     */
    private $email;

    /**
     * @var string
     *
     * @ORM\Column(name="Haslo", type="string", length=255)
     */
    private $haslo;

    /**
     * @var string
     *
     * @ORM\Column(name="Zdjecie", type="string", length=255)
     */
    private $zdjecie;

    /**
     * @var string
     *
     * @ORM\Column(name="NumerTelefonu", type="string", length=255)
     */
    private $numerTelefonu;


    /**
     * @return int
     */
    public function getIdUzytkownika(): int
    {
        return $this->idUzytkownika;
    }

    /**
     * @param int $idUzytkownika
     * @return DaneUzytkownikaEntity
     */
    public function setIdUzytkownika(int $idUzytkownika): DaneUzytkownikaEntity
    {
        $this->idUzytkownika = $idUzytkownika;
        return $this;
    }

    /**
     * @return string
     */
    public function getImie(): string
    {
        return $this->imie;
    }

    /**
     * @param string $imie
     * @return DaneUzytkownikaEntity
     */
    public function setImie(string $imie): DaneUzytkownikaEntity
    {
        $this->imie = $imie;
        return $this;
    }

    /**
     * @return string
     */
    public function getRola(): string
    {
        return $this->rola;
    }

    /**
     * @param string $rola
     * @return DaneUzytkownikaEntity
     */
    public function setRola(string $rola): DaneUzytkownikaEntity
    {
        $this->rola = $rola;
        return $this;
    }

    /**
     * @return string
     */
    public function getNazwisko(): string
    {
        return $this->nazwisko;
    }

    /**
     * @param string $nazwisko
     * @return DaneUzytkownikaEntity
     */
    public function setNazwisko(string $nazwisko): DaneUzytkownikaEntity
    {
        $this->nazwisko = $nazwisko;
        return $this;
    }

    /**
     * @return string
     */
    public function getNazwaUzytkownika(): string
    {
        return $this->nazwaUzytkownika;
    }

    /**
     * @param string $nazwaUzytkownika
     * @return DaneUzytkownikaEntity
     */
    public function setNazwaUzytkownika(string $nazwaUzytkownika): DaneUzytkownikaEntity
    {
        $this->nazwaUzytkownika = $nazwaUzytkownika;
        return $this;
    }

    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @param string $email
     * @return DaneUzytkownikaEntity
     */
    public function setEmail(string $email): DaneUzytkownikaEntity
    {
        $this->email = $email;
        return $this;
    }

    /**
     * @return string
     */
    public function getHaslo(): string
    {
        return $this->haslo;
    }

    /**
     * @param string $haslo
     * @return DaneUzytkownikaEntity
     */
    public function setHaslo(string $haslo): DaneUzytkownikaEntity
    {
        $this->haslo = $haslo;
        return $this;
    }

    /**
     * @return string
     */
    public function getZdjecie(): string
    {
        return $this->zdjecie;
    }

    /**
     * @param string $zdjecie
     * @return DaneUzytkownikaEntity
     */
    public function setZdjecie(string $zdjecie): DaneUzytkownikaEntity
    {
        $this->zdjecie = $zdjecie;
        return $this;
    }

    /**
     * @return string
     */
    public function getNumerTelefonu(): ?string // dzieki znakowi ? przyjmuje ka??dy typ danych
    {
        return $this->numerTelefonu;
    }

    /**
     * @param string $numerTelefonu
     * @return DaneUzytkownikaEntity
     */
    public function setNumerTelefonu(string $numerTelefonu): DaneUzytkownikaEntity
    {
        $this->numerTelefonu = $numerTelefonu;
        return $this;
    }






}