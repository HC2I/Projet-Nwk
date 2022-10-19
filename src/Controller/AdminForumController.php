<?php

namespace App\Controller;

use App\Entity\Forum;
use App\Form\ForumType;
use App\Repository\ForumRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

#[Route('/admin/forum')]
#[IsGranted('ROLE_ADMIN')]
class AdminForumController extends AbstractController
{
    #[Route('/', name: 'app_admin_forum_index', methods: ['GET'])]
    public function index(ForumRepository $forumRepository): Response
    {
        return $this->render('admin_forum/index.html.twig', [
            'forums' => $forumRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_admin_forum_new', methods: ['GET', 'POST'])]
    public function new(Request $request, ForumRepository $forumRepository): Response
    {
        $forum = new Forum();
        $form = $this->createForm(ForumType::class, $forum);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $forumRepository->save($forum, true);

            return $this->redirectToRoute('app_admin_forum_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('admin_forum/new.html.twig', [
            'forum' => $forum,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_admin_forum_show', methods: ['GET'])]
    public function show(Forum $forum): Response
    {
        return $this->render('admin_forum/show.html.twig', [
            'forum' => $forum,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_admin_forum_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Forum $forum, ForumRepository $forumRepository): Response
    {
        $form = $this->createForm(ForumType::class, $forum);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $forumRepository->save($forum, true);

            return $this->redirectToRoute('app_admin_forum_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('admin_forum/edit.html.twig', [
            'forum' => $forum,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_admin_forum_delete', methods: ['POST'])]
    public function delete(Request $request, Forum $forum, ForumRepository $forumRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$forum->getId(), $request->request->get('_token'))) {
            $forumRepository->remove($forum, true);
        }

        return $this->redirectToRoute('app_admin_forum_index', [], Response::HTTP_SEE_OTHER);
    }
}