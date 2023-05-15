<template>
<v-app >
    <v-navigation-drawer dark :style="navMStyle" v-model="drawer" right temporary fixed overlay-opacity='0.5'>
  <v-list-item-group v-model="select" active-class="" :color="this.navMobile ">

        <inertia-link href="/">
        <v-list-item :color="this.navMobile">
          <v-list-item-action>
	            <v-icon :style="navMText">fa-home</v-icon>
	          </v-list-item-action>
          <v-list-item-content :style="navMText">
            <v-list-item-title>Home</v-list-item-title>
          </v-list-item-content>
        </v-list-item>
        </inertia-link>
        <v-list-group no-action  append-icon :style="navMText">
          <template v-slot:activator :color="this.navMobile ">
            <v-list-item-action >
	            <v-icon :style="navMText">fa-image</v-icon>
	          </v-list-item-action>
	          <v-list-item-content>
	            <v-list-item-title :style="navMText">Galeria</v-list-item-title>
	          </v-list-item-content>
            </template>
        <inertia-link href="/individuales">
          <v-list-item class="ml-4" :color="this.navMobile ">
	          <v-list-item-action>
	            <v-icon :style="navMText">mdi-terrain</v-icon>
	          </v-list-item-action>
	          <v-list-item-content>
	            <v-list-item-title :style="navMText">Individuales</v-list-item-title>
	          </v-list-item-content>
	        </v-list-item>
          </inertia-link>
          <inertia-link href="/historias">
          <v-list-item class="ml-4" :color="this.navMobile ">
	          <v-list-item-action>
	            <v-icon :style="navMText">mdi-book-open-variant</v-icon>
	          </v-list-item-action>
	          <v-list-item-content>
	            <v-list-item-title :style="navMText">Historias</v-list-item-title>
	          </v-list-item-content>
	        </v-list-item>
          </inertia-link>
          <inertia-link href="/proyectos">
          <v-list-item class="ml-4" :color="this.navMobile ">
	          <v-list-item-action>
	            <v-icon :style="navMText">mdi-clipboard-check-outline</v-icon>
	          </v-list-item-action>
	          <v-list-item-content>
	            <v-list-item-title :style="navMText">Proyectos</v-list-item-title>
	          </v-list-item-content>
	        </v-list-item>
          </inertia-link>
          <inertia-link href="/viajes">
          <v-list-item class="ml-4" :color="this.navMobile ">
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
        <v-list-item :color="this.navMobile">
          <v-list-item-action>
	            <v-icon :style="navMText">fa-address-card</v-icon>
	          </v-list-item-action>
          <v-list-item-content :style="navMText">
            <v-list-item-title>Sobre Mi</v-list-item-title>
          </v-list-item-content>
        </v-list-item>
        </inertia-link>
        
               
        <inertia-link href="/contacto">
        <v-list-item :color="this.navMobile">
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

  <v-app-bar color="transparent" dark app flat clipped-right absolute>

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
                    <v-list-item-content >
                      <v-list-item-title>Individuales</v-list-item-title>
                    </v-list-item-content>
                  </v-list-item>
                  </inertia-link>
                  <inertia-link href="/historias">
                  <v-list-item>
                    <v-list-item-content >
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
                    <v-list-item-content >
                      <v-list-item-title>Viajes</v-list-item-title>
                    </v-list-item-content>
                  </v-list-item>
                  </inertia-link>
              </v-list>
          </v-menu>
          <inertia-link href="/sobremi" class="mt-3">
          <v-btn text :style="navMenu">Sobre Mi</v-btn>
          </inertia-link>
          <inertia-link href="/contacto" class="mt-3">
          <v-btn text :style="navMenu">Contacto</v-btn>
          </inertia-link>
      </v-toolbar-items>
      <modalventa :color="this.colorNav"></modalventa>
      <v-app-bar-nav-icon @click.stop="drawer = !drawer" dark class="hidden-md-and-up" :style="botonNav"></v-app-bar-nav-icon>
      

    </v-app-bar>
    <v-btn v-scroll="onScroll" v-show="fab" fab fixed bottom right :style="navCBoton" @click="toTop">
        <v-icon :style="navTBoton">mdi-chevron-up</v-icon>
    </v-btn>
<v-main class="ma-0 pa-0" :style="cuerpo">

<v-img  class="imagenPrincipal" :src="this.imagen" height="100vh" widht='100%' cover :lazy-src="this.imagenLow">
  <v-container fill-height>
  <v-row align="center" justify="center">
      <v-col class="text-center" cols="12">
        <transition appear appear-active-class="animate__animated  animate__fadeInDown">
          <div :style="textPrincipal" v-html="this.homeText"></div>
        </transition>
      </v-col>
    </v-row>
  </v-container>  
</v-img>

