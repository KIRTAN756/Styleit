<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Address_info;
use App\Models\State_info;
use App\Models\City_info;
use App\Models\Material_info;
use App\Models\Collar_info;
use App\Models\Sleeve_info;
use App\Models\Pattern_info;
use App\Models\Design_info;
use App\Models\Tailor_info;
use App\Models\Offer_info;
use App\Models\Order_info;
use App\Models\User_info;
use DB;

class tailorC extends Controller
{
    public function registerC(Request $res)
    {
        $data = Tailor_info::all();
        foreach ($data as $d) {
            if ($d->Tailor_userName == $res->input('uname')) {
                return redirect('/regagain');
            }
            elseif ($res->input('pwd') != $res->input('pwdc')) {
                return redirect('/password');
            }
            else{
                $user = new Tailor_info;
                $user->Tailor_Name = $res->input('fname');
                $user->Tailor_MobileNo = $res->input('mobno');
                $user->Tailor_Email = $res->input('email');
                $user->Tailor_Org = $res->input('org');
                $user->Tailor_userName = $res->input('uname');
                $user->Tailor_Password = $res->input('pwd');
                $user->save();
                return redirect('/tailor');
            }
        }
    }
    public function login(Request $res)
    {
        $data = Tailor_info::where('Tailor_userName','=',$res->input('tname'))->get();
        foreach($data as $d){
            if($d->Tailor_Password == $res->input('pwd')){
                $res->session()->put('tname',$res->input('tname'));
                $res->session()->put('tid',$d->Tailor_id);
                $res->session()->put('torg',$d->Tailor_Org);
                return redirect('/homeT');
            }
            else{
                echo "Password Not Matched";
                echo "<br>";
                echo "<a href='/tailor'>Login Again</a>";
            }
        }
    }
    public function profile()
    {
        $address = Address_info::where('Tailor_id','=',session('tid'))->get();
        $personal = Tailor_info::where('Tailor_id','=',session('tid'))->get();
        $data = compact(['personal','address']);
        return view('manageAccountT')->with($data);
    }
    public function updtProfile(Request $res)
    {
        $user = Tailor_info::find(session('tid'));
        $user->Tailor_Name = $res->input('fname');
        $user->Tailor_Email = $res->input('email');
        $user->Tailor_MobileNo = $res->input('mobno');
        $user->Tailor_Org = $res->input('org');
        $user->Tailor_userName = $res->input('uname');
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
        return redirect('manageT');
    }
    public function address()
    {
        $state = State_info::all();
        $data = compact('state');
        return view('/addAddressT')->with($data);
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
        $address = new Address_info;
        $statename = "";
        $state = State_info::where('State_id','=',$res->input('state'))->get();
        foreach ($state as $d) {
            $statename = $d->State_Name;
        }
        $address->Tailor_id = session('tid');
        $address->Address_City = $res->input('city');
        $address->Address_State = $statename;
        $address->Address_Street = $res->input('street');
        $address->Address_Zipcode = $res->input('zipcode');
        $address->save();
        return redirect('/manageT');
    }
    public function delAddress(Request $res)
    {
        Address_info::find($res->get('id'))->delete();
        return redirect('/manageT');
    }
    public function updtPassword(Request $res)
    {   
        $user = Tailor_info::where('Tailor_id','=',session('tid'))->get();
        foreach ($user as $d) {
            if($res->input('cupwd') != $d->Tailor_Password){
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
                echo                    "<a href='changeT'>Go Back</a>";
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
                echo                    "<a href='changeT'>Go Back</a>";
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
                echo                    "<a href='changeT'>Go Back</a>";
                echo                "</b4-link>";
                echo            "</td>";
                echo        "</tr>";
                echo    "</tbody>";
                echo"</table>";
            }
            else{
                $user1 = Tailor_info::find(session('tid'));
                $user1->Tailor_Password = $res->input('npwd');
                $user1->save();
                return redirect('/manageT');
            }
        }       
    }
    public function create()
    {
        $material = Material_info::all();
        $pattern = Pattern_info::all();
        $sleeve = Sleeve_info::all();
        $collar = Collar_info::all();
        $data = compact('material','pattern','sleeve','collar');
        return view('createT')->with($data);
    }
    public function addDesign(Request $res)
    {
        $design = new Design_info;
        $design->Tailor_id = session('tid');
        $design->Material_Name = $res->input('material');
        $design->Material_Color = $res->input('cname');
        $design->Pattern_Name = $res->input('pattern');
        $design->Collar_Name = $res->input('collar');
        $design->Sleeve_Name = $res->input('sleeve');
        $design->Tailor_Org = session('torg');
        $design->Design_Price = $res->input('price');
        $design->save();
        return redirect('createT');
    }
    public function offers(Request $res)
    {
        $offer = Offer_info::select('Design_id')->where('Tailor_id','=',session('tid'))->get();
        $address = Address_info::where('Tailor_id','=',session('tid'))->get();
        $design = Design_info::join('user_infos','design_infos.U_id', '=', 'user_infos.U_id')->join('address_infos','address_infos.Address_id','=','design_infos.Address_id')->join('measurment_infos','measurment_infos.Measurment_id','=','design_infos.Measurment_id')->where('design_infos.Request_Status','=','Y')->whereNotIn('design_infos.Design_id',$offer)->get();
        $data = compact('design','address');
        return view('offerT')->with($data);
    }
    public function giveOffer(Request $res)
    {
        $design = Design_info::join('user_infos','design_infos.U_id', '=', 'user_infos.U_id')->join('address_infos','address_infos.Address_id','=','design_infos.Address_id')->join('measurment_infos','measurment_infos.Measurment_id','=','design_infos.Measurment_id')->where('design_infos.Design_id','=',$res->get('id'))->get();
        $data = compact('design');
        return view('giveOffer')->with($data);
    }
    public function addOffer(Request $res)
    {
        $offer = new Offer_info;
        $offer->Tailor_id = session('tid');
        $offer->U_id = $res->input('uid');
        $offer->Design_id = $res->input('did');
        $offer->Measurment_id = $res->input('mid');
        $offer->Address_id = $res->input('aid');
        $offer->Offer_Price = $res->input('price');
        $offer->Offer_Answer = "P";
        $offer->save();
        return redirect('offersT');
    }
    public function viewOffers()
    {
        $offer = Offer_info::join('user_infos','offer_infos.U_id', '=', 'user_infos.U_id')->join('design_infos','design_infos.Design_id', '=', 'offer_infos.Design_id')->join('measurment_infos','measurment_infos.Measurment_id','=','offer_infos.Measurment_id')->join('address_infos','address_infos.Address_id','=','offer_infos.Address_id')->where('offer_infos.Tailor_id','=',session('tid'))->get();
        $data = compact('offer');
        return view('givenOffers')->with($data);
    }
    public function pendingOrder()
    {
        $order = Order_info::join('user_infos','user_infos.U_id','=','order_infos.U_id')->join('design_infos','design_infos.Design_id','=','order_infos.Design_id')->join('measurment_infos','measurment_infos.Measurment_id','=','order_infos.Measurment_id')->join('tailor_infos','tailor_infos.Tailor_id','=','order_infos.Tailor_id')->join('address_infos','address_infos.Address_id','=','order_infos.Address_id')->where('order_infos.Tailor_id','=',session('tid'))->get();
        $data = compact('order');
        return view('pendingOrderT')->with($data);
    }
    public function finish(Request $res)
    {
        $order = Order_info::find($res->get('id'));
        $order->Order_Status = "F";
        $order->save();
        return redirect('pendingOrderT');
    }
    public function orderHistory()
    {
        $order = Order_info::join('user_infos','user_infos.U_id','=','order_infos.U_id')->join('design_infos','design_infos.Design_id','=','order_infos.Design_id')->join('measurment_infos','measurment_infos.Measurment_id','=','order_infos.Measurment_id')->join('tailor_infos','tailor_infos.Tailor_id','=','order_infos.Tailor_id')->join('address_infos','address_infos.Address_id','=','order_infos.Address_id')->where('order_infos.Tailor_id','=',session('tid'))->get();
        $data = compact('order');
        return view('orderHistoryT')->with($data);
    }
    public function viewDetail(Request $res)
    {
        $order = Order_info::join('user_infos','user_infos.U_id','=','order_infos.U_id')->join('design_infos','design_infos.Design_id','=','order_infos.Design_id')->join('measurment_infos','measurment_infos.Measurment_id','=','order_infos.Measurment_id')->join('address_infos','address_infos.Address_id','=','order_infos.Address_id')->join('tailor_infos','tailor_infos.Tailor_id','=','order_infos.Tailor_id')->where('order_infos.Order_id','=',$res->get('id'))->get();
        $data = compact('order');
        return view('viewDetailT')->with($data);
    }
    public function collection()
    {
        $design = Design_info::where('Tailor_id','=',session('tid'))->get();
        $data = compact('design');
        return view('collection')->with($data);
    }
}
