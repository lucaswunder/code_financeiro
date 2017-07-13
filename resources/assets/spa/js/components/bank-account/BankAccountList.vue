<template>
    <div class="container">
        <div class="card-panel green lighten-3">
            <span class="green-text text-darken-2">
                <h5>Minhas contas bancárias</h5>
            </span>
        </div>
        <table class="bordered striped highlighted responsive-table z-depth-5">
            <thead>
            <tr>
                <th>#</th>
                <th>Nome</th>
                <th>Agencia</th>
                <th>C/C</th>
                <th>Ações</th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="(index,o) in bankAccounts">
                <td>&nbsp;{{index + 1}}</td>
                <td>{{o.name}}</td>
                <td>{{o.agency}}</td>
                <td>{{o.account}}</td>
                <td>
                    <a v-link="{name:'bank-account.update', params:{id:o.id} }">Editar</a>
                    <a href="#" @click.prevent="openModalDelete(o)">Excluir</a>
                </td>
            </tr>
            </tbody>
        </table>

        <div class="fixed-action-btn">
            <a class="btn-floating btn-large" href="#">
                <i class="large material-icons">add</i>
            </a>
        </div>

        <modal :modal="modal">
            <div slot="content" v-if="bankAccountToDelete">
                <h4>Mensagem de confirmação</h4>
                <p><strong>Deseja Excluir esta conta bancária?</strong></p>
                <div class="divider"></div>
                <p>Nome: <strong>{{bankAccountToDelete.name}}</strong></p>
                <p>Agência: <strong>{{bankAccountToDelete.agency}}</strong></p>
                <p>C/C: <strong>{{bankAccountToDelete.account}}</strong></p>
                <div class="divider"></div>
            </div>
        </modal>

        <div slot="footer">
            <button class="btn btn-flat waves-effect green lighten-2 modal-close modal-action"
            @click="destroy()">OK</button>
            <button class="btn btn-flat waves-effect waves-red modal-close modal-action">Cancelar</button>
        </div>
    </div>
</template>

<script type="text/javascript">
    import {BankAccount} from '../../services/resources';
    import ModalComponent from '../../../../_default/components/Modal.vue';

    export default{
        component:{
            'modal': ModalComponent,
        },
        data(){
            return {
                bankAccounts: [],
                bankAccountToDelete: null,
                modal:{
                    id: 'modal-delete'
                }
            };
        },
        created(){
            BankAccount.query().then((response)=>{
               this.bankAccounts = response.data.data;
            });
        },
        methods:{
            destroy(){
                BankAccount.delete({id:this.bankAccountToDelete.id}).then((response)=>{
                   this.bankAccounts.$remove(this.bankAccountToDelete);
                   this.bankAccountToDelete = null;
                   Materialize.toast('Conta bancária excluida com sucesso!', 4000);
                });
            },
            openModalDelete(bankAccount){
                this.bankAccountToDelete = bankAccount;
                $('#modal-delete').modal('open');
            },
        }
    }
</script>