<?php

namespace App\Http\Controllers\Admin;

use Validator;
use DB;
use Hash;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

class ProfileController extends Controller
{
	public function index()
	{
		return view('admin.profile.index');
	}

	public function update(Request $request)
	{
        Validator::extend('old', function($field, $value) {
            return Hash::check($value, Auth::user()->password);
        });

        $validator = Validator::make($request->all(), $this->rules());

        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator);
        }

		DB::beginTransaction();

		try {
			$user = Auth::user();
			$user->username = $request->username;
			if ($request->password) {
				$user->password = bcrypt($request->password);
			}
			$user->save();

			DB::commit();

			return redirect()->route('profile.index')->with('success', 'Successfully updated your profile.');
		} catch (\Exception $e) {
			DB::rollback();
            return redirect()->back()->withInput()->withErrors(['Internal Server Error.']);
		}
	}

	public function rules()
	{
		return [
			'username' => 'required',
			'old_password' => 'required|old',
			'password' => 'confirmed'
		];
	}
}
