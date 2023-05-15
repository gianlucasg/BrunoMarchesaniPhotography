<template>
  <div class="text-center">
    <v-dialog
      v-model="dialog"
      width="500"
    >
      <template v-slot:activator="{ on, attrs }">
        <v-btn class="mr-4 hidden-md-and-up" fab  small text :style="navMenuGaleria" v-bind="attrs" v-on="on"><v-icon>mdi-cash-usd</v-icon></v-btn>
        <v-btn class="mr-4 hidden-sm-and-down" fab  small text :style="navMenuGaleria" v-bind="attrs" v-on="on"><v-icon>mdi-cash-usd</v-icon></v-btn>
      </template>

      <v-card>
        <v-card-title>
          Metodos de Pago para venta de productos.
        </v-card-title>
        <v-card-subtitle class="mt-2">
           Por favor contactarse con el fotógrafo a través de la sección "Contacto" para consultar sobre los productos en venta. Luego de haber establecido un acuerdo cliente/vendedor, utilizar cualquiera de los siguientes métodos de pago.
        </v-card-subtitle>
        <v-card-text class="mt-4">
          <h6> + Metodo de pago <a href="https://www.paypal.com/paypalme/bruph">Paypal</a></h6>

          <h4> + Metodo de pago MercadoPago. Escanear codigo QR</h4>
          <v-img class="mt-2" max-height="250px" max-width="250px" src="/storage/public/codigoQR/QR.jpg"></v-img>
        </v-card-text>

      </v-card>
    </v-dialog>
  </div>
</template>

<style>
.v-card{
  border-width: 0px;
}
</style>


<script>
  export default {
    props: ['color'],
    data () {
      return {
        dialog: false,
      }
    },
    computed:{
      navMenuGaleria(){
      return{
        'font-family': "Rockwell",
         color: this.color,
        'font-size': 15+'px',
        'font-weight': 'regular',
         'max-height': 36+'px',
         
      }
    },
    }
  }
</script>