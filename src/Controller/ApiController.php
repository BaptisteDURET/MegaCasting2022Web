<?php

namespace App\Controller;

use App\Entity\Casting;
use Doctrine\ORM\EntityManagerInterface;
use phpDocumentor\Reflection\Type;
use phpDocumentor\Reflection\Types\Array_;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use OpenApi\Attributes as OA;

class ApiController extends AbstractController
{
    #[Route('/api/casting/all', name: 'get_all_castings', methods: ['GET'])]
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
    public function AllCastings(EntityManagerInterface $entityManager): Response
    {
        $castings = $entityManager->getRepository(Casting::class)->findAll();
        $data = [];
        if ($castings) {
            foreach ($castings as $casting) {
                $data[] = [
                    'Identifiant' => $casting->getId(),
                    'Reference' => $casting->getReference(),
                    'Intitule' => $casting->getIntitule(),
                    'DateDebutPublication' => $casting->getDateDebutPublication(),
                    'DureeDiffusion' => $casting->getDureeDiffusion(),
                    'DateDebutContrat' => $casting->getDateDebutContrat(),
                    'NombrePosteDispo' => $casting->getNombrePosteDispo(),
                    'Description' => $casting->getDescription(),
                    'DescriptionProfilRecherche' => $casting->getDescriptionProfilRecherche(),
                    'Email' => $casting->getEmail(),
                    'NumeroTelephone' => $casting->getNumeroTelephone(),
                    'SiteWeb' => $casting->getSiteWeb(),
                    'AdressePostale' => $casting->getAdressePostale(),
                ];
            }
            return $this->json($data);
        }
        return $this->json(['message' => 'Aucun casting trouvé'], 404);
    }

    #[Route('/api/casting/{id}', name: 'get_one_casting', methods: ['GET'])]
    #[OA\Response(
        response: 200,
        description: "tableau de un casting",
        content: new OA\JsonContent(
            type: 'string'
        )
    )]
    #[OA\Parameter(
        name: 'array_casting',
        description: 'renvoi un casting',
        in: 'query',
        schema: new OA\Schema(type: 'string')
    )]
    public function OneCastings(EntityManagerInterface $entityManager, int $id): Response
    {
        $casting = $entityManager->getRepository(Casting::class)->findBy(array('id' => $id));
        if ($casting) {
            $data = [];
            $data[] = [
                'Identifiant' => $casting[0]->getId(),
                'Reference' => $casting[0]->getReference(),
                'Intitule' => $casting[0]->getIntitule(),
                'DateDebutPublication' => $casting[0]->getDateDebutPublication(),
                'DureeDiffusion' => $casting[0]->getDureeDiffusion(),
                'DateDebutContrat' => $casting[0]->getDateDebutContrat(),
                'NombrePosteDispo' => $casting[0]->getNombrePosteDispo(),
                'Description' => $casting[0]->getDescription(),
                'DescriptionProfilRecherche' => $casting[0]->getDescriptionProfilRecherche(),
                'Email' => $casting[0]->getEmail(),
                'NumeroTelephone' => $casting[0]->getNumeroTelephone(),
                'SiteWeb' => $casting[0]->getSiteWeb(),
                'AdressePostale' => $casting[0]->getAdressePostale(),
            ];

            return $this->json($data);
        }
        return $this->json(['error' => 'Casting not found'], 404);
    }
}
