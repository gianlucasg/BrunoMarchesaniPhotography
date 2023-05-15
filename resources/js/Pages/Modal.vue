<template>
  <v-row justify="center">
    <v-dialog class="mx-auto" v-model="dialog" persistent>
      <template v-slot:activator="{ on, attrs }">
	<v-col>
        <v-btn  class="boton-modal" :disabled="desactivarmodal" x-large rounded dark v-bind="attrs" v-on="on">
          <v-icon left>mdi-cloud-upload</v-icon> {{accionboton}} {{ elemento }}
        </v-btn>
	</v-col>
      </template>
      <v-card class="mx-auto cartamodal">
        <v-card-title>
          <span class="headline" style="color: azure; opacity:0.6;">{{titulomodal}} {{ elemento }}</span>
        </v-card-title>
        <v-form ref="form" v-model="valid"  @submit.prevent="onSubmit" lazy-validation>
          <v-container>

			 <div class="d-flex flex-column align-center">


						 <div :style="mostrarPicker">

							 <v-row class="ml-n6">

							 	<v-row class="ml-12 mr-1 mb-3 d-flex flex-row align-center justify-center" style="background-color:#d6d6d6;">
									<v-icon class="ml-n10">mdi-palette</v-icon>
										 	<div class="ml-10 mr-7" style="opacity:0.8;">
										 		<p class="mb-0">Color de texto de la barra superior</p>
											</div>
											<v-row class="albumpicker d-flex align-center justify-center">
												<colorpicker @guardarColor="guardarpicker" :id="0" :setear="colorpickaux"></colorpicker>
												<div class="mr-6" :style="muestracolor"></div>
											</v-row>
								</v-row>
							</v-row>


					 	</div>


			<v-file-input class="fileinput" style="width:500px;" @change="imagenPreview" outlined required :rules="imgRules" ref="file"  accept="image/*" prepend-icon="mdi-camera" :placeholder="textoInputFoto" v-model="file"></v-file-input>
		</div>
			<v-divider class="mb-4"></v-divider>


			<div v-if="this.elemento === 'álbum'">

				<div class="d-flex justify-center align-center">
						<v-card class="" width="100%" max-width="800px" height="500px" outlined elevation="2" color="#ececec">
							<div class="zona-preview d-flex justify-center align-center" style="position:absolute; width:100%; height:100%;"> <div></div> </div>
							<v-row class="mr-2 ml-2" style="z-index:20; position:absolute; width:-webkit-fill-available;">
								<h6 :style="estilonavtitulo">Bruno Marchesani</h6>
								<v-spacer></v-spacer>

								<div class="botonestoolbar">
									<v-btn :style="estilonavmenu" text >Home</v-btn>
									<v-btn :style="estilonavmenu" text >Galeria</v-btn>
									<v-btn :style="estilonavmenu" text >Sobre Mi</v-btn>
									<v-btn :style="estilonavmenu" text >Contacto</v-btn>
								</div>
								<div class="botonesiconos">
	  							  <v-icon :style="estiloicono">mdi-menu</v-icon>
	  						  </div>
							</v-row>
							<div class="mascara-div d-flex align-center justify-center" style="max-width:800px; height:500px; width:100%;">


								<div class="editorcktitulo editorCK2" style="z-index:20; position:absolute; max-height:498px; max-width:800px; width:100%; font-size:30px; font-weight:bold; text-shadow:2px 1px black;">
									<ckeditor :editor="editorTitulo" @blur="onEditorBlur" @focus="onFocus" @ready="onReady" v-model="editorDataTitulo" :config="editorTituloConfig"></ckeditor>
								</div>


								<v-img class="mascara-imagen" :style="imagenstyle2" :src="urlimagen">

								</v-img>
							</div>
						</v-card>
				</div>

				<div class="mt-8 d-flex justify-center align-center">
						<div class="editorCK" style="max-width:800px; width:100%;">
							<ckeditor :editor="editor"  @ready="onReady" v-model="editorData" :config="editorConfig"></ckeditor>
						</div>
				</div>


						  <v-divider></v-divider>


				        <v-card-actions class="d-flex justify-center">

					   <div style="max-width:800px; width:100%;" class="columnabotones d-flex justify-end">
				          <v-btn x-large text color='#ca3535' @click="terminarFormulario">Cancelar</v-btn>
				          <v-btn x-large text color='#e4b747' @click="clear">Resetear</v-btn>
				          <v-btn x-large text color='#4b924e' @click="submit" persistent>{{submittext}}</v-btn>
					  </div>

				        </v-card-actions>
			</div>
			<div v-else>

				<v-row>
					<v-col class="pa-4" cols="12" sm="12" md="6" lg="6">


						<v-card class="carta-preview" min-height="300px" outlined elevation="2" color="#ececec">
							<div class="zona-preview d-flex justify-center align-center" style="position:absolute; width:100%; height:100%;"> <div><v-icon class="ml-2" x-large >mdi-camera</v-icon><p>Preview</p></div> </div>
							<div class="mascara-div" style="min-height:300px;">
								<v-img class="mascara-imagen" :style="imagenstyle" :src="urlimagen" contain ></v-img>
							</div>
						</v-card>

					</v-col>

					<v-col class=" pa-4" cols="12" sm="12" md="6" lg="6">
						<div class="editorCK4">
							<ckeditor :editor="editorTitulo"  @ready="onReady" v-model="editorDataTitulo" :config="editorTituloConfig"></ckeditor>
						</div>
						<div class="editorCK">
							<ckeditor :editor="editor"  @ready="onReady" v-model="editorData" :config="editorConfig"></ckeditor>
						</div>
					</v-col>
				</v-row>


				<v-divider></v-divider>

				<v-row>
					<v-col class="pa-4" cols="12" sm="12" md="6" lg="6">
					</v-col>

						<v-col class=" pa-4" cols="12" sm="12" md="6" lg="6">
						   <div class="columnabotones d-flex justify-end">
					          <v-btn x-large text color='#ca3535' @click="terminarFormulario">Cancelar</v-btn>
					          <v-btn x-large text color='#e4b747' @click="clear">Resetear</v-btn>
					          <v-btn x-large text color='#4b924e' @click="submit" persistent>{{submittext}}</v-btn>
						  </div>
					  </v-col>
				</v-row>

			</div>


	</v-container>
        </v-form>
      </v-card>


