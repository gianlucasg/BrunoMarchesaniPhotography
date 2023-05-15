<?php

namespace App\Http\Controllers;

use App\Models\Albums;
use App\Models\Imagenes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Inertia\Inertia;
use Intervention\Image\ImageManagerStatic as Image;
use App\Models\Admin;
use Illuminate\Support\Str;
use Jenssegers\Agent\Agent;


class AlbumsController extends Controller
{
	public function getAlbumsGaleria(Request $request){
		$agent = new Agent();
		if($request->path() == 'historias') {
			$albums = Albums::where('galeria_id', 1)->orderby('created_at', 'desc')->Paginate(16);
			$pagina = Admin::where('id',3)->get();

        }
        if($request->path() == 'proyectos') {
			$albums = Albums::where('galeria_id', 2)->orderby('created_at', 'desc')->Paginate(16);
			$pagina = Admin::where('id',4)->get();

    	}
        if($request->path() == 'viajes') {
			$albums = Albums::where('galeria_id', 3)->orderby('created_at', 'desc')->Paginate(16);
			$pagina = Admin::where('id',5)->get();

		}

		if($agent->isMobile() || $agent->isTablet()){
			return Inertia::render('galeria/AlbumsDevice', [ 'albums' => $albums,'data' => $pagina ]);
		}
		if($agent->isDesktop()){

			return Inertia::render('galeria/Albums', [ 'albums' => $albums,'data' => $pagina ]);
		}

	}

public function getAlbumsGaleriaData(Request $request){
	if($request->path() == 'historias/data') {
		$albums = Albums::where('galeria_id', 1)->orderby('created_at', 'desc')->Paginate(16);
	}
	if($request->path() == 'proyectos/data') {
		$albums = Albums::where('galeria_id', 2)->orderby('created_at', 'desc')->Paginate(16);
	}
	if($request->path() == 'viajes/data') {
		$albums = Albums::where('galeria_id', 3)->orderby('created_at', 'desc')->Paginate(16);
	}
	return response()->json($albums);
}

    public function index(Request $request){

        if($request->path() == 'admin/historias') {
            $albumspagi = Albums::where('galeria_id', 1)->orderby('created_at', 'desc')->Paginate(16);
			return Inertia::render('adminPaginas/Historias', [ 'albumspagi' => $albumspagi ]);
        }
        if($request->path() == 'admin/proyectos') {
        	$albumspagi = Albums::where('galeria_id', 2)->orderby('created_at', 'desc')->Paginate(16);
			return Inertia::render('adminPaginas/Proyectos', [ 'albumspagi' => $albumspagi ]);
    	}
        if($request->path() == 'admin/viajes') {
        	$albumspagi = Albums::where('galeria_id', 3)->orderby('created_at', 'desc')->Paginate(16);
            return Inertia::render('adminPaginas/Viajes', [ 'albumspagi' => $albumspagi ]);
        }
    }

	public function AlbumGetdata(Request $request){

		if($request->path() == 'admin/historias/data') {
			$albumspagi = Albums::where('galeria_id', 1)->orderby('created_at', 'desc')->Paginate(16);
		}
		if($request->path() == 'admin/proyectos/data') {
			$albumspagi = Albums::where('galeria_id', 2)->orderby('created_at', 'desc')->Paginate(16);
		}
		if($request->path() == 'admin/viajes/data') {
			$albumspagi = Albums::where('galeria_id', 3)->orderby('created_at', 'desc')->Paginate(16);
		}
		return response()->json($albumspagi);
   }


    public function store(Request $request){

        if ($file=$request->file('input-file')) {

		  $album = new Albums;

		  $random1 = Str::random(40);
		  $random2 = Str::random(40);

		  $nombre=time()."_".$random1.$random2.".".$file->getClientOriginalExtension();
		  $auxnombre=time()."_".$random1.$random2;
		  $nombrelowres = $auxnombre."Lowres.".$file->getClientOriginalExtension();
		  $image = Image::make($file)->resize(300, null,function ($constraint) {
    			$constraint->aspectRatio();
		  });

            if($request->path() == 'admin/historias') {
                $path_foto = $file->storeAs('public/historias',$nombre,"public");
                $album->galeria_id=1;
				$image->save("storage/public/historias/".$nombrelowres);
				$path_foto_low='public/historias/'.$nombrelowres;

            }
            if($request->path() == 'admin/proyectos') {
                $path_foto = $file->storeAs('public/proyectos',$nombre,"public");
                $album->galeria_id=2;
				$image->save("storage/public/proyectos/".$nombrelowres);
				$path_foto_low='public/proyectos/'.$nombrelowres;
            }
            if($request->path() == 'admin/viajes') {
                $path_foto = $file->storeAs('public/viajes',$nombre,"public");
                $album->galeria_id=3;
				$image->save("storage/public/viajes/".$nombrelowres);
				$path_foto_low='public/viajes/'.$nombrelowres;
            }

		  $album->colorbarrasuperior=$request->colorpicker;
          $album->titulo=$request->titulo;
		  $album->path_foto=$path_foto;
		  $album->path_foto_low=$path_foto_low;
		  $album->path_texto=$request->texto;
          $album->save();
          return response()->json($album);
        }

    }

