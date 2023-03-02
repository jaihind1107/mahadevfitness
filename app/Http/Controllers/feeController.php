<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Member;
use App\Models\fees;
use Exception;

class feeController extends Controller
{
    public function fee_view()
    {
        $members = Member::all();
        return view('fee', compact('members'));
    }

    public function pay_fee(Request $req)
    {
        try {
            $month = implode(",", $req->month) . "-" . $req->year;
            $du_date = $req->due_date;
            $newDate = date("Y-m-d", strtotime($du_date));
            dd($newDate);


            fees::create([
                'member_id' => $req->member_id,
                'amount' => $req->amount,
                'month' => $month,
                'due_date' => $newDate
            ]);

            return redirect('/fee')->with('success', 'Fees Payment Successfully');
        } catch (Exception $ex) {
            $notification = array(
                'error' => $ex->getMessage(),
            );
            dd($notification);
            return back()->with($notification);
        }
    }


    public function pay_view(Request $req)
    {
        try {
            $mid = $req->m_id;
            $query = DB::table('feetable')
                ->where('member_id', $mid)
                ->get();

            $html =  "<table class='display nowrap' style='width:100%'>
                <thead>
                    <tr>
                        <th>Sr.No</th>
                        <th>Amount</th>
                        <th>month</th>
                        <th>Date</th>
                    </tr>
                </thead>
                <tbody>";
            $status = false;
            if (count($query) > 0) {
                $i = 1;
                $status = true;
                foreach ($query as $var) {
                    $html = $html . "<tr><td>" . $i++ . "</td><td>" . $var->amount . "</td><td>" . $var->month . "</td><td>" . date("d-m-Y H:i:s", strtotime($var->created_at)) . "</td></tr>";
                }

                $html = $html . " </tbody>
                </table>";
                return (compact('html', 'status'));
            }
            return (compact('html', 'status'));
        } catch (\Exception $ex) {
            // dd($ex->getMessage() . '<= Line no =>' . $ex->getLine());
            return back()->with('error', 'Something went wrong');
        }
    }

    public function fee_report(Request $req)
    {
        if (isset($req->report_type)) {
            // dd($req->all());
            if ($req->report_type == 'All Member Fee Report') {
                $query = "SELECT name, mobile, address, amount, month, due_date, fe.created_at
                FROM feetable as fe
                INNER JOIN member as me
                ON fe.member_id = me.id, 
                (select member_id, max(id) as value from feetable group by member_id)g where fe.id = g.value";
                $details = DB::select($query);

                return view('fee_result', compact('details'));
            } elseif ($req->report_type == 'Due Fee Report') {
                $query = "SELECT name, mobile, address, amount, month, due_date, fe.created_at
                FROM feetable as fe
                INNER JOIN member as me
                ON fe.member_id = me.id, 
                (select member_id, max(id) as value from feetable group by member_id)g where fe.id = g.value and fe.due_date < CURDATE()";
                $details = DB::select($query);

                return view('fee_result', compact('details'));
            }
        }
        return view('fee_result');
    }
}
