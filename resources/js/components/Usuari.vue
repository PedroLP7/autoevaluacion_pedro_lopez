<template >



<div>
    <button class="btn btn-primary m-3" @click="showForm()"><i class="bi bi-plus-square"></i> Añadir usuario</button>
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
    <td><button class="btn btn-primary" @click ="editUsuari(usuari)"> <i class="bi bi-pencil-square"></i> Editadura</button></td>
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



<!-- modal de insert/update -->

<div class="modal" tabindex="-1" id="usuarimodal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Creacion nuevo usu</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">

        <form>

            <div class="form-group row px-2 mt-3">
                <label for="nombreUsuario" class="col-sm-2 col-form-label">Nombre Usuario</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="nombreUsuario" name="nombreUsuario"  v-model="usuari.nom_usuari">
                </div>
            </div>

            <div class="form-group row px-2 mt-3">
                <label for="contrasenya" class="col-sm-2 col-form-label">Contraseña</label>
                <div class="col-sm-10">
                  <input type="password" class="form-control" id="contrasenya" name="contrasenya" value="" v-model="usuari.contrasenya">
                </div>
            </div>
            <div class="form-group row mt-3 px-2">
              <label for="correo" class="col-sm-2 col-form-label">Correo</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="correo" name="correo" value="" v-model="usuari.correu">
              </div>
            </div>
            <div class="form-group row mt-3 px-2">
                <label for="nombre" class="col-sm-2 col-form-label">nombre</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="nombre" name="nombre" value="" v-model="usuari.nom">
                </div>
            </div>
            <div class="form-group row mt-3 px-2">
                <label for="apellido" class="col-sm-2 col-form-label">apellido</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="apellido" name="apellido" value="" v-model="usuari.cognom">
                </div>
            </div>
            <div class="form-group row mt-3 px-2">
                <label for="tipoUsuario" class="col-sm-2 col-form-label">Tipo Usuario</label>
                <div class="col-sm-10">
                    <select class="form-select" name="tipus_usuaris_id" id="tipus_usuaris_id" v-model="usuari.tipus_usuaris_id">
          <option v-for="tipus in tipus_usuaris" :value="tipus.id">{{ tipus.tipus }} {{ tipus.id }} {{ usuari.tipus_usuaris_id }}</option>
        </select>



                <!-- <select name="tipoUsu" id="tipoUsu"  v-model="usuari.tipoUsuario">

                </select> -->

                </div>
            </div>


            <div class="form-group mt-3">
                <label class="form-check-label px-2" for="flexCheckChecked">
                    Activo
                </label>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="actiu" id="activo" name="activo" :checked="usuari.actiu">
                </div>
            </div>



</form>
<span v-if="isError" class="badge text-bg-danger">{{ messageError }}</span>

 </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-primary" @click="insertUser()"><i class="bi bi-plus-circle"></i> Aceptar</button>


      </div>
    </div>
  </div>
</div>














</template>
<script>
import * as bootstrap from 'bootstrap';
export default {
    name: 'Usuari',
    data(){
        return {
            usuaris: [],
            myModal : {},
            usuari: {},
            messageError : '',
            isError : false,
            tipus: {},
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
        selectTipusUsuaris(){
            const me = this;
            axios
            .get('tipus_usuaris')
            .then(response => {

                me.tipus_usuaris = response.data;

            });
        },
        editUsuari(usuari){
            this.usuari = usuari;
            this.myModal = new bootstrap.Modal('#usuarimodal');
            this.myModal.show();

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

        },
        showForm(){
            this.isError = false;
            this.usuari = {};
            this.myModal = new bootstrap.Modal('#usuarimodal');

            this.myModal.show();
        },
        insertUser(){
            const me = this;
            axios
            .post('usuaris', me.usuari)
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
        this.selectTipusUsuaris();
    },

    }


</script>
<style></style>
