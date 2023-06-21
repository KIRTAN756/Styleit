<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User_info;
use App\Models\Offer_info;
use App\Models\Measurment_info;
use App\Models\Address_info;
use App\Models\State_info;
use App\Models\City_info;
use App\Models\Material_info;
use App\Models\Collar_info;
use App\Models\Sleeve_info;
use App\Models\Pattern_info;
use App\Models\Design_info;
use App\Models\Order_info;
use App\Models\Tailor_info;
use DB;

class c1 extends Controller
{
    public function register(Request $res)
    {
        $data = User_info::all();
        foreach ($data as $d) {
            if ($d->U_userName == $res->input('uname')) {
                return redirect('/regagain');
            }
            elseif ($res->input('pwd') != $res->input('pwdc')) {
                return redirect('/password');
            }
            else{
                $user = new User_info;
                $user->U_Name = $res->input('fname');
                $user->U_MobileNo = $res->input('mobno');
                $user->U_Email = $res->input('email');
                $user->U_userName = $res->input('uname');
                $user->U_Password = $res->input('pwd');
                $user->save();
                return redirect('/welcome');
            }
        }
    }
    public function login(Request $res)
    {
        $data = User_info::where('U_userName','=',$res->input('uname'))->get();
        foreach($data as $d){
            if($d->U_Password == $res->input('pwd')){
                $res->session()->put('uname',$res->input('uname'));
                $res->session()->put('uid',$d->U_id);
                return redirect('/home');
            }
            else{
                echo "Password Not Matched";
                echo "<br>";
                echo "<a href='/welcome'>Login Again</a>";
            }
        }
    }
    public function addMeasurment(Request $res)
    {
        $measur = new Measurment_info;
        $measur->U_id = session('uid');
        $measur->M_userName = $res->input('uname');
        $measur->M_Chest = $res->input('chest');
        $measur->M_Waist = $res->input('waist');
        $measur->M_Sleeve = $res->input('sleeve');
        $measur->M_Shoulder = $res->input('shoulder');
        $measur->M_Neck = $res->input('neck');
        $measur->M_Length = $res->input('length');
        $measur->save();
        return redirect('/measurment');
    }
    public function measurment()
    {
        $measurment = Measurment_info::where('U_id','=',session('uid'))->get();
        $data = compact('measurment');
        return view('/measurment')->with($data);
    }
    public function editMeasur(Request $res)
    {
        $measurment = Measurment_info::find($res->get('id'));
        $data = compact('measurment');
        return view('/editMeasur')->with($data);
    }
    public function updtMeasur(Request $res)
    {
        $id = $res->input('mid');
        $measurment = Measurment_info::find($id);
        $measurment->M_userName = $res->input('uname');
        $measurment->M_Chest = $res->input('chest');
        $measurment->M_Waist = $res->input('waist');
        $measurment->M_Sleeve = $res->input('sleeve');
        $measurment->M_Shoulder = $res->input('shoulder');
        $measurment->M_Neck = $res->input('neck');
        $measurment->M_Length = $res->input('length');
        $measurment->save();
        return redirect('/measurment');
    }
    public function delMeas(Request $res)
    {
        Measurment_info::find($res->get('id'))->delete();
        return redirect('/measurment');
    }
    public function address()
    {
        $state = State_info::all();
        $data = compact('state');
        return view('/addAddress')->with($data);
    }
    public function getCity(Request $res)
    {
        $sid = $res->post('sid');
        $data = City_info::where('State_id','=',$sid)->get();
        $html = '<option disabled Selected>--</option>';
        foreach ($data as $city){
            $html.='<option value="'.$city->City_Name.'">'.$city->City_Name.'</option>';
        }
        echo $html;
    }
    public function addAddress(Request $res)
    {   
        $state = State_info::where('State_id','=',$res->input('state'))->get();
        $stateName = "";
        foreach ($state as $d){
            $stateName = $d->State_Name;
        }
        $address = new Address_info;
        $address->U_id = session('uid');
        $address->Address_City = $res->input('city');
        $address->Address_State = $stateName;
        $address->Address_Street = $res->input('street');
        $address->Address_Zipcode = $res->input('zipcode');
        $address->save();
        return redirect('manage');
    }
    public function profile()
    {
        $address = Address_info::where('U_id','=',session('uid'))->get();
        $personal = User_info::where('U_id','=',session('uid'))->get();
        $data = compact(['personal','address']);
        return view('manageAccountU')->with($data);
    }
    public function delAddress(Request $res)
    {
        Address_info::find($res->get('id'))->delete();
        return redirect('/manage');
    }
    public function updtProfile(Request $res)
    {
        $user = User_info::find(session('uid'));
        $user->U_Name = $res->input('fname');
        $user->U_MobileNo = $res->input('mobno');
        $user->U_Email = $res->input('email');
        $user->U_userName = $res->input('uname');
        $user->save();
        $city = $res->input('city');
        $state = $res->input('state');
        $street = $res->input('street');
        $zipcode = $res->input('zipcode');
        $i1 = 0;
        foreach ($res->input('aid') as $i){
            $address = Address_info::find($i);
            $address->Address_City = $city[$i1];
            $address->Address_State = $state[$i1];
            $address->Address_Street = $street[$i1];
            $address->Address_Zipcode = $zipcode[$i1];
            $address->save();
            $i1++;
        }
        return redirect('/manage');
    }
    public function updtPassword(Request $res)
    {   
        $user = User_info::where('U_id','=',session('uid'))->get();
        foreach ($user as $d) {
            if($res->input('cupwd') != $d->U_Password){
                echo "<link rel='stylesheet' href='https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css'>";
                echo "<table class='table'>";
                echo    '<tbody>';
                echo        '<tr>';
                echo            "<td scope='row' align='center'>Current Password is Not Matched With Database Couldn't Update</td>";
                echo        "</tr>";
                echo        "<tr>";
                echo            "<td align='center'>Try Again </td>";
                echo        "</tr>";
                echo        "<tr>"; 
                echo            "<td align='center'>";
                echo                "<b4-link>";
                echo                    "<a href='change'>Go Back</a>";
                echo                "</b4-link>";
                echo            "</td>";
                echo        "</tr>";
                echo    "</tbody>";
                echo"</table>";
            }      
            elseif($res->input('cupwd') == $res->input('npwd')){
                echo "<link rel='stylesheet' href='https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css'>";
                echo "<table class='table'>";
                echo    '<tbody>';
                echo        '<tr>';
                echo            "<td scope='row' align='center'>Current Password And New Password Are Same Couldn't Update</td>";
                echo        "</tr>";
                echo        "<tr>";
                echo            "<td align='center'>Try Again </td>";
                echo        "</tr>";
                echo        "<tr>"; 
                echo            "<td align='center'>";
                echo                "<b4-link>";
                echo                    "<a href='change'>Go Back</a>";
                echo                "</b4-link>";
                echo            "</td>";
                echo        "</tr>";
                echo    "</tbody>";
                echo"</table>";
            }
            elseif ($res->input('npwd') != $res->input('copwd')) {
                echo "<link rel='stylesheet' href='https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css'>";
                echo "<table class='table'>";
                echo    '<tbody>';
                echo        '<tr>';
                echo            "<td scope='row' align='center'>New Password And Confirme Password Are Not Matched Couldn't Update</td>";
                echo        "</tr>";
                echo        "<tr>";
                echo            "<td align='center'>Try Again </td>";
                echo        "</tr>";
                echo        "<tr>"; 
                echo            "<td align='center'>";
                echo                "<b4-link>";
                echo                    "<a href='change'>Go Back</a>";
                echo                "</b4-link>";
                echo            "</td>";
                echo        "</tr>";
                echo    "</tbody>";
                echo"</table>";;
            }
            else{
                $user1 = User_info::find(session('uid'));
                $user1->U_Password = $res->input('npwd');
                $user1->save();
                return redirect('/manage');
            }
        }
    }
    public function create()
    {
        $material = Material_info::all();
        $pattern = Pattern_info::all();
        $sleeve = Sleeve_info::all();
        $collar = Collar_info::all();
        $measurment = Measurment_info::where('U_id','=',session('uid'))->get();
        $address = Address_info::where('U_id','=',session('uid'))->get();
        $data = compact('material','pattern','sleeve','collar','measurment','address');
        return view('createU')->with($data);
    }
    public function addDesign(Request $res)
    {
        $design = new Design_info;
        $design->U_id = session('uid');
        $design->Measurment_id = $res->input('measurment');
        $design->Material_Name = $res->input('material');
        $design->Material_Color = $res->input('cname');
        $design->Pattern_Name = $res->input('pattern');
        $design->Collar_Name = $res->input('collar');
        $design->Sleeve_Name = $res->input('sleeve');
        $design->Address_id = $res->input('address');
        $design->Request_Status = "Y";
        $design->save();
        return redirect('create');
    }
    public function viewDesign()
    {
        $design = Design_info::join('measurment_infos','measurment_infos.Measurment_id', '=', 'design_infos.Measurment_id')->where('design_infos.U_id','=',session('uid'))->get();
        $data = compact('design');
        return view('design')->with($data);
    }
    public function makeReq(Request $res)
    {
        $design = Design_info::find($res->get('id'));
        $design->Request_Status = "Y";
        $design->save();
        return redirect('/viewDesign');
    }
    public function stopReq(Request $res)
    {
        $design = Design_info::find($res->get('id'));
        $design->Request_Status = "N";
        $design->save();
        return redirect('/viewDesign');
    }
    public function viewOffers()
    {
        $offer = Offer_info::join('user_infos','offer_infos.U_id', '=', 'user_infos.U_id')->join('design_infos','design_infos.Design_id', '=', 'offer_infos.Design_id')->join('measurment_infos','measurment_infos.Measurment_id','=','offer_infos.Measurment_id')->join('tailor_infos','tailor_infos.Tailor_id','=','offer_infos.Tailor_id')->where('offer_infos.U_id','=',session('uid'))->get();
        $data = compact('offer');
        return view('offerU')->with($data);
    }
    public function acceptOffer(Request $res)
    {
        $offer = Offer_info::find($res->get('oid'));
        $offer->Offer_Answer = 'A';
        $offer->Save();
        $order = new Order_info;
        $order->U_id = session('uid');
        $order->Design_id = $res->get('did');
        $order->Measurment_id = $res->get('mid');
        $order->Tailor_id = $res->get('tid');
        $order->Address_id = $res->get('aid');
        $order->Order_Cost = $res->get('cost');
        $order->Order_Status = "P";
        $order->Save();
        $design = Design_info::find($res->get('did'));
        $design->Request_Status = 'N';
        $design->save(); 
        return redirect('/viewOffersU');
    }
    public function rejectOffer(Request $res)
    {
        $offer = Offer_info::find($res->get('oid'));
        $offer->Offer_Answer = "R";
        $offer->save();
        return redirect('/viewOffersU');
    }
    public function viewTailor(Request $res)
    {
        $address = Address_info::where('Tailor_id','=',$res->get('id'))->get();
        $tailor = Tailor_info::find($res->get('id'));
        $data = compact('tailor','address');
        return view('tailorProfile')->with($data);
    }
    public function pendingOrder()
    {
        $order = Order_info::join('user_infos','user_infos.U_id','=','order_infos.U_id')->join('design_infos','design_infos.Design_id','=','order_infos.Design_id')->join('measurment_infos','measurment_infos.Measurment_id','=','order_infos.Measurment_id')->join('address_infos','address_infos.Address_id','=','order_infos.Address_id')->join('tailor_infos','tailor_infos.Tailor_id','=','order_infos.Tailor_id')->where('order_infos.U_id','=',session('uid'))->get();
        $data = compact('order');
        return view('pendingOrderU')->with($data);
    }
    public function orderHistory()
    {
        $order = Order_info::join('user_infos','user_infos.U_id','=','order_infos.U_id')->join('design_infos','design_infos.Design_id','=','order_infos.Design_id')->join('measurment_infos','measurment_infos.Measurment_id','=','order_infos.Measurment_id')->join('address_infos','address_infos.Address_id','=','order_infos.Address_id')->join('tailor_infos','tailor_infos.Tailor_id','=','order_infos.Tailor_id')->where('order_infos.U_id','=',session('uid'))->get();
        $data = compact('order');
        return view('orderHistoryU')->with($data);
    }
    public function viewDetail(Request $res)
    {
        $order = Order_info::join('user_infos','user_infos.U_id','=','order_infos.U_id')->join('design_infos','design_infos.Design_id','=','order_infos.Design_id')->join('measurment_infos','measurment_infos.Measurment_id','=','order_infos.Measurment_id')->join('address_infos','address_infos.Address_id','=','order_infos.Address_id')->join('tailor_infos','tailor_infos.Tailor_id','=','order_infos.Tailor_id')->where('order_infos.Order_id','=',$res->get('id'))->get();
        $data = compact('order');
        return view('viewDetail')->with($data);
    }
    public function viewCollection()
    {
        $tailor = Tailor_info::join('address_infos','address_infos.Tailor_id','=','tailor_infos.Tailor_id')->limit(1)->get();
        $address = Address_info::where('U_id','=',session('uid'))->limit(1)->get();
        $data = compact('tailor','address');
        return view('viewCollection')->with($data);
    }
}
