<?php

namespace App\Controller;

use App\Entity\Album;
use App\Entity\Artist;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Entity;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class BrowseController extends AbstractController
{
    /**
     * @Route("/artists")
     */
    public function artists(): Response
    {
        $artists = $this->getDoctrine()
            ->getRepository(Artist::class)
            ->findBy([], ['name' => 'ASC']);

        return $this->render('browse/artists.html.twig', [
            'artists' => $artists,
        ]);
    }

    /**
     * @Route("/albums/{artistId}")
     */
    public function albums(int $artistId): Response
    {
        $artist = $this->getDoctrine()
            ->getRepository(Artist::class)
            ->findBy(['id' => $artistId]);

        return $this->render('browse/albums.html.twig', [
            'artist' => $artist,
        ]);
    }

    /**
     * @Route("/tracks/{id}", name="tracks")
     * @Entity("album", expr="repository.findWithTracksAndSongs(id)")
     */
    public function tracks(Album $album): Response
    {
        return $this->render('browse/tracks.html.twig', [
            'album' => $album,
        ]);
    }
}
