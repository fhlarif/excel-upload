<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use Arr;
use Str;
use FastExcel;
use App\Models\Student;
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
        $lines = FastExcel::import($request->file_input);
        $excelNames = Arr::pluck($lines, 'Name');
        $students = Student::select('name')->distinct('name')->whereIn('name', $excelNames)->get();

        if ($students->isEmpty()) {
            $lines->map(function ($line) {
                Student::create([
                    'name'           => $line['Name'],
                    'class'          => $line['Class'],
                    'level'          => $line['Level'],
                    'parent_contact' => $line['Parent Contact'],
                ]);
            });
        } else {

            $studentsName = Arr::pluck($students, 'name');

            $filtered = $lines->where(function ($line) use ($studentsName) {

                return !Str::contains($line['Name'], $studentsName);
            });

            $filtered->map(function ($line) {
                Student::create([
                    'name'           => $line['Name'],
                    'class'          => $line['Class'],
                    'level'          => $line['Level'],
                    'parent_contact' => $line['Parent Contact'],
                ]);
            });

        }

        return redirect(route('student.index'));
    }
}
