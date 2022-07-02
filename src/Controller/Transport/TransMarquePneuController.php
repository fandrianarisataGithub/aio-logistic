<?php

namespace App\Controller\Transport;

use App\Entity\TransMarquePneu;
use App\Form\TransMarquePneuType;
use App\Repository\TransMarquePneuRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/trans/marque/pneu")
 */
class TransMarquePneuController extends AbstractController
{
    /**
     * @Route("/", name="trans_marque_pneu_index", methods={"GET"})
     */
    public function index(TransMarquePneuRepository $transMarquePneuRepository): Response
    {
        return $this->render('trans_marque_pneu/index.html.twig', [
            'trans_marque_pneus' => $transMarquePneuRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="trans_marque_pneu_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $transMarquePneu = new TransMarquePneu();
        $form = $this->createForm(TransMarquePneuType::class, $transMarquePneu);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($transMarquePneu);
            $entityManager->flush();

            return $this->redirectToRoute('trans_marque_pneu_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('trans_marque_pneu/new.html.twig', [
            'trans_marque_pneu' => $transMarquePneu,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="trans_marque_pneu_show", methods={"GET"})
     */
    public function show(TransMarquePneu $transMarquePneu): Response
    {
        return $this->render('trans_marque_pneu/show.html.twig', [
            'trans_marque_pneu' => $transMarquePneu,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="trans_marque_pneu_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, TransMarquePneu $transMarquePneu): Response
    {
        $form = $this->createForm(TransMarquePneuType::class, $transMarquePneu);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('trans_marque_pneu_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('trans_marque_pneu/edit.html.twig', [
            'trans_marque_pneu' => $transMarquePneu,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="trans_marque_pneu_delete", methods={"POST"})
     */
    public function delete(Request $request, TransMarquePneu $transMarquePneu): Response
    {
        if ($this->isCsrfTokenValid('delete'.$transMarquePneu->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($transMarquePneu);
            $entityManager->flush();
        }

        return $this->redirectToRoute('trans_marque_pneu_index', [], Response::HTTP_SEE_OTHER);
    }
}
