<?php

namespace App\Http\Controllers\Admin;

use DB;
use Validator;
use App\Partner;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PartnerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.partners.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.partners.form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), $this->rules());

        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator);
        }

        DB::beginTransaction();

        try {
            Partner::create([
                'name' => $request->name,
                'image' => $request->logo_path,
                'url' => @$request->url
            ]);

            DB::commit();

            return redirect()->route('partners.index')->with('success', 'Successfully added a partner.');
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->withInput()->withErrors(['Internal Server Error.']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Partner  $partner
     * @return \Illuminate\Http\Response
     */
    public function show(Partner $partner)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Partner  $partner
     * @return \Illuminate\Http\Response
     */
    public function edit(Partner $partner)
    {
        return view('admin.partners.form', [
            'partner' => $partner
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Partner  $partner
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Partner $partner)
    {
        $validator = Validator::make($request->all(), $this->rules());

        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator);
        }

        DB::beginTransaction();

        try {
            $partner->name = $request->name;
            $partner->url = $request->url;
            $partner->image = $request->logo_path;
            $partner->save();

            DB::commit();

            return redirect()->route('partners.index')->with('success', '<b>' . $partner->name . '</b> has already been updated.');
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->withInput()->withErrors(['Internal Server Error.']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Partner  $partner
     * @return \Illuminate\Http\Response
     */
    public function destroy(Partner $partner)
    {
        DB::beginTransaction();

        try {
            $partner->delete();
            DB::commit();

            return response()->json([
                'status' => true,
                'msg' => 'success'
            ], 200);
        } catch (\Exception $e) {
            DB::rollback();

            return response()->json([
                'status' => false,
                'msg' => 'error'
            ], 400);
        }
    }
    
    public function get(Request $request)
    {
        $length = $request->length;
        $start = $request->start;
        $search = $request->search['value'];

        $columns = $request->columns;
        $order = $request->order;

        $order_col = $order[0]['column'];
        $order_dir = $order[0]['dir'];

        $result = new Partner;

        if ($search) {
            $result = $result->where(function ($query) use ($search) {
                $query->where('name', 'like', '%' . $search . '%')
                      ->orwhere('url', 'like', '%' . $search . '%');
            });
        }


        $result = $result->orderBy($columns[$order_col]['data']['_'], $order_dir);

        $count = $result->count();
        $result = $result->take($length);
        $result = $result->skip($start);

        return response()->json([
            'recordsTotal' => $result->count(),
            'recordsFiltered' => $count,
            'data' => $result->get(),
        ]);
    }

    public function rules()
    {
        return [
            'name' => 'required',
            'logo_path' => 'required'
        ];
    }

    public function messages()
    {

    }
}
