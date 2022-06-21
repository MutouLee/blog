<?php

namespace App\Admin\Controllers;

use Dcat\Admin\Http\Controllers\AdminController;
use Illuminate\Http\Request;

class UploadForEditorController extends AdminController
{
    public function image(Request $request)
    {
        $img = $request->file('image')->store(now()->format('Ym'), 'public');
        return response()->json([
           'errno' => 0,
           'data' => [
               [
                   'url' => '/storage/'.$img
               ]
           ]
        ]);
    }
}
