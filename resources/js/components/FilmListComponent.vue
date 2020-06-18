<template>
    <li class="table-container is-fullwidth">
        <query-message class="notification" :success="form.isSuccess()" :fail="form.isFail()"
                       :message="form.failMessage || form.successMessage" source-url="film"></query-message>
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
                <table-element-component element-type="th">Created</table-element-component>
                <table-element-component element-type="th">Modified</table-element-component>
                <table-element-component element-type="th" text-class="column has-text-right">Options</table-element-component>
            </tr>
            </thead>
            <tbody>
            <tr v-for="film in paginate" :key="film.id">
                <table-element-component  element-type="td">
                    <a :href="'/film/' + film.slug"
                       :title="film.name">
                        {{ film.name }}
                    </a>
                </table-element-component>
                <table-element-component element-type="td">{{ film.created_at | moment("DD.MM.YYYY")}}</table-element-component>
                <table-element-component element-type="td">{{ film.updated_at | moment("DD.MM.YYYY")}}</table-element-component>
                <table-element-component element-type="td" text-class="column has-text-right">
                    <a v-bind:href="'/film/'+ film.slug +'/edit'" class="button is-success is-outlined is-small">
                            <span class="icon">
                              <i class="fa fa-edit"></i>
                            </span>
                    </a>
                    <button class="button is-danger is-outlined is-small" @click="deleteFilm(film.slug)" >
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
    import TableElementComponent from "./base/TableElementComponent";

    let form = new Form({
    });

    export default {
        name: "FilmListComponent",
        components: {
            TableElementComponent
        },
        data() {
            return {
                actors: [],
                deleteItem: false,
                form: form,
                url:'',
                currentPage: 1,
                itemsPerPage: 10,
                resultCount: 0
            }
        },
        props: {
            allFilms: {
                type: Array,
                required: true
            }
        },
        methods:{
            deleteFilm(slugId){
                this.url = '/film/' + slugId;
                this.form
                    .delete(this.url);

                window.scrollTo(0,0);
            },

            getMovieName(filmId){
                let movie = _.first(this.movies.filter(mov => mov.id == filmId));
                console.log(filmId);
                console.log(movie.name);
                return movie.name;
            },

            fetchMovies() {
                fetch("/list/actor")
                    .then(res => res.json())
                    .then(res => {
                        this.actors = res;
                    });
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
        },

        computed:{

            totalPages() {
                return Math.ceil(this.resultCount / this.itemsPerPage)
            },

            paginate() {
                this.resultCount = this.allFilms.length
                if (this.currentPage >= this.totalPages) {
                    this.currentPage = this.totalPages
                }
                const index = this.currentPage * this.itemsPerPage - this.itemsPerPage;
                return this.allFilms.slice(index, index + this.itemsPerPage)
            }
        },
    }
</script>

<style scoped>

</style>
