<template>
<div>
<div class="page-loader" v-if="!isloaded">
	<div class="cube"></div>
    <div class="cube"></div>
    <div class="cube"></div>
    <div class="cube"></div>
</div>
  <v-app class="fondo">
	  <transition appear appear-active-class="animate__animated  animate__fadeIn">
    <v-navigation-drawer
	  class="sidebar"
      v-model="drawer"
      app
      floating
	  height="100vh"
    >
	<div style="height:inherit;">
      <v-list dense>
        <v-list class="justify-center">
        <div class="sidebar-perfil" align="center">
          <v-list-item-avatar class="foto-perfil" size="120px">
            <img class="rounded-full h-20 w-20 object-cover" :src="fotoperfil" alt="">
          </v-list-item-avatar>
          <p class="text-center text-md-body-1">{{perfilnombre}}</p>
        </div>
        </v-list>

		<v-list-item-group v-model="item"
			active-class=""
			:color="this.itemNavAdmin"
		>
	        <inertia-link @click="clicklink('Perfil')" href="/user/profile">
	        <v-list-item class="ml-4"  :color="this.itemNavAdmin">
	          <v-list-item-action>
	            <v-icon :style="navText">mdi-account</v-icon>
	          </v-list-item-action>
	          <v-list-item-content>
	            <v-list-item-title :style="navText">Perfil</v-list-item-title>
	          </v-list-item-content>
	        </v-list-item>
	        </inertia-link>

		<inertia-link @click="clicklink('Configuraciones')" href="/admin/configuraciones">
	        <v-list-item class="ml-4"  :color="this.itemNavAdmin">
	          <v-list-item-action>
	            <v-icon :style="navText">mdi-cog</v-icon>
	          </v-list-item-action>
	          <v-list-item-content>
	            <v-list-item-title :style="navText">Configuraciones</v-list-item-title>
	          </v-list-item-content>
	        </v-list-item>
	        </inertia-link>

	        <inertia-link @click="clicklink('Individuales')" href="/admin/individuales">
	          <v-list-item class="ml-4"  :color="this.itemNavAdmin">
	          <v-list-item-action>
	            <v-icon :style="navText">mdi-terrain</v-icon>
	          </v-list-item-action>
	          <v-list-item-content>
	            <v-list-item-title :style="navText">Individuales</v-list-item-title>
	          </v-list-item-content>
	        </v-list-item>
	        </inertia-link>

	        <inertia-link @click="clicklink('Historias')" href="/admin/historias">
	        <v-list-item class="ml-4"  :color="this.itemNavAdmin">
	          <v-list-item-action>
	            <v-icon :style="navText">mdi-book-open-variant</v-icon>
	          </v-list-item-action>
	          <v-list-item-content>
	            <v-list-item-title :style="navText">Historias</v-list-item-title>
	          </v-list-item-content>
	        </v-list-item>
	        </inertia-link>

	        <inertia-link @click="clicklink('Proyectos')" href="/admin/proyectos">
	        <v-list-item class="ml-4"  :color="this.itemNavAdmin">
	          <v-list-item-action>
	            <v-icon :style="navText">mdi-clipboard-check-outline</v-icon>
	          </v-list-item-action>
	          <v-list-item-content>
	            <v-list-item-title :style="navText">Proyectos</v-list-item-title>
	          </v-list-item-content>
	        </v-list-item>
	        </inertia-link>

	        <inertia-link @click="clicklink('Viajes')" href="/admin/viajes">
	        <v-list-item class="ml-4"  :color="this.itemNavAdmin">
	          <v-list-item-action >
	            <v-icon :style="navText">mdi-bag-suitcase</v-icon>
	          </v-list-item-action>
	          <v-list-item-content>
	            <v-list-item-title :style="navText">Viajes</v-list-item-title>
	          </v-list-item-content>
	        </v-list-item>
	        </inertia-link>
		</v-list-item-group>
	</v-list>
  	  </div>
    </v-navigation-drawer>
