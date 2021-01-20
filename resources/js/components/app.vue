<template>
    <div class="body">
        <div class="container h-100">
            <div class="row h-100 mt-5 justify-content-center align-items-center">
                <div class="col-md-8">
                    <div class="card card-custom">
                        <div class="card-header">Cadastro de Usuários</div>
                        <ul class="list-group list-group-flush" v-if="listaNomes.length">
                            <li class="list-group-item" v-for="item in listaNomes">{{ item.name }}</li>
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
                               aria-describedby="nome"
                               placeholder="Insira o nome">
                        <button type="submit" class="btn btn-primary-sell mt-2">
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
        }
    },
    methods: {
        async allUsers() {
            let nomes = await axios.get('http://localhost:8000/api/users');
            this.listaNomes = nomes.data
        }
    },
    beforeMount() {
        this.allUsers()
        console.log(this.listaNomes)
    }
}
</script>
