<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\c1;
use App\Http\Controllers\adminC;
use App\Http\Controllers\tailorC;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Not Protected Admin

Route::post('/logA',[adminC::class,'login']);

// Protected Admin

Route::get('/logoutA',function(){
    session()->forget('aname');
    session()->forget('aid');
    return redirect('/admin');
})->middleware('guardA');

Route::get('/homeA', function () {
    return view('adminnavbar');
})->middleware('guardA');


Route::get('/mats',[adminC::class,'mats'])->middleware('guardA');
Route::post('/addMats',[adminC::class,'addMats'])->middleware('guardA');
Route::get('/editMats',[adminC::class,'editMats'])->middleware('guardA');
Route::post('/updtMats',[adminC::class,'updtMats'])->middleware('guardA');
Route::get('/delMats',[adminC::class,'delMats'])->middleware('guardA');

Route::get('/pattern',[adminC::class,'patterns'])->middleware('guardA');
Route::post('/addPattern',[adminC::class,'addPattern'])->middleware('guardA');
Route::get('/editPattern',[adminC::class,'editPattern'])->middleware('guardA');
Route::post('/updtPattern',[adminC::class,'updtPattern'])->middleware('guardA');
Route::get('/delPattern',[adminC::class,'delPattern'])->middleware('guardA');

Route::get('/collar',[adminC::class,'collars'])->middleware('guardA');
Route::post('/addCollar',[adminC::class,'addCollar'])->middleware('guardA');
Route::get('/editCollar',[adminC::class,'editCollar'])->middleware('guardA');
Route::post('/updtCollar',[adminC::class,'updtCollar'])->middleware('guardA');
Route::get('/delCollar',[adminC::class,'delCollar'])->middleware('guardA');

Route::get('/sleeve',[adminC::class,'sleeves'])->middleware('guardA');
Route::post('/addSleeve',[adminC::class,'addSleeve'])->middleware('guardA');
Route::get('/editSleeve',[adminC::class,'editSleeve'])->middleware('guardA');
Route::post('/updtSleeve',[adminC::class,'updtSleeve'])->middleware('guardA');
Route::get('/delSleeve',[adminC::class,'delSleeve'])->middleware('guardA');


Route::get('/city',[adminC::class,'citys'])->middleware('guardA');
Route::post('/addCity',[adminC::class,'addCity'])->middleware('guardA');
Route::get('/editCity',[adminC::class,'editCity'])->middleware('guardA');
Route::post('/updtCity',[adminC::class,'updtCity'])->middleware('guardA');
Route::get('/delCity',[adminC::class,'delCity'])->middleware('guardA');

// Not Protected User
Route::get('/', function () {
    return view('welcome');
});
Route::get('/welcome', function () {
    return view('welcome');
});
Route::get('/admin', function () {
    return view('adminLogin');
});
Route::get('/register', function () {
    return view('register');
});
Route::get('/access', function () {
    return view('accessdenied');
});
Route::get('/regagain', function () {
    return view('alreadyexist');
});
Route::get('/password', function () {
    return view('passworderror');
});
Route::post('/reg',[c1::class,'register']);
Route::post('/log',[c1::class,'login']);


//Protected User
Route::get('/home', function () {
    return view('home');
})->middleware('guard');

Route::get('/addMeas', function () {
    return view('addMeasurment');
})->middleware('guard');

Route::get('/change', function () {
    return view('changePassword');
})->middleware('guard');

Route::get('/logout',function(){
    session()->forget('uname');
    session()->forget('uid');
    return redirect('/');
})->middleware('guard');

