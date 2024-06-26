<?php

namespace App\Http\Controllers;

use App\Models\CompanyModel;
use Illuminate\Http\Request;
use App\Http\Requests\StoreCompanyRequest;

class CompaniesController extends Controller
{
    public function addCompany(StoreCompanyRequest $request)
    {
        $groupData = $request->input('companies');

        $group = new CompanyModel();
        $group->fill($groupData);

        //$group->id = Str::uuid();

        $group->save();

        // Restituisce una risposta JSON con i dati del gruppo salvato
        return response()->json($group);
    }
}
