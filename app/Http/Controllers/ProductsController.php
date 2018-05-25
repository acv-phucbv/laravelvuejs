<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
	public function search() {
		$results = Product::orderBy('item_code')
		                  ->when(request('q'), function($query) {
			                  $query->where('item_code', 'like', '%'.request('q').'%')
			                        ->orwhere('description', 'like', '%'.request('q').'%');
		                  })
		                  ->get();

		return response()
			->json(['results' => $results]);
	}
}
