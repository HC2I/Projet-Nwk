<?php

namespace App\Controller;

use App\Entity\DepotAnnonce;
use App\Form\DepotAnnonceType;
use App\Repository\DepotAnnonceRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

#[Route('/admin/depot/annonce')]
#[IsGranted('ROLE_ADMIN')]

class AdminDepotAnnonceController extends AbstractController
{
    #[Route('/', name: 'app_admin_depot_annonce_index', methods: ['GET'])]
    public function index(DepotAnnonceRepository $depotAnnonceRepository): Response
    {
        return $this->render('admin_depot_annonce/index.html.twig', [
            'depot_annonces' => $depotAnnonceRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_admin_depot_annonce_new', methods: ['GET', 'POST'])]
    public function new(Request $request, DepotAnnonceRepository $depotAnnonceRepository): Response
    {
        $depotAnnonce = new DepotAnnonce();
        $form = $this->createForm(DepotAnnonceType::class, $depotAnnonce);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $depotAnnonceRepository->save($depotAnnonce, true);

            return $this->redirectToRoute('app_admin_depot_annonce_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('admin_depot_annonce/new.html.twig', [
            'depot_annonce' => $depotAnnonce,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_admin_depot_annonce_show', methods: ['GET'])]
    public function show(DepotAnnonce $depotAnnonce): Response
    {
        return $this->render('admin_depot_annonce/show.html.twig', [
            'depot_annonce' => $depotAnnonce,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_admin_depot_annonce_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, DepotAnnonce $depotAnnonce, DepotAnnonceRepository $depotAnnonceRepository): Response
    {
        $form = $this->createForm(DepotAnnonceType::class, $depotAnnonce);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $depotAnnonceRepository->save($depotAnnonce, true);

            return $this->redirectToRoute('app_admin_depot_annonce_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('admin_depot_annonce/edit.html.twig', [
            'depot_annonce' => $depotAnnonce,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_admin_depot_annonce_delete', methods: ['POST'])]
    public function delete(Request $request, DepotAnnonce $depotAnnonce, DepotAnnonceRepository $depotAnnonceRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$depotAnnonce->getId(), $request->request->get('_token'))) {
            $depotAnnonceRepository->remove($depotAnnonce, true);
        }

        return $this->redirectToRoute('app_admin_depot_annonce_index', [], Response::HTTP_SEE_OTHER);
    }
}