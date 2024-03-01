<template>


<form>
         <div>

<table class="table mt-3 table-bordered border-primary align-middle">

<tr  class="">
  <!-- <th  class="col-12 " scope="col">Resultados aprendizaje</th> -->
  <th   scope="col-6" class="col-6">Criteris evaluacion</th>
  <th class="col-2" scope="col-3"> </th>
  <th class="col-2" scope="col-3"></th>
  <th class="col-2" scope="col-3"> </th>
  <th class="col-1">Autoevaluacion</th>
</tr>

<tbody>

    <template v-for="resultado in resultados.resultats_aprenentatge">
        <tr>
            <td colspan="5" ><strong>RA : {{resultado.descripcio}}</strong></td>
        </tr>

                <template v-for="criteri in resultado.criteris_avaluacio" :key="criteri.id" >
                    <tr>
                    <td> <strong>Criteri {{ criteri.ordre }}</strong>
                        <br> {{ criteri.descripcio }}</td>

                    <td v-for="rubrica in criteri.rubriques" >
                     <strong>Nivel {{rubrica.nivell  }}</strong>
                        <br>
                        {{  rubrica.descripcio  }}
                    </td>
                    <td><select class="form-select">
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                    </select></td>
                </tr>

            </template>



        </template>


        </tbody>

</table>


    </div>
    <button class="btn btn-primary">CONFIRMAR</button>

</form>











    <div>
 {{modulo.id}}
 {{ modulo.codi }}
    {{ modulo.sigles }}
    {{ modulo.nom }}
    <br>
    {{'idusuari' + idUsuari }}




</div>
</template>
<script>
import axios from 'axios';

export default {
    props: {
    modulo: Object,
     selectedModuleId: Number,
        idUsuari: Number,
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
    axios.get('moduls/'+this.selectedModuleId )
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
  watch: {
    selectedModuleId: function (newVal, oldVal) {
      if (newVal !== oldVal) {
        this.selectResultados();
      }
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
