<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use DB;
use App\Produto;
use App\Categoria;
use App\Image;
use Validator;
use Auth;



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
		//$categorias = Categoria::paginate(10);
		$images = Image::all();
		$categorias = Categoria::all();
		//own query
		$produtos_imgs=DB::table('produtos')
						->join('images','produtos.id','=','images.produto_id')
						->select('produtos.*','images.file')
						->groupBy('produtos.nome')
						->get();




		if (Auth::check()) {
			
			return view('produto.list-adm-produto',compact('produtos','categorias'));
		} else
		{
			return view('produto.list-produto',compact('produtos','categorias','images','produtos_imgs'));		  
		}

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
		$produto->isExist="true";
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


      	return redirect('/produto');
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
		$images = Image::whereProduto_id($produto->id)->get();
		$categoria_produto = Categoria::find($produto->categoria_id);
         return view('produto.show-produto',compact('produto','images','categoria_produto'));
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
		$categorias = Categoria::all();
		return view('produto.edit-produto',compact('produto','categorias'));
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

		$produto = Produto::whereId($id)->first();

		$produto->nome =$request->get('nome');
		$produto->preco =$request->get('preco');
		$produto->descricao=$request->get('descricao');
		$produto->categoria_id=$request->get('categoria_id');
		$produto->isExist="true";
		
		$produto->save();
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

	/**
	acrescentado pra visualizar produtos com uma categoria especifica

	**/
	public function produtos($categ){

			$categoria = Categoria::whereDesignacao($categ)->first();

			$produtos = Produto::whereCategoria_id($categoria->id)->get();

			$produtos_imgs=DB::table('produtos')
						->where('categoria_id','=',$categoria->id)
						->join('images','produtos.id','=','images.produto_id')
						->select('produtos.*','images.file')
						->groupBy('produtos.nome')
						->get();




			return view('produto.list-produto',compact('produtos','categorias','images','produtos_imgs'));

	}



}
