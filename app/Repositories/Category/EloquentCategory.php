<?php

namespace App\Repositories\Category;

use App\Category;
use Illuminate\Http\Request;
use App\Repositories\BaseRepository;
use App\Repositories\EloquentRepository;

class EloquentCategory extends EloquentRepository implements BaseRepository, CategoryRepository
{
	protected $model;

	public function __construct(Category $category)
	{
		$this->model = $category;
	}

    public function all()
    {
        return $this->model->with('subGroup:id,name,category_group_id,deleted_at', 'subGroup.group:id,name,deleted_at', 'featuredImage')
                ->withCount('products','listings')->get();
    }

    public function trashOnly()
    {
        return $this->model->with('subGroup:id,name,category_group_id,deleted_at', 'subGroup.group:id,name,deleted_at')
                ->onlyTrashed()->get();
    }

    public function store(Request $request)
    {
        $category = parent::store($request);

        // $category->subGroups()->sync($request->input('cat_sub_grps'));

        if ($request->hasFile('image'))
            $category->saveImage($request->file('image'), true);

        return $category;
    }

    public function update(Request $request, $id)
    {
        $category = parent::update($request, $id);

        // $category->subGroups()->sync($request->input('cat_sub_grps'));

        if ($request->hasFile('image') || ($request->input('delete_image') == 1))
            $category->deleteFeaturedImage();

        if ($request->hasFile('image'))
            $category->saveImage($request->file('image'), true);

        return $category;
    }

	public function destroy($id)
	{
        $category = parent::findTrash($id);

        $category->flushImages();

        return $category->forceDelete();
	}

    public function massDestroy($ids)
    {
        $catSubGrps = $this->model->withTrashed()->whereIn('id', $ids)->get();

        foreach ($catSubGrps as $catSubGrp)
            $catSubGrp->flushImages();

        return parent::massDestroy($ids);
    }

    public function emptyTrash()
    {
        $catSubGrps = $this->model->onlyTrashed()->get();

        foreach ($catSubGrps as $catSubGrp)
            $catSubGrp->flushImages();

        return parent::emptyTrash();
    }

}