<?php

namespace App\Http\Middleware;

use App\Repositories\CategoryRepository;
use App\Repositories\ConfigurationRepository;
use App\Repositories\PageRepository;
use Closure;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\View;
use Inertia\Inertia;

class ExternalSharedData
{
    public function __construct(ConfigurationRepository $config, CategoryRepository $category, PageRepository $page)
    {
        $this->config = $config;
        $this->category = $category;
        $this->page = $page;
    }

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $shared = [
            'configuration' => $this->config->get(['footer', 'logo']),
            'categories' => $this->category->important()->get(),
            'pages' => $this->page->list(['name', 'slug'])
        ];

        Inertia::share($shared);
        View::share($shared);

        return $next($request);
    }
}
