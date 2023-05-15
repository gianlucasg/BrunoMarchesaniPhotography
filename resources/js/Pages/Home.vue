<template>
<v-app >
    <v-navigation-drawer dark :style="navMStyle" v-model="drawer" right temporary fixed overlay-opacity='0.5'>
  <v-list-item-group v-model="select" active-class="" :color="this.itemNavMobile">

        <inertia-link href="/">
        <v-list-item :color="this.itemNavMobile">
          <v-list-item-action>
	            <v-icon :style="navMText">fa-home</v-icon>
	          </v-list-item-action>
          <v-list-item-content :style="navMText">
            <v-list-item-title>Home</v-list-item-title>
          </v-list-item-content>
        </v-list-item>
        </inertia-link>
        <v-list-group no-action  append-icon :color="this.itemNavMobile">
          <template v-slot:activator :color="this.itemNavMobile">
            <v-list-item-action >
	            <v-icon :style="navMText">fa-image</v-icon>
	          </v-list-item-action>
	          <v-list-item-content>
	            <v-list-item-title :style="navMText">Galeria</v-list-item-title>
	          </v-list-item-content>
            </template>
        <inertia-link href="/individuales">
          <v-list-item class="ml-4" :color="this.itemNavMobile">
	          <v-list-item-action >
	            <v-icon :style="navMText">mdi-terrain</v-icon>
	          </v-list-item-action>
	          <v-list-item-content>
	            <v-list-item-title :style="navMText">Individuales</v-list-item-title>
	          </v-list-item-content>
	        </v-list-item>
          </inertia-link>
          <inertia-link href="/historias">
          <v-list-item class="ml-4" :color="this.itemNavMobile">
	          <v-list-item-action>
	            <v-icon :style="navMText">mdi-book-open-variant</v-icon>
	          </v-list-item-action>
	          <v-list-item-content>
	            <v-list-item-title :style="navMText">Historias</v-list-item-title>
	          </v-list-item-content>
	        </v-list-item>
          </inertia-link>
          <inertia-link href="/proyectos">
          <v-list-item class="ml-4" :color="this.itemNavMobile">
	          <v-list-item-action>
	            <v-icon :style="navMText">mdi-clipboard-check-outline</v-icon>
	          </v-list-item-action>
	          <v-list-item-content>
	            <v-list-item-title :style="navMText">Proyectos</v-list-item-title>
	          </v-list-item-content>
	        </v-list-item>
          </inertia-link>
          <inertia-link href="/viajes">
          <v-list-item class="ml-4" :color="this.itemNavMobile">
	          <v-list-item-action>
	            <v-icon :style="navMText">mdi-bag-suitcase</v-icon>
	          </v-list-item-action>
	          <v-list-item-content>
	            <v-list-item-title :style="navMText">Viajes</v-list-item-title>
	          </v-list-item-content>
	        </v-list-item>
          </inertia-link>

      </v-list-group>
    
        
        <inertia-link href="/sobremi">
        <v-list-item :color="this.itemNavMobile">
          <v-list-item-action>
	            <v-icon :style="navMText">fa-address-card</v-icon>
	          </v-list-item-action>
          <v-list-item-content :style="navMText">
            <v-list-item-title>Sobre Mi</v-list-item-title>
          </v-list-item-content>
        </v-list-item>
        </inertia-link>
        
               
        <inertia-link href="/contacto">
        <v-list-item :color="this.itemNavMobile">
          <v-list-item-action>
	            <v-icon :style="navMText">fa-envelope</v-icon>
	          </v-list-item-action>
          <v-list-item-content :style="navMText">
            <v-list-item-title>Contacto</v-list-item-title>
          </v-list-item-content>
        </v-list-item>
        </inertia-link>
        
  </v-list-item-group>
  </v-navigation-drawer>
  
  <v-app-bar color="transparent" light app flat clipped-right absolute>
      <inertia-link href="/">
        <h6 class="pl-2 hidden-md-and-up" :style="nombre1">Bruno Marchesani</h6>
        <h6 class="pl-12 hidden-sm-and-down" :style="nombre">Bruno Marchesani</h6>
      </inertia-link>
      <v-spacer></v-spacer>
      <v-toolbar-items class="hidden-sm-and-down pr-16">
          <inertia-link href="/" class="mt-3">
            <v-btn text :style="navMenu">Home</v-btn>
          </inertia-link>
          <v-menu open-on-hover offset-y>
              <template v-slot:activator="{ on, attrs }">
                <v-btn class="mt-3" text v-bind="attrs" v-on="on" :style="navMenuGaleria">Galeria</v-btn>
              </template>
               <v-list>
                 <inertia-link href="/individuales">
                 <v-list-item>
                    <v-list-item-content>
                      <v-list-item-title >Individuales</v-list-item-title>
                    </v-list-item-content>
                  </v-list-item>
                  </inertia-link>
                  <inertia-link href="/historias">
                  <v-list-item>
                    <v-list-item-content>
                      <v-list-item-title>Historias</v-list-item-title>
                    </v-list-item-content>
                  </v-list-item>
                  </inertia-link>
                  <inertia-link href="/proyectos">
                  <v-list-item>
                    <v-list-item-content>
                      <v-list-item-title>Proyectos</v-list-item-title>
                    </v-list-item-content>
                  </v-list-item>
                  </inertia-link>
                  <inertia-link href="/viajes">
                  <v-list-item>
                    <v-list-item-content>
                      <v-list-item-title>Viajes</v-list-item-title>
                    </v-list-item-content>
                  </v-list-item>
                  </inertia-link>
              </v-list>
          </v-menu>
          <inertia-link href="/sobremi" class="mt-3">
          <v-btn href="/" text :style="navMenu">Sobre Mi</v-btn>
          </inertia-link>
          <inertia-link href="/contacto" class="mt-3">
          <v-btn href="/" text :style="navMenu">Contacto</v-btn>
          </inertia-link>
      </v-toolbar-items>
      <modalventa :color="this.colorNav"></modalventa>
      <v-app-bar-nav-icon @click.stop="drawer = !drawer" dark class="hidden-md-and-up" :style="botonNav"></v-app-bar-nav-icon>
  
      

    </v-app-bar>
    
    <v-main class="ma-0 pa-0">
   <v-img :src="this.imagen" height="100vh" widht='100%' cover :lazy-src="this.imagenLow">
    <v-container class="fill-height">
        <v-row class="fill-height">
          <transition appear appear-active-class="animate__animated  animate__flipInY">
          <v-col class="align-self-center" cols="12" sm="6" md="6" lg="6">
            <v-row class="justify-center text-center">
            <div class="px-2" :style="tituloPrincipalStyle" v-html="this.text"></div>
            </v-row>
            <v-row class="justify-center">
            <inertia-link href="/sobremi">
              <v-btn rounded :color="this.colorMasInfo">
                <h4 :style="masinfotxt">MÁS INFO</h4>
              </v-btn>
            </inertia-link>
          </v-row>
          </v-col>
          </transition>
          <v-col class="align-self-center" cols="12" sm="6" md="6" lg="6">
            <div class="hidden-sm-and-down">
              <v-row class="justify-end">
                <v-btn icon :style="redes" href="https://www.instagram.com/bruno.marchesani/">
                  <v-icon>fa-instagram</v-icon>
                </v-btn>
              </v-row >
              <v-row class="justify-end">
                <v-btn icon :style="redes" href="https://www.facebook.com/Bruno-Marchesani-Fot%C3%B3grafo-1784856288208120/">
                    <v-icon>fa-facebook-square</v-icon>
                </v-btn>
              </v-row>
              <v-row class="justify-end">
                <v-btn icon :style="redes" href="https://www.behance.net/brunomarch3862/appreciated">
                    <v-icon>fa-behance</v-icon>
                </v-btn>
              </v-row>
            </div>
            <div class="hidden-md-and-up">
              <v-row class="justify-space-around align-sm-end">
                <v-btn icon :style="redes" href="https://www.instagram.com/bruno.marchesani/">
                  <v-icon>fa-instagram</v-icon>
                </v-btn>
                <v-btn icon :style="redes" href="https://www.facebook.com/Bruno-Marchesani-Fot%C3%B3grafo-1784856288208120/">
                    <v-icon>fa-facebook-square</v-icon>
                </v-btn>              
                <v-btn icon :style="redes" href="https://www.behance.net/brunomarch3862/appreciated">
                    <v-icon>fa-behance</v-icon>
                </v-btn>
              </v-row>
            </div>
          </v-col>
        </v-row>
      </v-container>
  </v-img>
    </v-main>  
  
