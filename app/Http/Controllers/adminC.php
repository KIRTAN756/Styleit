<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin_info;
use App\Models\Material_info;
use App\Models\Collar_info;
use App\Models\Sleeve_info;
use App\Models\Pattern_info;
use App\Models\City_info;
use App\Models\State_info;
use DB;

class adminC extends Controller
{
    public function login(Request $res)
    {
        $data = Admin_info::where('Admin_userName','=',$res->input('uname'))->get();
        foreach($data as $d){
            if($d->Admin_Password == $res->input('pwd')){
                $res->session()->put('aname',$res->input('uname'));
                $res->session()->put('aid',$d->Admin_id);
                return redirect('/homeA');
            }
            else{
                echo "Password Not Matched";
                echo "<br>";
                echo "<a href='/welcome'>Login Again</a>";
            }
        }
    }
    
    
    public function mats()
    {
        $material = Material_info::all();
        $data = compact('material');
        return view('/material')->with($data);
    }
    public function addMats(Request $res)
    {
        $material = new Material_info;
        $material->Material_Name = $res->input('mname');
        $material->save();
        return redirect('/mats');
    }
    public function editMats(Request $res)
    {
        $mats = Material_info::find($res->get('id'));
        $data = compact('mats');
        return view('editMats')->with($data);
    }
    public function updtMats(Request $res)
    {
        $mats = Material_info::find($res->input('mid'));
        $mats->Material_Name = $res->input('mname');
        $mats->save();
        return redirect('/mats');
    }
    public function delMats(Request $res)
    {
        Material_info::find($res->get('id'))->delete();
        return redirect('/mats');
    }
    


    public function patterns()
    {
        $pattern = Pattern_info::all();
        $data = compact('pattern');
        return view('/pattern')->with($data);
    }
    public function addPattern(Request $res)
    {
        $pattern = new Pattern_info;
        $pattern->Pattern_Name = $res->input('pname');
        $pattern->save();
        return redirect('/pattern');
    }
    public function editPattern(Request $res)
    {
        $pattern = Pattern_info::find($res->get('id'));
        $data = compact('pattern');
        return view('editPattern')->with($data);
    }
    public function updtPattern(Request $res)
    {
        $pattern = Pattern_info::find($res->input('pid'));
        $pattern->Pattern_Name = $res->input('pname');
        $pattern->save();
        return redirect('/pattern');
    }
    public function delPattern(Request $res)
    {
        Pattern_info::find($res->get('id'))->delete();
        return redirect('/pattern');
    }

    public function collars()
    {
        $collar = Collar_info::all();
        $data = compact('collar');
        return view('/collar')->with($data);
    }
    public function addCollar(Request $res)
    {
        $collar = new Collar_info;
        $collar->Collar_Name = $res->input('cname');
        $collar->save();
        return redirect('/collar');
    }
    public function editCollar(Request $res)
    {
        $collar = Collar_info::find($res->get('id'));
        $data = compact('collar');
        return view('editCollar')->with($data);
    }
    public function updtCollar(Request $res)
    {
        $collar = Collar_info::find($res->input('cid'));
        $collar->Collar_Name = $res->input('cname');
        $collar->save();
        return redirect('/collar');
    }
    public function delCollar(Request $res)
    {
        Collar_info::find($res->get('id'))->delete();
        return redirect('/collar');
    }

    

    public function sleeves()
    {
        $sleeve = Sleeve_info::all();
        $data = compact('sleeve');
        return view('/sleeve')->with($data);
    }
    public function addSleeve(Request $res)
    {
        $sleeve = new Sleeve_info;
        $sleeve->Sleeve_Name = $res->input('sname');
        $sleeve->save();
        return redirect('/sleeve');
    }
    public function editSleeve(Request $res)
    {
        $sleeve = Sleeve_info::find($res->get('id'));
        $data = compact('sleeve');
        return view('editSleeve')->with($data);
    }
    public function updtSleeve(Request $res)
    {
        $sleeve = Sleeve_info::find($res->input('sid'));
        $sleeve->Sleeve_Name = $res->input('sname');
        $sleeve->save();
        return redirect('/sleeve');
    }
    public function delSleeve(Request $res)
    {
        Sleeve_info::find($res->get('id'))->delete();
        return redirect('/sleeve');
    }
    

    public function citys()
    {
        $state = State_info::all();
        $city = City_info::join('state_infos', 'city_infos.State_id', '=', 'state_infos.State_id')->get();
        $data = compact('city','state');
        return view('/city')->with($data);
    }
    public function addCity(Request $res)
    {
        $city = new City_info;
        $city->City_Name = $res->input('cname');
        $city->State_id = $res->input('state');
        $city->save();
        return redirect('/city');
    }
    public function editCity(Request $res)
    {
        $id = $res->get('id');
        $state = State_info::where('State_id','!=',$res->get('sid'))->get();
        $city = City_info::join('state_infos', 'city_infos.State_id', '=', 'state_infos.State_id')->where('city_infos.City_id', $id)->get();
        $data = compact('city','state');
        return view('editCity')->with($data);
    }
    public function updtCity(Request $res)
    {
        $city = City_info::find($res->input('cid'));
        $city->State_id = $res->input('state');
        $city->City_Name = $res->input('cname');
        $city->save();
        return redirect('/city');
    }
    public function delCity(Request $res)
    {
        City_info::find($res->get('id'))->delete();
        return redirect('/city');
    }
}
