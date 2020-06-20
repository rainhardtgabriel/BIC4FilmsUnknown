<template>
    <div>
        <header class="card-header mb-9">
            <h1 class="card-header-title is-size-4 is-centered is-paddingless">{{film.name}}</h1>
        </header>
        <div class="card content">
            <div class="content is-text-with-padding">{{film.description}}<br>
            </div>
            <footer class="card-footer">
                <a v-bind:href="'/film/'+ film.slug +'/edit'" class="button  is-success is-outlined card-footer-item fa fa-edit"></a>
                <a href="#" class="button is-outlined is-danger card-footer-item fa fa-trash-o" @click="deleteFilm(film.slug)"></a>


            </footer>
        </div>
        <br/>
    </div>
</template>

<script>
    export default {
        name: "FilmComponent.vue",
        props: {
            passedFilm : {
                type : Object,
                required : true
            }
        },
        data(){
            return {
                film : {},
            }
        },
        created() {
            this.film = this.passedFilm;
        },

        methods:{
            deleteFilm(){
                this.form
                    .delete(this.url);
            }
        }
    }
</script>

<style scoped>
    /*Remove rounded corners from button*/
    .button {
        -webkit-appearance: none;
        -webkit-border-radius: 0px;
    }
</style>
