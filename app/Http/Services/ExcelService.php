<?php

declare(strict_types=1);

namespace App\Http\Services;

use Arr;
use FastExcel;
use App\Models\Student;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\StreamedResponse;

class ExcelService
{
    public function upload(Request $request): void
    {
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
            session()->flash('success', 'All students\'s data have been successfully uploaded!');
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

            session()->flash('warning', 'Students\'s data have been successfully uploaded but some has been skipped because it\'s already in records!');

        }
    }

    public function download(): StreamedResponse|string
    {
        $students = Student::select('name', 'class', 'level', 'parent_contact')->limit(3)->get();

        return FastExcel::data($students)->download('file.xlsx', function ($student) {
            return [
                'Name'           => $student->name,
                'Class'          => $student->class,
                'Level'          => $student->level,
                'Parent Contact' => $student->parent_contact,

            ];
        });

    }
}
