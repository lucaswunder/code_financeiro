<template>
    <div>
        <form name="form" method="POST" @submit.prevent="submit">
            <modal :modal="modalOptions">
                <div slot="content">
                    <h4>
                        <slot name="title"></slot>
                    </h4>
                    <div class="row">
                        <div class="input-field col s12">
                            <label class="active">Nome</label>
                            <input type="text" v-model="category.name" placeholder="Digite o nome"/>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12">
                            <label class="active">Categoria pai</label>
                            <select-material :options="parentOptions"
                                             :selected.sync="category.parent_id"></select-material>
                        </div>
                    </div>
                </div>
                <div slot="footer">
                    <slot name="footer"></slot>
                </div>
            </modal>
        </form>
    </div>
</template>
<script>
    import ModalComponent from '../../../../_default/components/Modal.vue';
    import SelectMaterialComponent from '../../../../_default/components/SelectMaterial.vue';

    export default {
        components: {
            'modal': ModalComponent,
            'select-material': SelectMaterialComponent
        },
        props: {
            category: {
                type: Object,
                required: true
            },
            modalOptions: {
                type: Object,
                required: true
            },
            parentOptions: {
                type: Object,
                required: true
            }
        },
        methods: {
            submit() {
                this.$emit('save-category');
            }
        }
    }
</script>