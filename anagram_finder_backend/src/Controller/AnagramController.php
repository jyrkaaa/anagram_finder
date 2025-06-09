<?php

namespace App\Controller;

use App\Repository\WordRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Attribute\MapQueryString;
use Symfony\Component\Routing\Attribute\Route;
use App\Methods;

final class AnagramController extends AbstractController
{
    #[Route('/api/v1/anagram', methods: ['GET'])]
    public function findAnagram(Request $request,WordRepository $repo): Response
    {
        $word = $request->query->get("word");
        $words = $repo->findAnagrams($word);
        return $this->json(['anagrams' => $words]);
    }
}
