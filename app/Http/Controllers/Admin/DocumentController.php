<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Enums\noImagePath;
use App\Models\Document;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;


class DocumentController extends Controller
{
    public function index()
    {
        $documents = Document::all();
        return view("admin.documents.index", compact("documents"));
    }
    public function create()
    {
        return view("admin.documents.add");
    }
    public function edit(Document $document)
    {
        return view("admin.documents.update", compact("document"));
    }

    public function store(Request $request)
    {
        $document = new Document();
        $filePath = noImagePath::PATH;
        if ($request->hasFile('image')) {
            $filePath = Storage::disk('storage')->put('documents', $request->file('image'), 'public');
        }
        $document->name = $request->input('name');
        $document->status = $request->input('status');
        $document->image = $filePath;
        $document->save();
        Session::flash('alertSuccessMessage', 'Belge Kaydı Başarılı!');
        return redirect()->route('admin.documents.index');
    }

    public function update(Request $request, Document $document)
    {
        $filePath = $document->image;
        if ($request->hasFile('image')) {
            if ($document->image != noImagePath::PATH) {
                Storage::disk('storage')->delete($document->image);
            }
            $filePath = Storage::disk('storage')->put('documents', $request->file('image'), 'public');
        }
        $document->name = $request->input('name');
        $document->status = $request->input('status');
        $document->image = $filePath;
        $document->save();
        Session::flash('alertSuccessMessage', 'Belge Güncelleme Başarılı!');
        return redirect()->route('admin.documents.index');
    }

    public function destroy(document $document)
    {
        $document->delete();
        Session::flash('alertSuccessMessage', 'Belge Silme Başarılı!');
        return redirect()->route('admin.documents.index');
    }
}
