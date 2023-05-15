<template>
<div>

<!--		............................alerta............................ -->


    <v-dialog
      v-model="dialog"
	  persistent
	  width="390"
    >
	<v-alert class="alerta mb-0" color=#1E1E1E type="error" prominent>
		<v-col class="grow" dark>¿Desea eliminar {{this.mensaje}}?</v-col>
		<v-spacer></v-spacer>
		<v-btn large rounded class="ml-6" color='#4b924e' @click="eliminar">Si</v-btn>
		<v-btn large rounded class="ml-8" color='#ca3535' @click="dialog = false">No</v-btn>
	</v-alert>

    </v-dialog>


<!--		............................carta............................ -->

  <v-card
    class="mx-auto carta"
	elevation="16"
	max-width="250px"
	:disabled="desactivarcarta"
  >
     <inertia-link :href="this.ruta">
    <v-img max-height="142px" max-width="250px" :src="'/storage/' + imagenLow"></v-img>
	</inertia-link>

<v-card-text style="text-align:center;">
   <div :style="escondertexto" class="d-flex flex-column mt-4 ml-3 mr-3" v-html="titulo"></div>
</v-card-text>
   <v-expand-transition>
      <div v-show="show">
        <v-card-text>
          <div :style="escondertexto" class="d-flex align-start flex-column ml-3 mr-3" v-html="descripcion"></div>
        </v-card-text>
      </div>
    </v-expand-transition>

    <v-card-actions>
	<v-container fluid>
	<v-row>

		<v-col cols="12" xs="12" sm="12" md="6" lg="6" align="center" justify="center">
			<v-btn small class="carta-modificar" text @click="modificarfoto">
				Modificar
			</v-btn>
		</v-col>
		<v-col cols="12" xs="12" sm="12" md="6" lg="6" align="center" justify="center">
			<v-btn small class="carta-eliminar" text @click="dialog = true">
				Eliminar
			</v-btn>
		</v-col>
	</v-row>
		<v-row align="center" justify="center">
			<v-btn dark icon @click="show = !show" >
				<v-icon>{{ show ? 'mdi-chevron-up' : 'mdi-chevron-down' }}</v-icon>
			</v-btn>
		</v-row>
	</v-container>
    </v-card-actions>
  </v-card>
</div>
</template>

<script>

export default {
  props: ['tipo','id','titulo','descripcion','imagen','imagenLow','rutapag','permitirbotones','picker'],
  data: () => ({
    dialog: false,
    ruta: '',
	rutaElim:'null',
	mensaje:'',
	subtitulopreview:'',
	titulopreview:'',
	escondertexto:"display:block!important;",
	desactivarcarta:false,
	show: false,
  }),
  methods:{
	  modificarfoto(){
		  this.$emit('modificarFoto',this.id,this.titulo,this.descripcion,this.picker,this.$props.imagen);
	  },
	  eliminar(){
		 this.dialog=false;
		 axios.post(this.rutaElim,{"id":this.id});
		 this.$emit('eliminarFoto');
    },
	desactcarta(){
		console.log("desactivarcarta");
		this.desactivarcarta=true;
	},
	activarcarta(){
		console.log("activarcarta");
		this.desactivarcarta=false;
	}
  },
  mounted(){


	this.$root.$on('iniciareventocargar', this.desactcarta);
	this.$root.$on('terminareventocargar', this.activarcarta);

	if(this.permitirbotones){
		this.desactivarcarta=false;
	}else{
		this.desactivarcarta=true;
	}


    if(this.tipo == "album"){
		this.ruta=this.rutapag + '/' + this.id;
		this.rutaElim='/album/delete';
		this.mensaje='este álbum';
	}else if (this.tipo == "imagen") {
		this.ruta='';
		this.rutaElim='/imagen/delete';
		this.mensaje='esta imagen';
	}
  }
}
</script>
