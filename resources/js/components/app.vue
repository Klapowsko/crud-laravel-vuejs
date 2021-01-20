<template>
    <div class="body">
        <div class="container h-100">
            <div class="row h-100 mt-5 justify-content-center align-items-center">
                <div class="col-md-8">
                    <div class="card card-custom">
                        <div class="card-header">Cadastro de Usuários</div>
                        <ul class="list-group list-group-flush" v-if="listaNomes.length">
                            <li class="list-group-item" v-for="item in listaNomes">
                                {{ item.name }}
                                <div class="buttons">
                                    <span>
                                        <i class="fas fa-pen"></i> Editar
                                    </span>
                                    <span>
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

export default {
    data() {
        return {
            listaNomes:[],
            nome: "",
        }
    },
    methods: {
        async allUsers() {
            let nomes = await axios.get('http://localhost:8000/api/users');
            this.listaNomes = nomes.data
        },
        async insertUser() {
            if (this.nome === "") { alert("Insira um nome válido!"); }
            await axios.post('http://localhost:8000/api/users', {
                nome : this.nome
            })
           this.listaNomes.push({name: this.nome})
        }
    },
    beforeMount() {
        this.allUsers()
    },
}
</script>
