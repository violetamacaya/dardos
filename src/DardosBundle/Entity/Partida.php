<?php

namespace DardosBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Partida
 *
 * @ORM\Table(name="partida")
 * @ORM\Entity(repositoryClass="DardosBundle\Repository\PartidaRepository")
 */
class Partida
{
    const TIPO_301 = "301";
    const TIPO_CRICKET = "cricket";
    const TIPO_COMBINADA = "combinada";

    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="Equipo", inversedBy="partidas")
     * @ORM\JoinColumn(name="equipo_partida_id", referencedColumnName="id")
     */
    private $equipo;

    /**
     * @var string
     *
     * @ORM\Column(name="contrincantes", type="string", length=30)
     */
    private $contrincantes;

    /**
     * @var date
     *
     * @ORM\Column(name="fecha", type="datetime")
     */
    private $fecha;

    /**
     * @var boolean
     *
     * @ORM\Column(name="jugada", type="boolean")
     */
    private $jugada;

    /**
     * @var boolean
     *
     * @ORM\Column(name="ganada", type="boolean")
     */
    private $ganada;

    /**
     * @var string
     *
     * @ORM\Column(name="resultado", type="string", length=8)
     */
    private $resultado;

    /**
     * @ORM\OneToMany(targetEntity="Medias", mappedBy="partida", cascade={"persist"})
     */
    private $medias;

    /**
     * @var boolean
     *
     * @ORM\Column(name="aplazada", type="boolean")
     */
    private $aplazada;

    /**
     * @var boolean
     *
     * @ORM\Column(name="local", type="boolean")
     */
    private $local;

    /**
     * @var string
     *
     * @ORM\Column(name="tipo", type="string" , length=15)
     */
    private $tipo;

    /**
     * Partida constructor.
     */
    public function __construct()
    {
        $this->jugada = false;
        $this->ganada = false;
        $this->local = true;
        $this->aplazada = false;
        $this->medias = new ArrayCollection(array());
        $this->fecha = new \DateTime();
        $this->fecha->setTime(21,30);
        $this->resultado = "";
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
     * @return Equipo
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
     * @return string
     */
    public function getContrincantes()
    {
        return $this->contrincantes;
    }

    /**
     * @param string $contrincantes
     */
    public function setContrincantes($contrincantes)
    {
        $this->contrincantes = $contrincantes;
    }

    /**
     * @return date
     */
    public function getFecha()
    {
        return $this->fecha;
    }

    /**
     * @param date $fecha
     */
    public function setFecha($fecha)
    {
        $this->fecha = $fecha;
    }

    /**
     * @return boolean
     */
    public function isJugada()
    {
        return $this->jugada;
    }

    /**
     * @param boolean $jugada
     */
    public function setJugada($jugada)
    {
        $this->jugada = $jugada;
    }

    /**
     * @return boolean
     */
    public function isGanada()
    {
        return $this->ganada;
    }

    /**
     * @param boolean $ganada
     */
    public function setGanada($ganada)
    {
        $this->ganada = $ganada;
    }

    /**
     * @return string
     */
    public function getResultado()
    {
        return $this->resultado;
    }

    /**
     * @param string $resultado
     */
    public function setResultado($resultado)
    {
        $this->resultado = $resultado;
    }

    /**
     * @param \Doctrine\Common\Collection\ArrayCollection $medias
     */
    public function setMedias($medias)
    {
        $this->medias = $medias;
    }

    /**
     * @return \Doctrine\Common\Collection\ArrayCollection
     */
    public function getMedias()
    {
        return $this->medias;
    }

    /**
     * @param boolean $aplazada
     */
    public function setAplazada($aplazada)
    {
        $this->aplazada = $aplazada;
    }

    /**
     * @return boolean
     */
    public function getAplazada()
    {
        return $this->aplazada;
    }

    /**
     * @param boolean $local
     */
    public function setLocal($local)
    {
        $this->local = $local;
    }

    /**
     * @return boolean
     */
    public function getLocal()
    {
        return $this->local;
    }

    /**
     * @param string $tipo
     */
    public function setTipo($tipo)
    {
        $this->tipo = $tipo;
    }

    /**
     * @return string
     */
    public function getTipo()
    {
        return $this->tipo;
    }

    function __toString()
    {
        return $this->equipo->getNombre() . " vs " . $this->contrincantes;
    }


}