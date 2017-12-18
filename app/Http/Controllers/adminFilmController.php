<?php

namespace App\Http\Controllers;

use App\Category;
use App\Film;
use App\Poster;
use Illuminate\Http\Request;

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
        $film = new Film;
        $input = $request->all();

        if ($poster = $request->file('poster')) {
            $name = time() . $poster->getClientOriginalName();
            $poster->move('images', $name);

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
            $name = time() . $poster->getClientOriginalName();
            $poster->move('images', $name);

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
        //
    }
}