	public function edit(Request $request){

		$album = Albums::firstWhere('id', $request->id);
		if($album) {
		  if($file=$request->file('input-file')){

			$random1 = Str::random(40);
			$random2 = Str::random(40);

			$nombre=time()."_".$random1.$random2.".".$file->getClientOriginalExtension();
			$auxnombre=time()."_".$random1.$random2;
			$nombrelowres = $auxnombre."Lowres.".$file->getClientOriginalExtension();
			  $image = Image::make($file)->resize(300, null,function ($constraint) {
	    			$constraint->aspectRatio();
			  });
			  if($request->post == '/admin/historias'){
				  $path_foto = $file->storeAs('public/historias',$nombre,"public");
				  $image->save("storage/public/historias/".$nombrelowres);
				  $path_foto_low='public/historias/'.$nombrelowres;
			  }
			  if($request->post == '/admin/proyectos'){
				  $path_foto = $file->storeAs('public/proyectos',$nombre,"public");
				  $image->save("storage/public/proyectos/".$nombrelowres);
				  $path_foto_low='public/proyectos/'.$nombrelowres;
			  }
			  if($request->post == '/admin/viajes'){
				  $path_foto = $file->storeAs('public/viajes',$nombre,"public");
				  $image->save("storage/public/viajes/".$nombrelowres);
				  $path_foto_low='public/viajes/'.$nombrelowres;
			  }

	 		 Storage::disk('public')->delete($album["path_foto_low"]);
			 Storage::disk('public')->delete($album["path_foto"]);    //elimina la vieja foto de storage
			 $album->path_foto=$path_foto;
			 $album->path_foto_low=$path_foto_low;
		  }

		  $album->colorbarrasuperior=$request->colorpicker;
          $album->titulo=strval($request->titulo);
          $album->path_texto=strval($request->texto);
          $album->save();
		}
	}

	public function create(){}

    public function show(Albums $albums){}


    public function update(Request $request, Albums $albums){}

    public function destroy(Request $request){

		$album = Albums::firstWhere('id', $request->id);
		Albums::where('id', '=', $request->id)->delete();
		Storage::disk('public')->delete($album["path_foto"]);
		error_log($album["path_foto_low"]);
		Storage::disk('public')->delete($album["path_foto_low"]);


		$imagen = Imagenes::where('album_id', '=', $album["id"])->get();
		if(count($imagen) != 0) {  //album tiene imagenes
			foreach ($imagen as $img) {
				Imagenes::destroy($img["id"]);
				Storage::disk('public')->delete($img["path_foto"]);

				Storage::disk('public')->delete($img["path_foto_low"]);

			}
		}

	}
	public function imagenesAlbumGetGuest(Request $request){
		$id = $request->route('id');
		$agent = new Agent();
		$imagenes = Imagenes::where('album_id',$id)->orderby('created_at', 'desc')->Paginate(16);
		$albumdata = Albums::where('id',$id)->orderby('created_at', 'desc')->get();
		if($request->path() == 'historias/'.$id){
			$config = Admin::where('id',3)->orderby('created_at', 'desc')->get();
		}
		if($request->path() == 'proyectos/'.$id){
			$config = Admin::where('id',4)->orderby('created_at', 'desc')->get();
		}
		if($request->path() == 'viajes/'.$id){
			$config = Admin::where('id',5)->orderby('created_at', 'desc')->get();
		}

		if($agent->isMobile() || $agent->isTablet()){
			return Inertia::render('galeria/ImagenesAlbumsDevice', [ 'imagenes' => $imagenes ,'albumdata' => $albumdata,'config' => $config, 'id' => $id,
			'mobile' => $agent->isMobile(),'tablet' => $agent->isTablet()]);
		}
		if($agent->isDesktop()){

			return Inertia::render('galeria/ImagenesAlbums', [ 'imagenes' => $imagenes ,'albumdata' => $albumdata,'config' => $config, 'id' => $id]);
		}
    }

	public function imagenesAlbumGetGuestData(Request $request){
		$id = $request->id;
		error_log("fijate esto aca");
		error_log($request->id);
		$imagenes = Imagenes::where('album_id',$id)->orderby('created_at', 'desc')->Paginate(16);

		return response()->json($imagenes);
    }
}
