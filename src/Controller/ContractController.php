<?php

namespace App\Controller;

use App\Entity\Contract;
use App\Form\ContractForm;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ContractController extends AbstractController
{
    /**
     * @Route("/contract/new", name="contract_new")
     */
    public function create(Request $request) : Response
    {
        $contract = new Contract();

        $form = $this->createForm(ContractForm::class, $contract);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($contract);
            $entityManager->flush();

            return $this->redirectToRoute('question_index');
        }

        return $this->render('contract/create.html.twig', [
            'contract' => $contract,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/contract/list", name="contract_list")
     */
    public function list()
    {
        return $this->render('contract/list.html.twig', [

        ]);
    }
}
