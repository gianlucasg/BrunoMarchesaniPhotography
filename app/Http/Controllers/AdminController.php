<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Admin;
use App\Models\Fuentes;
use Inertia\Inertia;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Str;
use Jenssegers\Agent\Agent;

class AdminController extends Controller {

  public function dispositivoAdmin(){
    $agent = new Agent();
    if($agent->isMobile() || $agent->isTablet()){
			return response()->json(1);
		}
		if($agent->isDesktop()){
			return response()->json(2);
    }
  }

	public function subirFuente(Request $request){

		 $fuente = new Fuentes;
		 $fuente->nombre=$request->nombre;
		 $fuente->intensidad=$request->intensidad;
		 $fuente->origen=$request->origen;
		 $fuente->save();
	}

	public function borrarFuente(Request $request){
		Fuentes::where('id', '=', $request->id)->delete();
	}

	public function bajarFuentes(Request $request){
		$fuentes = Fuentes::get();
		return response()->json($fuentes);
	}

    public function data() {
    	$user = User::where('id', 1)->firstOrFail();
		return response()->json($user);
    }
    public function home(){

      $home = Admin::where('id',1)->get();
      return Inertia::render('Home', [ 'datos' => $home]);
    }
    public function sobremi(){

      $sobremi = Admin::where('id',6)->get();
      $agent = new Agent();
      if($agent->isMobile() || $agent->isTablet()){
        return Inertia::render('SobremiDevice', [ 'data' => $sobremi]);
      }
      if($agent->isDesktop()){
        return Inertia::render('Sobremi', [ 'data' => $sobremi]);
      }
    }
    public function contacto(){

      $contacto = Admin::where('id',7)->get();
      $agent = new Agent();
      if($agent->isMobile() || $agent->isTablet()){
        return Inertia::render('ContactoDevice', [ 'data' => $contacto]);
      }
      if($agent->isDesktop()){
        return Inertia::render('Contacto', [ 'data' => $contacto]);
      }
      return Inertia::render('Contacto', [ 'data' => $contacto]);
    }


    public function configuracion(Request $request){
      $config = Admin::all();
      error_log('soy id');
      error_log($request->id);
      return Inertia::render('adminPaginas/Configuraciones', [ 'config' => $config]);

    }

