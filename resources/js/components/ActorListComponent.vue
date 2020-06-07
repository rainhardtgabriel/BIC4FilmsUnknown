<template>
    <div class="table-container is-fullwidth">
        <query-message class="notification" :success="form.isSuccess()" :fail="form.isFail()"
                       :message="form.failMessage || form.successMessage" source="actor"></query-message>
        <table class="table is-fullwidth is-hoverable">
            <thead>
            <tr class="title is-6">
                <table-element-component element-type="th">Name</table-element-component>
                <table-element-component element-type="th">Know from</table-element-component>
                <table-element-component element-type="th">Created</table-element-component>
                <table-element-component element-type="th">Modified</table-element-component>
                <table-element-component element-type="th" text-class="column has-text-right">Options</table-element-component>
            </tr>
            </thead>
            <tbody>
            <tr v-for="actor in actors" :key="actor.id">
                <table-element-component  element-type="td">
                    <a :href="'/actor/' + actor.slug"
                       :title="actor.name">
                        {{ actor.name }}
                    </a>
                </table-element-component>
                <table-element-component v-if="hasMovies" element-type="td">{{ getMovieName(actor.film_id)}}</table-element-component>
                <table-element-component element-type="td">{{ actor.created_at | moment("DD.MM.YYYY")}}</table-element-component>
                <table-element-component element-type="td">{{ actor.created_at | moment("DD.MM.YYYY")}}</table-element-component>
                <table-element-component element-type="td">{{ actor.updated_at | moment("DD.MM.YYYY")}}</table-element-component>
                <table-element-component element-type="td" text-class="column has-text-right">
                        <a v-bind:href="'/actor/'+ actor.slug +'/edit'" class="button is-success is-outlined is-small">
                            <span class="icon">
                              <i class="fa fa-edit"></i>
                            </span>
                        </a>
                        <button class="button is-danger is-outlined is-small" @click="deleteActor(actor.slug)" >
                            <span class="icon">
                              <i class="fa fa-remove"></i>
                            </span>
                        </button>
                </table-element-component>
            </tr>
            </tbody>
        </table>
    </div>
</template>

<script>

    let form = new Form({
        'slug': '',
    });

    import ActorComponent from "./ActorComponent";
    import TableElementComponent from "./base/TableElementComponent";

    export default {
        components: {
            ActorComponent,
            TableElementComponent
        },
        name: "ActorListComponent",

        data() {
            return {
                actors: [],
                movies: [],
                actor: {},
                deleteItem: false,
                form: form,
                url:''
            }
        },
        props: {
            allActors: {
                type: Array,
                required: true
            }
        },
        methods:{
            deleteActor(actor){
                this.url = '/actor/' + actor;
                this.form.slug = this.actor.slug;
                this.form
                    .delete(this.url);

                this.form.noReset = ['slug'];

            },
            getMovieName(filmId){
                return  this.movies.filter(function (elem) {
                    if (elem.id === filmId) return (elem.name);
                })
            },

            fetchMovies() {
                fetch("/list/film")
                    .then(res => res.json())
                    .then(res => {
                        this.movies = res;
                    });
            }

        },
        created() {
            this.fetchMovies();
            this.actors=this.allActors
            this.form.slug = '';
            this.form.noReset = ['slug'];

        },
        computed:{
            hasMovies() {
                return !!this.movies.length;
            },
        }
    }
</script>

<style scoped>

</style>
