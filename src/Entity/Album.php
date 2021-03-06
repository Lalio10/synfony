<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Album
 *
 * @ORM\Table(name="album", indexes={@ORM\Index(name="genre", columns={"genre"}), @ORM\Index(name="artist", columns={"artist"}), @ORM\Index(name="cover", columns={"cover"})})
 * @ORM\Entity
 */
class Album
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false, options={"comment"="Identifiant"})
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=200, nullable=false, options={"default"="''","fixed"=true,"comment"="Titre"})
     */
    private $name = '\'\'';

    /**
     * @var int|null
     *
     * @ORM\Column(name="year", type="integer", nullable=true, options={"default"="NULL","comment"="Année de sortie"})
     */
    private $year = 'NULL';

    /**
     * @var \Genre
     *
     * @ORM\ManyToOne(targetEntity="Genre")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="genre", referencedColumnName="id")
     * })
     */
    private $genre;

    /**
     * @var \Artist
     *
     * @ORM\ManyToOne(targetEntity="Artist", inversedBy="albums" )
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="artist", referencedColumnName="id")
     * })
     */
    private $artist;

    /**
     * @var \Cover
     *
     * @ORM\ManyToOne(targetEntity="Cover")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="cover", referencedColumnName="id")
     * })
     */
    private $cover;

    public function getId(): int
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getYear(): int
    {
        return $this->year;
    }

    public function setYear(int $year): int
    {
        return $this->year = $year;
    }

    public function getGenre(): Genre
    {
        return $this->genre;
    }

    public function setGenre(Genre $genre): self
    {
        $this->genre = $genre;

        return $this;
    }

    public function getArtist(): Artist
    {
        return $this->artist;
    }

    public function setArtist(Artist $artist): self
    {
        $this->artist = $artist;

        return $this;
    }

    public function getCover(): Cover
    {
        return $this->cover;
    }

    public function setCover(Cover $cover): self
    {
        return $this->cover = $cover;
    }


}
