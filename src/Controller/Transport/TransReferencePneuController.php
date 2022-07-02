<?php

namespace App\Controller\Transport;

use App\Entity\TransReferencePneu;
use App\Form\TransReferencePneuType;
use App\Repository\TransReferencePneuRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/profile/trans/reference/pneu")
 */
class TransReferencePneuController extends AbstractController
{
    /**
     * @Route("/", name="trans_reference_pneu_index", methods={"GET"})
     */
    public function index(TransReferencePneuRepository $transReferencePneuRepository): Response
    {
        return $this->render('trans_reference_pneu/index.html.twig', [
            'trans_reference_pneus' => $transReferencePneuRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="trans_reference_pneu_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $transReferencePneu = new TransReferencePneu();
        $form = $this->createForm(TransReferencePneuType::class, $transReferencePneu);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($transReferencePneu);
            $entityManager->flush();

            return $this->redirectToRoute('trans_reference_pneu_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('trans_reference_pneu/new.html.twig', [
            'trans_reference_pneu' => $transReferencePneu,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="trans_reference_pneu_show", methods={"GET"})
     */
    public function show(TransReferencePneu $transReferencePneu): Response
    {
        return $this->render('trans_reference_pneu/show.html.twig', [
            'trans_reference_pneu' => $transReferencePneu,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="trans_reference_pneu_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, TransReferencePneu $transReferencePneu): Response
    {
        $form = $this->createForm(TransReferencePneuType::class, $transReferencePneu);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('trans_reference_pneu_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('trans_reference_pneu/edit.html.twig', [
            'trans_reference_pneu' => $transReferencePneu,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="trans_reference_pneu_delete", methods={"POST"})
     */
    public function delete(Request $request, TransReferencePneu $transReferencePneu): Response
    {
        if ($this->isCsrfTokenValid('delete'.$transReferencePneu->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($transReferencePneu);
            $entityManager->flush();
        }

        return $this->redirectToRoute('trans_reference_pneu_index', [], Response::HTTP_SEE_OTHER);
    }
}