</v-app>
</template>
<script>
export default {
    props:['datos'],
    data: () => ({
       drawer: false,
       item: 0,
       imagen: "",
       colorNav: '',
       text: '',
       colorNavMobile: '',
       itemNavMobile: '',
       colorRedes:'',
       select:0,
       listafuentes:[],
       colorMasInfo:'',
       textoMasInfo:'',
       imagenLow:'',
      
    }),
     methods:{
       cargarFuentes(){
			var WebFont = require('webfontloader');
			for (var i = 0; i < this.listafuentes.length; i++) {
				WebFont.load({
					google: {
						api: 'https://fonts.googleapis.com/css2',
						families: [ this.listafuentes[i].nombre ]
					},
				});
			}
			

		},
		bajarFuentes(){
			axios.post("/bajarFuentes").then( ( response ) => {
				this.listafuentes=response.data;
				this.cargarFuentes();


		  	});
		},
     },
    mounted(){
       this.bajarFuentes();
      this.imagen= 'storage/' + this.$props.datos[0].imagenPrincipal;
      this.imagenLow= 'storage/' + this.$props.datos[0].imagenPrincipal_low;
      this.colorNav= this.$props.datos[0].textoNavbar;
      this.text= this.$props.datos[0].textoPrincipal;
      this.colorNavMobile= this.$props.datos[0].colorNavM;
      this.itemNavMobile= this.$props.datos[0].textoNavM;
      this.colorRedes= this.$props.datos[0].colorRedes;

      this.colorMasInfo= this.$props.datos[0].colorBotonUp;
      this.textoMasInfo= this.$props.datos[0].textoBotonUp;
    },
    computed: {
      masinfotxt(){
      return{
        color:this.textoMasInfo,
      }
    },
    redes(){
      return{
        color:this.colorRedes,
      }
    },
    tituloPrincipalStyle(){
      return {
        'font-size': 30+'px',
      }
    },
    nombre(){
      return {
      'font-family': "Perpetua Titling MT",
       color: this.colorNav,
      'font-size': 30+'px',
      'font-weight': 'light',
      }
    },
    nombre1(){
      return {
      'font-family': "Perpetua Titling MT",
       color: this.colorNav,
      'font-size': 20+'px',
      'font-weight': 'light',
      }
    },
    navMenu(){
      return{
        'font-family': "Rockwell",
         color: this.colorNav,
        'font-size': 15+'px',
        'font-weight': 'regular',
      }
    },
    navMenuGaleria(){
      return{
        'font-family': "Rockwell",
         color: this.colorNav,
        'font-size': 15+'px',
        'font-weight': 'regular',
         'max-height': 36+'px',
         
      }
    },
    botonNav(){
      return{
        color: this.colorNav,
      }
    },
    navMStyle () {
      return {
        'background-color': this.colorNavMobile 
      }
    },
    navMText () {
      return {
        color: this.itemNavMobile
      }
    },

    }
}
</script>