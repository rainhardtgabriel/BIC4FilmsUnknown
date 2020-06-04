<template>
    <div class="container">
        <FilmComponent v-for="film in films" v-bind:key="film.id" :passed-film="film"></FilmComponent>
    </div>
</template>

<script>

    import FilmComponent from "./FilmComponent";

    export default {
        name: "FilmListComponent",
        components: {FilmComponent},
        data() {
            return {
                films: [],
            }
        },
        props: {
            allFilms: {
                type: Array,
                required: true
            }
        },
        methods:{
        },
        created() {
            this.films=this.allFilms
        },
    }
</script>

<style scoped>

</style>
