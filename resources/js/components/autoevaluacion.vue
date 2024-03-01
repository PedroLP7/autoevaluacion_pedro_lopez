<template>


<form>
         <div>

<table class="table mt-3 table-bordered border-primary align-middle">

<tr  class="">
  <th  class="col-3 " scope="col">Resultados aprendizaje</th>
  <th   scope="col" class="col-2">Criteris evaluacion(3)</th>
  <th class="col-1" scope="col">Nivel 1</th>
  <th class="col-1" scope="col">Nivel2</th>
  <th class="1" scope="col">Nivel 3</th>
  <th class="col-1">Autoevaluacion</th>
</tr>

<tbody>

<tr v-for="resultado in resultados.resultats_aprenentatge">
    <td >{{resultado.descripcio}}</td>
</tr>

<tr v-for="criteri in resultados.criteris_avaluacio" :key="criteri.id">
      <td>{{ criteri.descripcio }}</td>
    </tr>





















</tbody>

</table>


    </div>

</form>











    <div>
 {{modulo.id}}
 {{ modulo.codi }}
    {{ modulo.sigles }}
    {{ modulo.nom }}




</div>
</template>
<script>
import axios from 'axios';

export default {
    props: {
    modulo: Object,
  },
  name: 'autoeva',
  data() {
    return {
        resultados: [],

      messageError: '',
      isError: false,

    };
  },

  methods: {
    selectResultados() {
    const me = this;
    axios.get('moduls/7' )
        .then(response => {
            me.resultados = response.data;
             console.log(me.resultados);




        })
        .catch(error => {
            me.isError = true;
            me.messageError = error.response.data.error;
            console.error(error.response.data.error);
        });


},







  },
  mounted () {
    // console.log('hola');
        this.selectResultados();




    }

}
</script>
<style >
.form-select{
    border-color: #00ff80;
}
.form-select:hover{
    border-color : #00ff80
}
.form-select:focus{
    box-shadow : 0 0 0 0.24rem #00ff80;
    border-color : #00ff80
}

</style>
