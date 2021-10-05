<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Room;

class AgController extends AbstractController
{
    /**
     * @Route("/room/list", name="room_index", methods='GET')
     */
    public function list_rooms()
    {
        $em = $this->getDoctrine()->getManager();
        $rooms = $em->getRepository(Room::class)->findAll();

        dump($rooms);


        return $this->render('ag/list_rooms.html.twig', [
            'rooms' => $rooms,
        ]);
    }

}
