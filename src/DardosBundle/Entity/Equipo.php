<?php

namespace DardosBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Equipo
 *
 * @ORM\Table(name="equipo")
 * @ORM\Entity(repositoryClass="DardosBundle\Repository\EquipoRepository")
 */
class Equipo
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="nombre", type="string", length=30, unique=true)
     */
    private $nombre;
    /**
     * @var int
     *
     * @ORM\Column(name="categoria", type="integer")
     */
    private $categoria;

    /**
     * @ORM\OneToOne(targetEntity="Jugador", inversedBy="capitanea")
     * @ORM\JoinColumn(name="capitan_id", referencedColumnName="id")
     */
    private $capitan;

    /**
     * @ORM\OneToMany(targetEntity="Jugador", mappedBy="equipo")
     */
    private $jugadores;

    /**
     * @ORM\OneToMany(targetEntity="Partida", mappedBy="equipo")
     */
    private $partidas;

    public function __construct()
    {
         $this->jugadores = new ArrayCollection();
         $this->partidas = new ArrayCollection();
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * @param string $nombre
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }

    /**
     * @return mixed
     */
    public function getCapitan()
    {
        return $this->capitan;
    }

    /**
     * @param mixed $capitan
     */
    public function setCapitan($capitan)
    {
        $this->capitan = $capitan;
    }

    /**
     * @return mixed
     */
    public function getJugadores()
    {
        return $this->jugadores;
    }

    /**
     * @param mixed $jugadores
     */
    public function setJugadores($jugadores)
    {
        $this->jugadores = $jugadores;
    }

    /**
     * @return mixed
     */
    public function getPartidas()
    {
        return $this->partidas;
    }

    /**
     * @param mixed $partidas
     */
    public function setPartidas($partidas)
    {
        $this->partidas = $partidas;
    }

    /**
     * @return mixed
     */
    public function getCategoria()
    {
        return $this->categoria;
    }

    /**
     * @param mixed $categoria
     */
    public function setCategoria($categoria)
    {
        $this->categoria = $categoria;
    }
    public function __toString()
    {
        return $this->nombre;
    }
}
