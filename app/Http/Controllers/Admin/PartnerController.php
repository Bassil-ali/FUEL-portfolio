<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\Partner\PartnerRequest;
use App\Http\Requests\Admin\Partner\StatusRequest;
use App\Http\Requests\Admin\Partner\DeleteRequest;
use Illuminate\Support\Facades\Storage;
use App\Models\Partner;

class PartnerController extends Controller
{
    public function index()
    {
        if(!permissionAdmin('read-partners')) {
            return abort(403);
        }

        return view('admin.partners.index');

    }//end of index

    public function data()
    {
        $permissions = [
            'status' => permissionAdmin('status-partners'),
            'update' => permissionAdmin('update-partners'),
            'delete' => permissionAdmin('delete-partners'),
        ];

        $partner = Partner::query();

        return dataTables()->of($partner)
            ->addColumn('record_select', 'admin.dataTables.record_select')
            ->addColumn('created_at', fn (Partner $partner) => $partner->created_at->format('Y-m-d'))
            ->editColumn('title', fn (Partner $partner) => $partner->title)
            ->editColumn('description', fn (Partner $partner) => str()->limit($partner->description, 10))
            ->addColumn('admin', fn (Partner $partner) => $partner->admin?->name)
            ->addColumn('actions', function(Partner $partner) use($permissions) {
                $routeEdit   = route('admin.partners.edit', $partner->id);
                $routeDelete = route('admin.partners.destroy', $partner->id);
                return view('admin.dataTables.actions', compact('permissions', 'routeEdit', 'routeDelete'));
            })
            ->addColumn('status', function(Partner $partner) use($permissions) {
                $models = $partner;
                $route  = route('admin.partners.status');
                return view('admin.dataTables.status', compact('models', 'permissions'));
            })
            ->editColumn('image', function(Partner $partner) {
                $models = $partner;
                return view('admin.dataTables.image', compact('models'));
            })
            ->rawColumns(['record_select', 'actions', 'status', 'image', 'title', 'description'])
            ->addIndexColumn()
            ->toJson();

    }//end of data

    public function create()
    {
        if(!permissionAdmin('create-partners')) {
            return abort(403);
        }

        return view('admin.partners.create');
        
    }//end of create

    public function store(PartnerRequest $request)
    {
        $requestData = request()->except('image');

        if(request()->file('image')) {

            $requestData['image'] = request()->file('image')->store('partners', 'public');

        }

        Partner::create($requestData);

        session()->flash('success', __('site.added_successfully'));
        return redirect()->route('admin.partners.index');

    }//end of store

    public function edit(Partner $partner)
    {
        if(!permissionAdmin('update-partners')) {
            return abort(403);
        }

        return view('admin.partners.edit', compact('slider'));

    }//end of edit

    public function update(PartnerRequest $request, Partner $partner)
    {
        $requestData = request()->except('image');
        if(request()->file('image')) {

            Storage::disk('public')->delete($partner->image);

            $requestData['image'] = request()->file('image')->store('partners', 'public');

        }
        $partner->update($requestData);

        session()->flash('success', __('site.updated_successfully'));
        return redirect()->route('admin.partners.index');
        
    }//end of update

    public function destroy(Partner $partner)
    {
        Storage::disk('public')->delete($partner->image);
        $partner->delete();

        session()->flash('success', __('site.deleted_successfully'));
        return response(__('site.deleted_successfully'));
        
    }//end of delete

    public function bulkDelete(DeleteRequest $request)
    {
        $images = Partner::find(json_decode(request()->record_ids))->pluck('image')->toArray();
        Storage::disk('public')->delete($images);
        Partner::destroy(json_decode(request()->record_ids));

        session()->flash('success', __('site.deleted_successfully'));
        return response(__('site.deleted_successfully'));
        
    }//end of bulkDelete

    public function status(StatusRequest $request)
    {
        $partner = Partner::find($request->id);
        $partner->update(['status' => !$partner->status]);

        session()->flash('success', __('site.updated_successfully'));
        return response(__('site.updated_successfully'));
        
    }//end of status

}//end of controller