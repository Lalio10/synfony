<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Track
 *
 * @ORM\Table(name="track", indexes={@ORM\Index(name="number", columns={"number"}), @ORM\Index(name="album", columns={"album"}), @ORM\Index(name="song", columns={"song"})})
 * @ORM\Entity
 */
class Track
{
    /**
     * @var int
     *
     * @ORM\Column(name="number", type="integer", nullable=false, options={"comment"="Numéro de piste"})
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $number = '0';

    /**
     * @var int
     *
     * @ORM\Column(name="disknumber", type="integer", nullable=false, options={"comment"="Numéro du disque"})
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $disknumber = '0';

    /**
     * @var int|null
     *
     * @ORM\Column(name="duration", type="integer", nullable=true, options={"comment"="Durée en secondes"})
     */
    private $duration = '0';

    /**
     * @var \Album
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\OneToOne(targetEntity="Album")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="album", referencedColumnName="id")
     * })
     */
    private $album;

    /**
     * @var \Song
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\OneToOne(targetEntity="Song")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="song", referencedColumnName="id")
     * })
     */
    private $song;


}
