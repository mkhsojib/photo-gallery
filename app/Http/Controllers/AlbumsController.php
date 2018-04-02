<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AlbumsController extends Controller
{
    public function index()
    {
        return view('albums.index');

    }


    public function create()
    {

        return view('albums.create');

    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'cover_image' => 'image|max:1999',

        ]);

        // get filename with extension

        $filenameWithExt = $request->file('cover_image')->getClientOriginalName();


        // get just file name
        $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);

        // get extension
        $extension = $request->file('cover_image')->getClientOriginalExtension();


        // Create new filename

        $filenameToStore = $filename . '_' . time() . '.' . $extension;

        // upload image

        $path = $request->file('cover_image')->storeAs('public/album_covers', $filenameToStore);

        return $path;

    }


}
