<?php

namespace App\Controller\Transport;

use App\Entity\TransClientVoyageCarb;
use App\Form\TransClientVoyageCarb1Type;
use App\Repository\TransClientVoyageCarbRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/profile/trans/client/voyage/carb")
 */
class TransClientVoyageCarbController extends AbstractController
{
    /**
     * @Route("/", name="trans_client_voyage_carb_index", methods={"GET"})
     */
    public function index(TransClientVoyageCarbRepository $transClientVoyageCarbRepository): Response
    {
        return $this->render('trans_client_voyage_carb/index.html.twig', [
            'trans_client_voyage_carbs' => $transClientVoyageCarbRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="trans_client_voyage_carb_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $transClientVoyageCarb = new TransClientVoyageCarb();
        $form = $this->createForm(TransClientVoyageCarb1Type::class, $transClientVoyageCarb);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($transClientVoyageCarb);
            $entityManager->flush();

            return $this->redirectToRoute('trans_client_voyage_carb_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('trans_client_voyage_carb/new.html.twig', [
            'trans_client_voyage_carb' => $transClientVoyageCarb,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="trans_client_voyage_carb_show", methods={"GET"})
     */
    public function show(TransClientVoyageCarb $transClientVoyageCarb): Response
    {
        return $this->render('trans_client_voyage_carb/show.html.twig', [
            'trans_client_voyage_carb' => $transClientVoyageCarb,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="trans_client_voyage_carb_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, TransClientVoyageCarb $transClientVoyageCarb): Response
    {
        $form = $this->createForm(TransClientVoyageCarb1Type::class, $transClientVoyageCarb);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('trans_client_voyage_carb_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('trans_client_voyage_carb/edit.html.twig', [
            'trans_client_voyage_carb' => $transClientVoyageCarb,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="trans_client_voyage_carb_delete", methods={"POST"})
     */
    public function delete(Request $request, TransClientVoyageCarb $transClientVoyageCarb): Response
    {
        if ($this->isCsrfTokenValid('delete'.$transClientVoyageCarb->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($transClientVoyageCarb);
            $entityManager->flush();
        }

        return $this->redirectToRoute('trans_client_voyage_carb_index', [], Response::HTTP_SEE_OTHER);
    }
}
