<?php
// src/Controller/EmpresaApiController.php
namespace App\Controller;

use App\Entity\Empresa;
use App\Repository\EmpresaRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Component\Validator\Validator\ValidatorInterface;

/**
 * @Route("/api/empresa")
 */
class EmpresaApiController extends AbstractController
{

    
    /**
     * @Route("/", name="api_empresa_index", methods={"GET"})
     */
    public function index(EmpresaRepository $empresaRepository): JsonResponse
    {
        $empresas = $empresaRepository->findAll();
        return $this->json($empresas);
    }

    /**
     * @Route("/", name="api_empresa_new", methods={"POST"})
     */
    public function new(Request $request, SerializerInterface $serializer, ValidatorInterface $validator, EntityManagerInterface $em): JsonResponse
    {
        $empresa = $serializer->deserialize($request->getContent(), Empresa::class, 'json');
        
        // Valida a entidade Empresa
        $errors = $validator->validate($empresa);
        if (count($errors) > 0) {
            $errorsString = (string) $errors;
            return new JsonResponse(['error' => $errorsString], Response::HTTP_BAD_REQUEST);
        }

        $em->persist($empresa);
        $em->flush();

        return $this->json($empresa, Response::HTTP_CREATED);
    }

    /**
     * @Route("/{id}", name="api_empresa_show", methods={"GET"})
     */
    public function show(Empresa $empresa): JsonResponse
    {
        return $this->json($empresa);
    }

    /**
     * @Route("/{id}", name="api_empresa_edit", methods={"PUT"})
     */
    public function edit(Request $request, Empresa $empresa, SerializerInterface $serializer, ValidatorInterface $validator, EntityManagerInterface $em): JsonResponse
    {
        $serializer->deserialize($request->getContent(), Empresa::class, 'json', ['object_to_populate' => $empresa]);

        // Valida a entidade Empresa
        $errors = $validator->validate($empresa);
        if (count($errors) > 0) {
            return $this->json($errors, Response::HTTP_BAD_REQUEST);
        }

        $em->flush();

        return $this->json($empresa);
    }

    /**
     * @Route("/{id}", name="api_empresa_delete", methods={"DELETE"})
     */
    public function delete(Empresa $empresa, EntityManagerInterface $em): JsonResponse
    {
        $em->remove($empresa);
        $em->flush();

        return new JsonResponse(null, Response::HTTP_NO_CONTENT);
    }
    
}
