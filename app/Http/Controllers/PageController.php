<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\CreatePageRequest;
use App\Http\Requests\UpdatePageRequest;
use App\Models\Page;
use App\Models\Section;
use App\Repositories\PageRepository;
use App\Repositories\SectionRepository;
use App\Http\Controllers\AppBaseController as InfyOmBaseController;
use App\Repositories\UserRepository;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class PageController extends InfyOmBaseController
{
    /** @var  PageRepository */
    private $pageRepository;

    public function __construct(PageRepository $pageRepo)
    {
        $this->pageRepository = $pageRepo;
    }

    /**
     * Display a listing of the Page.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $this->pageRepository->pushCriteria(new RequestCriteria($request));
        $pages = $this->pageRepository->all();

        return view('admin.pages.index', compact('pages'));
    }

    /**
     * Show the form for creating a new Page.
     *
     * @return Response
     */
    public function create(UserRepository $userRepository)
    {
        $page = new Page();
        $users = $userRepository->findWhere(['role' => 1])->pluck('username', 'id');

        return view('admin.pages.create', compact('page', 'users'));
    }

    /**
     * Store a newly created Page in storage.
     *
     * @param CreatePageRequest $request
     *
     * @return Response
     */
    public function store(CreatePageRequest $request)
    {
        $input = $request->all();

        $page = $this->pageRepository->create($input);

        Flash::success('Page saved successfully.');

        return redirect(route('admin.pages.show', $page->id));
    }

    /**
     * Display the specified Page.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id, SectionRepository $sectionRepository)
    {
        $page = $this->pageRepository->findWithoutFail($id);

        $pages = $this->pageRepository->findWithoutFail($id)->pluck('title', 'id');

        $sections = $sectionRepository->findWhere(['pageId' => $id])->all();

        $sectionObj = new Section();
        $sectionNew = new Section();

        $sectionObj->pageId = $id;
        $sectionNew->pageId = $id;

        $typesSection = $sectionObj->getAllTypesSection();

        if (empty($page)) {
            Flash::error('Page not found');

            return redirect(route('admin.pages.index'));
        }

        return view('admin.pages.show', compact('page', 'sections', 'pages', 'sectionNew', 'sectionObj', 'typesSection'));
    }

    /**
     * Show the form for editing the specified Page.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id, UserRepository $userRepository)
    {
        $page = $this->pageRepository->findWithoutFail($id);

        if (empty($page)) {
            Flash::error('Page not found');

            return redirect(route('admin.pages.index'));
        }

        $users = $userRepository->findWhere(['role' => 1])->pluck('username', 'id');
        return view('admin.pages.edit', compact('page', 'users'));
    }

    /**
     * Update the specified Page in storage.
     *
     * @param  int              $id
     * @param UpdatePageRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatePageRequest $request)
    {
        $page = $this->pageRepository->findWithoutFail($id);

        if (empty($page)) {
            Flash::error('Page not found');

            return redirect(route('admin.pages.index'));
        }

        $page = $this->pageRepository->update($request->all(), $id);

        Flash::success('Page updated successfully.');

        return redirect(route('admin.pages.show', $page->id));
    }

    /**
     * Remove the specified Page from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $page = $this->pageRepository->findWithoutFail($id);

        if (empty($page)) {
            Flash::error('Page not found');

            return redirect(route('admin.pages.index'));
        }

        $this->pageRepository->delete($id);

        Flash::success('Page deleted successfully.');

        return redirect(route('admin.pages.index'));
    }
}
