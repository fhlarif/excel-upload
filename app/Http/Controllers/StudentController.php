<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use App\Http\Services\ExcelService;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class StudentController extends Controller
{
    public function __construct(public ExcelService $excelService)
    {
    }

    public function index(): View
    {
        return view('welcome', [
            'students' => Student::paginate(8),
        ]);
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'file_input' => 'required|file|mimes:xlsx',
        ]);

        $this->excelService->upload($request);

        return redirect(route('student.index'));
    }
}
