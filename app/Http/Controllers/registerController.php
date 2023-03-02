<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Member;
use Exception;

class registerController extends Controller
{
    public function regview()
    {
        return view('register');
    }


    public function register_menber(Request $req)
    {
        try {
            Member::create([
                'name' => $req->name,
                'mobile' => $req->mobile,
                'email' => $req->email_id,
                'adhar' => $req->adhar,
                'gender' => $req->gender,
                'age' => $req->age,
                'address' => addslashes($req->address),
            ]);

            return redirect('/dashboard')->with('success', 'User registration Successfully');
        } catch (Exception $ex) {
            $notification = array(
                'error' => $ex->getMessage(),
            );
            dd($notification);
            return back()->with($notification);
        }
    }


    public function delete(Request $request, $id)
    {
        Member::where('id', $id)->delete();
        return redirect('/dashboard')->with('error', 'User deleted Successfully');;
    }

    public function member_view(Request $req)
    {
        try {
            $mid = $req->m_id;
            $query = DB::table('member')
                ->where('id', $mid)
                ->get();
            $status = false;
            if (count($query) > 0) {
                $status = true;
                return (compact('query', 'status'));
            }
            return (compact('status'));
        } catch (\Exception $ex) {
            // dd($ex->getMessage() . '<= Line no =>' . $ex->getLine());
            return back()->with('error', 'Something went wrong');
        }
    }

    public function edit_member(Request $req)
    {
        try {
            Member::where('id', $req->id)->update([
                'name' => $req->name,
                'mobile' => $req->mobile,
                'email' => $req->email_id,
                'adhar' => $req->adhar,
                'gender' => $req->gender,
                'age' => $req->age,
                'address' => addslashes($req->address),
                'locker' => $req->locker,
            ]);

            return redirect('/dashboard')->with('success', 'User Updated Successfully');
        } catch (Exception $ex) {
            $notification = array(
                'error' => "No Lead Data Found."
            );
            return back()->with($notification);
        }
    }
}
