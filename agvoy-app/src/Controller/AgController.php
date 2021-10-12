<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Room;
use App\Entity\Region;

class AgController extends AbstractController
{
    /**
     * @Route("/", name="homepage", methods="GET")
     */
    public function index()
    {
        $em = $this->getDoctrine()->getManager();
        $rooms = $em->getRepository(Room::class)->findAll();

        dump($rooms);


        return $this->render('ag/list_rooms.html.twig', [
            'rooms' => $rooms,
        ]);
    }

    public function list_rooms(Region $region_id)
    {
        $em = $this->getDoctrine()->getManager();
        $rooms = $em->getRepository(Room::class)->find($region_id);

        dump($rooms);

    }

    /**
     * @Route("/regions", name="regions", methods="GET")
     */

    public function regions()
    {
        $em = $this->getDoctrine()->getManager();
        $regions = $em->getRepository(Region::class)->findAll();

        dump($regions);


        return $this->render('ag/list_regions.html.twig', [
            'regions' => $regions,
        ]);
    }

}
