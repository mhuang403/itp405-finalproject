<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Wine;
use App\Country;
use App\Grape;
use App\Type;

use DB;

use Validator;

use Auth;

class WineController extends Controller
{

    public function index()
    {
        $grape = DB::table('grapes')
            ->get();
        $wine_type = DB::table('wine_types')
            ->get();
        $country = DB::table('countries')
            ->get();
        return view('wine.index', [
            'user' => Auth::user(),
            'grape' => $grape,
            'wine_type' => $wine_type,
            'country' => $country,
        ]);
    }
    public function search()
    {
//        $validation = Validator::make($request->all()
//        if        if($validation->passes())
        $name = request('name');
        $year = request('year');
        $price = request('price');
        $grape = request('grape_id');
        $country = request('country_id');
        $wine_type = request('wine_type_id');
      $wine = DB::table('wine_list')
                ->orderBy('wine_id')
                ->get();

        $results = DB::table('wine_list')
            ->leftjoin('grapes', 'wine_list.grape_id', '=', 'grapes.grape_id')
            ->leftjoin('countries', 'wine_list.country_id', '=', 'countries.country_id')
            ->leftjoin('wine_types', 'wine_list.wine_type_id' , '=', 'wine_types.wine_type_id')
            ->where('wine_list.name', 'LIKE' , "%$name%")
            ->where('wine_list.year', 'LIKE' , $year)
            ->where('wine_list.price', 'LIKE' , $price);
//            ->get();


        $grapes = $results->where('grapes.grape_id', '=', $grape);

        $countries = $grapes->where('countries.country_id', '=', $country);

        $types = $countries->where('wine_types.wine_type_id', '=', $wine_type);

        if ($name OR $year OR $price == NULL)
        {
            $wine = DB::table('wine_list')
                ->leftjoin('grapes', 'wine_list.grape_id', '=', 'grapes.grape_id')
                ->leftjoin('countries', 'wine_list.country_id', '=', 'countries.country_id')
                ->leftjoin('wine_types', 'wine_list.wine_type_id' , '=', 'wine_types.wine_type_id')
//                ->where('grapes.grape_id', '=', $grape)
//                ->orwhere('countries.country_id', '=', $country)
//                ->orwhere('wine_types.wine_type_id', '=', $wine_type)
                ->get();
        }

        if ($grape != 'all') {
//                $wine = DB::table('wine_list')
//                ->leftjoin('grapes', 'wine_list.grape_id', '=', 'grapes.grape_id')
//                ->leftjoin('countries', 'wine_list.country_id', '=', 'countries.country_id')
//                ->leftjoin('wine_types', 'wine_list.wine_type_id' , '=', 'wine_types.wine_type_id')
//                ->where('wine_list.name', 'LIKE' , "%$name%")
//                ->where('wine_list.year', 'LIKE' , $year)
//                ->where('wine_list.price', 'LIKE' , $price)
//                ->where('grapes.grape_id', '=', $grape)
//                ->get();

        $grapes->get();
        }
        elseif ($country != 'all') {
//            $wine = DB::table('wine_list')
//                ->leftjoin('grapes', 'wine_list.grape_id', '=', 'grapes.grape_id')
//                ->leftjoin('countries', 'wine_list.country_id', '=', 'countries.country_id')
//                ->leftjoin('wine_types', 'wine_list.wine_type_id' , '=', 'wine_types.wine_type_id')
//                ->where('wine_list.name', 'LIKE' , "%$name%")
//                ->where('wine_list.year', 'LIKE' , $year)
//                ->where('wine_list.price', 'LIKE' , $price)
//                ->where('countries.country_id', '=', $country)
//                ->get();
            $countries->get();

        }
        elseif ($wine_type != 'all') {
//            $wine = DB::table('wine_list')
//                ->leftjoin('grapes', 'wine_list.grape_id', '=', 'grapes.grape_id')
//                ->leftjoin('countries', 'wine_list.country_id', '=', 'countries.country_id')
//                ->leftjoin('wine_types', 'wine_list.wine_type_id' , '=', 'wine_types.wine_type_id')
//                ->where('wine_list.name', 'LIKE' , "%$name%")
//                ->where('wine_list.year', 'LIKE' , $year)
//                ->where('wine_list.price', 'LIKE' , $price)
//                ->where('wine_types.wine_type_id', '=', $wine_type)
//                ->get();
            $types->get();

        }
//        elseif ($wine_type != 'all' && $grape != 'all') {
//            $wine = DB::table('wine_list')
//                ->leftjoin('grapes', 'wine_list.grape_id', '=', 'grapes.grape_id')
//                ->leftjoin('countries', 'wine_list.country_id', '=', 'countries.country_id')
//                ->leftjoin('wine_types', 'wine_list.wine_type_id' , '=', 'wine_types.wine_type_id')
//                ->where('wine_list.name', 'LIKE' , "%$name%")
//                ->where('wine_list.year', 'LIKE' , $year)
//                ->where('wine_list.price', 'LIKE' , $price)
//                ->where('wine_types.wine_type_id', '=', $wine_type)
//                ->where('grapes.grape_id', '=', $grape)
//                ->get();
//        }
//        elseif ($wine_type != 'all' && $country != 'all') {
//            $wine = DB::table('wine_list')
//                ->leftjoin('grapes', 'wine_list.grape_id', '=', 'grapes.grape_id')
//                ->leftjoin('countries', 'wine_list.country_id', '=', 'countries.country_id')
//                ->leftjoin('wine_types', 'wine_list.wine_type_id' , '=', 'wine_types.wine_type_id')
//                ->where('wine_list.name', 'LIKE' , "%$name%")
//                ->where('wine_list.year', 'LIKE' , $year)
//                ->where('wine_list.price', 'LIKE' , $price)
//                ->where('wine_types.wine_type_id', '=', $wine_type)
//                ->where('countries.country_id', '=', $country)
//                ->get();
//        }
//        elseif ($grape != 'all' && $country != 'all') {
//            $wine = DB::table('wine_list')
//                ->leftjoin('grapes', 'wine_list.grape_id', '=', 'grapes.grape_id')
//                ->leftjoin('countries', 'wine_list.country_id', '=', 'countries.country_id')
//                ->leftjoin('wine_types', 'wine_list.wine_type_id' , '=', 'wine_types.wine_type_id')
//                ->where('wine_list.name', 'LIKE' , "%$name%")
//                ->where('wine_list.year', 'LIKE' , $year)
//                ->where('wine_list.price', 'LIKE' , $price)
//                ->where('grapes.grape_id', '=', $grape)
//                ->where('countries.country_id', '=', $country)
//                ->get();
//        }
//        elseif ($wine_type != 'all' && $country != 'all' && $grape != 'all') {
//            $wine = DB::table('wine_list')
//                ->leftjoin('grapes', 'wine_list.grape_id', '=', 'grapes.grape_id')
//                ->leftjoin('countries', 'wine_list.country_id', '=', 'countries.country_id')
//                ->leftjoin('wine_types', 'wine_list.wine_type_id' , '=', 'wine_types.wine_type_id')
//                ->where('wine_list.name', 'LIKE' , "%$name%")
//                ->where('wine_list.year', 'LIKE' , $year)
//                ->where('wine_list.price', 'LIKE' , $price)
//                ->where('wine_types.wine_type_id', '=', $wine_type)
//                ->where('grapes.grape_id', '=', $grape)
//                ->where('countries.country_id', '=', $country)
//                ->get();
//        }
        else{
//            $wine = DB::table('wine_list')
//                ->leftjoin('grapes', 'wine_list.grape_id', '=', 'grapes.grape_id')
//                ->leftjoin('countries', 'wine_list.country_id', '=', 'countries.country_id')
//                ->leftjoin('wine_types', 'wine_list.wine_type_id' , '=', 'wine_types.wine_type_id')
////                ->where('wine_list.name', 'LIKE' , "%$name%")
////                ->where('wine_list.year', 'LIKE' , $year)
////                ->where('wine_list.price', 'LIKE' , $price)
//                ->get();

            $results->get();
        }
        //  elseif($price != '')
//                $wine = DB::table('wine_list')
//                    ->where('year', '=', $year)
//                    ->where('name', 'LIKE' , "%$name%")
//             //       ->where('price', '=' , $price)
////                    ->where('grape_id', '=', $grape)
//                    ->get();
//            }
//            else{
//                $wine = DB::table('wine_list')
//                    ->get();
//
//            }
//        $wine = DB::table('wine_list')
//            ->orderBy('wine_id')
//            ->get();
        return view('wine.results', [
            'wine' => $wine,
            'grape' => $grape,
            'wine_type' => $wine_type,
            'country' => $country

        ]);

    }


//    public function index()
//    {
//        return view('wine.index');
//    }
//
//    public function search()
//    {
//        $wine = Wine::with('grape', 'country', 'type')
//            ->leftJoin('grapes', 'wine_list.grape_id', '=', 'grapes.grape_id')
//            ->leftJoin('countries', 'wine_list.country_id', '=', 'countries.country_id')
//            ->leftJoin('wine_types', 'wine_list.wine_type_id', '=', 'wine_types.wine_type_id')
//            ->orderBy('wine_id')
//            ->get();
//        return view('wine.results', [
//            'wine' => $wine
//        ]);
//    }

