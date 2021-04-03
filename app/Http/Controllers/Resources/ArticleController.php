<?php

namespace App\Http\Controllers\Resources;

use App\Helpers\PaginatedCollection;
use App\Helpers\SEO;
use App\Http\Controllers\Base\ResourceController;
use App\Http\Requests\ArticleRequest;
use App\Http\Requests\ReactionRequest;
use App\Interfaces\Controllers\ReactableResourceControllerInterface;
use App\Repositories\ArticleRepository;
use App\Repositories\CategoryRepository;
use App\Repositories\SponsorRepository;
use App\Repositories\UserRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;

class ArticleController extends ResourceController implements ReactableResourceControllerInterface
{
    public function __construct(ArticleRepository $article, SponsorRepository $sponsor, CategoryRepository $category, UserRepository $user)
    {
        $this->article = $article;
        $this->sponsor = $sponsor;
        $this->category = $category;
        $this->user = $user;
    }

    public function read($id)
    {
        $article = $this->article->find($id);
        $suggested = [
            "ofCategory" => [],
            "ofAuthor" => [],
        ];

        SEO::set($article);

        if ($article->category) {
            $suggested["ofCategory"] = $article->category->articles()->public()->with('author')->take(10)->get(["title", "image", "id"]);
        }

        $suggested["ofAuthor"] = $article->author->articles()->public()->take(4)->get(["title", "image", "id"]);

        return $this->render('Article', [
            "article" => $article,
            "sponsors" => $this->sponsor->random(3)->get(),
            "reactions" => $this->article->getReactions($article),
            "suggested" => $suggested,
        ]);
    }

    public function react(ReactionRequest $request): JsonResponse
    {
        $article = $this->article->find($request->item["id"]);
        return response()->json($this->article->react(auth()->user(), $article, $request->reaction["type"]));
    }
}
