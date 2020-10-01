<?php

namespace App\Repositories;

use App\Models\User;
use Illuminate\Support\Arr;

class UserRepository extends ResourceRepository
{
    protected $model = User::class;

    public function store($request)
    {
        $model = new $this->model;
        $id = $request[$model->getKeyName()];

        if ($id) {
            $item = $model::find($id);

            if ($item) {
                $this->updateRoles($item, $request->roles);
                return true;
            } else {
                //TODO Populate error bag
                return false;
            }
        } else {
            $this->model::create($request->all());
            return true;
        }
    }

    public function updateRoles(User $user, array $roles)
    {
        $user->syncRoles(Arr::pluck($roles, 'name'));
    }

    public function list(array $params = [])
    {
        return parent::list($params)->except(auth()->user()->id);
    }
}