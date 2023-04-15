<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\Slider\SliderRequest;
use App\Http\Requests\Admin\Slider\StatusRequest;
use App\Http\Requests\Admin\Slider\DeleteRequest;
use Illuminate\Support\Facades\Storage;
use App\Models\Slider;

class SliderController extends Controller
{
    public function index()
    {
        if(!permissionAdmin('read-sliders')) {
            return abort(403);
        }

        return view('admin.sliders.index');

    }//end of index

    public function data()
    {
        $permissions = [
            'status' => 'status-sliders',
            'update' => 'update-sliders',
            'delete' => 'delete-sliders',
        ];

        $slider = Slider::query();

        return dataTables()->of($slider)
            ->addColumn('record_select', 'admin.dataTables.record_select')
            ->addColumn('created_at', fn (Slider $slider) => $slider->created_at->format('Y-m-d'))
            ->editColumn('title', fn (Slider $slider) => $slider->title)
            ->editColumn('description', fn (Slider $slider) => str()->limit($slider->description, 10))
            ->addColumn('admin', fn (Slider $slider) => $slider->admin?->name)
            ->addColumn('actions', function(Slider $slider) use($permissions) {
                $routeEdit   = route('admin.sliders.edit', $slider->id);
                $routeDelete = route('admin.sliders.destroy', $slider->id);
                return view('admin.dataTables.actions', compact('permissions', 'routeEdit', 'routeDelete'));
            })
            ->addColumn('status', function(Slider $slider) use($permissions) {
                $models = $slider;
                $route  = route('admin.sliders.status');
                return view('admin.dataTables.status', compact('models', 'permissions'));
            })
            ->editColumn('image', function(Slider $slider) {
                $models = $slider;
                return view('admin.dataTables.image', compact('models'));
            })
            ->rawColumns(['record_select', 'actions', 'status', 'image', 'title', 'description'])
            ->addIndexColumn()
            ->toJson();

    }//end of data

    public function create()
    {
        if(!permissionAdmin('create-sliders')) {
            return abort(403);
        }

        return view('admin.sliders.create');
        
    }//end of create

    public function store(SliderRequest $request)
    {
        $requestData = request()->except('image');

        if(request()->file('image')) {

            $requestData['image'] = request()->file('image')->store('sliders', 'public');

        }

        Slider::create($requestData);

        session()->flash('success', __('site.added_successfully'));
        return redirect()->route('admin.sliders.index');

    }//end of store

    public function edit(Slider $slider)
    {
        if(!permissionAdmin('update-sliders')) {
            return abort(403);
        }

        return view('admin.sliders.edit', compact('slider'));

    }//end of edit

    public function update(SliderRequest $request, Slider $slider)
    {
        $requestData = request()->except('image');
        if(request()->file('image')) {

            Storage::disk('public')->delete($slider->image);

            $requestData['image'] = request()->file('image')->store('sliders', 'public');

        }
        $slider->update($requestData);

        session()->flash('success', __('site.updated_successfully'));
        return redirect()->route('admin.sliders.index');
        
    }//end of update

    public function destroy(Slider $slider)
    {
        Storage::disk('public')->delete($slider->image);
        $slider->delete();

        session()->flash('success', __('site.deleted_successfully'));
        return response(__('site.deleted_successfully'));
        
    }//end of delete

    public function bulkDelete(DeleteRequest $request)
    {
        $images = Slider::find(json_decode(request()->record_ids))->pluck('image')->toArray();
        Storage::disk('public')->delete($images);
        Slider::destroy(json_decode(request()->record_ids));

        session()->flash('success', __('site.deleted_successfully'));
        return response(__('site.deleted_successfully'));
        
    }//end of bulkDelete

    public function status(StatusRequest $request)
    {
        $slider = Slider::find($request->id);
        $slider->update(['status' => !$slider->status]);

        session()->flash('success', __('site.updated_successfully'));
        return response(__('site.updated_successfully'));
        
    }//end of status

}//end of controller