<template>
    <div class="spinner-fixed" v-if="loading">
        <div class="spinner">
            <div class="indeterminate"></div>
        </div>
    </div>
</template>
<script>
    export default{
        data(){
            return{
                loading: false
            }
        },
        created(){
            window.Vue.http.interceptors.unshift((request,next) => {
                this.loading = true;
                next(()=>this.loading = false);
            });
        }
    }
</script>