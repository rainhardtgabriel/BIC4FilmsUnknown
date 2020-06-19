<template>
    <div>
        <header class="card-header mb-9">
            <h1 class="card-header-title is-size-4 is-centered is-paddingless">{{film.name}}</h1>
        </header>
        <div class="card content">
            <div class="content is-text-with-padding">{{film.description}}<br>
            </div>
            <footer class="card-footer">
                <a v-bind:href="'/film/'+ film.slug +'/edit'" class="card-footer-item">Edit</a>
                <a href="#" class="card-footer-item" @click="deleteFilm(film.slug)">Delete</a>


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
    }
</script>

<style scoped>

</style>
