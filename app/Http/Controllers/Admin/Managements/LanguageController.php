<?php

namespace App\Http\Controllers\Admin\Managements;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\Managements\Language\LanguageRequest;
use App\Http\Requests\Admin\Managements\Language\StatusRequest;
use App\Http\Requests\Admin\Managements\Language\DeleteRequest;
use Illuminate\Support\Facades\Storage;
use App\Models\Language;

class LanguageController extends Controller
{
	public function index()
    {
        if(!permissionAdmin('read-languages')) {
            return abort(403);
        }

        return view('admin.managements.languages.index');

    }//end of index

    public function data()
    {
        $permissions = [
            'status' => 'status-languages',
            'update' => 'update-languages',
            'delete' => 'delete-languages',
        ];

        $language = Language::query();

        return dataTables()->of($language)
            ->addColumn('record_select', 'admin.dataTables.record_select')
            ->addColumn('created_at', fn (Language $language) => $language?->created_at?->format('Y-m-d'))
            ->addColumn('admin', fn (Language $language) => $language->admin?->name)
            ->addColumn('actions', function(Language $language) use($permissions) {
                $routeEdit   = route('admin.managements.languages.edit', $language->id);
                $routeDelete = route('admin.managements.languages.destroy', $language->id);
                return view('admin.dataTables.actions', compact('permissions', 'routeEdit', 'routeDelete'));
            })
            ->addColumn('status', function(Language $language) use($permissions) {
                $models = $language;
                $route  = route('admin.managements.languages.status');
                return view('admin.dataTables.status', compact('models', 'permissions'));
            })
            ->addColumn('default', function(Language $language) use($permissions) {
                $models = $language;
                $route  = route('admin.managements.languages.status');
                return view('admin.dataTables.status', compact('models', 'permissions'));
            })
            ->editColumn('image', function(Language $language) {
                $models = $language;
                return view('admin.dataTables.image', compact('models'));
            })
            ->rawColumns(['record_select', 'actions', 'status', 'image'])
            ->addIndexColumn()
            ->toJson();

    }//end of data

    public function create()
    {
        if(!permissionAdmin('create-languages')) {
            return abort(403);
        }

        return view('admin.managements.languages.create');
        
    }//end of create

    public function store(LanguageRequest $request)
    {
        $requestData = request()->except('image');

        if(request()->file('image')) {

            $requestData['image'] = request()->file('image')->store('admins', 'public');

        }

        Language::create($requestData);

        session()->flash('success', __('site.added_successfully'));
        return redirect()->route('admin.managements.languages.index');

    }//end of store

    public function edit(Language $language)
    {
        if(!permissionAdmin('update-languages')) {
            return abort(403);
        }

        return view('admin.managements.languages.edit', compact('slider'));

    }//end of edit

    public function update(LanguageRequest $request, Language $language)
    {
        $requestData = request()->except('image');
        if(request()->file('image')) {

            Storage::disk('public')->delete($language->image);

            $requestData['image'] = request()->file('image')->store('admins', 'public');

        }
        $language->update($requestData);

        session()->flash('success', __('site.updated_successfully'));
        return redirect()->route('admin.managements.languages.index');
        
    }//end of update

    public function destroy(Language $language)
    {
        Storage::disk('public')->delete($language->image);
        $language->delete();

        session()->flash('success', __('site.deleted_successfully'));
        return response(__('site.deleted_successfully'));
        
    }//end of delete

    public function bulkDelete(DeleteRequest $request)
    {
        $images = Language::find(json_decode(request()->record_ids))->pluck('image')->toArray();
        Storage::disk('public')->delete($images);
        Language::destroy(json_decode(request()->record_ids));

        session()->flash('success', __('site.deleted_successfully'));
        return response(__('site.deleted_successfully'));
        
    }//end of bulkDelete

    public function status(StatusRequest $request)
    {
        $language = Language::find($request->id);
        $language->update(['status' => !$language->status]);

        session()->flash('success', __('site.updated_successfully'));
        return response(__('site.updated_successfully'));
        
    }//end of status

}//end of controller