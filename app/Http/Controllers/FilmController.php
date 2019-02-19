<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Film;
use App\GenreFilm;
use DB;

class FilmController extends Controller
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

    public function getFilms()
    {
        try{

            $films = Film::all();
            if($films){
                $this->statusCode = 200;
                $this->result = true;
                $this->message = 'Success';
                $this->records = $films;
            }else{
                $this->statusCode = 200;
                $this->result = false;
                $this->message = 'The movies could not be obtained';
            }
        }catch(\Exception $ex){
            $this->statusCode = 200;
            $this->result = false;
            $this->message = env('APP_DEBUG') ? $e->getMessage() : $this->message;
        }finally{
            $response=[
                'message' => $this->message,
                'result'  => $this->result,
                'records' => $this->records
            ];
            return response()->json($response, $this->statusCode);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try{
            $film = DB::transaction(function() use ($request)
            {
                $film = Film::create(
                    [
                        'name'         => $request->input('name'),
                        'description'  => $request->input('description'),
                        'release_date' => date("Y-m-d H:m:s", strtotime($request->input('release_date'))),
                        'rating'        => $request->input('rating'),
                        'ticket_price'    => $request->input('ticket_price'),
                        'country_id'       => $request->input('country_id'),
                        'photo'       => $request->input('photo'),
                        'slug'       => $request->input('slug'),
                    ]);

                if(!$film)
                {
                    throw new \Exception('An error has occurred');
                }else
                {
                    return $film;
                }
            });

            $this->statusCode = 200;
            $this->message    = "Film created successfully";
            $this->result     = true;
            $this->records    = $film;
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

   public function filmBySlug($slug)
    {
        try {
            $records = Film::whereHas('GenreFilm', function($q) use($slug){
                $q->where('slug', $slug);
            })->with('GenreFilm.genre', 'post', 'post.user')->get();
            
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
