<?php

namespace App\Controller;

use App\Entity\Word;
use App\Repository\WordRepository;
use App\Service\Import\WordImporter;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class WordImportController extends AbstractController
{
    /**
     * @Route("/api/v1/import", methods={"POST"})
     *
     * @OA\Post(
     *     path="/api/v1/import",
     *     summary="Import words from a given URL",
     *     description="Imports words by fetching a wordbase from the provided URL.",
     *     @OA\RequestBody(
     *         required=true,
     *         description="JSON body with the URL to import from",
     *         @OA\JsonContent(
     *             type="object",
     *             @OA\Property(
     *                 property="url",
     *                 type="string",
     *                 format="url",
     *                 example="https://example.com/wordbase.json"
     *             )
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Words successfully imported",
     *         @OA\JsonContent(
     *             type="object",
     *             @OA\Property(
     *                 property="message",
     *                 type="string",
     *                 example="Imported 1234 words from wordbase"
     *             )
     *         )
     *     ),
     *     @OA\Response(
     *         response=400,
     *         description="Invalid or missing URL",
     *         @OA\JsonContent(
     *             type="object",
     *             @OA\Property(property="error", type="string", example="Invalid or missing URL")
     *         )
     *     ),
     *     @OA\Response(
     *         response=500,
     *         description="Server error during import",
     *         @OA\JsonContent(
     *             type="object",
     *             @OA\Property(property="error", type="string", example="Error message details")
     *         )
     *     )
     * )
     */
    #[Route('/api/v1/words', methods: ['POST'])]
    public function import(Request $request, WordImporter $importer): JsonResponse
    {
        $data = json_decode($request->getContent(), true);
        $url = $data['url'] ?? null;
        $format = $data['format'] ?? 'text';

        if (!$url || !filter_var($url, FILTER_VALIDATE_URL)) {
            return $this->json(['error' => 'Invalid or missing URL'], 400);
        }

        try {
            $count = $importer->import($url, $format);
        } catch (\Throwable $e) {
            return $this->json(['error' => $e->getMessage()], 500);
        }

        return $this->json(['message' => "Imported $count words"]);
    }
    #[Route('/api/v1/wordsJson', methods: ['POST'])]
    public function importJson(Request $request, WordRepository $repo, WordImporter $importer): JsonResponse {
        $data = json_decode($request->getContent(), true);
        $array = $data['words'] ?? null;
        if (!$array || !is_array($array)) return $this->json(['error' => 'Invalid or missing words'], 400);
        try {
            $count = $repo->importFromJson($array, $importer);
            return $this->json(['message' => "Imported $count words"]);
        } catch (\Throwable $e) {
            return $this->json(['error' => $e->getMessage()], 500);
        }
    }
    #[Route('/api/v1/words', methods: ['DELETE'])]
    public function deleteDb(WordRepository $repo): JsonResponse {
      try {
            $count = $repo->deleteAll();
            return $this->json(['message' => "Deleted $count words"]);
        } catch (\Throwable $e) {
            return $this->json(['error' => $e->getMessage()], 500);
        }
    }
}
