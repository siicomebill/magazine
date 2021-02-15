<?php

namespace App\Http\Controllers;

use App\Helpers\SEO;
use App\Repositories\ArticleRepository;
use App\Repositories\ConfigurationRepository;
use App\Repositories\PageRepository;
use App\Repositories\SponsorRepository;
use App\Repositories\UserRepository;
use App\Traits\Renderable;
use Illuminate\Support\Arr;

class PublicPagesController extends Controller
{
    use Renderable;

    public function index(SponsorRepository $sponsor, ArticleRepository $article, ConfigurationRepository $config)
    {
        return $this->render('Home', [
            "sponsors" => $sponsor->important()->get(),
            "articles" => $article->paginated(20),
            "config" => $config->get(["banner" , "logo"]),
        ]);
    }

    public function page(string $slug, PageRepository $page){
        $model = $page->get($slug);

        $data = $model->toArray();

        $content = Arr::except($data, 'slug');

        SEO::set($model);

        if($content)
            return $this->render('PageContainer', [
                "content" => $content
            ]);
        else
            return abort(404);
    }

    public function userPage($id, UserRepository $users)
    {
        $user = $users->asModel()->where('id', $id)->with(['articles' => function ($query) {
            $query->public();
        }])->firstOrFail();

        return $this->render('User', [
            "user" => $user,
        ]);
    }
}
