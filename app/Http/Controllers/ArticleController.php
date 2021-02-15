<?php

namespace App\Http\Controllers;

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

    public function managerPage(Request $request, $userId = null)
    {
        $routes = $userId ? [
            "edit" => "articles.ofUser.write",
            "delete" => "articles.ofUser.delete"
        ] : [];

        $paginatedResource = new PaginatedCollection($this->article->forManagerPage($userId, $routes));

        return $this->render('ArticlesManager', [
            'items' => $paginatedResource,
            'newItem' => $userId ? route('articles.ofUser.write', [
                'userId' => $userId
            ]) : null
        ]);
    }

    public function editItemPage(Request $request, $id = null, $additionalData = [])
    {
        $article = $this->article->forEditor($id, auth()->user()->id);

        return $this->render('NewArticle', [
            "stored" => $article ?? null,
            "publishTo" => URL::route('articles.publish'),
            "categories" => $this->category->list(["name", "id"])
        ]);
    }

    public function editOtherItemPage(Request $request, $userId = null, $id = null)
    {
        $article = $this->article->forEditor($id, $userId);

        return $this->render('NewArticle', [
            "stored" => $article,
            "publishTo" => URL::route('articles.ofUser.publish', [
                'userId' => $userId,
            ]),
            "categories" => $this->category->list(["name", "id"])
        ]);
    }

    public function store(ArticleRequest $request)
    {
        $data = $request->all();
        if ($request->hasFile('image')) {
            $result = image()->upload($request->file('image'));
            if ($result->success) {
                $data["image"] = $result->url;
            }
        }

        return $this->article->store($data) ? redirect()->route('articles.mine.list') : abort(500);
    }

    public function storeAsOther(ArticleRequest $request, $userId, $id = null)
    {
        $data = $request->all();

        if ($user = $userId ? $this->user->find($userId) : null) {
            if ($user->hasRole('writer')) {
                if ($request->hasFile('image')) {
                    $result = image()->upload($request->file('image'));
                    if ($result->success) {
                        $data["image"] = $result->url;
                    }
                }
                return $this->article->store($data, $user) ? redirect()->route('articles.ofUser.list', ['userId' => $user->id]) : abort(500);
            } else {
                return abort(403, 'The user selected is not a writer.');
            }
        } else {
            return abort(404, 'You tried posting an article as a non-existent user.');
        }
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

    public function delete($id)
    {
        $this->article->asModel()->user(auth()->user()->id)->find($id)->delete();

        return redirect()->back();
    }

    public function deleteFromOther($userId, $id)
    {
        $this->article->delete($id);

        return redirect()->back();
    }

    public function react(ReactionRequest $request): JsonResponse
    {
        $article = $this->article->find($request->item["id"]);
        return response()->json($this->article->react(auth()->user(), $article, $request->reaction["type"]));
    }
}
