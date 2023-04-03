<?php

namespace App\Controller;

use phpDocumentor\Reflection\Type;
use phpDocumentor\Reflection\Types\Array_;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use OpenApi\Attributes as OA;

class ApiController extends AbstractController
{
    #[Route('/api/test', name: 'app_api', methods: ['POST'])]
    #[OA\Response(
        response: 200,
        description: "tableau de castings",
        content: new OA\JsonContent(
            type: 'string'
        )
    )]
    #[OA\Parameter(
        name: 'array_castings',
        description: 'renvoi un tableau de castings',
        in: 'query',
        schema: new OA\Schema(type: 'string')
    )]
    public function index(): Response
    {
        return $this->render('api/index.html.twig', [
            'controller_name' => 'ApiController',
        ]);
    }
}
