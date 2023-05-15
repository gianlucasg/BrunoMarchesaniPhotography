<template>
<div>
   <v-dialog class="mx-auto" v-model="dialog" persistent>
	 <template v-slot:activator="{ on, attrs }">
	   <v-btn class="boton-modulo-editor" tile color='#e4b747' :disabled="desactivarmodal" rounded v-bind="attrs" v-on="on">
		 <v-icon left>mdi-pencil</v-icon>Editar
	   </v-btn>
	 </template>

      <v-card class="mx-auto" dark>
        <v-card-title >
          <span class="headline" style="color: azure; opacity:0.6;">Editor de Texto</span>
        </v-card-title>

		<div class="editorCK3">
			<ckeditor :editor="editor"  @ready="onReady" v-model="editorData" :config="editorConfig"></ckeditor>
		</div>

        <v-card-actions>
          <v-spacer></v-spacer>
		  <v-btn  text @click="terminarFormulario" color='#ca3535'>Cancelar</v-btn>
		  <v-btn  text @click="clear" color='#e4b747'>Resetear</v-btn>
          <v-btn  text @click="guardar" persistent color='#4b924e'>Guardar</v-btn>
        </v-card-actions>

		</v-card>


    </v-dialog>
</div>
</template>
<style>
.editorCK .ck-toolbar{
	background-color:#afafaf!important;
}

.editorCK3 .ck-content{
	border-color:#ffffff!important;
	background-color:#ffffff!important;
}



