<?php

namespace App\Http\Controllers;

use App\Students;
use Excel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

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
            $errors = [];
            foreach ($data as $key => $value) {
                $std = [
                    'name' => $value->name, 
                    'address' => $value->address,
                    'phone' => $value->phone,
                    'dob' => $value->dob,
                ];

                $validation = Validator::make($std, [
                    'name' => 'required', 
                    'address' => 'required',
                    'phone' => 'min:9|max:15|numeric',
                    'dob' => 'max:10|regex:/\d{4}\/\d{1,2}\/\d{1,2}/',
                ]);

                if ($validation->fails())
                    $errors[$std['name']] = $validation->messages()->all();
                else
                    $students[] = $std;
            }

            Students::insert($students);

            // Send error message in view
            echo "<pre>";
            print_r($errors);
            
            // redirect to another page
            // redirect('/students');
        }
    }
}
