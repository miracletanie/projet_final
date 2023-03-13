<?php

namespace App\Controller;

use App\Entity\TypeModule;
use App\Repository\TypeModuleRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\HttpFoundation\Request;

class TypemodulleController extends AbstractController
{
    #[Route('/typemodulle', name: 'app_typemodulle', methods :["get"])]
    public function index(TypeModuleRepository $typeModuleRepository): Response
    {
        $data = $typeModuleRepository->findAll();
        return $this->json($data);
    }

    #[Route('/typemodulle/create', name: 'app_typemodulle_create', methods :["post"])]
    public function add(ManagerRegistry $doctrine, Request $request){
        $entityManager = $doctrine->getManager();
        $data = json_decode($request->getContent());

        $type = new TypeModule();
        $type->setName($data->name);
        $type->setName($data->name);

        
        $entityManager->persist($type);
        $entityManager->flush();
        
        return $this->json($type);
    }
}
