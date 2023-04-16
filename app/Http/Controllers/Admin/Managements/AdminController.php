<?php

namespace App\Http\Controllers\Admin\Managements;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\Managements\Admin\AdminRequest;
use App\Http\Requests\Admin\Managements\Admin\StatusRequest;
use App\Http\Requests\Admin\Managements\Admin\DeleteRequest;
use Illuminate\Support\Facades\Storage;
use App\Models\Admin;

class AdminController extends Controller
{
	public function index()
    {
        if(!permissionAdmin('read-admins')) {
            return abort(403);
        }

        return view('admin.managements.admins.index');

    }//end of index

    public function data()
    {
        $permissions = [
            'status' => permissionAdmin('status-admins'),
            'update' => permissionAdmin('update-admins'),
            'delete' => permissionAdmin('delete-admins'),
        ];

        $admin = Admin::query();

        return dataTables()->of($admin)
            ->addColumn('record_select', 'admin.dataTables.record_select')
            ->addColumn('created_at', fn (Admin $admin) => $admin->created_at->format('Y-m-d'))
            ->addColumn('admin', fn (Admin $admin) => $admin->admin?->name)
            ->addColumn('actions', function(Admin $admin) use($permissions) {
                $routeEdit   = route('admin.managements.admins.edit', $admin->id);
                $routeDelete = route('admin.managements.admins.destroy', $admin->id);
                return view('admin.dataTables.actions', compact('permissions', 'routeEdit', 'routeDelete'));
            })
            ->addColumn('status', function(Admin $admin) use($permissions) {
                $models = $admin;
                $route  = route('admin.managements.admins.status');
                return view('admin.dataTables.status', compact('models', 'permissions'));
            })
            ->editColumn('image', function(Admin $admin) {
                $models = $admin;
                return view('admin.dataTables.image', compact('models'));
            })
            ->rawColumns(['record_select', 'actions', 'status', 'image'])
            ->addIndexColumn()
            ->toJson();

    }//end of data

    public function create()
    {
        if(!permissionAdmin('create-admins')) {
            return abort(403);
        }

        return view('admin.managements.admins.create');
        
    }//end of create

    public function store(AdminRequest $request)
    {
        $requestData = request()->except('image', 'password', 'password_confirmation');

        if(request()->file('image')) {

            $requestData['image'] = request()->file('image')->store('admins', 'public');

        }
        $requestData['password'] = bcrypt(request()->password);

        $admin = Admin::create($requestData);

        $admin->assignRole('super_admin');

        session()->flash('success', __('site.added_successfully'));
        return redirect()->route('admin.managements.admins.index');

    }//end of store

    public function edit(Admin $admin)
    {
        if(!permissionAdmin('update-admins')) {
            return abort(403);
        }

        return view('admin.managements.admins.edit', compact('admin'));

    }//end of edit

    public function update(AdminRequest $request, Admin $admin)
    {
        $requestData = request()->except('image', 'password', 'password_confirmation');
        if(request()->file('image')) {

            Storage::disk('public')->delete($admin->image);

            $requestData['image'] = request()->file('image')->store('admins', 'public');

        }
        if (request()->password) {
            $requestData['password'] = bcrypt(request()->password);
        }
        $admin->update($requestData);

        session()->flash('success', __('site.updated_successfully'));
        return redirect()->route('admin.managements.admins.index');
        
    }//end of update

    public function destroy(Admin $admin)
    {
        if(!permissionAdmin('delete-admins')) {
            return abort(403);
        }
        Storage::disk('public')->delete($admin->image);
        $admin->delete();

        session()->flash('success', __('site.deleted_successfully'));
        return response(__('site.deleted_successfully'));
        
    }//end of delete

    public function bulkDelete(DeleteRequest $request)
    {
        $images = Admin::find(json_decode(request()->record_ids))->pluck('image')->toArray();
        Storage::disk('public')->delete($images);
        Admin::destroy(json_decode(request()->record_ids));

        session()->flash('success', __('site.deleted_successfully'));
        return response(__('site.deleted_successfully'));
        
    }//end of bulkDelete

    public function status(StatusRequest $request)
    {
        $admin = Admin::find($request->id);
        $admin->update(['status' => !$admin->status]);

        session()->flash('success', __('site.updated_successfully'));
        return response(__('site.updated_successfully'));
        
    }//end of status

}//end of controller