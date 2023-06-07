<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use FastExcel;
use Illuminate\Support\Arr;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class StudentController extends Controller
{
    public function index(): View
    {
        return view('welcome');
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'file_input' => 'file|mimes:xlsx',
        ]);
        $rows = FastExcel::import($request->file_input);
        // dd($rows[0], $rows, Arr::pluck($rows, 'Name'));

        return redirect(route('welcome'));
    }
}
