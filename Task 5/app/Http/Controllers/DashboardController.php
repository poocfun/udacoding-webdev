<?php

namespace App\Http\Controllers;

use App\Models\Leaderboard;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class DashboardController extends Controller
{
    public function index()
    {
        $leaderboard = Leaderboard::get();
        $data = array(
            'leaderboard' => $leaderboard
        );
        return view('dashboard', $data);
    }

    public function leaderboard()
    {
        $leaderboard = Leaderboard::get();
        $data = array(
            'leaderboard' => $leaderboard
        );
        return view('leaderboard', $data);
    }

    public function store(Request $request)
    {

        $leaderboard=Leaderboard::create($request->all());

            if($leaderboard) {
                Session::flash('status', 'success');
                Session::flash('message', 'add new student success!');
            }


        return redirect('/dashboard');
    }

    public function delete($id)
  {
      //$deleteStudent = DB::table('students')->where('id', $id)->delete();
      $leaderboard = Leaderboard::findOrFail($id);
      $leaderboard->delete();

      session()->flash('success', 'Pengunjung Data Deleted Successfully');
      return redirect('/dashboard');
  }
}

