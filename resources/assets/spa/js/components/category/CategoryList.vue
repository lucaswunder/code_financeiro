<template>
    <div class="row">
        <page-title>
            <h5>Administração de Categorias</h5>
        </page-title>
        <div class="card-panel z-depth-5">
            <category-tree :categories="categories"></category-tree>
        </div>
        <category-save :cp-options="cpOptions"
                       :modal-options="modalOptionsSave"
                       :category.sync="categorySave"
                       @save-category="saveCategory">
            <span slot="title">{{title}}</span>
            <div slot="footer">
                <button class="btn btn-flat waves-effect green lighten-2 modal-close modal-action">
                    Ok
                </button>
                <button type="button" class="btn btn-flat red waves-effect waves-red modal-close modal-action">Cancelar</button>
            </div>
        </category-save>
        <div class="fixed-action-btn">
            <button class="btn-floating btn-large" @click="modalNew(null)">
                <i class="large material-icons">add</i>
            </button>
        </div>
    </div>
</template>

<script>
    import PageTitleComponent from '../PageTitle.vue';
    import CategoryTreeComponent from '../category/CategoryTree.vue';
    import CategorySaveComponent from '../category/CategorySave.vue';
    import {Category} from '../../services/resources';
    import {CategoryFormat, CategoryService} from '../../services/category-nsm';


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
                category: null,
                parent: null,
                title: '',
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
                CategoryService.save(this.categorySave,this.parent,this.categories, this.category).then(response =>{
                    if(this.categorySave.id === 0 ){
                        Materialize.toast('Categoria Adicionada com sucesso', 4000);
                    }else{
                        Materialize.toast('Categoria Atualizada com sucesso', 4000);
                    }
                    this.resetScope();
                });
            },
            modalNew(category) {
                this.title = 'Nova Categoria';
                this.categorySave = {
                    id: 0,
                    name: '',
                    parent_id: category === null ? null : category.id
                };
                this.parent = category;
                $(`#${this.modalOptionsSave.id}`).modal('open');
            },
            modalEdit(category, parent) {
                this.title = 'Editar Categoria';
                this.categorySave = {
                    id: category.id,
                    name: category.name,
                    parent_id: category.parent_id
                };
                this.category = category;
                this.parent = parent;
                $(`#${this.modalOptionsSave.id}`).modal('open');
            },
            formatCategories() {
                this.categoriesFormatted = CategoryFormat.getCategoriesFormatted(this.categories);
            },
            resetScope() {
                this.categorySave = {
                    id: 0,
                    name: '',
                    parent_id: 0
                };
                this.category = null,
                this.parent = null;
                this.formatCategories();
            }
        },
        computed: {
            //opções para o campo selec 2  de categorias pai
            cpOptions() {
                return {
                    data: this.categoriesFormatted,
                    templateResult(category) {
                        let margin = '&nbsp'.repeat(category.level * 6)
                        let text = category.hasChildren ? `<strong>${category.text}</strong>` : category.text;
                        return `${margin}${text}`;
                    },
                    escapeMarkup(m) {
                        return m;
                    }
                }
            }
        },
        events: {
            'category-new'(category) {
                this.modalNew(category);
            },
            'category-edit'(category,parent) {
                this.modalEdit(category,parent);
            }
        }
    }
</script>