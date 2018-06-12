<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Customer;

class CustomersController extends Controller
{
	public function search() {
		$results = Customer::orderBy('firstname')
		                  ->when(request('q'), function($query) {
			                  $query->where('firstname', 'like', '%'.request('q').'%')
			                        ->orwhere('lastname', 'like', '%'.request('q').'%')
			                        ->orwhere('email', 'like', '%'.request('q').'%');
		                  })
		                  ->get();

		return response()
			->json(['results' => $results]);
	}
}
