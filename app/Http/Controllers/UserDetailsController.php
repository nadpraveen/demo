<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\UserDetails;
use DB;

class UserDetailsController extends Controller
{

    public function index()
    {
        $user_details = UserDetails::get();

        return view('index', ['user_details' => $user_details]);
    }

    public function create()
    {
        return view('create');
    }
    public function store(Request $request)
    {
        // dd($request->all());

        UserDetails::create($request->all());

        return redirect('/');
    }

    public function edit($id)
    {
        $user_details = UserDetails::where('id', $id)->first();
        return view('edit', ['user_details' => $user_details]);
    }

    public function update(Request $request)
    {
        $data = $request->all();



        $new_data['id'] = $data['id'];
        $new_data['name'] = $data['name'];
        $new_data['email'] = $data['email'];
        $new_data['postion'] = $data['postion'];
        $new_data['mobile'] = $data['mobile'];

        UserDetails::where('id', $data['id'])->update($new_data);

        return redirect('/');
    }

    public function delete($id)
    {
        UserDetails::where('id', $id)->delete();
        return redirect('/');

    }

    public function search(Request $request)
    {
        // dd($request->all());
        $where = ' where ';

        $filter = $request->all();

        // if (isset($filter['name'])) {
        //     $where = $where . "->where('name','" . $filter['name'] . "')";
        // }
        // if (isset($filter['email'])) {
        //     $where = $where . "->where('email','" . $filter['email'] . "')";
        // }
        // if (isset($filter['mobile'])) {
        //     $where = $where . "->where('mobile','" . $filter['mobile'] . "')";
        // }

        if (isset($filter['name'])) {
            $where = $where . "name like '%" . $filter['name'] . "%'";
        }
        // if (isset($filter['email'])) {
        //     $where = $where . "and email = '" . $filter['email'] . "'";
        // }
        // if (isset($filter['mobile'])) {
        //     $where = $where . " and mobile = '" . $filter['mobile'] . "'";
        // }


        $query_string = 'select * from user_details' . $where;

        $filtered_users = DB::select(DB::raw($query_string));



        return view('view', ['filtered_users' => $filtered_users]);
    }

}