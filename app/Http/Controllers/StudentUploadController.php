<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use FastExcel;
use Illuminate\Support\Arr;
use Illuminate\Http\Request;

class StudentUploadController extends Controller
{
    public function index()
    {

        return view('welcome');
    }

    public function store(Request $request)
    {
        $request->validate([
            'file_input' => 'file|mimes:xlsx',
        ]);
        $rows = FastExcel::import($request->file_input);
        dd($rows[0], $rows, Arr::pluck($rows, 'Name'));

        return redirect(route('welcome'));
    }
}
