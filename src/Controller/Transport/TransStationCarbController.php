<?php

namespace App\Controller\Transport;

use App\Entity\TransStationCarb;
use App\Form\TransStationCarb1Type;
use App\Repository\TransStationCarbRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/profile/trans/station/carb")
 */
class TransStationCarbController extends AbstractController
{
    /**
     * @Route("/", name="trans_station_carb_index", methods={"GET"})
     */
    public function index(TransStationCarbRepository $transStationCarbRepository): Response
    {
        return $this->render('trans_station_carb/index.html.twig', [
            'trans_station_carbs' => $transStationCarbRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="trans_station_carb_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $transStationCarb = new TransStationCarb();
        $form = $this->createForm(TransStationCarb1Type::class, $transStationCarb);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($transStationCarb);
            $entityManager->flush();

            return $this->redirectToRoute('trans_station_carb_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('trans_station_carb/new.html.twig', [
            'trans_station_carb' => $transStationCarb,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="trans_station_carb_show", methods={"GET"})
     */
    public function show(TransStationCarb $transStationCarb): Response
    {
        return $this->render('trans_station_carb/show.html.twig', [
            'trans_station_carb' => $transStationCarb,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="trans_station_carb_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, TransStationCarb $transStationCarb): Response
    {
        $form = $this->createForm(TransStationCarb1Type::class, $transStationCarb);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('trans_station_carb_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('trans_station_carb/edit.html.twig', [
            'trans_station_carb' => $transStationCarb,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="trans_station_carb_delete", methods={"POST"})
     */
    public function delete(Request $request, TransStationCarb $transStationCarb): Response
    {
        if ($this->isCsrfTokenValid('delete'.$transStationCarb->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($transStationCarb);
            $entityManager->flush();
        }

        return $this->redirectToRoute('trans_station_carb_index', [], Response::HTTP_SEE_OTHER);
    }
}
