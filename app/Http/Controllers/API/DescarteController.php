<?php


namespace App\Http\Controllers\API;


use Illuminate\Http\Request;
use App\Http\Controllers\API\BaseController as BaseController;
use App\Descarte;
use Validator;


class DescarteController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $descartes = Descarte::all();


        return $this->sendResponse($descartes->toArray(), 'Descartes Recuperados com Sucesso.');
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->all();


        $validator = Validator::make($input, [
            'tipo' => 'required',
            'volume' => 'required',
	    'quantidade' => 'required'
        ]);


        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());       
        }


        $descarte = Descarte::create($input);


        return $this->sendResponse($descarte->toArray(), 'Descarte criado com sucesso.');
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $descarte = Descarte::find($id);


        if (is_null($descarte)) {
            return $this->sendError('Descarte não encontrado.');
        }


        return $this->sendResponse($descarte->toArray(), 'Descarte recuperado com sucesso.');
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Descarte $descarte)
    {
        $input = $request->all();


        $validator = Validator::make($input, [
            'tipo' => 'required',
            'volume' => 'required',
	    'quantidade' => 'required'
        ]);


        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());       
        }


        $descarte->tipo = $input['tipo'];
        $descarte->volume = $input['volume'];
        $descarte->quantidade = $input['quantidade'];
        $descarte->save();


        return $this->sendResponse($descarte->toArray(), 'Descarte atualizado com sucesso.');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Descarte $descarte)
    {
        $descarte->delete();


        return $this->sendResponse($descarte->toArray(), 'Descarte Apagado com sucesso.');
    }
}
