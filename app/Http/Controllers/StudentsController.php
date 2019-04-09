<?php

namespace App\Http\Controllers;

use App\Students;
use Excel;
use Illuminate\Http\Request;

class StudentsController extends Controller
{
    public function index() {
    	return view('students.index', [
            'students' => Students::all(),
        ]);
    }
    
    public function import() {
    	return view('students.import');
    }
    
    public function import_post(Request $request) {
        $path = $request->file('excel')->getRealPath();
        $data = Excel::load($path, function($reader) {
            $reader->formatDates(false);
        })->get();

        if($data->count()){
            $students = [];
            foreach ($data as $key => $value) {
                if ($value->name == '')
                    continue;
                $students[] = [
                    'name' => $value->name, 
                    'address' => $value->address,
                    'phone' => (string)$value->phone,
                    'dob' => $value->dob,
                ];
            }

            Students::insert($students);

            redirect('/students');
        }
    }
}
