<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\CreateSectionRequest;
use App\Http\Requests\UpdateSectionRequest;
use App\Models\Section;
use App\Repositories\SectionRepository;
use App\Http\Controllers\AppBaseController as InfyOmBaseController;
use App\Repositories\PageRepository;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class SectionController extends InfyOmBaseController
{
    /** @var  SectionRepository */
    private $sectionRepository;

    public function __construct(SectionRepository $sectionRepo)
    {
        $this->sectionRepository = $sectionRepo;
    }

    /**
     * Display a listing of the Section.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $this->sectionRepository->pushCriteria(new RequestCriteria($request));
        $sections = $this->sectionRepository->all();

        return view('admin.sections.index', compact('sections'));
    }

    /**
     * Show the form for creating a new Section.
     *
     * @return Response
     */
    public function create($pageId, PageRepository $pageRepository)
    {
        $section = new Section();
        $section->pageId = $pageId;
        $pages = $pageRepository->findWhere(['state' => true])->pluck('title', 'id');
        $typesSection = $section->getAllTypesSection();

        return view('admin.sections.create', compact('section', 'pages', 'typesSection'));
    }

    /**
     * Store a newly created Section in storage.
     *
     * @param CreateSectionRequest $request
     *
     * @return Response
     */
    public function store(CreateSectionRequest $request)
    {
        $input = $request->all();

        $section = $this->sectionRepository->create($input);

        Flash::success('Section saved successfully.');

        return redirect(route('admin.pages.show', $section->pageId));
    }

    /**
     * Display the specified Section.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($pageId, $id)
    {
        $section = $this->sectionRepository->findWithoutFail($id);

        if (empty($section)) {
            Flash::error('Section not found');

            return redirect(route('admin.sections.index'));
        }

        return view('admin.sections.show', compact('section'));
    }

    /**
     * Show the form for editing the specified Section.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($pageId, $id, PageRepository $pageRepository)
    {
        $section = $this->sectionRepository->findWithoutFail($id);

        if (empty($section)) {
            Flash::error('Section not found');

            return redirect(route('admin.sections.index'));
        }

        $pages = $pageRepository->findWhere(['state' => true])->pluck('title', 'id');
        $typesSection = $section->getAllTypesSection();

        return view('admin.sections.edit', compact('section', 'pages', 'typesSection'));
    }

    /**
     * Update the specified Section in storage.
     *
     * @param  int                 $id
     * @param UpdateSectionRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateSectionRequest $request)
    {
        $section = $this->sectionRepository->findWithoutFail($id);

        if (empty($section)) {
            Flash::error('Section not found');

            return redirect(route('admin.sections.index'));
        }

        $section = $this->sectionRepository->update($request->all(), $id);

        Flash::success('Section updated successfully.');

        return redirect(route('admin.pages.show', $section->pageId));
    }

    /**
     * Remove the specified Section from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $section = $this->sectionRepository->findWithoutFail($id);

        $pageId = $section->pageId;

        if (empty($section)) {
            Flash::error('Section not found');

            return redirect(route('admin.sections.index'));
        }

        $this->sectionRepository->delete($id);

        Flash::success('Section deleted successfully.');

        return redirect(route('admin.pages.show', $pageId));
    }
}
