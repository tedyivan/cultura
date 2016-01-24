<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use DB;
use App\Categoria;
use App\Produto;

class CategoriaController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */

	public function _construct(Categoria $categoria){

		$this->categoria = $categoria;
	}



	public function index(Categoria $categoria)
	{
		//
		$categorias = $categoria->get();

		return view('categoria.list',compact('categorias'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
		
		return view('categoria.add-categoria');

	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
		//
		$categoria = new Categoria;
		$categoria->designacao=$request->input('designacao');
		$categoria->descricao=$request->input('descricao');
		$categoria->isexist="true";
		$categoria->save();

		return redirect('/produto/create');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id, Request $request)
	{
		//
		$categoria = Categoria::whereId($id)->first();

		return view('categoria.edit-categoria',compact('categoria'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id, Request $request)
	{
		//
		$categoria = Categoria::whereId($id)->first();
		$categoria->designacao = $request->get('designacao'); 
		$categoria->descricao =$request->get('descricao');

		$categoria->save();

		return redirect('categoria/');



	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}
