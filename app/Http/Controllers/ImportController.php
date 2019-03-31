<?php

namespace App\Http\Controllers;

use App\Contact;
use App\CsvData;
use App\Http\Requests\CsvImportRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ImportController extends Controller
{
    public function index()
    {
        return view('welcome');
    }
    public function getImport()
    {
        return view('import');
    }

    public function parseImport(CsvImportRequest $request)
    {
        $path = $request->file('csv_file')->getRealPath();

        $data = array_map('str_getcsv', file($path));

        $csv_header_fields = [];
        if (count($data) > 0) {
            if ($request->has('header')) {
                $csv_header_fields = [];
                foreach ($data[0] as $key => $value) {
                    $csv_header_fields[] = $key;
                }
            }
            $csv_data = array_slice($data, 0, 5);
            $csv_data_file = CsvData::create([
                'csv_filename' => $request->file('csv_file')->getClientOriginalName(),
                'csv_header' => $request->has('header'),
                'csv_data' => json_encode($data)
            ]);
        } else {
            return redirect()->back();
        }

        return view('import_fields', compact( 'csv_header_fields', 'csv_data', 'csv_data_file'));

    }

    public function processImport(Request $request)
    {
        $data = CsvData::find($request->csv_data_file_id);
        $csv_data = json_decode($data->csv_data, true);
        foreach ($csv_data as $row) {
            $contact = new Contact();
            foreach (config('app.db_fields') as $index => $field) {
                if ($data->csv_header) {
                    $contact->$field = $row[$request->fields[$field]];
                } else {
                    $contact->$field = $row[$request->fields[$index]];
                }
            }
            $contact->save();
        }

        return view('import_success');
    }

    public function show()
    {
        $employees = DB::select('select EmployeeId,first_name,last_name,title,ManagerId from contacts');
//        print_r($employees) ;

        return view('display', compact('employees'));
    }

    public function showIndividual(Request $request, $id)
    {
//        dd($id);
        $idint = (int)$id;
//        dd($idint);
        $employee = DB::select("select EmployeeId,first_name,last_name,title,ManagerId from contacts where EmployeeId = '$idint'");

//        dd($employee);
        return view('single', compact('employee'));
    }

    public function destroy($id)
    {
        DB::delete("DELETE * FROM contacts WHERE id = ?",[$id]);
        return view('destroy');
    }
}