    public function update(Request $request){

      error_log($request->id);
      $pagina = Admin::firstWhere('id', $request->id);

      if($pagina){
        error_log('entre aca 1');

        if ($request->id == 1){
          error_log('entre aca 2');
          if($file=$request->file('imagenPrincipal')){
            error_log('entre aca 3');
            $random1 = Str::random(40);
            $random2 = Str::random(40);

            $nombre=time()."_".$random1.$random2.".".$file->getClientOriginalExtension();
            $auxnombre=time()."_".$random1.$random2;
            $nombrelowres = $auxnombre."Lowres.".$file->getClientOriginalExtension();
            $image = Image::make($file)->resize(300, null,function ($constraint) {
                $constraint->aspectRatio();
            });

            $foto = $file->storeAs('public/imagenHome',$nombre,"public");
            error_log($foto);
            $image->save("storage/public/imagenHome/".$nombrelowres);
            $foto_low="public/imagenHome/".$nombrelowres;
            if($pagina["imagenPrincipal"] != ""){
              Storage::disk('public')->delete($pagina["imagenPrincipal"]); 
              error_log('elimine imagen principal');
              Storage::disk('public')->delete($pagina["imagenPrincipal_low"]);
              error_log('elimine imagen baja res');
			      }
            $pagina->imagenPrincipal=$foto;
            $pagina->imagenPrincipal_low=$foto_low;

          }

          $pagina->textoPrincipal=$request->textoPrincipal;
          $pagina->colorRedes=$request->colorRedes;
          $pagina->textoNavbar=$request->textoNavbar;
          $pagina->colorBotonUp=$request->colorBotonUp;
          $pagina->textoBotonUp=$request->textoBotonUp;
          $pagina->colorNavM=$request->colorNavM;
          $pagina->textoNavM=$request->textoNavM;

          $pagina->save();
        }

        if ($request->id == 2){
          error_log('entre aca1');

          if($file=$request->file('imagenPrincipal')){

            $random1 = Str::random(40);
            $random2 = Str::random(40);

            $nombre=time()."_".$random1.$random2.".".$file->getClientOriginalExtension();
            $auxnombre=time()."_".$random1.$random2;
            $nombrelowres = $auxnombre."Lowres.".$file->getClientOriginalExtension();
            $image = Image::make($file)->resize(300, null,function ($constraint) {
                $constraint->aspectRatio();
            });

            $foto = $file->storeAs('public/imagenIndividuales',$nombre,"public");
            error_log($foto);
            $image->save("storage/public/imagenIndividuales/".$nombrelowres);
            $foto_low="public/imagenIndividuales/".$nombrelowres;
            if($pagina["imagenPrincipal"] != ""){
              error_log('entre imgen no vacio');
              Storage::disk('public')->delete($pagina["imagenPrincipal"]); 
              error_log('elimine imagen principal');
              Storage::disk('public')->delete($pagina["imagenPrincipal_low"]);
              error_log('elimine imagen baja res');
			      }
            $pagina->imagenPrincipal=$foto;
            $pagina->imagenPrincipal_low=$foto_low;

          }

          $pagina->textoPrincipal=$request->textoPrincipal;
          $pagina->colorFooter=$request->colorFooter;
          $pagina->textoFooter=$request->textoFooter;
          $pagina->textoNavbar=$request->textoNavbar;
          $pagina->colorDiv=$request->colorDiv;
          $pagina->colorCuerpo=$request->colorCuerpo;
          $pagina->textoCuerpo=$request->textoCuerpo;
          $pagina->colorBotonUp=$request->colorBotonUp;
          $pagina->textoBotonUp=$request->textoBotonUp;
          $pagina->colorNavM=$request->colorNavM;
          $pagina->textoNavM=$request->textoNavM;
          $pagina->colorRedes=$request->colorRedes;


          $pagina->save();
        }

        if ($request->id == 3){

          if($file=$request->file('imagenPrincipal')){

            $random1 = Str::random(40);
            $random2 = Str::random(40);

            $nombre=time()."_".$random1.$random2.".".$file->getClientOriginalExtension();
            $auxnombre=time()."_".$random1.$random2;
            $nombrelowres = $auxnombre."Lowres.".$file->getClientOriginalExtension();
            $image = Image::make($file)->resize(300, null,function ($constraint) {
                $constraint->aspectRatio();
            });

            $foto = $file->storeAs('public/imagenHistorias',$nombre,"public");
            error_log($foto);
            $image->save("storage/public/imagenHistorias/".$nombrelowres);
            $foto_low="public/imagenHistorias/".$nombrelowres;
            if($pagina["imagenPrincipal"] != ""){

              Storage::disk('public')->delete($pagina["imagenPrincipal"]); 
              error_log('elimine imagen principal');
              Storage::disk('public')->delete($pagina["imagenPrincipal_low"]);
              error_log('elimine imagen baja res');
			      }
            $pagina->imagenPrincipal=$foto;
            $pagina->imagenPrincipal_low=$foto_low;

          }

          $pagina->textoPrincipal=$request->textoPrincipal;
          $pagina->colorFooter=$request->colorFooter;
          $pagina->textoFooter=$request->textoFooter;
          $pagina->textoNavbar=$request->textoNavbar;
          $pagina->colorDiv=$request->colorDiv;
          $pagina->colorCuerpo=$request->colorCuerpo;
          $pagina->textoCuerpo=$request->textoCuerpo;
          $pagina->colorBotonUp=$request->colorBotonUp;
          $pagina->textoBotonUp=$request->textoBotonUp;
          $pagina->colorNavM=$request->colorNavM;
          $pagina->textoNavM=$request->textoNavM;
          $pagina->colorRedes=$request->colorRedes;

          $pagina->save();
        }

        if ($request->id == 4){
          error_log('entre aca 1');

          if($file=$request->file('imagenPrincipal')){
            $random1 = Str::random(40);
            $random2 = Str::random(40);

            $nombre=time()."_".$random1.$random2.".".$file->getClientOriginalExtension();
            $auxnombre=time()."_".$random1.$random2;
            $nombrelowres = $auxnombre."Lowres.".$file->getClientOriginalExtension();
            $image = Image::make($file)->resize(300, null,function ($constraint) {
                $constraint->aspectRatio();
            });

            $foto = $file->storeAs('public/imagenProyectos',$nombre,"public");
            error_log($foto);
            $image->save("storage/public/imagenProyectos/".$nombrelowres);
            $foto_low="public/imagenProyectos/".$nombrelowres;
            if($pagina["imagenPrincipal"] != ""){
              
              Storage::disk('public')->delete($pagina["imagenPrincipal"]); 
              error_log('elimine imagen principal');
              Storage::disk('public')->delete($pagina["imagenPrincipal_low"]);
              error_log('elimine imagen baja res');
			      }
            $pagina->imagenPrincipal=$foto;
            $pagina->imagenPrincipal_low=$foto_low;

          }

          $pagina->textoPrincipal=$request->textoPrincipal;
          $pagina->colorFooter=$request->colorFooter;
          $pagina->textoFooter=$request->textoFooter;
          $pagina->textoNavbar=$request->textoNavbar;
          $pagina->colorDiv=$request->colorDiv;
          $pagina->colorCuerpo=$request->colorCuerpo;
          $pagina->textoCuerpo=$request->textoCuerpo;
          $pagina->colorBotonUp=$request->colorBotonUp;
          $pagina->textoBotonUp=$request->textoBotonUp;
          $pagina->colorNavM=$request->colorNavM;
          $pagina->textoNavM=$request->textoNavM;
          $pagina->colorRedes=$request->colorRedes;

          $pagina->save();
        }

        if ($request->id == 5){

          if($file=$request->file('imagenPrincipal')){

            $random1 = Str::random(40);
            $random2 = Str::random(40);

            $nombre=time()."_".$random1.$random2.".".$file->getClientOriginalExtension();
            $auxnombre=time()."_".$random1.$random2;
            $nombrelowres = $auxnombre."Lowres.".$file->getClientOriginalExtension();
            $image = Image::make($file)->resize(300, null,function ($constraint) {
                $constraint->aspectRatio();
            });

            $foto = $file->storeAs('public/imagenViajes',$nombre,"public");
            error_log($foto);
            $image->save("storage/public/imagenViajes/".$nombrelowres);
            $foto_low="public/imagenViajes/".$nombrelowres;
            if($pagina["imagenPrincipal"] != ""){
              error_log('entre imgen no vacio');
              Storage::disk('public')->delete($pagina["imagenPrincipal"]); 
              error_log('elimine imagen principal');
              Storage::disk('public')->delete($pagina["imagenPrincipal_low"]);
              error_log('elimine imagen baja res');
			      }
            $pagina->imagenPrincipal=$foto;
            $pagina->imagenPrincipal_low=$foto_low;

          }

          $pagina->textoPrincipal=$request->textoPrincipal;
          $pagina->colorFooter=$request->colorFooter;
          $pagina->textoFooter=$request->textoFooter;
          $pagina->textoNavbar=$request->textoNavbar;
          $pagina->colorDiv=$request->colorDiv;
          $pagina->colorCuerpo=$request->colorCuerpo;
          $pagina->textoCuerpo=$request->textoCuerpo;
          $pagina->colorBotonUp=$request->colorBotonUp;
          $pagina->textoBotonUp=$request->textoBotonUp;
          $pagina->colorNavM=$request->colorNavM;
          $pagina->textoNavM=$request->textoNavM;
          $pagina->colorRedes=$request->colorRedes;

          $pagina->save();
        }

        if ($request->id == 6){

          if($file=$request->file('imagenPrincipal')){

            $random1 = Str::random(40);
            $random2 = Str::random(40);

            $nombre=time()."_".$random1.$random2.".".$file->getClientOriginalExtension();
            $auxnombre=time()."_".$random1.$random2;
            $nombrelowres = $auxnombre."Lowres.".$file->getClientOriginalExtension();
            $image = Image::make($file)->resize(300, null,function ($constraint) {
                $constraint->aspectRatio();
            });

            $foto = $file->storeAs('public/imagenSobremi',$nombre,"public");
            error_log($foto);
            $image->save("storage/public/imagenSobremi/".$nombrelowres);
            $foto_low="public/imagenSobremi/".$nombrelowres;
            if($pagina["imagenPrincipal"] != ""){
              error_log('entre imgen no vacio');
              
              Storage::disk('public')->delete($pagina["imagenPrincipal"]); 
              error_log('elimine imagen principal');
              Storage::disk('public')->delete($pagina["imagenPrincipal_low"]);
              error_log('elimine imagen baja res');
			      }
            $pagina->imagenPrincipal=$foto;
            $pagina->imagenPrincipal_low=$foto_low;

          }
          if($file=$request->file('imagenSecundaria')){

            $random1 = Str::random(40);
            $random2 = Str::random(40);

            $nombre=time()."_".$random1.$random2.".".$file->getClientOriginalExtension();
            $auxnombre=time()."_".$random1.$random2;
            $nombrelowres = $auxnombre."Lowres.".$file->getClientOriginalExtension();
            $image = Image::make($file)->resize(300, null,function ($constraint) {
                $constraint->aspectRatio();
            });

            $foto = $file->storeAs('public/imagenSobremiSecundaria',$nombre,"public");
            error_log($foto);
            $image->save("storage/public/imagenSobremiSecundaria/".$nombrelowres);
            $foto_low="public/imagenSobremiSecundaria/".$nombrelowres;
            if($pagina["imagenSecundaria"] != ""){
              error_log('entre imgen no vacio');
     
              Storage::disk('public')->delete($pagina["imagenSecundaria"]); 
              error_log('elimine imagen principal');
              Storage::disk('public')->delete($pagina["imagenSecundaria_low"]);
              error_log('elimine imagen baja res');
			      }
            $pagina->imagenSecundaria=$foto;
            $pagina->imagenSecundaria_low=$foto_low;

          }

          $pagina->textoPrincipal=$request->textoPrincipal;
          $pagina->colorFooter=$request->colorFooter;
          $pagina->textoFooter=$request->textoFooter;
          $pagina->textoNavbar=$request->textoNavbar;
          $pagina->colorDiv=$request->colorDiv;
          $pagina->colorCuerpo=$request->colorCuerpo;
          $pagina->textoCuerpo=$request->textoCuerpo;
          $pagina->colorBotonUp=$request->colorBotonUp;
          $pagina->textoBotonUp=$request->textoBotonUp;
          $pagina->colorNavM=$request->colorNavM;
          $pagina->textoNavM=$request->textoNavM;

          $pagina->save();
        }

        if ($request->id == 7){

          if($file=$request->file('imagenPrincipal')){

            $random1 = Str::random(40);
            $random2 = Str::random(40);

            $nombre=time()."_".$random1.$random2.".".$file->getClientOriginalExtension();
            $auxnombre=time()."_".$random1.$random2;
            $nombrelowres = $auxnombre."Lowres.".$file->getClientOriginalExtension();
            $image = Image::make($file)->resize(300, null,function ($constraint) {
                $constraint->aspectRatio();
            });

            $foto = $file->storeAs('public/imagenContacto',$nombre,"public");
            error_log($foto);
            $image->save("storage/public/imagenContacto/".$nombrelowres);
            $foto_low="public/imagenContacto/".$nombrelowres;
            if($pagina["imagenPrincipal"] != ""){
              error_log('entre imgen no vacio');
            
              Storage::disk('public')->delete($pagina["imagenPrincipal"]); 
              error_log('elimine imagen principal');
              Storage::disk('public')->delete($pagina["imagenPrincipal_low"]);
              error_log('elimine imagen baja res');
			      }
            $pagina->imagenPrincipal=$foto;
            $pagina->imagenPrincipal_low=$foto_low;

          }
          if($file=$request->file('imagenSecundaria')){

            $random1 = Str::random(40);
            $random2 = Str::random(40);

            $nombre=time()."_".$random1.$random2.".".$file->getClientOriginalExtension();
            $auxnombre=time()."_".$random1.$random2;
            $nombrelowres = $auxnombre."Lowres.".$file->getClientOriginalExtension();
            $image = Image::make($file)->resize(300, null,function ($constraint) {
                $constraint->aspectRatio();
            });

            $foto = $file->storeAs('public/imagenContactoSecundaria',$nombre,"public");
            error_log($foto);
            $image->save("storage/public/imagenContactoSecundaria/".$nombrelowres);
            $foto_low="public/imagenContactoSecundaria/".$nombrelowres;
            if($pagina["imagenSecundaria"] != ""){
              error_log('entre imgen no vacio');
     
              Storage::disk('public')->delete($pagina["imagenSecundaria"]); 
              error_log('elimine imagen principal');
              Storage::disk('public')->delete($pagina["imagenSecundaria_low"]);
              error_log('elimine imagen baja res');
			      }
            $pagina->imagenSecundaria=$foto;
            $pagina->imagenSecundaria_low=$foto_low;

          }

          $pagina->textoPrincipal=$request->textoPrincipal;
          $pagina->colorFooter=$request->colorFooter;
          $pagina->textoFooter=$request->textoFooter;
          $pagina->textoNavbar=$request->textoNavbar;
          $pagina->colorDiv=$request->colorDiv;
          $pagina->colorCuerpo=$request->colorCuerpo;
          $pagina->textoCuerpo=$request->textoCuerpo;
          $pagina->colorBotonUp=$request->colorBotonUp;
          $pagina->textoBotonUp=$request->textoBotonUp;
          $pagina->colorNavM=$request->colorNavM;
          $pagina->textoNavM=$request->textoNavM;

          $pagina->save();
        }

    }
  }
}
