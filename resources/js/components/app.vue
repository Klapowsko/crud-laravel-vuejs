<template>
    <div class="body">
        <div class="container h-100">
            <div class="row h-100 mt-5 justify-content-center align-items-center">
                <div class="col-md-8">
                    <div class="card card-custom">
                        <div class="card-header">Cadastro de Usuários</div>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">Cras justo odio</li>
                            <li class="list-group-item">Dapibus ac facilisis in</li>
                            <li class="list-group-item">Morbi leo risus</li>
                            <li class="list-group-item">Porta ac consectetur ac</li>
                            <li class="list-group-item">Vestibulum at eros</li>
                        </ul>
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
export default {
    mounted() {
        console.log('Component mounted.')
    }
}
</script>
