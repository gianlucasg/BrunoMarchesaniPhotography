<template>
<v-app >
    <v-navigation-drawer dark :style="navMStyle" v-model="drawer" right temporary fixed overlay-opacity='0.5'>
  <v-list-item-group v-model="select" active-class="" :color="this.navMobile">

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
        <v-list-group no-action  append-icon :color="this.navMobile">
          <template v-slot:activator>
            <v-list-item-action >
	            <v-icon :style="navMText">fa-image</v-icon>
	          </v-list-item-action>
	          <v-list-item-content>
	            <v-list-item-title :style="navMText">Galeria</v-list-item-title>
	          </v-list-item-content>
            </template>
        <inertia-link href="/individuales">
          <v-list-item class="ml-4" :color="this.navMobile">
	          <v-list-item-action>
	            <v-icon :style="navMText">mdi-terrain</v-icon>
	          </v-list-item-action>
	          <v-list-item-content>
	            <v-list-item-title :style="navMText">Individuales</v-list-item-title>
	          </v-list-item-content>
	        </v-list-item>
          </inertia-link>
          <inertia-link href="/historias">
          <v-list-item class="ml-4" :color="this.navMobile">
	          <v-list-item-action>
	            <v-icon :style="navMText">mdi-book-open-variant</v-icon>
	          </v-list-item-action>
	          <v-list-item-content>
	            <v-list-item-title :style="navMText">Historias</v-list-item-title>
	          </v-list-item-content>
	        </v-list-item>
          </inertia-link>
          <inertia-link href="/proyectos">
          <v-list-item class="ml-4" :color="this.navMobile">
	          <v-list-item-action>
	            <v-icon :style="navMText">mdi-clipboard-check-outline</v-icon>
	          </v-list-item-action>
	          <v-list-item-content>
	            <v-list-item-title :style="navMText">Proyectos</v-list-item-title>
	          </v-list-item-content>
	        </v-list-item>
          </inertia-link>
          <inertia-link href="/viajes">
          <v-list-item class="ml-4" :color="this.navMobile">
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
          <v-btn href="/" text :style="navMenu">Sobre Mi</v-btn>
          </inertia-link>
          <inertia-link href="/contacto" class="mt-3">
          <v-btn href="/" text :style="navMenu">Contacto</v-btn>
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
    <h2 :style="text">Escribime!</h2>
    <v-form ref="form" v-model="valid" lazy-validation>

    <v-text-field :color="this.textoCuerpo" required v-model="nombrecompleto" :rules="nombreRules">
      <template v-slot:label>
      <div>Nombre y Apellido <small> (obligatorio)</small></div>
      </template>
    </v-text-field>
    <v-text-field :color="this.textoCuerpo" required v-model="email" :rules="emailRules">
      <template v-slot:label>
      <div>Email<small> (obligatorio)</small></div>
      </template>
    </v-text-field>
    <v-text-field :color="this.textoCuerpo" required v-model="telefono" :rules="telefonoRules">
      <template v-slot:label>
      <div>Telefono<small> (obligatorio)</small></div>
      </template>
    </v-text-field>
    <v-text-field  :color="this.textoCuerpo" required v-model="motivo" :rules="motivoRules">
      <template v-slot:label>
      <div>Motivo<small> (obligatorio)</small></div>
      </template>
    </v-text-field>
    <v-textarea :color="this.textoCuerpo" required v-model="consulta" :rules="consultaRules">
      <template v-slot:label>
        <div>
          Escribime tu consulta<small> (obligatorio)</small>
        </div>
        </template>
      </v-textarea>
      <v-btn x-large :color="this.textoCuerpo" dark outlined @click="enviarMail">
              ENVIA TU CONSULTA!
      </v-btn>
      </v-form>
  </v-col>
</v-row>
</v-container>
<v-snackbar top right v-model="envieExito" :timeout="timeout" color="green lighten-1">
      {{ textEnviado }}
</v-snackbar>
<v-snackbar top right v-model="envieFallido" :timeout="timeout" color="red lighten-1">
      {{ noEnviado }}
</v-snackbar>
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

.v-card{
  border-width: 0px;
}
.v-navigation-drawer__border {
  width:0px !important;
}
</style>

<script>
export default {
    props:['data'],
    data: () => ({
        index: null,
        select: 3,
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
        nombrecompleto:null,
        email:null,
        telefono:null,
        motivo:null,
        consulta:null,
        envieExito:false,
        envieFallido:false,
        textEnviado: 'Su consulta fue enviada de forma exitosa.',
        noEnviado: 'Su consulta no pudo ser enviada. Por favor intentar mas tarde.',
        timeout: 6000,
        status:100,
        listafuentes:[],
        valid: true,
        nombreRules: [
        v => !!v || 'Por favor ingresar nombre y apellido. Es obligatorio',
        ],
        emailRules: [
          v => !!v || 'Por favor ingresar e-mail. Es obligatorio',
          v => /.+@.+\..+/.test(v) || 'E-mail tiene que ser valido',
        ],
        motivoRules: [
        v => !!v || 'Por favor ingresar el motivo. Es obligatorio',
        ],
        consultaRules: [
        v => !!v || 'Por favor ingresar la consulta. Es obligatorio',
        ],
        telefonoRules: [
          v => Number.isInteger(Number(v)) || "Se deben ingresar numeros en este campo",
          v => !!v || 'Por favor ingresar su telefono. Es obligatorio',
        ],
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
        onScroll (e) {
            if (typeof window === 'undefined') return
            const top = window.pageYOffset ||   e.target.scrollTop || 0
            this.fab = top > 400
        },
        toTop () {
        this.$vuetify.goTo(0)
        },
        enviarMail(){

          if(this.$refs.form.validate() == true){
            var fd;
          fd = new FormData();
          fd.set("nombrecompleto",this.nombrecompleto);
          console.log(this.nombrecompleto);
          fd.set("email",this.email);
          fd.set("telefono",this.telefono);
          console.log(this.email);
          fd.set("motivo",this.motivo);
          console.log(this.motivo);
          fd.set("consulta",this.consulta);
          console.log(this.consulta);
          axios.post('/contacto', fd).then(response => {
            this.envieExito=true;
            console.log('se envio el mail');
          
          }).catch(error => {
            this.envieFallido=true
            console.log('no se envio el mail');
          });
          this.$refs.form.reset()

          }
        },

    },
    mounted(){
         this.bajarFuentes();
        this.imagen='storage/' + this.$props.data[0].imagenPrincipal;
        this.imagenLow='storage/' + this.$props.data[0].imagenPrincipal_low;
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
    parallax(){
      return{
        'display':'flex',
        'justify-content': 'center',
        'align-items': 'center',
        'text-align': 'center',
        'height': '100vh',
        'width': '100%',
        'background-image':'url('+this.imagen+')',
        'background-repeat': 'no-repeat',
        'background-size': 'cover',
        'background-attachment': 'fixed',
        'background-position':'center',
        color: '#fff',
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
    divMobile () {
      return {
        'border-color': this.colorNavMobile 
      }
    },
    navAMobile () {
      return {
        color: this.activeNavMobile 
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