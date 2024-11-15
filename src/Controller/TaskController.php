<?php

namespace App\Controller;

use App\Entity\Task;
use Doctrine\ORM\EntityManagerInterface;
use FOS\RestBundle\Controller\Annotations as Rest;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;

#[Rest\Route("/task")]
class TaskController extends AbstractController
{

    #[Rest\Get("/request-task")]
    #[Rest\View(serializerGroups: ["task"])]
    public function requestJobAction(Request $request, EntityManagerInterface $em): Task
    {
        return $em->getRepository(Task::class)->findTaskForWorker();
    }

}
