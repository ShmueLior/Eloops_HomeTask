<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Member;
use Illuminate\Support\Facades\DB;

class MemberController extends Controller
{
    public function index(){

        $members = DB::table('members')->get();


        return view('home', compact('members'));
    }

    public function duplicates(){
        $subQueryName = DB::table('members')->select('first_name','last_name',DB::raw('count(*) as name_count'))->groupBy('first_name','last_name')->having('name_count', '>', 1);
        $subQueryEmail = DB::table('members')->select('email',DB::raw('count(*) as email_count'))->groupBy('email')->having('email_count', '>', 1);
        $subQueryPhone = DB::table('members')->select('prefix','phone', DB::raw('count(*) as phone_count'))->groupBy('prefix','phone')->having('phone_count', '>', 1);


        $members = DB::table('members')->select('members.*')->leftJoinSub($subQueryName, 'a', function($leftJoin){
            $leftJoin->on('a.first_name', '=', 'members.first_name')->on('a.last_name', '=', 'members.last_name');
        })->leftJoinSub($subQueryEmail, 'b', function($leftJoin){
            $leftJoin->on('b.email', '=', 'members.email');
        })->leftJoinSub($subQueryPhone, 'c', function($leftJoin){
            $leftJoin->on('c.prefix', '=', 'members.prefix')->on('c.phone', '=', 'members.phone');
        })->whereNotNull('a.first_name')->orWhereNotNull('b.email')->orWhereNotNull('c.prefix');

        $duplicate_members =  $members->get();
        return view('duplicates', compact('duplicate_members'));
    }
}
