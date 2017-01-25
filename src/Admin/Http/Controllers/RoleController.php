<?php

namespace Rizalmovic\Admin\Http\Controllers;

use Rizalmovic\Core\Contracts\RoleInterface;

class RoleController extends AdminController
{
    private $repo;

    public function __construct(RoleInterface $repo)
    {
        $this->repo = $repo;
    }

    public function index()
    {
        $keyword = request()->get('keyword', null);

        if($keyword) {
            $roles = $this->repo->model->with('users')->where('name', 'like', $keyword.'%')->orWhere('slug', 'like', $keyword.'%');
        } else {
            $roles = $this->repo->model->with('users');
        }

        $roles = $roles->orderBy('id', 'desc')->paginate();

        return view('Admin::roles.index', compact('roles'));
    }

    public function create()
    {
        return view('Admin::roles.create');
    }

    public function store()
    {
        $data = request()->except(['_token','_method']);
        $add = $this->repo->add($data);
        if($add['result']) {
            return redirect()->route('admin.roles.index');
        } else {
            return redirect()->back()->withErrors($add['message'])->withInput();
        }

    }

    public function edit($id)
    {
        $role = $this->repo->with('users')->find($id);
        return view('Admin::roles.edit', ['role' => $role['result']]);
    }

    public function update($id)
    {
        $data = request()->except(['_method','_token']);
        $role = $this->repo->update($data, $id);
        return redirect()->route('admin.roles.index');
    }

    public function destroy($id)
    {
        $this->repo->delete($id);
        return redirect()->back();
    }
}