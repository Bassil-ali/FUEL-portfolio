<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\SuccessPartner\PartnerRequest;
use App\Http\Requests\Admin\SuccessPartner\StatusRequest;
use App\Http\Requests\Admin\SuccessPartner\DeleteRequest;
use Illuminate\Support\Facades\Storage;
use App\Models\SuccessPartner;

class SuccessPartnerController extends Controller
{
    public function index()
    {
        if(!permissionAdmin('read-partners')) {
            return abort(403);
        }

        return view('admin.success_partners.index');

    }//end of index
    public function data()
    {
        $permissions = [
            'status' => permissionAdmin('status-partners'),
            'update' => permissionAdmin('update-partners'),
            'delete' => permissionAdmin('delete-partners'),
        ];

        $partner = SuccessPartner::query();

        return dataTables()->of($partner)
            ->addColumn('record_select', 'admin.dataTables.record_select')
            ->addColumn('created_at', fn (SuccessPartner $partner) => $partner->created_at->format('Y-m-d'))
            ->editColumn('title', fn (SuccessPartner $partner) => $partner->title)
            ->editColumn('description', fn (SuccessPartner $partner) => str()->limit($partner->description, 10))
            ->addColumn('admin', fn (SuccessPartner $partner) => $partner->admin?->name)
            ->addColumn('actions', function(SuccessPartner $partner) use($permissions) {
                $routeEdit   = route('admin.success_partners.edit', $partner->id);
                $routeDelete = route('admin.success_partners.destroy', $partner->id);
                return view('admin.dataTables.actions', compact('permissions', 'routeEdit', 'routeDelete'));
            })
            ->addColumn('status', function(SuccessPartner $partner) use($permissions) {
                $models = $partner;
                $route  = route('admin.success_partners.status');
                return view('admin.dataTables.status', compact('models', 'permissions'));
            })
            ->editColumn('image', function(SuccessPartner $partner) {
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

        return view('admin.success_partners.create');
        
    }//end of create

    public function store(PartnerRequest $request)
    {
        $requestData = request()->except('image');

        if(request()->file('image')) {

            $requestData['image'] = request()->file('image')->store('partners', 'public');

        }

        SuccessPartner::create($requestData);

        session()->flash('success', __('site.added_successfully'));
        return redirect()->route('admin.success_partners.index');

    }//end of store

    public function edit(SuccessPartner $successPartner)
    {
        $partner = $successPartner;
        return view('admin.success_partners.edit', compact('partner'));

    }//end of edit

    public function update(PartnerRequest $request, SuccessPartner $partner)
    {
        $requestData = request()->except('image');
        if(request()->file('image')) {

            Storage::disk('public')->delete($partner->image);

            $requestData['image'] = request()->file('image')->store('partners', 'public');

        }
        $partner->update($requestData);

        session()->flash('success', __('site.updated_successfully'));
        return redirect()->route('admin.success_partners.index');
        
    }//end of update

    public function destroy(SuccessPartner $successPartner)
    {
        $partner = $successPartner;
        Storage::disk('public')->delete($partner->image);
        $partner->delete();

        session()->flash('success', __('site.deleted_successfully'));
        return response(__('site.deleted_successfully'));
        
    }//end of delete

    public function bulkDelete(DeleteRequest $request)
    {
        $ides   = request()->ids;
        $images = SuccessPartner::find($ides)->pluck('image')->toArray();
        Storage::disk('public')->delete($images);
        SuccessPartner::destroy($ides);

        session()->flash('success', __('site.deleted_successfully'));
        return response(__('site.deleted_successfully'));
        
    }//end of bulkDelete

    public function status(StatusRequest $request)
    {
        $partner = SuccessPartner::find($request->id);
        $partner->update(['status' => !$partner->status]);

        session()->flash('success', __('site.updated_successfully'));
        return response(__('site.updated_successfully'));
        
    }//end of status

}//end of controller