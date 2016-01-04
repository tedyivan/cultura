<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use DB;
use App\Produto;
use App\Categoria;
use App\Image;
use Validator;
class ProdutoController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
		$produtos = Produto::paginate(10);
		return view('produto.list-adm-produto',compact('produtos'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create(Produto $produto, Categoria $categoria)
	{
		//
		$categorias = $categoria->get();

		return view('produto.add-produto',compact('categorias'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
		//
		/*
		$produto = Produto::create([
			'nome'=>Input::get('nome'),
			'preco'=>Input::get('preco'),
			'descricao'=>Input::get('descricao'),
			'categoria_id'=>Input::get('categoria_id')

		]);
		*/
		//salvamento do produtoo ok
/*
		$produto= new Produto;

		$produto->nome =$request->input('nome');
		$produto->preco =$request->input('preco');
		$produto->descricao=$request->input('descricao');
		$produto->categoria_id=$request->input('categoria_id');




		$produto->save();//well saved
		var_dump('produto salvo');

		//salvamento da imagem
			// Validation //
     

      $image = new Image;

      // upload the image //
      $file = $request->file('userfile');
      $destination_path = 'uploads/';
      $filename = str_random(6).'_'.$file->getClientOriginalName();
      $file->move($destination_path, $filename);
      
      // save image data into database //
      $image->file = $destination_path . $filename;
      $image->caption = $request->input('nome');
      $image->description = $request->input('descricao');
     //////adicionado
      $image->produto_id= $request->input('produto_id');

      $image->save();

      var_dump('imagem salva');
*/

		$produto= new Produto;

		$produto->nome =$request->input('nome');
		$produto->preco =$request->input('preco');
		$produto->descricao=$request->input('descricao');
		$produto->categoria_id=$request->input('categoria_id');
		$produto->isexist="true";
		$produto->save();

		$image = new Image;

     	 // upload the image //
      	$file = $request->file('userfile');
      	$destination_path = 'uploads/';
      	$filename = str_random(6).'_'.$file->getClientOriginalName();
      	$file->move($destination_path, $filename);
      
      	// save image data into database //
      	$image->file = $destination_path . $filename;
      	$image->caption = $request->input('nome');
      	$image->isexist="true";
      	
	      	
      	$image->produto()->associate($produto);
      	
      	$image->save();

      //	$produto->images()->save($image);


      	return view('produto.list-adm-produto');
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
		$produto =Produto::find($id);
		$image = Image::whereProduto_id($produto->id)->first();
         return view('produto.show-produto',compact('produto','image'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
		$produto =Produto::find($id);
		return view('produto.edit-produto',compact('produto'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
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
