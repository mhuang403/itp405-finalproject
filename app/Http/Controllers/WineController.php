<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Wine;
use App\Country;
use App\Grape;
use App\Type;

use DB;

use Validator;

class WineController extends Controller
{
    public function index()
    {
        return view('wine.index');
    }

    public function search()
    {
        $wine = Wine::with('grape', 'country', 'type')
            ->leftJoin('grapes', 'wine_list.grape_id', '=', 'grapes.grape_id')
            ->leftJoin('countries', 'wine_list.country_id', '=', 'countries.country_id')
            ->leftJoin('wine_types', 'wine_list.wine_type_id', '=', 'wine_types.wine_type_id')
            ->orderBy('wine_id')
            ->get();
        return view('wine.results', [
            'wine' => $wine
        ]);
    }

    public function view($id)
    {

        $type = DB::table('wine_types')->get();

        $viewWine = Wine::where('wine_id', '=', $id)
            ->join('grapes', 'wine_list.grape_id', '=', 'grapes.grape_id')
            ->join('countries', 'wine_list.country_id', '=', 'countries.country_id')
            ->join('wine_types', 'wine_list.wine_type_id', '=', 'wine_types.wine_type_id')
            ->get();
        return view('wine.edit', [
            'wine' => $viewWine,
            'types' => $type
        ]);
    }


    public function update($id)
    {
        $validation = Validator::make(
            [
                'name' => request('name'),
                'year' => request('year'),
                'wine_type_id' => request('type'),
                'price' => request('price')
            ], [
            'name' => 'required',
            'year' => 'required|numeric',
            'wine_type_id' => 'required',
            'price' => 'numeric'
        ]);
        if ($validation->passes()) {
            DB::table('wine_list')
                ->where('wine_id', '=', $id)
                ->update(
                    [
                        'name' => request('name'),
                        'year' => request('year'),
                        'wine_type_id' => request('type'),
                        'price' => request('price')
                    ]);

            return redirect('/winelist/results')
                ->with('successStatus', 'Wine was updated successfully');

        } else {
            return redirect("/winelist/$id")
                ->withInput()
                ->withErrors($validation);
        }

    }

    public function add()
    {

        $type = DB::table('wine_types')->get();


        return view('wine.add', [
            'types' => $type
        ]);
    }

    public function create()
    {
        $validation = Validator::make(
            [
                'name' => request('name'),
                'year' => request('year'),
                'wine_type_id' => request('type'),
                'price' => request('price')
            ], [
            'name' => 'required',
            'year' => 'numeric',
            'wine_type_id' => 'required',
            'price' => 'numeric'
        ]);
        if ($validation->passes()) {
            DB::table('wine_list')
                ->insert([
                        'name' => request('name'),
                        'year' => request('year'),
                        'wine_type_id' => request('type'),
                        'price' => request('price')
                    ]);

            return redirect('/winelist/results')
                ->with('successStatus', 'Wine was added successfully');

        } else {
            return redirect('/winelist/add')
                ->withInput()
                ->withErrors($validation);
        }

    }

    public function destroy($id)
    {

        $wine = Wine::find($id);
        $wine->delete();

        return redirect('/winelist/results')
            ->with('successStatus', 'Wine was successfully deleted');
    }


}


