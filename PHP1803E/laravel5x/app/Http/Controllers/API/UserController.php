<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use \Firebase\JWT\JWT;
//define('TOKEN_KEY', 'lphp1803e');
class UserController extends Controller
{
    private $tokenKey = 'lphp1803e';
    //const TOKEN_KEY = 'lphp1803e';
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, JWT $jwt)
    {
        $token = $request->header('Authorization');
        //kiem tra token co hop le hay ko 
        $decodeToken = $jwt->decode($token,$this->tokenKey,array('HS256'));
        $mess = [];
        $mess['mess'] = '';
        if($decodeToken){
            $data = $request->data;
            $user = $data['username'];
            $pass = $data['password'];
            $mess['mess'] = DB::table('admins')->where([
                'username' => $user,
                'password' => md5($pass)
            ])->first();

        }
        return response()->json($mess);
        //return response()->json($decodeToken);
        //$data = $request->data;
        //return response()->json($data);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id, Request $request)
    {
        //$test = $request->all();
        $idData = $request->header('id');
        //return response()->json($id);
        $data = DB::table('admins')->where('id',$idData)->first();
        return response()->json($data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id,JWT $jwt)
    {
         $token = $request->header('Authorization');
        //dd($token);
        //kiem tra token
        $decodeToken = $jwt->decode($token,$this->tokenKey,array('HS256'));
        $mess = [];
        $mess['result'] = '';
        if($decodeToken){
            $id = $request->header('id');
            $id = is_numeric($id) ? $id : 0;
            $data = $request->data;
            $pass = md5($data['password']);
            if($id>0){
                $mess['result'] = DB::table('admins')->where('id',$id)->update(['password'=>$pass]);           }

        }
        return response()->json($mess);
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, Request $request, JWT $jwt)
    {
        $token = $request->header('Authorization');
        //dd($token);
        //kiem tra token
        $decodeToken = $jwt->decode($token,$this->tokenKey,array('HS256'));
        $mess = [];
        $mess['result'] = '';
        if($decodeToken){
            $id = $request->header('id');
            $id = is_numeric($id) ? $id : 0;
            if($id>0){
                $mess['result'] = DB::table('admins')->where('id',$id)->delete();
            }

        }
        return response()->json($mess);
    }
}
