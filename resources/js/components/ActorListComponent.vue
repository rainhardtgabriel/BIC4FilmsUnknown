<template>
    <div class="table-container is-fullwidth">
        <query-message class="notification" :success="form.isSuccess()" :fail="form.isFail()"
                       :message="form.failMessage || form.successMessage"></query-message>
        <table class="table is-fullwidth is-hoverable">
            <thead>
            <tr class="title is-6">
                <table-element-component element-type="th">Name</table-element-component>
                <table-element-component element-type="th">Created</table-element-component>
                <table-element-component element-type="th">Modified</table-element-component>
                <table-element-component element-type="th"></table-element-component>
            </tr>
            </thead>
            <tbody>
            <tr v-for="actor in actors" :key="actor.id">
                <table-element-component  element-type="td">
                    <a :href="'/actor/' + actor.slug"
                       :title="actor.name">
                        <i></i>&nbsp;{{ actor.name }}
                    </a>
                </table-element-component>
                <table-element-component element-type="td">{{ actor.created_at }}</table-element-component>
                <table-element-component element-type="td">{{ actor.updated_at }}</table-element-component>
                <table-element-component element-type="td">
                    <a v-bind:href="'/actor/'+ actor.slug +'/edit'"
                       class="button  is-success is-outlined card-footer-item fa fa-edit">
                    </a>
                </table-element-component>
                <table-element-component element-type="td">
                    <a class ="button is-outlined is-danger card-footer-item fa fa-trash-o" @click="deleteActor(actor.slug)"></a>
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
            }
        },
        created() {
            this.actors=this.allActors
            this.form.slug = '';
            this.form.noReset = ['slug'];
        },
    }
</script>

<style scoped>

</style>
