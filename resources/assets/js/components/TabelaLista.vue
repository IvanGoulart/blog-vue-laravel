<template>
    <div>
        <div class="form-imline">
            <a v-if="criar" v-bind:href="criar">Criar</a>
            <div class="form-group pull-right">  
                <input type="search" class="form-control" placeholder="Buscar" v-model="buscar">               

            </div>          
         </div>   
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th v-for="(titulo, index) in titulos" v-bind:key="index">{{titulo}}</th>
                    <th v-if="detalhe || editar || deletar">Ação</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="(item, index) in lista" v-bind:key="index">
                    <td v-for="(i, index) in item" v-bind:key="index">{{ i }}</td>

                    <td v-if="detalhe || editar || deletar">

                         <form v-bind:id="index" v-if="deletar && token" v-bind:action="deletar" method="post">
                            <input type="hidden" name="_method" value="DELETE">
                            <input type="hidden" name="_token" v-bind:value="token">

                            <a v-if="detalhe" v-bind:href="detalhe"> Detalhe |</a> 
                            <a v-if="editar" v-bind:href="editar"> Editar |</a>
                            <a href="#" v-on:click="executaform(index)"> Deletar</a>
                         </form>
                        <span v-if="!token">
                            <a v-if="detalhe" v-bind:href="detalhe"> Detalhe |</a> 
                            <a v-if="editar" v-bind:href="editar"> Editar |</a>
                            <a v-if="deletar" v-bind:href="deletar"> Deletar</a> 
                        </span>
                        <span v-if="!token && !deletar">
                            <a v-if="detalhe" v-bind:href="detalhe"> Detalhe |</a> 
                            <a v-if="editar" v-bind:href="editar"> Editar |</a>
                            <a v-if="deletar" v-bind:href="deletar"> Deletar</a> 
                        </span>

                    </td>

                </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
    export default {
        props: ['titulos', 'itens', 'criar', 'detalhe', 'editar', 'deletar', 'token' ],
        data: function(){
            return{
                buscar:'',
            }
        },
        methods: {
            executaForm: function(index){
                document.getElementById('index').submit();
            }
        },
        computed: {
            lista:function(){
                return this.itens.filter(res => {
                    for(let k = 0; k < res.length; k++){
                        if((res[k] + "").toLowerCase().indexOf(this.buscar.toLowerCase()) >= 0){
                            return true;
                        }
                    }
                    return false;
                    
                });


                return this.itens;
            }
        }
    }
</script>