</transition>
	<transition appear appear-active-class="animate__animated  animate__fadeIn">
	    <v-app-bar app  dark class="appbar">
	      <v-app-bar-nav-icon color="white" outline:none @click.stop="drawer = !drawer"></v-app-bar-nav-icon>
	      <v-toolbar-title>{{paginaTipo}}</v-toolbar-title>
		  <v-row class="d-flex flex-row-reverse">
				<v-btn class="mr-7" @click="salir" text color="white">Salir</v-btn>
		  </v-row>
		<v-progress-linear  height="5" absolute bottom :active="loading" indeterminate color="#FAFAFA" ></v-progress-linear>
	    </v-app-bar>
</transition>
	<v-main>
	<transition appear appear-active-class="animate__animated  animate__fadeIn">
      	<article>
        	<slot/>
    	</article>
	</transition>
	<!-- Modal Portal -->
        <portal-target name="modal" multiple>
        </portal-target>
    </v-main>

  </v-app>
</div>
</template>

<style src="./adminstyles.css"></style>

<script>

  export default {

    props: {
      source: String,
    },
    data: () => ({
      drawer: null,
	  paginaTipo:'',
	  paginaTipoTemp:'',
	  perfil:null,
	  fotoperfil:'',
	  perfilnombre:'',
	  item:null,
	  loading:false,
	  admin:false,
	  isloaded: false,
	  dev:0,
	  itemNavAdmin:'white',
    }),
	methods:{
		salir(){
			axios.post("/logout")
			.then( ( response ) => {
				location.reload();
			});
		},
		paginamount(galeria){
			this.paginaTipo=this.paginaTipoTemp;
			if(galeria == "album"){
				this.paginaTipo=this.paginaTipo+' →Album';
			}
		},
		clicklink(pagina){

			this.loading=true;
			this.paginaTipoTemp=pagina;
			if (this.dev == 1){
				this.drawer = !this.drawer;
			}
		},
		activarcargando(){
			console.log("activarcargando");
			this.loading=true;
		},
		desactivarcargando(){
			console.log("desactivarcargando");
			this.loading=false;
		},

	},
	mounted(){
		document.onreadystatechange = () => {
        if (document.readyState == "complete") { 
          this.isloaded = true;
        } 
      	}
		if(window.location.pathname.includes("profile")){
			this.item=0;
		}
		if(window.location.pathname.includes("configuraciones")){
			this.item=1;
		}
		if(window.location.pathname.includes("individuales")){
			this.item=2;
		}
		if(window.location.pathname.includes("historias")){
			this.item=3;
		}
		if(window.location.pathname.includes("proyectos")){
			this.item=4;
		}
		if(window.location.pathname.includes("viajes")){
			this.item=5;
		}

		this.$root.$on('iniciareventocargar', this.activarcargando);
		this.$root.$on('terminareventocargar', this.desactivarcargando);


		this.$root.$on('child-event', this.paginamount);
		axios.get('/adminProfile').then( ( response ) => {
			this.perfil=response.data;
			this.fotoperfil=this.perfil.profile_photo_url;
			this.perfilnombre=this.perfil.name;
		});                                       

		axios.get('/admin/dataDevice').then( ( response ) => {
			this.dev=response.data;
			console.log(this.dev);
		});           




	},
	computed: {
      bienvenido(){
      return{
        'font-family': "Rockwell",
         color: 'black',
        'font-size': 30+'px',
        'font-weight': 'regular',
      }
	},
	navText () {
      return {
        color: 'white',
      }
    },
	}
  }
</script>
<style lang="scss" scoped>
   $colors:#BDBDBD, #616161, #3d3d3d,#000000;

  // -----------------------------------------------------

  .page-loader {
    display: flex;
    justify-content: center;
    align-items: center;
    position: fixed;
    top: 0;
    left: 0;
    width: 100vw;
    height: 100vh;
    background-color:#d6d6d6;
    z-index: 999;
  }

  // -----------------------------------------------------

  .cube{
    width: 40px;
    height: 40px;
    margin-right: 10px;

    @for $i from 1 through length($colors) {
      &:nth-child(#{$i}) {
        background-color: nth($colors, $i);
      }
    }

    &:first-child {
      animation: left 1s infinite;
    }

    &:last-child {
      animation: right 1s infinite .5s;
    }
  }

  // -----------------------------------------------------

  @keyframes left {
    40% {
      transform: translateX(-60px);
    }
    50% {
      transform: translateX(0);      
    }
  }

  @keyframes right {
    40% {
      transform: translateX(60px);
    }
    50% {
      transform: translateX(0);
    }
  }
</style>