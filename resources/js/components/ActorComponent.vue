<template>
    <div>
        <query-message class="notification" :success="form.isSuccess()" :fail="form.isFail()"
                       :message="form.failMessage || form.successMessage" source-url="actor"></query-message>
        <header class="card-header mb-9">
            <h1 class="card-header-title is-size-4 is-centered is-paddingless">{{actor.name}}</h1>
        </header>
        <div class="card content">
            <div class="content is-text-with-padding">{{actor.description}}
            </div>
            <footer class="card-footer">
                <a v-bind:href="'/actor/'+ actor.slug +'/edit'" class="button  is-success is-outlined card-footer-item fa fa-edit"></a>
                <a class ="button is-outlined is-danger card-footer-item fa fa-trash-o" @click="deleteActor"></a>
            </footer>
        </div>
        <br/>
    </div>
</template>

<script>
    let form = new Form({
    });

    export default {
        name: "ActorComponent",

        data() {
            return {
                actor: {},
                deleteItem: false,
                form: form,
                url:''
            }
        },

        props: {
            passedActor: {
                type: Object,
                required: true
            }
        },

        created() {
            this.actor = this.passedActor;
            this.url = '/actor/' + this.passedActor.slug;
        },

        methods:{
            deleteActor(){
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
