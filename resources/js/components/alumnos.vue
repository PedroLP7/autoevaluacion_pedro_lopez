<template>
    <div>
        <div class="row">
        <div v-for="usuari in usuaris" class="col-md-4 mb-4 col-xl-4">
            <div class="card mt-3">
                <div class="card-body">
                    <h5 class="card-title mt-3">
                        Usuario : {{ usuari.nom_usuari }}
                    </h5>
                    <p class="card-text">ID: {{ usuari.id }}</p>
                    <!-- <button
                        @click="mostrarNotas(usuari),getNotas(usuari.id)"
                        class="btn btn-primary"
                    >
                        Ver modulos de {{ usuari.nom_usuari }}
                    </button> -->


                    <div class="mt-3" v-for="modul in usuari.moduls" :key="modul.id">
               <button  @click=" mostrarNotas(usuari,modul),getNotas(usuari.id)"class="btn btn-primary">{{modul.codi+' ' + modul.sigles }}</button>

            </div>

                </div>
            </div>
        </div>
        </div>







 <div class="modal" tabindex="-1" id="modulosmodal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Modulos de {{ usuari.nom +' '+usuari.cognom }}</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">


        <div class="container" id="Modulos2">
    <Modulos2 v-if="showComponente" :usuari="usuari" :nota="nota" :modul="modul" />
 </div>


 </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-primary" ><i class="bi bi-plus-circle"></i> Aceptar</button>


      </div>
    </div>
  </div>
</div>



























    </div>
</template>
<script>
import * as bootstrap from "bootstrap";
import axios from "axios";

import Modulos2 from './Modulos2.vue';

export default {
    components: {
    Modulos2
  },
    name: "alumnos",
    data() {
        return {
            usuaris: [],
            messageError: "",
            isError: false,
            showComponente: false,
            usuari : {},
            nota :{}

        };
    },
    methods: {
        selectUsuaris() {
            const me = this;
            axios.get("usuaris/alumnes").then((response) => {
                me.usuaris = response.data;
            });
        },
        mostrarNotas(usuari,modul) {
            this.usuari = usuari;
            this.modul = modul;
            console.log(modul);

            this.myModal = new bootstrap.Modal('#modulosmodal');
            // console.log(usuari);

            this.showComponente = true;
            this.myModal.show();
        },
        getNotas(usuari){
            const me = this;
           axios.get('usuaris/' + usuari +'/getNotas').then((response) => {
                // console.log(response.data);
                me.nota = response.data;

            });

        }
    },

    created() {
        this.selectUsuaris();
    },
};
</script>
<style></style>./Modulos2.vue
