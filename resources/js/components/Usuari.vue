<template >



<div>
<table class="table">

<tr >
  <th scope="col">Nombre Usuario</th>
  <th scope="col">Correo</th>
  <th scope="col">Nombre Real</th>
  <th scope="col">Cognom</th>
  <th scope="col">Activo</th>
  <th>User Type</th>




</tr>

<tbody>

  <tr v-for="usuari in usuaris">
<td>{{usuari.nom_usuari }}</td>
 <td>{{usuari.correu }}</td>
 <td>{{usuari.nom}}</td>
 <td>{{usuari.cognom}}</td>
    <td><input type="checkbox" :checked="usuari.actiu"></td>
    <td>{{ usuari.tipus_usuari.tipus }}</td>
    <td><button class="btn btn-primary"><i class="bi bi-pencil-square"></i>Editadura</button></td>
    <td><button class="btn btn-danger" @click="confirmDelete(usuari)"><i class="bi bi-trash"></i>Delete</button></td>



</tr>
</tbody>

</table>


    </div>
<!-- modal de borrar -->

<div class="modal" tabindex="-1" id="deleteModal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Confirmacion de eliminar</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <p>Estas seguro que quieres eliminar a {{usuari.nom_usuari  }} </p>
       <span v-if="isError" class="badge text-bg-danger">{{ messageError }}</span>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-danger" @click="deleteUsuari()"><i class="bi bi-trash"></i>Eliminar</button>


      </div>
    </div>
  </div>
</div>














</template>
<script>
import * as bootstrap from 'bootstrap';
export default {
    data(){
        return {
            usuaris: [],
            myModal : {},
            usuari: {},
            messageError : '',
            isError : false,
        }
    },
    methods: {
        selectUsuaris(){
            const me = this;
            axios
            .get('usuaris')
            .then(response => {

                me.usuaris = response.data;

            });
        },
        confirmDelete(usuari){
            this.usuari = usuari;
            this.myModal = new bootstrap.Modal('#deleteModal');
            this.myModal.show();
        },
        deleteUsuari(){
            const me = this;
        axios
        .delete('usuaris/'+ me.usuari.id)
        .then(response => {

            me.selectUsuaris();
            me.myModal.hide();

        })
        .catch(error => {
             me.isError = true;
            me.messageError = error.response.data.error;
            console.log(error.response.data.error);

        });

        }
    },
    created(){
        this.selectUsuaris();
    },

    }


</script>
<style></style>
