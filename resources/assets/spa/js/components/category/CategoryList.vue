<template>
    <div class="row">
        <page-title>
            <h5>Administração de Categorias</h5>
        </page-title>
        <div class="card-panel z-depth-5">
            <category-tree :categories="categories"></category-tree>
        </div>
    </div>
</template>

<script>
    import PageTitleComponent from '../PageTitle.vue';
    import CategoryTreeComponent from '../category/CategoryTree.vue';
    import {Category} from '../../services/resources';

    export default{
        components: {
            'page-title': PageTitleComponent,
            'category-tree': CategoryTreeComponent,
        },
        data(){
            return {
                categories: []
            }
        },
        created(){
          this.getCategories();
        },
        methods: {
            getCategories(){
                Category.query().then(response => {
                    this.categories = response.data.data;
                })
            }
        }
    }
</script>