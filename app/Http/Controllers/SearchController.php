<?php

namespace App\Http\Controllers;

use App\Models\UserModel;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function search(Request $request)
    {

        return view('search');
    }

    public function get_data(Request $request)
    {
        $searchQuery = $request->input('query');

        $data = UserModel::join('department', 'user.Fk_department', '=', 'department.id')
            ->join('designation', 'user.Fk_designation', '=', 'designation.id')
            ->select('user.*', 'department.name as department_name', 'designation.name as designation_name')
            ->where('user.name', 'like', "%{$searchQuery}%")
            ->orWhere('department.name', 'like', "%{$searchQuery}%")
            ->orWhere('designation.name', 'like', "%{$searchQuery}%")
            ->get();

        return response()->json($data);
    }
}
