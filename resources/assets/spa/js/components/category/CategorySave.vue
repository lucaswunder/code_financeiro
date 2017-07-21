<template>
    <div>
        <form name="form" method="post" @submit.prevent="submit">
            <modal :modal="modalOptions">
                <div slot="content">
                    <h4>
                        <slot name="title"></slot>
                    </h4>

                    <div class="row">
                        <div class="input-field col s12">
                            <label class="active">Nome</label>
                            <input v-model="category.name" placeholder="Nome">
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12">
                            <label class="active">Categoria Pai</label>
                            <input placeholder="Nome">
                        </div>
                    </div>

                </div>
                <div slot="footer">
                    <slot name="footer">
                    </slot>
                </div>
            </modal>
        </form>
    </div>
</template>

<script>
    import ModalComponent from '../../../../_default/components/Modal.vue';

    export default {
        components: {
            'modal': ModalComponent
        },
        props: {
            category: {
                type: Object,
                required: true
            },
            modalOptions: {
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