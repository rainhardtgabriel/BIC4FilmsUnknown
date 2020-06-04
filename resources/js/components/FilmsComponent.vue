<template>
    <div class="container">
        <div class="columns is-multiline">
            <div class="column is-three-fifths is-offset-one-fifth">
                <div class="box custom-box" v-if="hasFilms">
                    <film-list :all-films="films"></film-list>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import FilmList from "./FilmListComponent";

    export default {
        name: "FilmsComponent.vue",

        components:{
            FilmList,
        },

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

        created() {
            this.films = this.allFilms;
        },

        computed: {
            hasFilms() {
                return !!this.films.length;
            },
            showSuccessMessage() {
                return this.successMessage !== '';
            }
        }
    }

</script>

<style scoped>

</style>