Route::post('/addMeasurs',[c1::class,'addMeasurment'])->middleware('guard');
Route::post('/addAddress',[c1::class,'addAddress'])->middleware('guard');
Route::get('/measurment',[c1::class,'measurment'])->middleware('guard');
Route::get('/editMeasur',[c1::class,'editMeasur'])->middleware('guard');
Route::get('/address',[c1::class,'address'])->middleware('guard');
Route::post('/getCity',[c1::class,'getCity'])->middleware('guard');
Route::get('/manage',[c1::class,'profile'])->middleware('guard');
Route::post('/updtMeasurs',[c1::class,'updtMeasur'])->middleware('guard');
Route::post('/updtProfile',[c1::class,'updtProfile'])->middleware('guard');
Route::post('/updtPwd',[c1::class,'updtPassword'])->middleware('guard');
Route::get('/delMeasur',[c1::class,'delMeas'])->middleware('guard');
Route::get('/delAddress',[c1::class,'delAddress'])->middleware('guard');
Route::get('/create',[c1::class,'create'])->middleware('guard');
Route::post('/addDesign',[c1::class,'addDesign'])->middleware('guard');
Route::get('/viewDesign',[c1::class,'viewDesign'])->middleware('guard');
Route::get('/makeReq',[c1::class,'makeReq'])->middleware('guard');
Route::get('/stopReq',[c1::class,'stopReq'])->middleware('guard');
Route::get('/viewOffersU',[c1::class,'viewOffers'])->middleware('guard');
Route::get('/acceptOffer',[c1::class,'acceptOffer'])->middleware('guard');
Route::get('/rejectOffer',[c1::class,'rejectOffer'])->middleware('guard');
Route::get('/viewOffersU/viewTailor',[c1::class,'viewTailor'])->middleware('guard');
Route::get('/pendingOrder/viewTailor',[c1::class,'viewTailor'])->middleware('guard');
Route::get('/orderHistoryU/viewTailor',[c1::class,'viewTailor'])->middleware('guard');
Route::get('/pendingOrder',[c1::class,'pendingOrder'])->middleware('guard');
Route::get('/orderHistoryU',[c1::class,'orderHistory'])->middleware('guard');
Route::get('/pendingOrder/viewDetail',[c1::class,'viewDetail'])->middleware('guard');
Route::get('/orderHistoryU/viewDetail',[c1::class,'viewDetail'])->middleware('guard');
Route::get('/viewCollection',[c1::class,'viewCollection'])->middleware('guard');


// Not Protected Tailor

Route::get('/tailor', function () {
    return view('tailorLogin');
});

Route::get('/registert', function () {
    return view('registerT');
});

Route::post('/regt',[tailorC::class,'registerC']);
Route::post('/logt',[tailorC::class,'login']);

// Protected

Route::get('/logoutT',function(){
    session()->forget('tname');
    session()->forget('tid');
    return redirect('/tailor');
})->middleware('guardT');

Route::get('/homeT', function () {
    return view('tailornavbar');
})->middleware('guardT');

Route::get('/changeT', function () {
    return view('changePasswordT');
})->middleware('guardT');

Route::get('/manageT',[tailorC::class,'profile'])->middleware('guardT');
Route::get('/addressT',[tailorC::class,'address'])->middleware('guardT');
Route::post('/getCityT',[tailorC::class,'getCity'])->middleware('guardT');
Route::post('/addAddressT',[tailorC::class,'addAddress'])->middleware('guardT');
Route::get('/delAddressT',[tailorC::class,'delAddress'])->middleware('guardT');
Route::post('/updtProfileT',[tailorC::class,'updtProfile'])->middleware('guardT');
Route::post('/updtPwdT',[tailorC::class,'updtPassword'])->middleware('guardT');
Route::get('/createT',[tailorC::class,'create'])->middleware('guardT');
Route::post('addDesignT',[tailorC::class,'addDesign'])->middleware('guardT');
Route::get('/offersT',[tailorC::class,'offers'])->middleware('guardT');
Route::get('/offersT/giveOffer',[tailorC::class,'giveOffer'])->middleware('guardT');
Route::post('/offersT/giveOffer/addOffer',[tailorC::class,'addOffer'])->middleware('guardT');
Route::get('/viewOffersT',[tailorC::class,'viewOffers'])->middleware('guardT');
Route::get('/pendingOrderT',[tailorC::class,'pendingOrder'])->middleware('guardT');
Route::get('/finished',[tailorC::class,'finish'])->middleware('guardT');
Route::get('/orderHistoryT',[tailorC::class,'orderHistory'])->middleware('guardT');
Route::get('/orderHistoryT/viewDetailT',[tailorC::class,'viewDetail'])->middleware('guardT');
Route::get('/collection',[tailorC::class,'collection'])->middleware('guardT');
