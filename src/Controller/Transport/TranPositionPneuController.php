<?php

namespace App\Controller\Transport;

use App\Entity\TranPositionPneu;
use App\Form\TranPositionPneuType;
use App\Repository\TranPositionPneuRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/profile/tran/position/pneu")
 */
class TranPositionPneuController extends AbstractController
{
    /**
     * @Route("/", name="tran_position_pneu_index", methods={"GET"})
     */
    public function index(TranPositionPneuRepository $tranPositionPneuRepository): Response
    {
        return $this->render('tran_position_pneu/index.html.twig', [
            'tran_position_pneus' => $tranPositionPneuRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="tran_position_pneu_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $tranPositionPneu = new TranPositionPneu();
        $form = $this->createForm(TranPositionPneuType::class, $tranPositionPneu);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($tranPositionPneu);
            $entityManager->flush();

            return $this->redirectToRoute('tran_position_pneu_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('tran_position_pneu/new.html.twig', [
            'tran_position_pneu' => $tranPositionPneu,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="tran_position_pneu_show", methods={"GET"})
     */
    public function show(TranPositionPneu $tranPositionPneu): Response
    {
        return $this->render('tran_position_pneu/show.html.twig', [
            'tran_position_pneu' => $tranPositionPneu,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="tran_position_pneu_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, TranPositionPneu $tranPositionPneu): Response
    {
        $form = $this->createForm(TranPositionPneuType::class, $tranPositionPneu);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('tran_position_pneu_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('tran_position_pneu/edit.html.twig', [
            'tran_position_pneu' => $tranPositionPneu,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="tran_position_pneu_delete", methods={"POST"})
     */
    public function delete(Request $request, TranPositionPneu $tranPositionPneu): Response
    {
        if ($this->isCsrfTokenValid('delete'.$tranPositionPneu->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($tranPositionPneu);
            $entityManager->flush();
        }

        return $this->redirectToRoute('tran_position_pneu_index', [], Response::HTTP_SEE_OTHER);
    }
}
