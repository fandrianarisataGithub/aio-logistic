<?php

namespace App\Controller\Transport;

use App\Entity\TransTrajetVoyage;
use App\Form\TransTrajetVoyage1Type;
use App\Repository\TransTrajetVoyageRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/profile/trans/trajet/voyage")
 */
class TransTrajetVoyageController extends AbstractController
{
    /**
     * @Route("/", name="trans_trajet_voyage_index", methods={"GET"})
     */
    public function index(TransTrajetVoyageRepository $transTrajetVoyageRepository): Response
    {
        return $this->render('trans_trajet_voyage/index.html.twig', [
            'trans_trajet_voyages' => $transTrajetVoyageRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="trans_trajet_voyage_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $transTrajetVoyage = new TransTrajetVoyage();
        $form = $this->createForm(TransTrajetVoyage1Type::class, $transTrajetVoyage);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($transTrajetVoyage);
            $entityManager->flush();

            return $this->redirectToRoute('trans_trajet_voyage_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('trans_trajet_voyage/new.html.twig', [
            'trans_trajet_voyage' => $transTrajetVoyage,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="trans_trajet_voyage_show", methods={"GET"})
     */
    public function show(TransTrajetVoyage $transTrajetVoyage): Response
    {
        return $this->render('trans_trajet_voyage/show.html.twig', [
            'trans_trajet_voyage' => $transTrajetVoyage,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="trans_trajet_voyage_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, TransTrajetVoyage $transTrajetVoyage): Response
    {
        $form = $this->createForm(TransTrajetVoyage1Type::class, $transTrajetVoyage);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('trans_trajet_voyage_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('trans_trajet_voyage/edit.html.twig', [
            'trans_trajet_voyage' => $transTrajetVoyage,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="trans_trajet_voyage_delete", methods={"POST"})
     */
    public function delete(Request $request, TransTrajetVoyage $transTrajetVoyage): Response
    {
        if ($this->isCsrfTokenValid('delete'.$transTrajetVoyage->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($transTrajetVoyage);
            $entityManager->flush();
        }

        return $this->redirectToRoute('trans_trajet_voyage_index', [], Response::HTTP_SEE_OTHER);
    }
}
