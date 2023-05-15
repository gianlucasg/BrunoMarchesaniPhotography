<template>
<div>
    <v-dialog v-model="dialog" width="300" persistent >
      <template v-slot:activator="{ on, attrs }">
            <v-btn class="ma-2" tile color='#e4b747' v-bind="attrs" v-on="on">
                <v-icon left>mdi-pencil</v-icon> Editar
            </v-btn>
      </template>
        <v-card width="300" dark>
           <v-container>
                <v-color-picker v-model="color" hide-mode-switch mode='hexa'></v-color-picker>
           </v-container>
            <v-card-actions>
                <v-container fill-height>
                    <v-row align="center" justify="center">
                        <v-btn color='white' text @click="dialog = false">Cancelar</v-btn>
                        <v-btn color='#4b924e' text @click="guardar">Seleccionar</v-btn>
                    </v-row>
                </v-container>
            </v-card-actions>
        </v-card>
    </v-dialog>
</div>
</template>
<script>
export default {
    props: ['id','setear'],
    data: () => ({
        dialog: false,
        color: '',
    }),
    methods:{
	  setearColor(color){
		this.color=color;
	  },
	  guardar(){
          this.$emit('guardarColor',this.id,this.color);
          this.dialog= false;
	  },

  },
  mounted(){
	  this.$root.$on('cambiarcolorpicker', this.setearColor);
	  if((this.setear != 'null')&&(this.setear != null)){
		  this.setearColor(this.setear);
	  }else{this.color='#FFFFFFFF';}
  }

}
</script>
