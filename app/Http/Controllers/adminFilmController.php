<?php

namespace App\Http\Controllers;

use App\Category;
use App\Film;
use App\Poster;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Mockery\CountValidator\Exception;

class adminFilmController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cats = Category::all()->pluck('title', 'id');
        return view('admin.film.create', compact('cats', 'id'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($request->ajax()) {

            if ($request->has(['title', 'year', 'dual_audio', 'category_id', 'path'])) {
                $input = $request->all();

                Storage::move('public\images\cache\\' . $request->path, 'public\images\\' . $request->path);

                $pic = Poster::create(['path' => $request->path]);

                $input['poster_id'] = $pic->id;

                $film = Film::create($input);

                return response()->json(['responseText' => 'Successful ! ' . $film->title], 200);
            }
            return response()->json(['responseText' => ['Something went wrong', $request->id]], 400);
        }


        $film = new Film;
        $input = $request->all();

        if ($poster = $request->file('poster')) {
            $name = time() . '-' . urlencode($poster->getClientOriginalName());
            $poster->storeAs('public/images/', $name);

            $pic = Poster::create(['path' => $name]);

            $input['poster_id'] = $pic->id;
        }

        $film->create($input);

        return redirect(route('dashboard'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $film = Film::findorfail($id);

        return view('admin.film.show', compact('film'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $film = Film::findorFail($id);

        $categories = Category::all()->pluck('title', 'id');

        return view('admin.film.edit', compact('film', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $film = Film::findorfail($id);
        $input = $request->all();

        if ($poster = $request->file('poster')) {
            $name = time() . '-' . urlencode($poster->getClientOriginalName());
            $poster->storeAs('public/images/', $name);

            $pic = Poster::create(['path' => $name]);

            $input['poster_id'] = $pic->id;
        }

        $film->update($input);

        return redirect(route('film.show', $id));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $film = Film::findorfail($id);
        $cat = $film->category_id;
        $film->delete();
        return redirect(route('category.show', $cat));
    }

    public function add()
    {
        return view('admin.film.add');
    }

    public function multiadd(Request $request)
    {
        $categories = Category::all()->pluck('title', 'id');
        $films = [];

        if ($files = $request->file('posters')) {
            foreach ($files as $key => $file) {
                $nameonly = preg_replace('/\..+$/', '', $file->getClientOriginalName());
                $name = $nameonly;
                $path = time() . '-' . rawurlencode($file->getClientOriginalName());

                $pattern = '/[12][0-9]{3}/';

                $file->storeAs('public/images/cache', $path);

                $films[$key]['title'] = $name;
                $films[$key]['path'] = $path;

                if (preg_match($pattern, $name, $match)) {
                    $year = $match[0];
                    $name = str_replace($year, '', $name);

                    $films[$key]['title'] = $name;
                    $films[$key]['year'] = $year;
                }
            }
        }
        return view('admin.film.MultiAdd', compact('films', 'categories'));
    }

}
