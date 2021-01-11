<?php

namespace App\Repositories\CategoryGroup;

use App\CategoryGroup;
use Illuminate\Http\Request;
use App\Repositories\BaseRepository;
use App\Repositories\EloquentRepository;

class EloquentCategoryGroup extends EloquentRepository implements BaseRepository, CategoryGroupRepository
{
	protected $model;

	public function __construct(CategoryGroup $categoryGroup)
	{
		$this->model = $categoryGroup;
	}

    public function all()
    {
        return $this->model->withCount('subGroups')->with('image')->orderBy('order', 'asc')->get();
    }

    public function trashOnly()
    {
        return $this->model->onlyTrashed()->withCount('subGroups')->get();
    }

    public function store(Request $request)
    {
        $catGrp = parent::store($request);

        if ($request->hasFile('image'))
            $catGrp->saveImage($request->file('image'), true);

        if ($request->hasFile('bg_image'))
            $catGrp->saveImage($request->file('bg_image'));

        return $catGrp;
    }

    public function update(Request $request, $id)
    {
        $catGrp = parent::update($request, $id);

        if ($request->hasFile('image') || ($request->input('delete_image') == 1)){
            if($catGrp->featuredImage)
                $catGrp->deleteImage($catGrp->featuredImage);
        }

        if ($request->hasFile('image'))
            $catGrp->saveImage($request->file('image'), true);

        if ($request->hasFile('bg_image') || ($request->input('delete_bg_image') == 1)){
            if($catGrp->images->first())
                $catGrp->deleteImage($catGrp->images->first());
        }

        if ($request->hasFile('bg_image'))
            $catGrp->saveImage($request->file('bg_image'));

        return $catGrp;
    }

    public function destroy($id)
    {
        $catGrp = parent::findTrash($id);

        $catGrp->flushImages();

        return $catGrp->forceDelete();
    }

    public function massDestroy($ids)
    {
        $catGrps = $this->model->withTrashed()->whereIn('id', $ids)->get();

        foreach ($catGrps as $catGrp)
            $catGrp->flushImages();

        return parent::massDestroy($ids);
    }

    public function emptyTrash()
    {
        $catGrps = $this->model->onlyTrashed()->get();

        foreach ($catGrps as $catGrp)
            $catGrp->flushImages();

        return parent::emptyTrash();
    }

}