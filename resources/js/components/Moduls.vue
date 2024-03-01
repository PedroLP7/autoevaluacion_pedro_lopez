<template>








        <div class="container mt-3 modulos">
            <h1>Modulos a los que estas inscrito</h1>
  <div class="row">
    <div v-for="modulo in modulos.moduls" :key="modulo.id" class="col-md-4 mb-4">
      <div class="card mt-3">
        <div class="card-body">
            <button class="btn btn-primary" @click="showAutoevaluacio(modulo)">Autoevaluarte</button>
          <h5 class="card-title mt-3">Módulo {{ modulo.id }}</h5>
          <p class="card-text">Código: {{ modulo.codi }}</p>
          <p class="card-text">Siglas: {{ modulo.sigles }}</p>
          <p class="card-text">Nombre: {{ modulo.nom }}</p>
          <!-- <p>ID USU {{  modulos.id}}</p> -->
        </div>
      </div>
    </div>
  </div>
</div>


 <div class="container" id="autoeva">
    <autoeva v-if="showComponente" :modulo="modulo" :selectedModuleId="modulo.id"  :idUsuari="modulos.id"/>
 </div>



</template>

<script>
import axios from 'axios';
import autoeva from './autoevaluacion.vue';



export default {
    components: {
    autoeva
  },
    name: 'Modulos',
    data() {
        return {
            modulos: [],
            usuari: {},
            messageError: '',
            isError: false,
            showComponente : false,
            modulo : {},
        };
    },
    methods: {
        selectUsuario() {
    const me = this;
    axios.get('getUsuario')
        .then(response => {
            me.usuari = response.data;
            // console.log(me.usuari);


            me.selectModulos();
        })
        .catch(error => {
            me.isError = true;
            me.messageError = error.response.data.error;
            console.error(error.response.data.error);
        });

},
selectModulos() {
    const me = this;
    // console.log('usuaris/'+ me.usuari);
    axios.get('usuaris/'+ me.usuari)


        .then(response => {
            me.modulos = response.data;
            // console.log(me.modulos);
        })
        .catch(error => {
            me.isError = true;
            me.messageError = error.response.data.error;
            console.error(error.response.data.error);
        });



    },
    showAutoevaluacio(selectedModulo) {
    this.modulo = selectedModulo;
    this.showComponente = true;
    // console.log(this.modulo);
},

},
    created() {
        this.selectUsuario();

    },
};
</script>


<style>
 .ocultarmodulos{
    display: none;
}



</style>
