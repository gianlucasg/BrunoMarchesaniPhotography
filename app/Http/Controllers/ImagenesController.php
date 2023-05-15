<?php

namespace App\Http\Controllers;

use App\Models\Imagenes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Inertia\Inertia;
use Intervention\Image\ImageManagerStatic as Image;
use App\Models\Admin;
use Illuminate\Support\Str;
use Jenssegers\Agent\Agent;


class ImagenesController extends Controller
{
	public function galeriaIndividuales(){
		$agent = new Agent();
		$imagenes = Imagenes::where('album_id', 0)->orderby('created_at', 'desc')->Paginate(16);
		$pagina = Admin::where('id',2)->get();
			
			if($agent->isMobile() || $agent->isTablet()){
				return Inertia::render('galeria/IndividualesDevice', [ 'albums' => $imagenes, 'data' => $pagina,
				'mobile' => $agent->isMobile(),'tablet' => $agent->isTablet()]);
			}
			if($agent->isDesktop()){
				
				return Inertia::render('galeria/Individuales', [ 'albums' => $imagenes, 'data' => $pagina]);
			}
		}

	public function getIndividualesGaleriaData(Request $request){
		if($request->path() == 'individuales/data') {
			$imagenes = Imagenes::where('album_id', 0)->orderby('created_at', 'desc')->Paginate(16);
		}
		return response()->json($imagenes);
	}


    public function index(){
		$imagenes = Imagenes::where('album_id', 0)->orderby('created_at', 'desc')->Paginate(16);
		return Inertia::render('adminPaginas/Individuales', [ 'imagns' => $imagenes]);
    }

   public function indexData(){
	   $imagenes = Imagenes::where('album_id', 0)->orderby('created_at', 'desc')->Paginate(16);
	   return response()->json($imagenes);
   }


    public function almacenarImagen(Request $request,$id){
        if ($file=$request->file('input-file')) {

            $random1 = Str::random(40);
			$random2 = Str::random(40);

			$nombre=time()."_".$random1.$random2.".".$file->getClientOriginalExtension();
			$auxnombre=time()."_".$random1.$random2;
			$nombrelowres = $auxnombre."Lowres.".$file->getClientOriginalExtension();
  		  	$image = Image::make($file)->resize(300, null,function ($constraint) {
      			$constraint->aspectRatio();
  		  	});

            if($request->path() == 'admin/individuales') {
                $path_foto = $file->storeAs('public/individuales',$nombre,"public");
				$image->save("storage/public/individuales/".$nombrelowres);
				$path_foto_low='public/individuales/'.$nombrelowres;
            }
            if($request->path() == ('admin/historias/'.$id) ) {
                $path_foto = $file->storeAs('public/historias',$nombre,"public");
				$image->save("storage/public/historias/".$nombrelowres);
				$path_foto_low='public/historias/'.$nombrelowres;
            }

            if($request->path() == 'admin/proyectos/'.$id) {
                $path_foto = $file->storeAs('public/proyectos',$nombre,"public");
				$image->save("storage/public/proyectos/".$nombrelowres);
				$path_foto_low='public/proyectos/'.$nombrelowres;
            }

            if($request->path() == 'admin/viajes/'.$id) {
                $path_foto = $file->storeAs('public/viajes',$nombre,"public");
				$image->save("storage/public/viajes/".$nombrelowres);
				$path_foto_low='public/viajes/'.$nombrelowres;
            }


          $foto = new Imagenes;
          $foto->album_id=$id;
          $foto->titulo=$request->titulo;
		  $foto->path_foto=$path_foto;
		  $foto->path_foto_low=$path_foto_low;
          $foto->path_texto=$request->texto;
          $foto->save();
        }
    }

    public function store(){}

    public function storeIndividual(Request $request){
       $this->almacenarImagen($request,0);
    }

    public function storeAlbums(Request $request){

        $this->almacenarImagen($request,$request->route('id'));
    }

    public function show(){
        $imagenes = Imagenes::all();
        return view('individuales')->with('individuales',$imagenes);
    }

    public function imagenesAlbumGet(Request $request){
        $id = $request->route('id');
        $imagenes = Imagenes::where('album_id',$id)->orderby('created_at', 'desc')->Paginate(16);
		return Inertia::render('adminPaginas/ImagenesAlbum', [ 'imagns' => $imagenes ,'id' => $id]);
    }

    public function imagenesAlbumGetdata(Request $request){
		$id = $request->route('id');
        $imagenes = Imagenes::where('album_id',$id)->orderby('created_at', 'desc')->Paginate(16);
		return response()->json($imagenes);
    }

	public function edit(Request $request){
		$imagen = Imagenes::firstWhere('id', $request->id);
		if($imagen) {
		  if($file=$request->file('input-file')){

			$random1 = Str::random(40);
			$random2 = Str::random(40);

			$nombre=time()."_".$random1.$random2.".".$file->getClientOriginalExtension();
			$auxnombre=time()."_".$random1.$random2;
			$nombrelowres = $auxnombre."Lowres.".$file->getClientOriginalExtension();
   		  	 $image = Image::make($file)->resize(300, null,function ($constraint) {
       			$constraint->aspectRatio();
   		  	 });

			 if($request->post == '/admin/individuales'){
				 $path_foto = $file->storeAs('public/individuales',$nombre,"public");
				 $image->save("storage/public/individuales/".$nombrelowres);
				 $path_foto_low='public/individuales/'.$nombrelowres;
			 }
			 if($request->post == ('/admin/historias/'.$imagen["album_id"])){
				 $path_foto = $file->storeAs('public/historias',$nombre,"public");
				 $image->save("storage/public/historias/".$nombrelowres);
				 $path_foto_low='public/historias/'.$nombrelowres;
			 }
			 if($request->post == ('/admin/proyectos/'.$imagen["album_id"])){
				 $path_foto = $file->storeAs('public/proyectos',$nombre,"public");
				 $image->save("storage/public/proyectos/".$nombrelowres);
				 $path_foto_low='public/proyectos/'.$nombrelowres;
			 }
			 if($request->post == ('/admin/viajes/'.$imagen["album_id"])){
				 $path_foto = $file->storeAs('public/viajes',$nombre,"public");
				 $image->save("storage/public/viajes/".$nombrelowres);
				 $path_foto_low='public/viajes/'.$nombrelowres;
			 }


	 		 Storage::disk('public')->delete($imagen["path_foto_low"]);
			 Storage::disk('public')->delete($imagen["path_foto"]);    //elimina la vieja foto de storage
			 $imagen->path_foto=$path_foto;
			 $imagen->path_foto_low=$path_foto_low;
		  }

          $imagen->titulo=$request->titulo;
          $imagen->path_texto=$request->texto;
          $imagen->save();
		}
	}

	public function create(){}


    public function update(Request $request, Imagenes $imagenes){}

    public function destroy(Request $request){
		$imagen = Imagenes::firstWhere('id', $request->id);
		Imagenes::where('id', '=', $request->id)->delete();
		Storage::disk('public')->delete($imagen["path_foto"]);
		Storage::disk('public')->delete($imagen["path_foto_low"]);
	}

}
