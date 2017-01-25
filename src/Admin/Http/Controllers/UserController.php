<?php

namespace Rizalmovic\Admin\Http\Controllers;

use Rizalmovic\Core\Contracts\UserInterface;

class UserController extends AdminController
{
    private $repo;

    public function __construct(UserInterface $repo)
    {
        $this->repo = $repo;
    }

    public function index()
    {
        $keyword = request()->get('keyword', null);

        if($keyword) {
            $users = $this->repo->model->where('username', 'like', $keyword.'%')->orWhere('name', 'like', $keyword.'%')->orWhere('email', 'like', $keyword.'%');
        } else {
            $users = $this->repo->model;
        }

        $users = $users->orderBy('id', 'desc')->paginate();

        return view('Admin::users.index', compact('users'));
    }

    public function create()
    {
        return view('Admin::users.create');
    }

    public function store()
    {
        $data = request()->except(['_token','_method']);
        $add = $this->repo->add($data);
        if($add['result']) {
            return redirect()->route('admin.users.index');
        } else {
            return redirect()->back()->withErrors($add['message'])->withInput();
        }

    }

    public function edit($id)
    {
        $user = $this->repo->with('roles')->find($id);
        return view('Admin::users.edit', ['user' => $user['result']]);
    }

    public function update($id)
    {
        $data = request()->except(['_method','_token']);
        $user = $this->repo->update($data, $id);
        return redirect()->route('admin.users.index');
    }

    public function destroy($id)
    {
        $this->repo->delete($id);
        return redirect()->back();
    }
}