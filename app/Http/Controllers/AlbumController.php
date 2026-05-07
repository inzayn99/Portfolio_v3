<?php

namespace App\Http\Controllers;

use App\Models\Album;
use App\Models\AlbumImages;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class AlbumController extends Controller
{
    public function index()
    {
        $albums = Album::latest()->paginate(10);
        return view('backend.album.index', compact('albums'));
    }

    public function create()
    {
        return view('backend.album.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'album_cover' => 'nullable|string|max:250',
            'album_title'    => 'required',
            'album_images' => 'required|string',
            'meta_title'  => 'nullable|string|max:250',
            'meta_keywords'  => 'nullable',
            'meta_description'  => 'nullable',
            'og_image' => 'nullable|string|max:250',
            'publish_status'=>'nullable',
            'banner_image'=>'nullable|max:250'
        ]);

        $images = explode(',',$request->album_images);
        $input = $request->all();
        $input['title_slug'] = str_slug($request->album_title);
        $input['publish_status'] = $request->publish_status??0;
        $new_album = Album::create($input);
            foreach($images as $image)
            {
                $img = AlbumImages::create([
                    'album_id' => $new_album->id,
                    'album_images' => $image,
                ]);
                $img->save();
            }
        return redirect()->route('album.index')->with('success', 'Album is created successfully.');
    }

    public function show(Album $album)
    {
        //
    }

    public function edit($id)
    {
        $album = Album::findorFail($id);
        $album_images = AlbumImages::where('album_id', $id)->get();

        return view('backend.album.create', compact('album', 'album_images'));

    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'album_cover' => 'nullable|string|max:250',
            'album_title'    => 'required',
            'album_images' => 'nullable',
            'meta_title'  => 'nullable|string|max:250',
            'meta_keywords'  => 'nullable',
            'meta_description'  => 'nullable',
            'og_image' => 'nullable|string|max:250',
            'banner_image'=>'nullable|max:250'

        ]);
        // return $request->all();
            $input = $request->all();
            $input['publish_status'] = $request->publish_status??0;
            $input['title_slug'] = str_slug($request->album_title);
            $album = Album::findorFail($id);
            $album->update($input);

            if(!is_null($request->album_images))
            {
                $album->image()->delete();
                $images = explode(',',$request->album_images);
                foreach($images as $image)
                {
                    $img = AlbumImages::create([
                        'album_id' => $album->id,
                        'album_images' => $image,
                    ]);
                    $img->save();
                }
            }
        return redirect()->route('album.index')->with('success', 'Album updated successfully.');

    }

    public function destroy($id)
{
    $album = Album::findOrFail($id);
    $album_images = AlbumImages::where('album_id', $album->id)->get();
    // Delete all album images
    foreach ($album_images as $images) {
        Storage::disk('uploads')->delete($images->album_images);
        $images->delete();
    }
    // Delete the album cover image
    Storage::disk('uploads')->delete($album->album_cover);
    // Delete the album record
    $album->delete();

    return response()->json(['success' => true, 'message' => 'Album deleted successfully.']);
}


public function deleteAlbumImage($id)
{
    $album_image = AlbumImages::findOrFail($id);
    $images = AlbumImages::where('album_id', $album_image->album_id)->get();
    Storage::disk('uploads')->delete($album_image->album_images);
    $album_image->delete();

    return response()->json(['success' => true, 'message' => 'Album image deleted successfully.']);
}

}
