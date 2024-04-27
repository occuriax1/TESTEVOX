<?php
// src/Controller/SocioApiController.php
namespace App\Controller;

use App\Entity\Socio;
use App\Entity\Empresa;
use App\Repository\SocioRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Component\Validator\Validator\ValidatorInterface;

/**
 * @Route("/api/socios")
 */
class SocioApiController extends AbstractController
{
    /**
     * @Route("/", name="api_socio_index", methods={"GET"})
     */
    public function index(SocioRepository $socioRepository): JsonResponse
    {
        $socios = $socioRepository->findAll();
        return $this->json($socios);
    }

    /**
     * @Route("/", name="api_socio_new", methods={"POST"})
     */
    public function new(Request $request, SerializerInterface $serializer, ValidatorInterface $validator, EntityManagerInterface $em): JsonResponse
    {
        $socioData = json_decode($request->getContent(), true);
        $empresa = $em->getRepository(Empresa::class)->find($socioData['empresa_id']);

        if (!$empresa) {
            return new JsonResponse(['error' => 'Empresa não encontrada'], Response::HTTP_BAD_REQUEST);
        }

        $socio = $serializer->deserialize($request->getContent(), Socio::class, 'json');
        $socio->setEmpresa($empresa); // Associação com a empresa

        $errors = $validator->validate($socio);
        if (count($errors) > 0) {
            $errorsString = (string) $errors;
            return new JsonResponse(['error' => $errorsString], Response::HTTP_BAD_REQUEST);
        }

        $em->persist($socio);
        $em->flush();

        return $this->json($socio, Response::HTTP_CREATED);
    }

    /**
     * @Route("/{id}", name="api_socio_show", methods={"GET"})
     */
    public function show(Socio $socio): JsonResponse
    {
        return $this->json($socio);
    }

    /**
     * @Route("/{id}", name="api_socio_edit", methods={"PUT"})
     */
    public function edit(Request $request, Socio $socio, SerializerInterface $serializer, ValidatorInterface $validator, EntityManagerInterface $em): JsonResponse
    {
        $serializer->deserialize($request->getContent(), Socio::class, 'json', ['object_to_populate' => $socio]);

        $errors = $validator->validate($socio);
        if (count($errors) > 0) {
            return $this->json($errors, Response::HTTP_BAD_REQUEST);
        }

        $em->flush();

        return $this->json($socio);
    }

    /**
     * @Route("/{id}", name="api_socio_delete", methods={"DELETE"})
     */
    public function delete(Socio $socio, EntityManagerInterface $em): JsonResponse
    {
        $em->remove($socio);
        $em->flush();

        return new JsonResponse(null, Response::HTTP_NO_CONTENT);
    }
}