</style>
<script>
import DecoupledEditor from '@ckeditor/ckeditor5-build-decoupled-document';

  export default {
	props: ['id','fuentes','habilitarmodal','tipo'],
    data: () => ({
	  dialog:false,
	  desactivarmodal:true,
	  editor: DecoupledEditor,
	  editorData: '',
	  editorConfig: {},

	  listafuentstr:['default'],

    }),

    methods: {
		terminarFormulario(){
			this.dialog=false;
		},
        clear(){
		    this.editorData='';
		 },
		 guardar(){
        	this.$emit('guardarEditor',this.id,this.editorData,this.tipo);
        	this.dialog= false;
			this.editorData='';
		 },

		configurarEditor(){
			this.editorConfig={
			  removePlugins: [ 'FontBackgroundColor' ],
			  PasteFromOffice:false,
			  language: 'es',
			  placeholder: 'Titulo...',
			  fontFamily: {
				  options:this.listafuentstr
			  },
			  fontColor: {
					columns: 30,
					documentColors: 180,
					colors: [
					{color: 'hsl(168, 55%, 94%)', label:' '}, {color: 'hsl(168, 55%, 88%)', label:' '}, {color: 'hsl(168, 55%, 77%)', label:' '}, {color: 'hsl(168, 55%, 65%)', label:' '}, {color: 'hsl(168, 55%, 54%)', label:' '}, {color: 'hsl(168, 76%, 42%)', label:' '}, {color: 'hsl(168, 76%, 37%)', label:' '}, {color: 'hsl(168, 76%, 32%)', label:' '}, {color: 'hsl(168, 76%, 27%)', label:' '}, {color: 'hsl(168, 76%, 22%)', label:' '},			//cian1
					{color: 'hsl(204, 51%, 94%)', label:' '}, {color: 'hsl(204, 51%, 89%)', label:' '}, {color: 'hsl(204, 51%, 78%)', label:' '}, {color: 'hsl(204, 51%, 67%)', label:' '}, {color: 'hsl(204, 51%, 55%)', label:' '}, {color: 'hsl(204, 64%, 44%)', label:' '}, {color: 'hsl(204, 64%, 39%)', label:' '}, {color: 'hsl(204, 64%, 34%)', label:' '}, {color: 'hsl(204, 64%, 28%)', label:' '}, {color: 'hsl(204, 64%, 23%)', label:' '},			//azul1
					{color: 'hsl(6, 54%, 95%)', label:' '},{color: 'hsl(6, 54%, 89%)', label:' '}, {color: 'hsl(6, 54%, 78%)', label:' '}, {color: 'hsl(6, 54%, 68%)', label:' '}, {color: 'hsl(6, 54%, 57%)', label:' '}, {color: 'hsl(6, 63%, 46%)', label:' '}, {color: 'hsl(6, 63%, 41%)', label:' '}, {color: 'hsl(6, 63%, 35%)', label:' '}, {color: 'hsl(6, 63%, 29%)', label:' '}, {color: 'hsl(6, 63%, 24%)', label:' '},								//rojo1
					{color: 'hsl(168, 42%, 94%)', label:' '}, {color: 'hsl(168, 42%, 87%)', label:' '}, {color: 'hsl(168, 42%, 74%)', label:' '}, {color: 'hsl(168, 42%, 61%)', label:' '}, {color: 'hsl(168, 45%, 49%)', label:' '}, {color: 'hsl(168, 76%, 36%)', label:' '}, {color: 'hsl(168, 76%, 31%)', label:' '}, {color: 'hsl(168, 76%, 27%)', label:' '}, {color: 'hsl(168, 76%, 23%)', label:' '}, {color: 'hsl(168, 76%, 19%)', label:' '},			//cian2
					{color: 'hsl(204, 70%, 95%)', label:' '}, {color: 'hsl(204, 70%, 91%)', label:' '}, {color: 'hsl(204, 70%, 81%)', label:' '}, {color: 'hsl(204, 70%, 72%)', label:' '}, {color: 'hsl(204, 70%, 63%)', label:' '}, {color: 'hsl(204, 70%, 53%)', label:' '}, {color: 'hsl(204, 62%, 47%)', label:' '}, {color: 'hsl(204, 62%, 40%)', label:' '}, {color: 'hsl(204, 62%, 34%)', label:' '}, {color: 'hsl(204, 62%, 28%)', label:' '},			//azul2
					{color: 'hsl(6, 78%, 96%)', label:' '}, {color: 'hsl(6, 78%, 91%)', label:' '}, {color: 'hsl(6, 78%, 83%)', label:' '}, {color: 'hsl(6, 78%, 74%)', label:' '}, {color: 'hsl(6, 78%, 66%)', label:' '}, {color: 'hsl(6, 78%, 57%)', label:' '}, {color: 'hsl(6, 59%, 50%)', label:' '}, {color: 'hsl(6, 59%, 43%)', label:' '}, {color: 'hsl(6, 59%, 37%)', label:' '}, {color: 'hsl(6, 59%, 30%)', label:' '},								//rojo2
					{color: 'hsl(145, 45%, 94%)', label:' '}, {color: 'hsl(145, 45%, 88%)', label:' '}, {color: 'hsl(145, 45%, 77%)', label:' '}, {color: 'hsl(145, 45%, 65%)', label:' '}, {color: 'hsl(145, 45%, 53%)', label:' '}, {color: 'hsl(145, 63%, 42%)', label:' '}, {color: 'hsl(145, 63%, 37%)', label:' '}, {color: 'hsl(145, 63%, 32%)', label:' '}, {color: 'hsl(145, 63%, 27%)', label:' '}, {color: 'hsl(145, 63%, 22%)', label:' '},			//verd1
					{color: 'hsl(283, 39%, 95%)', label:' '}, {color: 'hsl(283, 39%, 91%)', label:' '}, {color: 'hsl(283, 39%, 81%)', label:' '}, {color: 'hsl(283, 39%, 72%)', label:' '}, {color: 'hsl(283, 39%, 63%)', label:' '}, {color: 'hsl(283, 39%, 53%)', label:' '}, {color: 'hsl(283, 34%, 47%)', label:' '}, {color: 'hsl(283, 34%, 40%)', label:' '}, {color: 'hsl(283, 34%, 34%)', label:' '}, {color: 'hsl(283, 34%, 28%)', label:' '},			//violeta1
					{color: 'hsl(48, 89%, 95%)', label:' '}, {color: 'hsl(48, 89%, 90%)', label:' '}, {color: 'hsl(48, 89%, 80%)', label:' '}, {color: 'hsl(48, 89%, 70%)', label:' '}, {color: 'hsl(48, 89%, 60%)', label:' '}, {color: 'hsl(48, 89%, 50%)', label:' '}, {color: 'hsl(48, 88%, 44%)', label:' '}, {color: 'hsl(48, 88%, 38%)', label:' '}, {color: 'hsl(48, 88%, 32%)', label:' '}, {color: 'hsl(48, 88%, 26%)', label:' '},					//ama1
					{color: 'hsl(145, 61%, 95%)', label:' '}, {color: 'hsl(145, 61%, 90%)', label:' '}, {color: 'hsl(145, 61%, 80%)', label:' '}, {color: 'hsl(145, 61%, 69%)', label:' '}, {color: 'hsl(145, 61%, 59%)', label:' '}, {color: 'hsl(145, 63%, 49%)', label:' '}, {color: 'hsl(145, 63%, 43%)', label:' '}, {color: 'hsl(145, 63%, 37%)', label:' '}, {color: 'hsl(145, 63%, 31%)', label:' '}, {color: 'hsl(145, 63%, 25%)', label:' '},			//ver2
					{color: 'hsl(282, 39%, 95%)', label:' '}, {color: 'hsl(282, 39%, 89%)', label:' '}, {color: 'hsl(282, 39%, 79%)', label:' '}, {color: 'hsl(282, 39%, 68%)', label:' '}, {color: 'hsl(282, 39%, 58%)', label:' '}, {color: 'hsl(282, 44%, 47%)', label:' '}, {color: 'hsl(282, 44%, 42%)', label:' '}, {color: 'hsl(282, 44%, 36%)', label:' '}, {color: 'hsl(282, 44%, 30%)', label:' '}, {color: 'hsl(282, 44%, 25%)', label:' '},			//violeta2
					{color: 'hsl(37, 90%, 95%)', label:' '}, {color: 'hsl(37, 90%, 90%)', label:' '}, {color: 'hsl(37, 90%, 80%)', label:' '}, {color: 'hsl(37, 90%, 71%)', label:' '}, {color: 'hsl(37, 90%, 61%)', label:' '}, {color: 'hsl(37, 90%, 51%)', label:' '}, {color: 'hsl(37, 86%, 45%)', label:' '}, {color: 'hsl(37, 86%, 39%)', label:' '}, {color: 'hsl(37, 86%, 33%)', label:' '}, {color: 'hsl(37, 86%, 27%)', label:' '},					//ama2
					{color: 'hsl(184, 9%, 96%)', label:' '}, {color: 'hsl(184, 9%, 92%)', label:' '}, {color: 'hsl(184, 9%, 85%)', label:' '}, {color: 'hsl(184, 9%, 77%)', label:' '}, {color: 'hsl(184, 9%, 69%)', label:' '}, {color: 'hsl(184, 9%, 62%)', label:' '}, {color: 'hsl(184, 6%, 54%)', label:' '}, {color: 'hsl(184, 5%, 47%)', label:' '}, {color: 'hsl(184, 5%, 40%)', label:' '}, {color: 'hsl(184, 5%, 32%)', label:' '},					//gri1
					{color: 'hsl(210, 12%, 93%)', label:' '}, {color: 'hsl(210, 12%, 86%)', label:' '}, {color: 'hsl(210, 12%, 71%)', label:' '}, {color: 'hsl(210, 12%, 57%)', label:' '}, {color: 'hsl(210, 15%, 43%)', label:' '}, {color: 'hsl(210, 29%, 29%)', label:' '}, {color: 'hsl(210, 29%, 25%)', label:' '}, {color: 'hsl(210, 29%, 22%)', label:' '}, {color: 'hsl(210, 29%, 18%)', label:' '}, {color: 'hsl(210, 29%, 15%)', label:' '},			//black1
					{color: 'hsl(28, 80%, 95%)', label:' '}, {color: 'hsl(28, 80%, 90%)', label:' '}, {color: 'hsl(28, 80%, 81%)', label:' '}, {color: 'hsl(28, 80%, 71%)', label:' '}, {color: 'hsl(28, 80%, 61%)', label:' '}, {color: 'hsl(28, 80%, 52%)', label:' '}, {color: 'hsl(28, 74%, 46%)', label:' '}, {color: 'hsl(28, 74%, 39%)', label:' '}, {color: 'hsl(28, 74%, 33%)', label:' '}, {color: 'hsl(28, 74%, 27%)', label:' '},					//nara1
					{color: 'hsl(184, 6%, 95%)', label:' '}, {color: 'hsl(184, 6%, 91%)', label:' '}, {color: 'hsl(184, 6%, 81%)', label:' '}, {color: 'hsl(184, 6%, 72%)', label:' '}, {color: 'hsl(184, 6%, 62%)', label:' '}, {color: 'hsl(184, 6%, 53%)', label:' '}, {color: 'hsl(184, 5%, 46%)', label:' '}, {color: 'hsl(184, 5%, 40%)', label:' '}, {color: 'hsl(184, 5%, 34%)', label:' '}, {color: 'hsl(184, 5%, 27%)', label:' '},					//gri2
					{color: 'hsl(210, 9%, 92%)', label:' '}, {color: 'hsl(210, 9%, 85%)', label:' '}, {color: 'hsl(210, 9%, 70%)', label:' '}, {color: 'hsl(210, 9%, 55%)', label:' '}, {color: 'hsl(210, 14%, 39%)', label:' '}, {color: 'hsl(210, 29%, 24%)', label:' '}, {color: 'hsl(210, 29%, 21%)', label:' '}, {color: 'hsl(210, 29%, 18%)', label:' '}, {color: 'hsl(210, 29%, 16%)', label:' '}, {color: 'hsl(210, 29%, 13%)', label:' '},				//black2
					{color: 'hsl(24, 71%, 94%)', label:' '}, {color: 'hsl(24, 71%, 88%)', label:' '}, {color: 'hsl(24, 71%, 77%)', label:' '}, {color: 'hsl(24, 71%, 65%)', label:' '}, {color: 'hsl(24, 71%, 53%)', label:' '}, {color: 'hsl(24, 100%, 41%)', label:' '}, {color: 'hsl(24, 100%, 36%)', label:' '}, {color: 'hsl(24, 100%, 31%)', label:' '}, {color: 'hsl(24, 100%, 26%)', label:' '}, {color: 'hsl(24, 100%, 22%)', label:' '},				//nara2
					]
				},
			  toolbar: {
				  items:['fontColor','fontFamily', 'fontSize','|','bold', 'italic','|', 'undo', 'redo'
						],
				  shouldNotGroupWhenFull: true}
			};
		},

		onReady(editor){
			editor.ui.getEditableElement().parentElement.insertBefore(
				editor.ui.view.toolbar.element,
				editor.ui.getEditableElement()
			);
		},
		habilitarmodalevento(fuentes){
			this.listafuentstr=fuentes;
			this.configurarEditor();
			this.desactivarmodal=false;
		},

	},
	mounted(){
		this.$root.$on('fuentescargadas', this.habilitarmodalevento);
		if(this.habilitarmodal){
			this.listafuentstr=this.fuentes;
			this.configurarEditor();
			this.desactivarmodal=false;
		}else{
			this.desactivarmodal=true;
		}
	}
}

</script>
