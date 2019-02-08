<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Users;

class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public $statusCode  = 200;
    public $result      = false;
    public $message     = 'Error al procesar solicitud';
    public $records     =  array();

    public function index()
    {
        //
    }

    public function login(Request $request){

        try{
            $user = Users::where('email', $request->get('email'))->first();
            if($user){
               //if($request->get('password') == $user->password){
                if (\Hash::check($request->input('password'), $user->password)) {
                    $this->statusCode = 200;
                    $this->result     = true;
                    $this->message    = 'Usuario y contrasenia correctos';
                    $this->records    = $user;
                }else{
                    $this->statusCode = 200;
                    $this->result     = false;
                    $this->message    = 'Contrasenia incorrecta';
                }
            }else{
                $this->statusCode   = 200;
                $this->result       = false;
                $this->message      = 'El usuario no existe';
            }
        }catch(\Exception $ex){
            $this->statusCode   = 200;
            $this->result       = false;
            $this->message      = env('APP_DEBUG') ? $e->getMessage() : $this->message;
        }finally{
            $response=[
                'message'       => $this->message,
                'result'        => $this->result,
                'records'       => $this->records
            ];
            return response()->json($response, $this->statusCode);
        }        
    }

    public function createUser(Request $request){
        try {
            \Debugbar::info("hola");
            $validation = Users::where('email',$request->input('email'))->first();
            if ($validation) {
                throw new \Exception('User email is already in use.');
            } else {
                    $record = Users::create([
                        'name'               => $request->input('name'),                           
                        'email'              => $request->input('email'),
                        'password'             => \Hash::make($request->input('password'))
                    ]);

                    if ($record) {
                        $this->status_code  = 200;
                        $this->result       = true;
                        $this->message      = 'Welcome, user created correctly.';
                        $this->records      = $record;
                    } else {
                        throw new \Exception('User could not be created');
                    }

            }
        } catch (\Exception $e) {
            $this->status_code  = 400;
            $this->result       = false;
            $this->message      = env('APP_DEBUG') ? $e->getMessage() : $this->message;
        } finally {
            $response = [
                'result'  => $this->result,
                'message' => $this->message,
                'records' => $this->records,
            ];
            return response()->json($response, $this->status_code);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
