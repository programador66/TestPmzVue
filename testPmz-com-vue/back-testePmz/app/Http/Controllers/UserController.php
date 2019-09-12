<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\UserService;
use Illuminate\Support\Facades\Validator;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    const SUCCESS = 'success';
    const DATA = 'data';
    const MESSAGE = 'message';
    const ERROR = 'error';
    /*
    *@var UserService;  
    */
    private $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }
    public function index()
    {
       $response = $this->userService->userList();

       return Response()->json([
            self::SUCCESS => true,
            self::DATA => $response[self::DATA]
       ]);
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'nome' => 'required',
            'registro' => 'required'
        ]);
        if ($validator->fails()) {
           
            return Response()->json([
                self::SUCCESS => false,
                self::MESSAGE => $validator->errors()
            ],500);
               
        }
        $response = $this->userService->userInsert($request['nome'],$request['registro']);

        if (!$response[self::SUCCESS]) {
            return Response()->json([
                self::SUCCESS => false,
                self::MESSAGE => $response[self::ERROR]
           ],500);
        }
       return Response()->json([
            self::SUCCESS => true,
            self::MESSAGE => $response[self::MESSAGE]
       ],200);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $response = $this->userService->userUpdate($request['id'],$request['nome'],$request['registro']);

        if (!$response[self::SUCCESS]) {
            return Response()->json([
                self::SUCCESS => false,
                self::MESSAGE => $response[self::ERROR]
           ],500);
        }
       return Response()->json([
            self::SUCCESS => true,
            self::MESSAGE => $response[self::MESSAGE]
       ],200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $response = $this->userService->userDelete($request['id']);

        if (!$response[self::SUCCESS]) {
            return Response()->json([
                self::SUCCESS => false,
                self::MESSAGE => $response[self::ERROR]
           ],500);
        }
       return Response()->json([
            self::SUCCESS => true,
            self::MESSAGE => $response[self::MESSAGE]
       ],200);
    }

    /**
     * @param  int  $id
     * @return usuario restaurado
     */
    public function restore(Request $request)
    {   
        
        $response = $this->userService->userRestore($request['id']);

        if (!$response[self::SUCCESS]) {
            return Response()->json([
                self::SUCCESS => false,
                self::MESSAGE => $response[self::ERROR]
           ],500);
        }
       return Response()->json([
            self::SUCCESS => true,
            self::MESSAGE => $response[self::MESSAGE]
       ],200);
    } 
}
