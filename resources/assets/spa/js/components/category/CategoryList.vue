<template>
    <div class="row">
        <page-title>
            <h5>Administração de Categorias</h5>
        </page-title>
        <div class="card-panel z-depth-5">
            <category-tree :categories="categories"></category-tree>
        </div>
        <category-save :cp-options="cpOptions" :modal-options="modalOptionsSave" :category.sync="categorySave"
                       @save-category="saveCategory">
            <span slot="title">{{title}}</span>
            <div slot="footer">
                <button type="submit" class="btn btn-flat waves-effect green lighten-2 modal-close modal-action">
                    Ok
                </button>
                <button class="btn btn-flat waves-effect waves-red modal-close modal-action">Cancelar</button>
            </div>
        </category-save>
    </div>
</template>

<script>
    import PageTitleComponent from '../PageTitle.vue';
    import CategoryTreeComponent from '../category/CategoryTree.vue';
    import CategorySaveComponent from '../category/CategorySave.vue';
    import {Category} from '../../services/resources';


    export default {
        components: {
            'page-title': PageTitleComponent,
            'category-tree': CategoryTreeComponent,
            'category-save': CategorySaveComponent
        },
        data() {
            return {
                categories: [],
                categoriesFormatted: [],
                categorySave: {
                    id: 0,
                    name: '',
                    parent_id: 0
                },
                title: 'Adicionar Categoria',
                modalOptionsSave: {
                    id: 'modal-category-save'
                }
            }
        },
        created() {
            this.getCategories();
        },
        methods: {
            getCategories() {
                Category.query().then(response => {
                    this.categories = response.data.data;
                    this.formatCategories();
                })
            },
            saveCategory() {
                console.log('save');
            },
            modalNew(category) {
                this.categorySave = category;
                $(`#${this.modalOptionsSave.id}`).modal('open');
            },
            modalEdit(category) {

            },
            formatCategories() {
                for (let category of this.categories) {
                    this.categoriesFormatted.push({
                        id: category.id,
                        text: category.name
                    });
                }
            }
        },
        computed: {
            //opções para o campo selec 2  de categorias pai
            cpOptions() {
                return {
                    data: this.categoriesFormatted
                }
            }
        },
        events: {
            'category-new'(category) {
                this.modalNew(category);
            },
            'category-edit'(category) {

            }
        }
    }
</script>