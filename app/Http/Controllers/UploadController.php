<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Customer;
use Validator;
use Illuminate\Support\Facades\Input;

class UploadController extends Controller
{
    //
	public function uploadCustomer()
	{
		$rules = array(
			'excelFile' => 'required',
			//'num_records' => 'required',
		);

		$validator = Validator::make(Input::all(), $rules);
		// process the form
		if ($validator->fails()) 
		{
			return redirect('admin/customer')->withErrors($validator);
		}
		else 
		{
			try {
				Excel::load(Input::file('excelFile'), function ($reader) {

					foreach ($reader->get() as $row) {
						//Customer::firstOrCreate($row);
						$customer = new Customer;
						$customer->name= $row->name;
						$customer->email=$row->email;
						$customer->address=$row->address;
						$customer->telephone=$row->telephone;						
						$customer->photo=$row->photo;
						$customer->save();												
					}
				});
				\Session::flash('success', 'Users uploaded successfully.');
				return redirect('admin/customer');
			} catch (\Exception $e) {
				\Session::flash('errors', $e->getMessage());
				return redirect('admin/customer')->withErrors($e->getMessage());
			}
		} 
		//in the case many sheets
		/*
			Excel::load(Input::file('file'), function ($reader) {

				 $reader->each(function($sheet) {    
					 foreach ($sheet->toArray() as $row) {
						User::firstOrCreate($row);
					 }
				 });
			});
			for($i = 0; $i < $count; $i++){
			$objModel = new ModelName();
			$objModel->name = $name[$i];
			$objModel->description = $description[$i];
			$objModel->save();
}
		*/
	} 
	public function importExcel()
	{
		if(Input::hasFile('excelFile')){
			$path = Input::file('excelFile')->getRealPath();
			$data = Excel::load($path, function($reader) {
			})->get();
			if(!empty($data) && $data->count()){
				foreach ($data as $key => $value) {
					$insert[] = ['name' => $value->name, 'email' => $value->email, 'address'=>$value->address, 'telephone'=>$value->telephone, 'photo'=>$value->photo];
				}
				if(!empty($insert)){
					DB::table('customers')->insert($insert);
					dd('Insert Record successfully.');
				}
			}
		}
		return back();
	}
	
	public function downloadExcel($type='CSV')
	{
		$data = Customer::get()->toArray();
		//return Excel::create('itsolutionstuff_example', function($excel) use ($data) {
		return Excel::create('customers', function($excel) use ($data) {
			$excel->sheet('customers', function($sheet) use ($data)
	        {
				$sheet->fromArray($data);
	        });
		})->download($type);
	}
}
