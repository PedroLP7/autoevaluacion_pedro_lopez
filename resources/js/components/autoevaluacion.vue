<template>
    <div>
         Tabla con resultados de aprendizaje

         <div>

<table class="table mt-3">

<tr >
  <th scope="col">Resultados aprendizaje</th>
  <th scope="col">Criteris evaluacion(3)</th>
  <th scope="col">Nivel 1</th>
  <th scope="col">Nivel2</th>
  <th scope="col">Nivel 3</th>
  <th>Autoevaluacion</th>




</tr>

<tbody>






</tbody>

</table>


    </div>












    </div>
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
    axios.get('resultats_aprenentatge')
        .then(response => {
            me.resultados = response.data;
             console.log(me.resultados);
             console.log('hola');



        })
        .catch(error => {
            me.isError = true;
            me.messageError = error.response.data.error;
            console.error(error.response.data.error);
        });

},
mounted () {
    console.log('hola');
        this.selectResultados();

    },
  }

}
</script>
<style >

</style>
