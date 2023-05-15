<template>
    <v-app>
    <v-main>
      <v-container
        class="fill-height"
        fluid
      >
        <v-row
          align="center"
          justify="center"
        >
          <v-col
            cols="12"
            sm="8"
            md="4"
          >
            <v-card class="elevation-12">
              <v-toolbar
                color="primary"
                dark
                flat
              >
                <v-toolbar-title>Iniciar Sesion</v-toolbar-title>
                <v-spacer></v-spacer>

                </v-toolbar>
              <v-card-text>
                <v-form>
                  <v-text-field
                    label="email"  v-model="email"
                    prepend-icon="mdi-account"
                    type="text"
                  ></v-text-field>

                  <v-text-field
                    id="password"
                    type="password" label="password"  v-model="password"
                    prepend-icon="mdi-lock" v-on:keyup.enter="validar"
                  ></v-text-field>
                </v-form>
              </v-card-text>
              <v-card-actions>
                <v-spacer></v-spacer>
                <v-btn :loading="cargandoefecto" @click="validar" color="primary">Iniciar Sesion</v-btn>
              </v-card-actions>
            </v-card>
          </v-col>
        </v-row>
      </v-container>
    </v-main>
    </v-app>
</template>
<script>

    export default {
		data: () => ({
			email:'',
			password:'',
			valid:true,
			cargandoefecto:false,
		}),
		methods:{
			validar(){
				 this.cargandoefecto=true;
				 if (this.email != '' && this.password != '') {

		         var fd;
	             fd = new FormData();
	             fd.set("email",this.email);
	             fd.set("password",this.password);
				 axios.post("/login", fd).then( ( response ) => {
					 axios.post("/login",fd).then( ( response ) => {
						this.cargandoefecto=false;
					 	location.reload();
					 });
				 });
			 }else{
				 this.cargandoefecto=false;
			 }

			}
		}
    }
</script>
