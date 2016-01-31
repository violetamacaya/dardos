<?php

namespace DardosBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Jugador
 *
 * @ORM\Table(name="jugador")
 * @ORM\Entity(repositoryClass="DardosBundle\Repository\JugadorRepository")
 */
class Jugador
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
     * @ORM\Column(name="nombre", type="string", length=20)
     */
    private $nombre;

    /**
     * @var string
     *
     * @ORM\Column(name="DNI", type="string", length=9, unique=true)
     */
    private $dni;

    /**
     * @var string
     *
     * @ORM\Column(name="apellidos", type="string", length=100)
     */
    private $apellidos;

    /**
     * @ORM\ManyToOne(targetEntity="Equipo", inversedBy="jugadores")
     * @ORM\JoinColumn(name="equipo_id", referencedColumnName="id")
     */
    private $equipo;

    /**
     * @ORM\OneToOne(targetEntity="Equipo", inversedBy="capitan")
     * @ORM\JoinColumn(name="capitanea_id", referencedColumnName="id")
     */
    private $capitanea;

    /**
     * @var string
     *
     * @ORM\Column(name="telefono", type="string", length=15)
     */
    private $telefono;

    /**
     * @var float
     *
     * @ORM\Column(name="ppd", type="decimal")
     */
    private $ppd;

    /**
     * @var float
     *
     * @ORM\Column(name="mpr", type="decimal")
     */
    private $mpr;

    /**
     * Jugador constructor.
     */
    public function __construct()
    {
        $this->mpr = 0;
        $this->ppd = 0;
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
     * @return string
     */
    public function getDni()
    {
        return $this->dni;
    }

    /**
     * @param string $dni
     */
    public function setDni($dni)
    {
        $this->dni = $dni;
    }

    /**
     * @return string
     */
    public function getApellidos()
    {
        return $this->apellidos;
    }

    /**
     * @param string $apellidos
     */
    public function setApellidos($apellidos)
    {
        $this->apellidos = $apellidos;
    }

    /**
     * @return mixed
     */
    public function getEquipo()
    {
        return $this->equipo;
    }

    /**
     * @param mixed $equipo
     */
    public function setEquipo($equipo)
    {
        $this->equipo = $equipo;
    }

    /**
     * @return mixed
     */
    public function getCapitanea()
    {
        return $this->capitanea;
    }

    /**
     * @param mixed $capitanea
     */
    public function setCapitanea($capitanea)
    {
        $this->capitanea = $capitanea;
    }

    /**
     * @return string
     */
    public function getTelefono()
    {
        return $this->telefono;
    }

    /**
     * @param string $telefono
     */
    public function setTelefono($telefono)
    {
        $this->telefono = $telefono;
    }

    /**
     * @return float
     */
    public function getPpd()
    {
        return $this->ppd;
    }

    /**
     * @param float $ppd
     */
    public function setPpd($ppd)
    {
        $this->ppd = $ppd;
    }

    /**
     * @return float
     */
    public function getMpr()
    {
        return $this->mpr;
    }

    /**
     * @param float $mpr
     */
    public function setMpr($mpr)
    {
        $this->mpr = $mpr;
    }

}
