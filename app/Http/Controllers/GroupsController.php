<?php

namespace App\Http\Controllers;

use App\Models\GroupsModel;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Requests\StoreGroupRequest;

class GroupsController extends Controller
{
    public function addGroup(StoreGroupRequest $request)
    {

        $groupData = $request->input('groups');

        $group = new GroupsModel();
        $group->fill($groupData);

        $group->id = Str::uuid();

        $group->save();

        // Restituisce una risposta JSON con i dati del gruppo salvato
        return response()->json($group);
    }
}
