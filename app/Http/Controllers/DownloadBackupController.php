<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DownloadBackupController extends Controller
{
    public function __invoke(Request $request, $path)
    {
        $decodedPath = base64_decode($path);

        if(!Storage::exists($decodedPath) || !str_starts_with($decodedPath, 'private/backups/')){
            abort(404);
        }

        return Storage::download($decodedPath);
    }
}