<v-snackbar top right v-model="editorFallido3" timeout="3000" color="red lighten-1">
      Debe agregar una foto.
</v-snackbar>
<v-snackbar top right v-model="editorFallido1" timeout="3000" color="red lighten-1">
      Debe agregar un titulo.
</v-snackbar>
<v-snackbar top right v-model="editorFallido2" timeout="3000" color="red lighten-1">
      Debe agregar una descripcion.
</v-snackbar>


    </v-dialog>
  </v-row>
</template>

<script>
import DecoupledEditor from '@ckeditor/ckeditor5-build-decoupled-document';

  export default {
	props: ['rutapost','elemento'],
    data: () => ({
	  estilonavtitulo:"font-family:Perpetua Titling MT;font-size:25px;font-weight:light;color:white;",
	  estilonavmenu:"font-family:Rockwell;font-size: 15px;font-weight:regular;color:white;",
	  estiloicono:"font-size: 45px;color:white;",
	  desactivarEnter:false,
	  textoDescripcionCKeditor:"",
	  textoInputFoto:"",
	  imagenstyle:"height:auto;",
	  imagenstyle2:"height:494px; background-size:cover;",
	  urlimagen:null,
	  desactivarvalidacion:false,
      valid: true,
      dialog: false,
      file: null,
	  album:null,
	  titulomodal:'',
	  tituloauxiliar:'Crear un ',
	  fileinptext:'Imagen',
	  submittext:'Publicar',
	  accionboton:'',
	  rutamodificar:'',
	  modomodificar:false,
	  idmodificar:'',
	  listafuentes:[],
	  listafuentstr:['default'],
	  desactivarmodal:true,
	  colorpickaux:'#FFFFFFFF',
	  mostrarPicker:"display:none!important;",
	  muestracolor:"width:30px;height:30px;border-width:1px;border-color:black;background-color:white;",
	  //EDITOR CK CONFIGURACION DATA

	  editor: DecoupledEditor,
	  editorData: "",
	  editorDataTitulo: "",
	  editorConfig:{},

	  editorTitulo: DecoupledEditor,
	  Titulo: "",
	  editorTituloConfig:{},

	  defaultcolorpick:'null',
	  imgRules: [
        v => !!v || 'Por favor debe subir una imagen. Es obligatorio',
		],
		editorFallido1:false,
		editorFallido2:false,
		editorFallido3:false,

    }),

    methods: {
		imagenPreview(){
			if(this.file != null){
				this.imagenstyle="height:auto;";
				this.imagenstyle2="height:494px; background-size:cover;";
				this.urlimagen= URL.createObjectURL(this.file);
			}else{
				this.urlimagen=null;
				this.imagenstyle="height:0px;";
				this.imagenstyle2="height:0px; background-size:cover;";
			}
		},
		guardarpicker(id,color){
			this.defaultcolorpick=color;
			this.muestracolor="width:30px;height:30px;border-width:1px;border-color:black;background-color:"+color+";";

		    this.estilonavtitulo="font-family:Perpetua Titling MT;font-size:25px;font-weight:light;color:"+color+";";
		    this.estilonavmenu="font-family:Rockwell;font-size:15px;font-weight:regular;color:"+color+";";
			this.estiloicono="font-size: 45px;color:"+color+";";
		},
		configurarEditor(){
			this.editorTituloConfig={
		      removePlugins: [ 'FontBackgroundColor' ],
			  PasteFromOffice:false,
			  language: 'es',
			  placeholder: 'Titulo...',
			  fontFamily: {
				  options:this.listafuentstr
			  },
			  fontColor: {
					columns: 10,
					documentColors: 200,
					colors: [
					{color: 'hsl(6, 54%, 95%)', label:' '}, {color: 'hsl(6, 54%, 89%)', label:' '}, {color: 'hsl(6, 54%, 78%)', label:' '}, {color: 'hsl(6, 54%, 68%)', label:' '}, {color: 'hsl(6, 54%, 57%)', label:' '}, {color: 'hsl(6, 63%, 46%)', label:' '}, {color: 'hsl(6, 63%, 41%)', label:' '}, {color: 'hsl(6, 63%, 35%)', label:' '}, {color: 'hsl(6, 63%, 29%)', label:' '}, {color: 'hsl(6, 63%, 24%)', label:' '}, {color: 'hsl(6, 78%, 96%)', label:' '}, {color: 'hsl(6, 78%, 91%)', label:' '}, {color: 'hsl(6, 78%, 83%)', label:' '}, {color: 'hsl(6, 78%, 74%)', label:' '}, {color: 'hsl(6, 78%, 66%)', label:' '}, {color: 'hsl(6, 78%, 57%)', label:' '}, {color: 'hsl(6, 59%, 50%)', label:' '}, {color: 'hsl(6, 59%, 43%)', label:' '}, {color: 'hsl(6, 59%, 37%)', label:' '}, {color: 'hsl(6, 59%, 30%)', label:' '}, {color: 'hsl(283, 39%, 95%)', label:' '}, {color: 'hsl(283, 39%, 91%)', label:' '}, {color: 'hsl(283, 39%, 81%)', label:' '}, {color: 'hsl(283, 39%, 72%)', label:' '}, {color: 'hsl(283, 39%, 63%)', label:' '}, {color: 'hsl(283, 39%, 53%)', label:' '}, {color: 'hsl(283, 34%, 47%)', label:' '}, {color: 'hsl(283, 34%, 40%)', label:' '}, {color: 'hsl(283, 34%, 34%)', label:' '}, {color: 'hsl(283, 34%, 28%)', label:' '}, {color: 'hsl(282, 39%, 95%)', label:' '}, {color: 'hsl(282, 39%, 89%)', label:' '}, {color: 'hsl(282, 39%, 79%)', label:' '}, {color: 'hsl(282, 39%, 68%)', label:' '}, {color: 'hsl(282, 39%, 58%)', label:' '}, {color: 'hsl(282, 44%, 47%)', label:' '}, {color: 'hsl(282, 44%, 42%)', label:' '}, {color: 'hsl(282, 44%, 36%)', label:' '}, {color: 'hsl(282, 44%, 30%)', label:' '}, {color: 'hsl(282, 44%, 25%)', label:' '}, {color: 'hsl(204, 51%, 94%)', label:' '}, {color: 'hsl(204, 51%, 89%)', label:' '}, {color: 'hsl(204, 51%, 78%)', label:' '}, {color: 'hsl(204, 51%, 67%)', label:' '}, {color: 'hsl(204, 51%, 55%)', label:' '}, {color: 'hsl(204, 64%, 44%)', label:' '}, {color: 'hsl(204, 64%, 39%)', label:' '}, {color: 'hsl(204, 64%, 34%)', label:' '}, {color: 'hsl(204, 64%, 28%)', label:' '}, {color: 'hsl(204, 64%, 23%)', label:' '}, {color: 'hsl(204, 70%, 95%)', label:' '}, {color: 'hsl(204, 70%, 91%)', label:' '}, {color: 'hsl(204, 70%, 81%)', label:' '}, {color: 'hsl(204, 70%, 72%)', label:' '}, {color: 'hsl(204, 70%, 63%)', label:' '}, {color: 'hsl(204, 70%, 53%)', label:' '}, {color: 'hsl(204, 62%, 47%)', label:' '}, {color: 'hsl(204, 62%, 40%)', label:' '}, {color: 'hsl(204, 62%, 34%)', label:' '}, {color: 'hsl(204, 62%, 28%)', label:' '}, {color: 'hsl(168, 55%, 94%)', label:' '}, {color: 'hsl(168, 55%, 88%)', label:' '}, {color: 'hsl(168, 55%, 77%)', label:' '}, {color: 'hsl(168, 55%, 65%)', label:' '}, {color: 'hsl(168, 55%, 54%)', label:' '}, {color: 'hsl(168, 76%, 42%)', label:' '}, {color: 'hsl(168, 76%, 37%)', label:' '}, {color: 'hsl(168, 76%, 32%)', label:' '}, {color: 'hsl(168, 76%, 27%)', label:' '}, {color: 'hsl(168, 76%, 22%)', label:' '}, {color: 'hsl(168, 42%, 94%)', label:' '}, {color: 'hsl(168, 42%, 87%)', label:' '}, {color: 'hsl(168, 42%, 74%)', label:' '}, {color: 'hsl(168, 42%, 61%)', label:' '}, {color: 'hsl(168, 45%, 49%)', label:' '}, {color: 'hsl(168, 76%, 36%)', label:' '}, {color: 'hsl(168, 76%, 31%)', label:' '}, {color: 'hsl(168, 76%, 27%)', label:' '}, {color: 'hsl(168, 76%, 23%)', label:' '}, {color: 'hsl(168, 76%, 19%)', label:' '}, {color: 'hsl(145, 45%, 94%)', label:' '}, {color: 'hsl(145, 45%, 88%)', label:' '}, {color: 'hsl(145, 45%, 77%)', label:' '}, {color: 'hsl(145, 45%, 65%)', label:' '}, {color: 'hsl(145, 45%, 53%)', label:' '}, {color: 'hsl(145, 63%, 42%)', label:' '}, {color: 'hsl(145, 63%, 37%)', label:' '}, {color: 'hsl(145, 63%, 32%)', label:' '}, {color: 'hsl(145, 63%, 27%)', label:' '}, {color: 'hsl(145, 63%, 22%)', label:' '}, {color: 'hsl(145, 61%, 95%)', label:' '}, {color: 'hsl(145, 61%, 90%)', label:' '}, {color: 'hsl(145, 61%, 80%)', label:' '}, {color: 'hsl(145, 61%, 69%)', label:' '}, {color: 'hsl(145, 61%, 59%)', label:' '}, {color: 'hsl(145, 63%, 49%)', label:' '}, {color: 'hsl(145, 63%, 43%)', label:' '}, {color: 'hsl(145, 63%, 37%)', label:' '}, {color: 'hsl(145, 63%, 31%)', label:' '}, {color: 'hsl(145, 63%, 25%)', label:' '}, {color: 'hsl(48, 89%, 95%)', label:' '}, {color: 'hsl(48, 89%, 90%)', label:' '}, {color: 'hsl(48, 89%, 80%)', label:' '}, {color: 'hsl(48, 89%, 70%)', label:' '}, {color: 'hsl(48, 89%, 60%)', label:' '}, {color: 'hsl(48, 89%, 50%)', label:' '}, {color: 'hsl(48, 88%, 44%)', label:' '}, {color: 'hsl(48, 88%, 38%)', label:' '}, {color: 'hsl(48, 88%, 32%)', label:' '}, {color: 'hsl(48, 88%, 26%)', label:' '}, {color: 'hsl(37, 90%, 95%)', label:' '}, {color: 'hsl(37, 90%, 90%)', label:' '}, {color: 'hsl(37, 90%, 80%)', label:' '}, {color: 'hsl(37, 90%, 71%)', label:' '}, {color: 'hsl(37, 90%, 61%)', label:' '}, {color: 'hsl(37, 90%, 51%)', label:' '}, {color: 'hsl(37, 86%, 45%)', label:' '}, {color: 'hsl(37, 86%, 39%)', label:' '}, {color: 'hsl(37, 86%, 33%)', label:' '}, {color: 'hsl(37, 86%, 27%)', label:' '}, {color: 'hsl(28, 80%, 95%)', label:' '}, {color: 'hsl(28, 80%, 90%)', label:' '}, {color: 'hsl(28, 80%, 81%)', label:' '}, {color: 'hsl(28, 80%, 71%)', label:' '}, {color: 'hsl(28, 80%, 61%)', label:' '}, {color: 'hsl(28, 80%, 52%)', label:' '}, {color: 'hsl(28, 74%, 46%)', label:' '}, {color: 'hsl(28, 74%, 39%)', label:' '}, {color: 'hsl(28, 74%, 33%)', label:' '}, {color: 'hsl(28, 74%, 27%)', label:' '}, {color: 'hsl(24, 71%, 94%)', label:' '}, {color: 'hsl(24, 71%, 88%)', label:' '}, {color: 'hsl(24, 71%, 77%)', label:' '}, {color: 'hsl(24, 71%, 65%)', label:' '}, {color: 'hsl(24, 71%, 53%)', label:' '}, {color: 'hsl(24, 100%, 41%)', label:' '}, {color: 'hsl(24, 100%, 36%)', label:' '}, {color: 'hsl(24, 100%, 31%)', label:' '}, {color: 'hsl(24, 100%, 26%)', label:' '}, {color: 'hsl(24, 100%, 22%)', label:' '}, {color: 'hsl(192, 15%, 99%)', label:' '}, {color: 'hsl(192, 15%, 99%)', label:' '}, {color: 'hsl(192, 15%, 97%)', label:' '}, {color: 'hsl(192, 15%, 96%)', label:' '}, {color: 'hsl(192, 15%, 95%)', label:' '}, {color: 'hsl(192, 15%, 94%)', label:' '}, {color: 'hsl(192, 5%, 82%)', label:' '}, {color: 'hsl(192, 3%, 71%)', label:' '}, {color: 'hsl(192, 2%, 60%)', label:' '}, {color: 'hsl(192, 1%, 49%)', label:' '}, {color: 'hsl(204, 8%, 98%)', label:' '}, {color: 'hsl(204, 8%, 95%)', label:' '}, {color: 'hsl(204, 8%, 90%)', label:' '}, {color: 'hsl(204, 8%, 86%)', label:' '}, {color: 'hsl(204, 8%, 81%)', label:' '}, {color: 'hsl(204, 8%, 76%)', label:' '}, {color: 'hsl(204, 5%, 67%)', label:' '}, {color: 'hsl(204, 4%, 58%)', label:' '}, {color: 'hsl(204, 3%, 49%)', label:' '}, {color: 'hsl(204, 3%, 40%)', label:' '}, {color: 'hsl(184, 9%, 96%)', label:' '}, {color: 'hsl(184, 9%, 92%)', label:' '}, {color: 'hsl(184, 9%, 85%)', label:' '}, {color: 'hsl(184, 9%, 77%)', label:' '}, {color: 'hsl(184, 9%, 69%)', label:' '}, {color: 'hsl(184, 9%, 62%)', label:' '}, {color: 'hsl(184, 6%, 54%)', label:' '}, {color: 'hsl(184, 5%, 47%)', label:' '}, {color: 'hsl(184, 5%, 40%)', label:' '}, {color: 'hsl(184, 5%, 32%)', label:' '}, {color: 'hsl(184, 6%, 95%)', label:' '}, {color: 'hsl(184, 6%, 91%)', label:' '}, {color: 'hsl(184, 6%, 81%)', label:' '}, {color: 'hsl(184, 6%, 72%)', label:' '}, {color: 'hsl(184, 6%, 62%)', label:' '}, {color: 'hsl(184, 6%, 53%)', label:' '}, {color: 'hsl(184, 5%, 46%)', label:' '}, {color: 'hsl(184, 5%, 40%)', label:' '}, {color: 'hsl(184, 5%, 34%)', label:' '}, {color: 'hsl(184, 5%, 27%)', label:' '}, {color: 'hsl(210, 12%, 93%)', label:' '}, {color: 'hsl(210, 12%, 86%)', label:' '}, {color: 'hsl(210, 12%, 71%)', label:' '}, {color: 'hsl(210, 12%, 57%)', label:' '}, {color: 'hsl(210, 15%, 43%)', label:' '}, {color: 'hsl(210, 29%, 29%)', label:' '}, {color: 'hsl(210, 29%, 25%)', label:' '}, {color: 'hsl(210, 29%, 22%)', label:' '}, {color: 'hsl(210, 29%, 18%)', label:' '}, {color: 'hsl(210, 29%, 15%)', label:' '}, {color: 'hsl(210, 9%, 92%)', label:' '}, {color: 'hsl(210, 9%, 85%)', label:' '}, {color: 'hsl(210, 9%, 70%)', label:' '}, {color: 'hsl(210, 9%, 55%)', label:' '}, {color: 'hsl(210, 14%, 39%)', label:' '}, {color: 'hsl(210, 29%, 24%)', label:' '}, {color: 'hsl(210, 29%, 21%)', label:' '}, {color: 'hsl(210, 29%, 18%)', label:' '}, {color: 'hsl(210, 29%, 16%)', label:' '}, {color: 'hsl(210, 29%, 13%)', label:' '}
					]
			},

			  toolbar: {
				  items:['fontColor','fontFamily','|','bold', 'italic','|', 'undo', 'redo'
						],
				  shouldNotGroupWhenFull: true}
			};
				this.editorConfig={
					startupFocus : true,
					removePlugins: [ 'FontBackgroundColor' ],
				  PasteFromOffice:false,
		  		  language: 'es',
				  placeholder: this.textoDescripcionCKeditor,
		  		  fontFamily: {
		  			  options:this.listafuentstr
		  		  },
			  fontColor: {
					columns: 10,
					documentColors: 200,
					colors: [
					{color: 'hsl(6, 54%, 95%)', label:' '}, {color: 'hsl(6, 54%, 89%)', label:' '}, {color: 'hsl(6, 54%, 78%)', label:' '}, {color: 'hsl(6, 54%, 68%)', label:' '}, {color: 'hsl(6, 54%, 57%)', label:' '}, {color: 'hsl(6, 63%, 46%)', label:' '}, {color: 'hsl(6, 63%, 41%)', label:' '}, {color: 'hsl(6, 63%, 35%)', label:' '}, {color: 'hsl(6, 63%, 29%)', label:' '}, {color: 'hsl(6, 63%, 24%)', label:' '}, {color: 'hsl(6, 78%, 96%)', label:' '}, {color: 'hsl(6, 78%, 91%)', label:' '}, {color: 'hsl(6, 78%, 83%)', label:' '}, {color: 'hsl(6, 78%, 74%)', label:' '}, {color: 'hsl(6, 78%, 66%)', label:' '}, {color: 'hsl(6, 78%, 57%)', label:' '}, {color: 'hsl(6, 59%, 50%)', label:' '}, {color: 'hsl(6, 59%, 43%)', label:' '}, {color: 'hsl(6, 59%, 37%)', label:' '}, {color: 'hsl(6, 59%, 30%)', label:' '}, {color: 'hsl(283, 39%, 95%)', label:' '}, {color: 'hsl(283, 39%, 91%)', label:' '}, {color: 'hsl(283, 39%, 81%)', label:' '}, {color: 'hsl(283, 39%, 72%)', label:' '}, {color: 'hsl(283, 39%, 63%)', label:' '}, {color: 'hsl(283, 39%, 53%)', label:' '}, {color: 'hsl(283, 34%, 47%)', label:' '}, {color: 'hsl(283, 34%, 40%)', label:' '}, {color: 'hsl(283, 34%, 34%)', label:' '}, {color: 'hsl(283, 34%, 28%)', label:' '}, {color: 'hsl(282, 39%, 95%)', label:' '}, {color: 'hsl(282, 39%, 89%)', label:' '}, {color: 'hsl(282, 39%, 79%)', label:' '}, {color: 'hsl(282, 39%, 68%)', label:' '}, {color: 'hsl(282, 39%, 58%)', label:' '}, {color: 'hsl(282, 44%, 47%)', label:' '}, {color: 'hsl(282, 44%, 42%)', label:' '}, {color: 'hsl(282, 44%, 36%)', label:' '}, {color: 'hsl(282, 44%, 30%)', label:' '}, {color: 'hsl(282, 44%, 25%)', label:' '}, {color: 'hsl(204, 51%, 94%)', label:' '}, {color: 'hsl(204, 51%, 89%)', label:' '}, {color: 'hsl(204, 51%, 78%)', label:' '}, {color: 'hsl(204, 51%, 67%)', label:' '}, {color: 'hsl(204, 51%, 55%)', label:' '}, {color: 'hsl(204, 64%, 44%)', label:' '}, {color: 'hsl(204, 64%, 39%)', label:' '}, {color: 'hsl(204, 64%, 34%)', label:' '}, {color: 'hsl(204, 64%, 28%)', label:' '}, {color: 'hsl(204, 64%, 23%)', label:' '}, {color: 'hsl(204, 70%, 95%)', label:' '}, {color: 'hsl(204, 70%, 91%)', label:' '}, {color: 'hsl(204, 70%, 81%)', label:' '}, {color: 'hsl(204, 70%, 72%)', label:' '}, {color: 'hsl(204, 70%, 63%)', label:' '}, {color: 'hsl(204, 70%, 53%)', label:' '}, {color: 'hsl(204, 62%, 47%)', label:' '}, {color: 'hsl(204, 62%, 40%)', label:' '}, {color: 'hsl(204, 62%, 34%)', label:' '}, {color: 'hsl(204, 62%, 28%)', label:' '}, {color: 'hsl(168, 55%, 94%)', label:' '}, {color: 'hsl(168, 55%, 88%)', label:' '}, {color: 'hsl(168, 55%, 77%)', label:' '}, {color: 'hsl(168, 55%, 65%)', label:' '}, {color: 'hsl(168, 55%, 54%)', label:' '}, {color: 'hsl(168, 76%, 42%)', label:' '}, {color: 'hsl(168, 76%, 37%)', label:' '}, {color: 'hsl(168, 76%, 32%)', label:' '}, {color: 'hsl(168, 76%, 27%)', label:' '}, {color: 'hsl(168, 76%, 22%)', label:' '}, {color: 'hsl(168, 42%, 94%)', label:' '}, {color: 'hsl(168, 42%, 87%)', label:' '}, {color: 'hsl(168, 42%, 74%)', label:' '}, {color: 'hsl(168, 42%, 61%)', label:' '}, {color: 'hsl(168, 45%, 49%)', label:' '}, {color: 'hsl(168, 76%, 36%)', label:' '}, {color: 'hsl(168, 76%, 31%)', label:' '}, {color: 'hsl(168, 76%, 27%)', label:' '}, {color: 'hsl(168, 76%, 23%)', label:' '}, {color: 'hsl(168, 76%, 19%)', label:' '}, {color: 'hsl(145, 45%, 94%)', label:' '}, {color: 'hsl(145, 45%, 88%)', label:' '}, {color: 'hsl(145, 45%, 77%)', label:' '}, {color: 'hsl(145, 45%, 65%)', label:' '}, {color: 'hsl(145, 45%, 53%)', label:' '}, {color: 'hsl(145, 63%, 42%)', label:' '}, {color: 'hsl(145, 63%, 37%)', label:' '}, {color: 'hsl(145, 63%, 32%)', label:' '}, {color: 'hsl(145, 63%, 27%)', label:' '}, {color: 'hsl(145, 63%, 22%)', label:' '}, {color: 'hsl(145, 61%, 95%)', label:' '}, {color: 'hsl(145, 61%, 90%)', label:' '}, {color: 'hsl(145, 61%, 80%)', label:' '}, {color: 'hsl(145, 61%, 69%)', label:' '}, {color: 'hsl(145, 61%, 59%)', label:' '}, {color: 'hsl(145, 63%, 49%)', label:' '}, {color: 'hsl(145, 63%, 43%)', label:' '}, {color: 'hsl(145, 63%, 37%)', label:' '}, {color: 'hsl(145, 63%, 31%)', label:' '}, {color: 'hsl(145, 63%, 25%)', label:' '}, {color: 'hsl(48, 89%, 95%)', label:' '}, {color: 'hsl(48, 89%, 90%)', label:' '}, {color: 'hsl(48, 89%, 80%)', label:' '}, {color: 'hsl(48, 89%, 70%)', label:' '}, {color: 'hsl(48, 89%, 60%)', label:' '}, {color: 'hsl(48, 89%, 50%)', label:' '}, {color: 'hsl(48, 88%, 44%)', label:' '}, {color: 'hsl(48, 88%, 38%)', label:' '}, {color: 'hsl(48, 88%, 32%)', label:' '}, {color: 'hsl(48, 88%, 26%)', label:' '}, {color: 'hsl(37, 90%, 95%)', label:' '}, {color: 'hsl(37, 90%, 90%)', label:' '}, {color: 'hsl(37, 90%, 80%)', label:' '}, {color: 'hsl(37, 90%, 71%)', label:' '}, {color: 'hsl(37, 90%, 61%)', label:' '}, {color: 'hsl(37, 90%, 51%)', label:' '}, {color: 'hsl(37, 86%, 45%)', label:' '}, {color: 'hsl(37, 86%, 39%)', label:' '}, {color: 'hsl(37, 86%, 33%)', label:' '}, {color: 'hsl(37, 86%, 27%)', label:' '}, {color: 'hsl(28, 80%, 95%)', label:' '}, {color: 'hsl(28, 80%, 90%)', label:' '}, {color: 'hsl(28, 80%, 81%)', label:' '}, {color: 'hsl(28, 80%, 71%)', label:' '}, {color: 'hsl(28, 80%, 61%)', label:' '}, {color: 'hsl(28, 80%, 52%)', label:' '}, {color: 'hsl(28, 74%, 46%)', label:' '}, {color: 'hsl(28, 74%, 39%)', label:' '}, {color: 'hsl(28, 74%, 33%)', label:' '}, {color: 'hsl(28, 74%, 27%)', label:' '}, {color: 'hsl(24, 71%, 94%)', label:' '}, {color: 'hsl(24, 71%, 88%)', label:' '}, {color: 'hsl(24, 71%, 77%)', label:' '}, {color: 'hsl(24, 71%, 65%)', label:' '}, {color: 'hsl(24, 71%, 53%)', label:' '}, {color: 'hsl(24, 100%, 41%)', label:' '}, {color: 'hsl(24, 100%, 36%)', label:' '}, {color: 'hsl(24, 100%, 31%)', label:' '}, {color: 'hsl(24, 100%, 26%)', label:' '}, {color: 'hsl(24, 100%, 22%)', label:' '}, {color: 'hsl(192, 15%, 99%)', label:' '}, {color: 'hsl(192, 15%, 99%)', label:' '}, {color: 'hsl(192, 15%, 97%)', label:' '}, {color: 'hsl(192, 15%, 96%)', label:' '}, {color: 'hsl(192, 15%, 95%)', label:' '}, {color: 'hsl(192, 15%, 94%)', label:' '}, {color: 'hsl(192, 5%, 82%)', label:' '}, {color: 'hsl(192, 3%, 71%)', label:' '}, {color: 'hsl(192, 2%, 60%)', label:' '}, {color: 'hsl(192, 1%, 49%)', label:' '}, {color: 'hsl(204, 8%, 98%)', label:' '}, {color: 'hsl(204, 8%, 95%)', label:' '}, {color: 'hsl(204, 8%, 90%)', label:' '}, {color: 'hsl(204, 8%, 86%)', label:' '}, {color: 'hsl(204, 8%, 81%)', label:' '}, {color: 'hsl(204, 8%, 76%)', label:' '}, {color: 'hsl(204, 5%, 67%)', label:' '}, {color: 'hsl(204, 4%, 58%)', label:' '}, {color: 'hsl(204, 3%, 49%)', label:' '}, {color: 'hsl(204, 3%, 40%)', label:' '}, {color: 'hsl(184, 9%, 96%)', label:' '}, {color: 'hsl(184, 9%, 92%)', label:' '}, {color: 'hsl(184, 9%, 85%)', label:' '}, {color: 'hsl(184, 9%, 77%)', label:' '}, {color: 'hsl(184, 9%, 69%)', label:' '}, {color: 'hsl(184, 9%, 62%)', label:' '}, {color: 'hsl(184, 6%, 54%)', label:' '}, {color: 'hsl(184, 5%, 47%)', label:' '}, {color: 'hsl(184, 5%, 40%)', label:' '}, {color: 'hsl(184, 5%, 32%)', label:' '}, {color: 'hsl(184, 6%, 95%)', label:' '}, {color: 'hsl(184, 6%, 91%)', label:' '}, {color: 'hsl(184, 6%, 81%)', label:' '}, {color: 'hsl(184, 6%, 72%)', label:' '}, {color: 'hsl(184, 6%, 62%)', label:' '}, {color: 'hsl(184, 6%, 53%)', label:' '}, {color: 'hsl(184, 5%, 46%)', label:' '}, {color: 'hsl(184, 5%, 40%)', label:' '}, {color: 'hsl(184, 5%, 34%)', label:' '}, {color: 'hsl(184, 5%, 27%)', label:' '}, {color: 'hsl(210, 12%, 93%)', label:' '}, {color: 'hsl(210, 12%, 86%)', label:' '}, {color: 'hsl(210, 12%, 71%)', label:' '}, {color: 'hsl(210, 12%, 57%)', label:' '}, {color: 'hsl(210, 15%, 43%)', label:' '}, {color: 'hsl(210, 29%, 29%)', label:' '}, {color: 'hsl(210, 29%, 25%)', label:' '}, {color: 'hsl(210, 29%, 22%)', label:' '}, {color: 'hsl(210, 29%, 18%)', label:' '}, {color: 'hsl(210, 29%, 15%)', label:' '}, {color: 'hsl(210, 9%, 92%)', label:' '}, {color: 'hsl(210, 9%, 85%)', label:' '}, {color: 'hsl(210, 9%, 70%)', label:' '}, {color: 'hsl(210, 9%, 55%)', label:' '}, {color: 'hsl(210, 14%, 39%)', label:' '}, {color: 'hsl(210, 29%, 24%)', label:' '}, {color: 'hsl(210, 29%, 21%)', label:' '}, {color: 'hsl(210, 29%, 18%)', label:' '}, {color: 'hsl(210, 29%, 16%)', label:' '}, {color: 'hsl(210, 29%, 13%)', label:' '}
					]
			},
		  		  toolbar: {
		  			  items:['fontColor','fontFamily','|','bold', 'italic','|', 'undo', 'redo'
		  		  	  		],
		  			  shouldNotGroupWhenFull: true}
		  	  };
		},
		cargarFuentes(){
			var WebFont = require('webfontloader');
			for (var i = 0; i < this.listafuentes.length; i++) {
				this.listafuentstr.push(this.listafuentes[i].nombre);
				WebFont.load({
					google: {
						api: 'https://fonts.googleapis.com/css2',
						families: [ this.listafuentes[i].nombre ]
					},
				});
			}

		},
		bajarFuentes(){
			this.$root.$emit("iniciareventocargar");
			axios.post("/bajarFuentes").then( ( response ) => {
				this.listafuentes=response.data;
				this.cargarFuentes();
				this.configurarEditor();
				this.desactivarmodal=false;
				this.$root.$emit("terminareventocargar");
				this.$root.$emit("permitirbotones");
		  	});
		},
		onReady(editor){

			editor.ui.getEditableElement().parentElement.insertBefore(
				editor.ui.view.toolbar.element,
				editor.ui.getEditableElement()
			);
			 editor.editing.view.document.on( 'keydown', ( evt, data ) => {


					if( this.desactivarEnter && data.keyCode == 13 ) {
    		 			        data.stopPropagation();
						        data.preventDefault();
						        evt.stop();
  					}
    		}, { priority: 'highest' } );

		},
		onEditorBlur(){
			this.desactivarEnter=false;
			document.getElementsByClassName("ck-toolbar")[0].style.visibility='hidden';
		},
		onFocus(){
			this.desactivarEnter=true;
			document.getElementsByClassName("ck-toolbar")[0].style.visibility='visible';
		},
		modificar(id,titulo,descripcion,picker,imagen){
			this.desactivarvalidacion=true;
			this.titulomodal='Modificar ';
			this.modomodificar=true;
			this.fileinptext="Subir nueva Imagen";
			this.submittext="Actualizar"
			this.idmodificar=id;
			this.editorDataTitulo=titulo;
			this.editorData=descripcion;
			this.defaultcolorpick=picker;
			this.colorpickaux=picker;
			this.urlimagen="/storage/"+imagen;
			this.imagenstyle="height:auto;";
			this.imagenstyle2="height:494px; background-size:cover;";
			if((picker != null)&&(picker != 'null')){
				this.estilonavtitulo="font-family:Perpetua Titling MT;font-size:25px;font-weight:light;color:"+picker+";";
				this.estilonavmenu="font-family:Rockwell;font-size:15px;font-weight:regular;color:"+picker+";";
				this.estiloicono="font-size: 45px;color:"+picker+";";
				this.$root.$emit("cambiarcolorpicker",picker);
				this.muestracolor="width:30px;height:30px;border-width:1px;border-color:black;background-color:"+picker+";";
			}
			this.dialog=true;
		},
		resetTags(){
			this.titulomodal=this.tituloauxiliar;
			this.editorDataTitulo='';
			this.editorData='';
			this.fileinptext='Imagen';
			this.submittext="Publicar";
		},
		terminarFormulario(){
			this.$refs.form.reset();
			this.clear();
			this.editorFallido1=false;
			this.editorFallido2=false;
			this.editorFallido3=false;

			this.dialog=false;
			this.defaultcolorpick='null';
			this.colorpickaux='#FFFFFFFF';
			this.muestracolor="width:30px;height:30px;border-width:1px;border-color:black;background-color:white;";
			if(this.modomodificar == true){
				this.modomodificar=false;
				setTimeout(this.resetTags, 200); //retardo pequeño para esconder efecto visual
			}
		},
        clear(){

		  this.estilonavtitulo="font-family:Perpetua Titling MT;font-size:25px;font-weight:light;color:white;";
		  this.estilonavmenu="font-family:Rockwell;font-size:15px;font-weight:regular;color:white;";
		  this.estiloicono="font-size: 45px;color:white;";
		  this.$root.$emit("cambiarcolorpicker",'#FFFFFFFF');
		  this.urlimagen=null;
		  this.imagenstyle="height:0px";
		  this.editorData='';
		  this.editorDataTitulo='';
		  this.file=null;
		  this.fileinptext='Imagen';
		  this.defaultcolorpick='null';
		  this.colorpickaux='#FFFFFFFF';
		  this.muestracolor="width:30px;height:30px;border-width:1px;border-color:black;background-color:white;";
        },
		verificarFoto(){
				if((this.file != null)||(this.modomodificar)){return true;}
				else{return false;}
		},
        submit(){

		if(!this.verificarFoto()){
			this.$refs.form.validate();
			this.editorFallido3=true;
		}else if(this.editorDataTitulo.length == 0){
			this.editorFallido1=true;
		}else if(this.editorData.length == 0){
			this.editorFallido2=true;
		}else{
			  var fd;
	          fd = new FormData();
	          fd.set("titulo",this.editorDataTitulo);
			  fd.set("texto",this.editorData);
			  if (this.defaultcolorpick == "null"){
				 fd.set("colorpicker",'white');
			  }
			  else{
				fd.set("colorpicker",this.defaultcolorpick);
			  }
          	  fd.append("input-file", this.file);

			  if( this.modomodificar == true) {
				  fd.set("id",this.idmodificar);
				  fd.set("post",this.rutapost);
				  axios.post(this.rutamodificar, fd).then( ( response ) => {
					this.terminarFormulario();
					this.$emit('modificaralbum');
					this.$root.$emit("msjexitomodificar");
				  }).catch(error => {
					this.$root.$emit("terminareventocargar");
					this.$root.$emit("msjfallidomodificar");
		          });
			  }else{
				  axios.post(this.rutapost, fd).then( ( response ) => {
					  this.$emit('subiralbum');
					  this.$root.$emit("msjexitosubir");
				  }).catch(error => {
					this.$root.$emit("terminareventocargar");
					this.$root.$emit("msjfallidosubir");
		          });
			  }
			  this.$root.$emit("iniciareventocargar");
			  this.clear();
			  this.resetTags();
	          this.dialog = false;
			  this.$refs.form.reset();
	  		}


        },
		desactivarboton(){
			this.desactivarmodal=true;
		},
		activarboton(){
			this.desactivarmodal=false;
		}

    },
	mounted(){

		this.bajarFuentes();
		this.$root.$on('iniciareventocargar', this.desactivarboton);
		this.$root.$on('terminareventocargar', this.activarboton);

		if(this.elemento == 'álbum'){
			this.titulomodal='Crear un ';
			this.tituloauxiliar='Crear un ';
			this.rutamodificar='/album/modificar';
			this.accionboton='Crear un';
			this.mostrarPicker="display:flex!important;"
			this.textoInputFoto="Seleccionar una portada";
			this.textoDescripcionCKeditor="Describe tu álbum";
		}else if (this.elemento == 'Foto') {
			this.tituloauxiliar='Subir una ';
			this.titulomodal='Subir una ';
			this.mostrarPicker="display:none!important;"
			this.rutamodificar='/imagen/modificar';
			this.accionboton='Subir una';
			this.textoInputFoto="Seleccionar una foto";
			this.textoDescripcionCKeditor="Describe tu foto";
		}
	},
}

</script>
