<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

class MyController extends Controller
{
    public function XinChao () {
        echo "Hi everyone";
    }
    public function KhoaHoc ($ten) {
        echo "Tên khóa học: ".$ten;
        return redirect()->route('DinhDanh');
    }

    public function GetUrl (Request $request) {
        if ($request->isMethod('get')) {
            echo "phương thức get";
        } else echo "k phải get";
    }
    public function postForm (Request $request) {
        echo "Your info: ";
        echo $request->input('HoTen');
        echo $request->input('Tuoi');
    }

    public function setCookie () {
        $response = new Response();
        $response->withCookie('NameCookie', 'Value', 1); // Tên cookie, giá trí, thời gian tồn tại của cookie
        echo "Đã set cookie";
        return $response;
    }

    public function getCookie (Request $request) {
        echo "Your cookie:";
        return $request->cookie('NameCookie');
    }

    public function postFile (Request $request) {
        if ($request->hasFile('myFile')) {
            $file = $request->file('myFile');
            if ($file->getClientOriginalExtension('myFile') == 'jpg' || $file->getClientOriginalExtension('myFile') == 'JPG') {
                $filename = $file->getClientOriginalName('myFile');
                $file->move('images', $filename);
                echo "Đã lưu file" .$filename;
            } else echo "Sai định dạng";
        } else echo "Không có file";
    }

    public function getJson () {
        $array = ['name' => 'Chieu'];
        return response()->json($array);
    }

    public function myView () {
        return view('view.HoangChieu');
    }

    public function Time ($t) {
        return view('myView', ['t'=>$t]);
    }
    public function blade ($str) {
        if ($str == 'laravel') {
            return view('pages.laravel');
        } elseif ($str == 'pageOne') {
            return view('pages.pageOne');
        } else echo "page not found";
    }
}
