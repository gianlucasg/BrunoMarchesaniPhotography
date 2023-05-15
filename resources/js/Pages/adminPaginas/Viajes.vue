<template>
	<v-app class="fondo">
		<div>
				<v-container class="hidden-md-and-up">
					<v-row>
						<v-col align="center" justify="center" cols="12" xs="12" sm="12" md="6" lg="6">
							<modal ref="modal" @modificaralbum="modificarAlbum" @subiralbum="subir" rutapost='/admin/viajes' elemento='álbum'></modal>
						</v-col>
						<v-col  align="center" justify="center" cols="12" xs="12" sm="12" md="6" lg="6">
						<v-pagination
							class="paginador my-4"
							v-bind:style="paginationactive"
							v-model="page"
							:length="albums.last_page"
							total-visible="7"
							@input="cambiarpagina"
						></v-pagination>
					</v-col>
					</v-row>
					<v-divider class="ma-4" ></v-divider>
				</v-container>
				<v-container class="hidden-sm-and-down">
					<v-row>
						<v-col  align="center" justify="center" cols="12" xs="12" sm="12" md="6" lg="6">
						<v-pagination
							class="paginador my-4"
							v-bind:style="paginationactive"
							v-model="page"
							:length="albums.last_page"
							total-visible="7"
							@input="cambiarpagina"
						></v-pagination>
					</v-col>
					<v-col align="end" justify="center" cols="12" xs="12" sm="12" md="6" lg="6">
							<modal ref="modal" @modificaralbum="modificarAlbum" @subiralbum="subir" rutapost='/admin/viajes' elemento='álbum'></modal>
						</v-col>
					</v-row>
					<v-divider class="ma-4" ></v-divider>
				</v-container>

			<div v-bind:style="seccionalertacss">
				<v-container fill-height>
	    			<v-row style="height: 500px;" justify="center" align="center">
						<v-alert elevation="7" border="left" max-width="900" text :value="nofotoalerta" type="info">
	      					Ningún álbum en esta sección, podés crear uno
							presionando el botón: "Crear Álbum"

							<v-icon>mdi-arrow-up-bold-outline</v-icon>
	    				</v-alert>
	    			</v-row>
				</v-container>
			</div>

			<v-container>
				<v-layout row wrap>
					<v-col cols="12" xs="12" sm="6" md="6" lg="3" v-for="album in albums.data" :key="album.id">
						<transition appear appear-active-class="animate__animated  animate__fadeIn">
							<card  :permitirbotones="permitirbotones" @modificarFoto="modificar" @eliminarFoto="eliminar" :rutapag="ruta" tipo="album" v-bind:id="album.id" v-bind:titulo="album.titulo" v-bind:descripcion="album.path_texto" v-bind:imagen="album.path_foto" v-bind:imagenLow="album.path_foto_low" v-bind:picker="album.colorbarrasuperior"></card>
						</transition>
					</v-col>
				</v-layout>
			</v-container>
		</div>
		<v-snackbar top centered v-model="mensajesubir" timeout="3000" color="green lighten-1">
		      Subida exitosa.
		</v-snackbar>
		<v-snackbar top centered v-model="mensajemodificar" timeout="3000" color="green lighten-1">
		      Modificación exitosa.
		</v-snackbar>
		<v-snackbar top centered v-model="mensajefallidosubir" timeout="3000" color="red lighten-1">
		      Error al subir. Por favor recargue la pagina o intente mas tarde.
		</v-snackbar>
		<v-snackbar top centered v-model="mensajefallidomodificar" timeout="3000" color="red lighten-1">
		      Error al modificar. Por favor recargue la pagina o intente mas tarde.
		</v-snackbar>
	</v-app>
</template>

<script>
import Layout from '../administrador'
export default {
  name: 'Viajes',
  layout: (h, page) => h(Layout, [page]),
  props: {
    albumspagi: Object,
  },
  data: () => ({
	mensajesubir:false,
	mensajemodificar:false,
	mensajefallidosubir:false,
	mensajefallidomodificar:false,
	albums: [],
	tempid:0,
	page:1,
	ruta:'',
	nofotoalerta:false,
	permitirbotones:false,
	seccionalertacss: {display: 'none'},
	paginationactive: {display: 'none'},
  }),
  methods:{
		verificarAlerta(){
			if (this.albums.total==0){
				this.nofotoalerta=true;
				this.seccionalertacss={display: 'block'};
				this.paginationactive={display: 'none'};
			}else{
				this.nofotoalerta=false;
				this.seccionalertacss={display: 'none'};
				this.paginationactive={display: 'block'};
			}
		},
		modificarAlbum(){
			this.$root.$emit("iniciareventocargar");
			axios.get(this.ruta +'/data?page='+this.page).then( ( response ) => {
				this.albums =  response.data;
				this.$root.$emit("terminareventocargar");
			});
		},
		modificar(id,titulo,descripcion,picker,imagen){
			this.$refs.modal.modificar(id,titulo,descripcion,picker,imagen);
		},
	  subir(data){
		    this.$root.$emit("iniciareventocargar");
			axios.get(this.ruta +'/data?page=1').then( ( response ) => {
				this.albums =  response.data;
				this.page=1;
				this.verificarAlerta();
				this.$root.$emit("terminareventocargar");
			});
	  },
	  eliminar(){
		    this.$root.$emit("iniciareventocargar");
			axios.get(this.ruta +'/data?page='+this.page)
				.then( ( response ) => {
					this.albums = response.data;
					if(this.page > this.albums.last_page){
						var temppageid=this.page-1;
						axios.get(this.ruta +'/data?page='+temppageid)
						.then( ( response ) => {
							this.page-=1;
							this.albums = response.data;
						});
					}
					this.$root.$emit("terminareventocargar");
					this.verificarAlerta();
  		  		});
	  },
	  cambiarpagina(){
		    this.$root.$emit("iniciareventocargar");
			axios.get(this.ruta +'/data?page='+this.page).then( ( response ) => {
				this.albums =  response.data;
				this.$root.$emit("terminareventocargar");
			});
	  },
		activarbtn(){
			this.permitirbotones=true;
		},
		msjsubir(){
			this.mensajesubir=true;
		},
		msjmodificar(){
			this.mensajemodificar=true;
		},
		msjfallidosubir(){
			this.mensajefallidosubir=true;
		},
		msjfallidomodificar(){
			this.mensajefallidomodificar=true;
		},
  },

  mounted(){
	this.$root.$on("msjexitomodificar",this.msjmodificar);
	this.$root.$on("msjexitosubir",this.msjsubir);
	this.$root.$on("msjfallidosubir",this.msjfallidosubir);
	this.$root.$on("msjfallidomodificar",this.msjfallidomodificar);
	this.$root.$on('permitirbotones', this.activarbtn);
	this.ruta=window.location.pathname.slice(0,13); //SOLUCION BUG RUTA
	this.albums = this.$props.albumspagi;
	this.verificarAlerta();
	this.$root.$emit('child-event',"principal");
  }
};

</script>

<style scoped>

</style>
