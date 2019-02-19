<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Post;
use DB;
class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public $statusCode = 200;
    public $result = false;
    public $message = 'Error in the request';
    public $records = array();

    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    public function postBySlug($slug)
    {
        try {
            $records = Post::whereHas('film', function($q) use($slug){
                $q->where('slug', $slug);
            })->orderBy('comment_date', 'desc')->with('user')->get();
            
            $this->status_code = 200;
            $this->result      = true;
            $this->message     = 'Registros consultados correctamente';
            $this->records     = $records;
        } catch (\Exception $e) {
            $this->status_code = 400;
            $this->result      = false;
            $this->message     = env('APP_DEBUG')?$e->getMessage():$this->message;
        }finally{
            $response = [
                'result'  => $this->result,
                'message' => $this->message,
                'records' => $this->records,
            ];

            return response()->json($response, $this->status_code);
        }
    }

    public function store(Request $request)
    {
        try{
            $post = DB::transaction(function() use ($request)
            {
                $post = Post::create(
                    [
                        'user_id'     => $request->input('user_id'),
                        'film_id'     => $request->input('film_id'),
                        'comment'     => $request->input('comment'),
                        'comment_date'=> date("Y-m-d H:m:s")
                    ]);

                if(!$post)
                {
                    throw new \Exception('An error has occurred');
                }else
                {
                    return $post;
                }
            });

            $this->statusCode = 200;
            $this->message    = "Post created";
            $this->result     = true;
            $this->records    = $post;
        }
        catch(\Exception $ex)
        {
            $this->statusCode = 200;
            $this->message    = 'Something went wrong';
            $this->result     = false;
        }
        finally
        {
            $response =
            [
                'message' => $this->message,
                'result'  => $this->result,
                'records' => $this->records,
            ];
            return response()->json($response, $this->statusCode);
        }
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
