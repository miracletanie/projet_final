<?php

namespace App\Controller;

use App\Entity\Module;
use App\Entity\TypeModule;
use App\Repository\ModuleRepository;
use App\Repository\TypeModuleRepository;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;


class ModulleController extends AbstractController
{
    #[Route('/module', name: 'app_module', methods :["get"])]
    public function index(ModuleRepository $moduleRepository): Response
    {
        $data = $moduleRepository->findAll();
        return $this->json($data);
    }
    #[Route('/modulle/create', name: 'app_module_create', methods :["post"])]
    public function add(EntityManagerInterface $entityManager, ManagerRegistry $doctrine, Request $request){
        $entityManager = $doctrine->getManager();
        $data = json_decode($request->getContent());

        $type =  $product = $entityManager->getRepository(TypeModule::class)->find($data->typemodule);
       
        // return $this->json($type);
        $module = new Module();
        $module->setName($data->name);
        $module->setTypeModuleId($type);
        $module->setNbreSceance($data->nbre_sceance);

       
        
        $entityManager->persist($module);
        $entityManager->flush();
        
        return $this->json($module);
    }



}
