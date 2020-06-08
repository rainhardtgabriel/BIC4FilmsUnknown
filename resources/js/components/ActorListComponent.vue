<template>
    <li class="table-container is-fullwidth">
        <query-message class="notification" :success="form.isSuccess()" :fail="form.isFail()"
                       :message="form.failMessage || form.successMessage" source-url="actor"></query-message>
        <nav class="is-fullwidth" role="navigation" aria-label="pagination">
            <a v-if="currentPage >= 2" class="pagination-previous" @click="prevPage">Previous</a>
            <a v-else class="pagination-previous" disabled>Previous</a>
            <a v-if="currentPage < totalPages" class="pagination-next" @click="nextPage">Next page</a>
            <a v-else class="pagination-next " disabled>Next page</a>
        </nav>
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
            <tr v-for="actor in paginate" :key="actor.id">
                <table-element-component  element-type="td">
                    <a :href="'/actor/' + actor.slug"
                       :title="actor.name">
                        {{ actor.name }}
                    </a>
                </table-element-component>
                <table-element-component v-if="hasMovies" element-type="td">{{ getMovieName(actor.film_id)}}</table-element-component>
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
    </li>
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
                url:'',
                currentPage: 1,
                itemsPerPage: 10,
                resultCount: 0
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
                window.scrollTo(0,0);
            },
            getMovieName(filmId){
                let movie = _.first(this.movies.filter(mov => mov.id == filmId));
                return movie.name;
            },

            fetchMovies() {
                fetch("/list/film")
                    .then(res => res.json())
                    .then(res => {
                        this.movies = res;
                    });
            },

            setPage: function(pageNumber) {
                this.currentPage = pageNumber
            },

            nextPage(){
                this.currentPage += 1;
            },

            prevPage(){
                if(this.currentPage >= 2) {
                    this.currentPage -= 1;
                }
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

            totalPages: function() {
                return Math.ceil(this.resultCount / this.itemsPerPage)
            },

            paginate: function() {
                this.resultCount = this.actors.length
                if (this.currentPage >= this.totalPages) {
                    this.currentPage = this.totalPages
                }
                var index = this.currentPage * this.itemsPerPage - this.itemsPerPage
                return this.actors.slice(index, index + this.itemsPerPage)
            }
        },
    }
</script>

<style scoped>

</style>
