<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\News;
use Illuminate\Support\Facades\File;

class NewsController extends Controller
{
    public function show($id)
{
    $news = News::findOrFail($id);
    $newsList = News::all(); // Fetching all news articles
    return view('news.show', compact('news', 'newsList'));
}

    public function index3()
    {
        $newsList = News::all();
        return view('Acccueil.Nouvelles', compact('newsList'));
    }

    public function index()
    {
        $newsList = News::all();
        return view('news.index', compact('newsList'));
    }

    public function create()
    {
        return view('news.create');
    }

    public function app()
    {
        return view('app');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'paragraph' => 'required|string',
        ]);

        $input = $request->all();

        if ($image = $request->file('image')) {
            $destinationPath = 'imagess/';
            $NewsImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $NewsImage);
            $input['image'] = "$NewsImage";
        }

        News::create($input);

        return redirect()->route('news.index')->with('success', 'Nouvelle créée avec succès!');
    }

    public function edit($id)
    {
        $news = News::findOrFail($id);
        return view('news.edit', compact('news'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'paragraph' => 'required|string',
        ]);

        $news = News::findOrFail($id);

        $input = $request->all();

        if ($image = $request->file('image')) {
            // Delete the old image
            if (File::exists(public_path('imagess/' . $news->image))) {
                File::delete(public_path('imagess/' . $news->image));
            }

            $destinationPath = 'imagess/';
            $newsImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $newsImage);
            $input['image'] = $newsImage;
        } else {
            unset($input['image']);
        }

        $news->update($input);
        return redirect()->route('news.index')->with('success', 'Nouvelle mise à jour avec succès!');
    }

    public function destroy($id)
    {
        $news = News::findOrFail($id);

        // Delete the image
        if (File::exists(public_path('imagess/' . $news->image))) {
            File::delete(public_path('imagess/' . $news->image));
        }

        $news->delete();

        return redirect()->route('news.index')->with('success', 'Nouvelle supprimée avec succès!');
    }
}
