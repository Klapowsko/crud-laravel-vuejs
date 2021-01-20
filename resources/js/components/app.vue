<template>
    <div class="body">
        <div class="container h-100">
            <div class="row h-100 mt-5 justify-content-center align-items-center">
                <div class="col-md-8">
                    <div class="card card-custom">
                        <div class="card-header">Cadastro de Usuários</div>
                        <ul class="list-group list-group-flush" v-if="listaNomes.length">
                            <li class="list-group-item" v-for="(item, index) in listaNomes">
                                {{ item.name }}
                                <div class="buttons">
                                    <span v-on:click="editUser({ indice: index, id: item.id })">
                                        <i class="fas fa-pen"></i> Editar
                                    </span>
                                    <span v-on:click="removeUser({ indice: index, id: item.id })">
                                        <i class="fas fa-trash"></i> Deletar
                                    </span>
                                </div>
                            </li>
                        </ul>
                        <li class="list-group-item" v-else>Nenhum item encontrado.</li>
                    </div>
                </div>
            </div>
            <div class="row h-100 mt-5 justify-content-center align-items-center">
                <div class="col-md-8">
                    <div class="form-group">
                        <label for="input-nome" class="text-white">Nome do Usuário:</label>
                        <input type="text" class="form-control" id="input-nome"
                               aria-describedby="nome" v-model="nome"
                               placeholder="Insira o nome">
                        <button type="submit" class="btn btn-primary-sell mt-2" v-on:click="insertUser">
                            Cadastrar
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import axios from 'axios';
import Swal from 'sweetalert2';

export default {
    data() {
        return {
            listaNomes: [],
            nome: "",
        }
    },
    methods: {
        async allUsers() {
            let nomes = await axios.get('http://localhost:8000/api/users');
            this.listaNomes = nomes.data
        },
        async insertUser() {
            let id = 0;
            if (this.nome === "") { alert("Insira um nome válido!"); }

            await axios.post('http://localhost:8000/api/users/add', {
                nome : this.nome
            }).then(response => {
                id = response;
            })
           this.listaNomes.push({id: id, name: this.nome})
        },
        removeUser(usuario){
           Swal.fire({
                title: 'Tem certeza que deseja remover?',
                text: "Não é possivel reverter essa ação!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#bb86fc',
                cancelButtonColor: '#cf6679',
                confirmButtonText: 'Sim!'
            }).then((result) => {
                if (result.isConfirmed) {
                   axios.delete(`http://localhost:8000/api/users/delete?id=${usuario.id}`)
                    .then(function () {
                        Swal.fire(
                        'Removido!',
                        'nome removido',
                        'success'
                        )
                    })
                    this.listaNomes.splice(usuario.indice, 1)
                }
            })
        },
        editUser(usuario) {
            Swal.fire({
                title: 'Editar Usuario',
                input: 'text',
                inputValue: this.listaNomes[usuario.indice].name,
                inputAttributes: {
                    autocapitalize: 'off'
                },
                showCancelButton: true,
                confirmButtonText: 'Editar',
                confirmButtonColor: '#bb86fc',
                cancelButtonColor: '#cf6679',
                showLoaderOnConfirm: true,
                preConfirm: (nome) => {
                    axios.post("http://localhost:8000/api/users/edit", {
                        id: usuario.id,
                        nome: nome
                    })
                    .then(response => {
                        Swal.fire(
                            'Editado!',
                            'nome editado',
                            'success'
                        )
                    })
                    this.listaNomes[usuario.indice].name = nome;
                },
                allowOutsideClick: () => !Swal.isLoading()
            }).then((result) => {

            })
        }
    },
    beforeMount() {
        this.allUsers()
    },
}
</script>
