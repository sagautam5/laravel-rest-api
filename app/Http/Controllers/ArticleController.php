<?php

namespace App\Http\Controllers;

use App\Article;

use Illuminate\Http\Request;
use App\Http\Requests\ArticleRequest;

class ArticleController extends ApiController
{
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
     * @param  use Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(ArticleRequest $request)
    {
        try{
            $article  =  new Article();
            $article->title = $request->input('title');
            $article->body = $request->input('body');
            $article->save();

            $result['data'] = $article->toArray();
            $result['status'] = true;

        }catch(\Exception $e){
            $result['status'] = false;
            $result['message'] = 'Operation failed due to '. $e->getMessage();
        }
        
        if($result['status']){
            return $this->success($result['data']);
        }else{
            return $this->fail($result['message']);
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
     * Update the specified resource in storage.
     *
     * @param  use Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ArticleRequest $request, $id)
    {
        try{
            $article  =  Article::find($id);
            if(!$article){
                return $this->notFound('Article not found !');
            }
            $input['title'] = $request->input('title');
            $input['body'] = $request->input('body');

            $article->update($input);

            $result['data'] = $article->toArray();
            $result['status'] = true;

        }catch(\Exception $e){
            dd($e);
            $result['status'] = false;
            $result['message'] = 'Operation failed due to '. $e->getMessage();
        }

        if($result['status']){
            return $this->success($result['data']);
        }else{
            return $this->fail($result['message']);
        }
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
