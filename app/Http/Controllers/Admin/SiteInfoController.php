<?php

namespace App\Http\Controllers\Admin;

use DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Meta;

class SiteInfoController extends Controller
{
	public function index()
	{
		return view('admin.site_info.index');
	}

	public function update(Request $request)
	{
		DB::beginTransaction();

		try {
			foreach ($request->image as $key => $value) {
				$image = Meta::firstOrCreate([
					'meta_name' => $key
				]);

				$image->meta_content = $value;
				$image->save();
			}

			$visi = Meta::firstOrCreate([
				'meta_name' => 'visi'
			]);

			$visi->meta_content = $request->visi;
			$visi->save();

			$misi = Meta::firstOrCreate([
				'meta_name' => 'misi'
			]);

			$misi->meta_content = $request->misi;
			$misi->save();
			
			DB::commit();

			return redirect()->route('site_info.index')->with('success', 'Successfully updated your site info.');

		} catch (\Exception $e) {
			DB::rollback();
			return redirect()->back()->withInput()->withErrors(['Internal Server Error.']);
		}
	}
}
