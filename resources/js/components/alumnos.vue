<template >
     <div>





        <div v-for="usuari in usuaris" class="col-md-4 mb-4 col-xl-6" >
      <div class="card mt-3">
        <div class="card-body">

          <h5 class="card-title mt-3"> Usuario : {{ usuari.nom_usuari }}</h5>
            <p class="card-text">ID: {{ usuari.id }}</p>
          <button @click="mostrarModulos(usuari)" class="btn btn-primary">Ver modulos de  {{ usuari.nom_usuari }}</button>
            <!-- <div v-for="criteris in usuari.criteris_avaluacio">
                <p class="card-text" >Criterio : {{ criteris.id}}
                    Nota : {{ criteris.pivot.nota }}
                    <br>

                </p>


            </div> -->



        </div>
      </div>
    </div>

    <modulsProfesores :usuari="usuari" v-if="showModuls"></modulsProfesores>






    </div>
</template>
<script>
import * as bootstrap from 'bootstrap';
import modulsProfesores from './modulsProfesores.vue';
export default {
    name: 'alumnos',
    data(){
        return {

            usuaris : [],
            messageError : '',
            isError : false,
            showModuls : false,

        }
    },
    methods: {
        selectUsuaris(){
            const me = this;
            axios
            .get('usuaris/alumnes')
            .then(response => {

                me.usuaris = response.data;

            });
        },
        mostrarModulos(usuari){
            console.log(usuari);

            this.showModuls = true;
        }

        },


    created(){
        this.selectUsuaris();

    },

    }


</script>
<style></style>
