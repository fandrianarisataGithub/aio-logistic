<?php

namespace App\Controller\Transport;

use App\Entity\TransCodeDesignationPiece;
use App\Form\TransCodeDesignationPieceType;
use App\Repository\TransCodeDesignationPieceRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/trans/code/designation/piece")
 */
class TransCodeDesignationPieceController extends AbstractController
{
    
    /**
     * @Route("/", name="trans_code_designation_piece_index", methods={"GET"})
     */
    public function index(TransCodeDesignationPieceRepository $transCodeDesignationPieceRepository): Response
    {
        return $this->render('trans_code_designation_piece/index.html.twig', [
            'trans_code_designation_pieces' => $transCodeDesignationPieceRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="trans_code_designation_piece_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $transCodeDesignationPiece = new TransCodeDesignationPiece();
        $form = $this->createForm(TransCodeDesignationPieceType::class, $transCodeDesignationPiece);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($transCodeDesignationPiece);
            $entityManager->flush();

            return $this->redirectToRoute('trans_code_designation_piece_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('trans_code_designation_piece/new.html.twig', [
            'trans_code_designation_piece' => $transCodeDesignationPiece,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="trans_code_designation_piece_show", methods={"GET"})
     */
    public function show(TransCodeDesignationPiece $transCodeDesignationPiece): Response
    {
        return $this->render('trans_code_designation_piece/show.html.twig', [
            'trans_code_designation_piece' => $transCodeDesignationPiece,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="trans_code_designation_piece_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, TransCodeDesignationPiece $transCodeDesignationPiece): Response
    {
        $form = $this->createForm(TransCodeDesignationPieceType::class, $transCodeDesignationPiece);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('trans_code_designation_piece_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('trans_code_designation_piece/edit.html.twig', [
            'trans_code_designation_piece' => $transCodeDesignationPiece,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="trans_code_designation_piece_delete", methods={"POST"})
     */
    public function delete(Request $request, TransCodeDesignationPiece $transCodeDesignationPiece): Response
    {
        if ($this->isCsrfTokenValid('delete'.$transCodeDesignationPiece->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($transCodeDesignationPiece);
            $entityManager->flush();
        }

        return $this->redirectToRoute('trans_code_designation_piece_index', [], Response::HTTP_SEE_OTHER);
    }
}
