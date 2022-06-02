<?php

namespace App\Repositories;

use App\Models\Tree;

class TreeRepository
{

    public function all()
    {
        return Tree::all();
    }

    public function getById($treeItemId)
    {
        return Tree::where('id', $treeItemId)->get();
    }

    public function create($requestData)
    {
        return Tree::create($requestData);
    }
}