<v-container>
<v-row class="py-8">
  <v-col cols="12" xs="12" sm="6" md="6" lg="6">
    <v-img :src="this.imagenSecundaria"></v-img>
  </v-col>
  <v-col cols="12" xs="12" sm="6" md="6" lg="6">
    <div v-html="this.textoCuerpo"></div>
  </v-col>
</v-row>
</v-container>
</v-main>
<v-footer :style="footer" height="300">
          <v-col class="align-self-center" cols="12" sm="6" md="6" lg="6">
              <v-row class="justify-space-around">
                <v-btn icon :style="footertxt" href="https://www.instagram.com/bruno.marchesani/">
                  <v-icon>fa-instagram</v-icon>
                </v-btn>
                <v-btn icon :style="footertxt" href="https://www.facebook.com/Bruno-Marchesani-Fot%C3%B3grafo-1784856288208120/">
                    <v-icon>fa-facebook-square</v-icon>
                </v-btn>              
                <v-btn icon :style="footertxt" href="https://www.behance.net/brunomarch3862/appreciated">
                    <v-icon>fa-behance</v-icon>
                </v-btn>
              </v-row>
          </v-col>
          <v-col class="align-self-center" cols="12" sm="6" md="6" lg="6">
            <v-row class="justify-space-around">
              <h6 :style="footertxt">Diseñado por <a :style="footertxt1" href="mailto:galatellisoftware@gmail.com">GalatelliSoftware</a></h6>
            </v-row>
          </v-col>
</v-footer>
</v-app>    
</template>

<style>

.v-navigation-drawer__border {
  width:0px !important;
}
</style>

<script>
export default {
    props:['data'],
    data: () => ({
        index: null,
        select: 2,
        items: [],
        fab: false,
        drawer: false,
        colorNav: '',
        homeText: '',
        colorFooter: '',
        textFooter:'',
        navMobile: '',
        colorNavMobile: '',
        activeNavMobile: '',
        navBoton: '',
        textBoton: '',
        imagen:"",
        colorCuerpo:'',
        textoCuerpo:'',
        colorDiv:'',
        opciones:false,
        changevisualizacion:true,
        indexArray:0,
        imagenSecundaria:'',
        listafuentes:[],
        imagenLow:'',
    
    }),
    methods:{
        onScroll (e) {
            if (typeof window === 'undefined') return
            const top = window.pageYOffset ||   e.target.scrollTop || 0
            this.fab = top > 400
        },
        toTop () {
        this.$vuetify.goTo(0)
        },
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
        console.log(this.$props.data[0]);
        this.imagen= 'storage/' + this.$props.data[0].imagenPrincipal;
        this.imagenLow= 'storage/' + this.$props.data[0].imagenPrincipal_low;
        this.colorNav= this.$props.data[0].textoNavbar;
        this.homeText= this.$props.data[0].textoPrincipal;
        this.colorFooter= this.$props.data[0].colorFooter;
        this.textFooter= this.$props.data[0].textoFooter;
        this.navMobile= this.$props.data[0].textoNavM;
        this.colorNavMobile= this.$props.data[0].colorNavM;
        this.navBoton= this.$props.data[0].colorBotonUp;
        this.textBoton= this.$props.data[0].textoBotonUp;
        this.colorCuerpo= this.$props.data[0].colorCuerpo;
        this.textoCuerpo= this.$props.data[0].textoCuerpo;
        this.colorDiv= this.$props.data[0].colorDiv;
        this.imagenSecundaria= 'storage/' + this.$props.data[0].imagenSecundaria;
        
    },
    computed: {
      footertxt1 () {
      return {
        color: this.textFooter, 
        'font-weight':'bold',
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
    cuerpo(){
        return{
          'background-color':this.colorCuerpo,
        }
    },
    text(){
      return{
        'font-family':'Source Sans Pro',
         color:this.textoCuerpo,
         'font-size':16+'px',
         'font-weight': 'normal',
      }
    },
    titulo1(){
      return{
        'font-family':'brandon-grotesque',
         color:'#3c505d',
         'font-size':20+'px',
         'font-weight': 'bold',
         'letter-spacing': 2+'px',
      }
    },
    textPrincipal(){
      return{
        'font-family': ["Source Sans Pro",'sans-serif'],
         color:this.homeText,
         'font-size':60+'px',
         'font-weight': 'bold',
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
    divColor () {
      return {
        'border-color': this.colorDiv
      }
    },
    footer () {
      return {
        'background-color': this.colorFooter 
      }
    },
    footertxt () {
      return {
        color: this.textFooter 
      }
    },
    navMStyle () {
      return {
        'background-color': this.colorNavMobile  
      }
    },
    navMText () {
      return {
        color: this.navMobile
      }
    },
    navCBoton () {
      return {
        'background': this.navBoton
      }
    },
    navTBoton () {
      return {
        color: this.textBoton 
      }
    },
    }
    

}
</script>