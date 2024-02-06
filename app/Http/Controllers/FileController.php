<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FileController extends Controller
{
    public function showUploadForm()
    {
        return view('upload_form');
    }

    public function upload(Request $request)
    {
        $request->validate([
            'file' => 'required|file|mimes:jpg,png,pdf|max:2048', // Valida el tipo de archivo y su tamaño
        ]);

        $file = $request->file('file');
        $fileName = time() . '_' . $file->getClientOriginalName(); // Genera un nombre único para el archivo

        $file->storeAs('uploads', $fileName); // Almacena el archivo en el directorio 'uploads'

        return redirect()->back()->with('success', 'Archivo subido correctamente.');
    }
}
