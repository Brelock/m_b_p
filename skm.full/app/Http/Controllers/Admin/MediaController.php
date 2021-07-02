<?php


namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MediaController extends Controller
{
    public function store(Request $request)
    {
        $path = storage_path('tmp/uploads');

        if( !file_exists($path) ) {
            mkdir($path, 0777, true);
        }
        $file = $request->file('file');

        $name = uniqid() . '_' . trim($file->getClientOriginalName());

        $file->move($path, $name);

        return response()->json([
            'name'          => $name,
            'original_name' => $file->getClientOriginalName(),
        ]);
    }

    public function deleteTmp(Request $request)
    {
        $fileName = $request->fileName;

        try {
            unlink(storage_path('tmp/uploads/'.$fileName));
        } catch (\Exception $e) {
            return response()->json(['message' => 'Error deleted'], 500);
        }

        return response()->json(['message' => 'Successfuly deleted file'], 200);
    }

}
