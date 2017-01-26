<?php

namespace App\Http\Controllers;

use Flash;
use Response;
use App\Http\Requests;
use App\Models\Article;
use Illuminate\Http\Request;
use App\Repositories\TagRepository;
use App\Jobs\SendNotificationEmail;
use App\Repositories\UserRepository;
use App\Repositories\ArticleRepository;
use App\Repositories\CategoryRepository;
use App\Http\Requests\CreateArticleRequest;
use App\Http\Requests\UpdateArticleRequest;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Http\Controllers\AppBaseController as InfyOmBaseController;

class ArticleController extends InfyOmBaseController
{
    /** @var  ArticleRepository */
    private $articleRepository;

    public function __construct(ArticleRepository $articleRepo)
    {
        $this->articleRepository = $articleRepo;
    }

    /**
     * Display a listing of the Article.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->articleRepository->pushCriteria(new RequestCriteria($request));
        $articles = $this->articleRepository->all();

        return view('admin.articles.index', compact('articles'));
    }

    /**
     * Show the form for creating a new Article.
     *
     * @return Response
     */
    public function create(UserRepository $userRepository, CategoryRepository $categoryRepository)
    {
        $article = new Article();
        $users = $userRepository->findWhere(['state' => true])->pluck('username', 'id');
        $categories = $categoryRepository->orderBy('name', 'desc')->findWhere(['state' => true]);

        return view('admin.articles.create', compact('article', 'users', 'categories'));
    }

    /**
     * Store a newly created Article in storage.
     *
     * @param CreateArticleRequest $request
     *
     * @return Response
     */
    public function store(CreateArticleRequest $request)
    {
        $input = $request->all();

        $article = $this->articleRepository->create($input);
        $article->updateCategories($request->categories);
        $article->updateTags($request->tags);
        $this->dispatch(new SendNotificationEmail($article));

        Flash::success('Article saved successfully.');

        return redirect(route('admin.articles.show', $article->id));
    }

    /**
     * Display the specified Article.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $article = $this->articleRepository->findWithoutFail($id);

        if (empty($article)) {
            Flash::error('Article not found');

            return redirect(route('admin.articles.index'));
        }

        return view('admin.articles.show', compact('article'));
    }

    /**
     * Show the form for editing the specified Article.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id, UserRepository $userRepository, CategoryRepository $categoryRepository, TagRepository $tagRepository)
    {
        $article = $this->articleRepository->findWithoutFail($id);

        if (empty($article)) {
            Flash::error('Article not found');

            return redirect(route('admin.articles.index'));
        }

        $users = $userRepository->findWhere(['state' => true])->pluck('username', 'id');
        $categories = $categoryRepository->orderBy('name', 'desc')->findWhere(['state' => true]);
        $tags = $tagRepository->orderBy('name', 'desc')->findWhere(['state' => true])->pluck('name', 'id');

        return view('admin.articles.edit', compact('article', 'users', 'categories', 'tags'));
    }

    /**
     * Update the specified Article in storage.
     *
     * @param  int              $id
     * @param UpdateArticleRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateArticleRequest $request)
    {
        $article = $this->articleRepository->findWithoutFail($id);

        if (empty($article)) {
            Flash::error('Article not found');

            return redirect(route('admin.articles.index'));
        }

        $article = $this->articleRepository->update($request->all(), $id);
        $article->updateCategories($request->categories);
        $article->updateTags($request->tags);


        Flash::success('Article updated successfully.');

        return redirect(route('admin.articles.show', $article->id));
    }

    /**
     * Remove the specified Article from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $article = $this->articleRepository->findWithoutFail($id);

        if (empty($article)) {
            Flash::error('Article not found');

            return redirect(route('admin.articles.index'));
        }

        $this->articleRepository->delete($id);

        Flash::success('Article deleted successfully.');

        return redirect(route('admin.articles.index'));
    }
}
