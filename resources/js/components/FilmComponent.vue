<template>
    <div>
        <header class="card-header mb-9">
            <h1 class="card-header-title is-centered is-paddingless">Films</h1>
        </header>
        <div class="card content">
            <h3 class="title is-4 card-header-title is-centered is-paddingless">{{film.name}}</h3>
            <div class="content ">{{film.description}}<br>
            </div>
            <footer class="card-footer">
                <a v-bind:href="'/film/'+ film.slug +'/edit'" class="card-footer-item">Edit</a>
                <a href="#" class="card-footer-item">Delete</a>
            </footer>
        </div>
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