    public function view($id)
    {

        $type = DB::table('wine_types')->get();
        $c = DB::table('countries')->get();
        $grape = DB::table('grapes')->get();

        $viewWine = Wine::where('wine_id', '=', $id)
            ->leftjoin('grapes', 'wine_list.grape_id', '=', 'grapes.grape_id')
            ->leftjoin('countries', 'wine_list.country_id', '=', 'countries.country_id')
            ->leftjoin('wine_types', 'wine_list.wine_type_id', '=', 'wine_types.wine_type_id')
            ->get();
        return view('wine.edit', [
            'wine' => $viewWine,
            'types' => $type,
            'country' => $c,
            'grapes' => $grape
        ]);
    }


    public function update($id)
    {
        $validation = Validator::make(
            [
                'name' => request('name'),
                'year' => request('year'),
                'wine_type_id' => request('type'),
                'price' => request('price'),
                'country_id' => request('country'),
                'grape_id' => request('grape')
            ], [
            'name' => 'required',
            'year' => 'nullable|numeric',
            'wine_type_id' => 'required',
            'price' => 'nullable|numeric'
        ]);
        if ($validation->passes()) {
            DB::table('wine_list')
                ->where('wine_id', '=', $id)
                ->update(
                    [
                        'name' => request('name'),
                        'year' => request('year'),
                        'wine_type_id' => request('type'),
                        'price' => request('price'),
                        'country_id' => request('country'),
                        'grape_id' => request('grape')
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
        $c = DB::table('countries')->get();
        $grape = DB::table('grapes')->get();


        return view('wine.add', [
            'types' => $type,
            'country' => $c,
            'grapes' => $grape
        ]);
    }

    public function create()
    {
        $validation = Validator::make(
            [
                'name' => request('name'),
                'year' => request('year'),
                'wine_type_id' => request('type'),
                'price' => request('price'),
                'country_id' => request('country'),
                'grape_id' => request('grape')
            ], [
            'name' => 'required',
            'year' => 'nullable|numeric',
            'wine_type_id' => 'required',
            'price' => 'nullable|numeric'
        ]);
        if ($validation->passes()) {
            DB::table('wine_list')
                ->insert([
                        'name' => request('name'),
                        'year' => request('year'),
                        'wine_type_id' => request('type'),
                        'price' => request('price'),
                        'country_id' => request('country'),
                        'grape_id' => request('grape')
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

    public function favorites()
    {
        $type = DB::table('wine_types')->get();
        $c = DB::table('countries')->get();
        $grape = DB::table('grapes')->get();

        $viewWine = DB::table('wine_list')
            ->leftjoin('grapes', 'wine_list.grape_id', '=', 'grapes.grape_id')
            ->leftjoin('countries', 'wine_list.country_id', '=', 'countries.country_id')
            ->leftjoin('wine_types', 'wine_list.wine_type_id', '=', 'wine_types.wine_type_id')
            ->where('favorite', '=', '1')
            ->get();
        return view('wine.favorites', [
            'wine' => $viewWine,
            'types' => $type,
            'country' => $c,
            'grapes' => $grape
        ]);

    }

    public function addtolist($id)
    {
       $favorite =  Wine::find($id);
           $favorite->favorite = 1;
            $favorite->save();

        return redirect('/winelist/results')
            ->with('successStatus', 'Wine was successfully added to favorites');

    }

    public function removefromlist($id)
    {
        $removefave = Wine::find($id);
        $removefave->favorite = 0;
        $removefave->save();

        return redirect('/winelist/favorites')
            ->with('successStatus', 'Wine was successfully removed from favorites');

    }


}


