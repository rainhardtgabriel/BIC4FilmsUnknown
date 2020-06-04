<template>
    <div>
        <header class="card-header mb-9">
            <h1 class="card-header-title is-centered is-paddingless">Actors</h1>
        </header>
        <div class="card content">
            <h3 class="title is-4 card-header-title is-centered is-paddingless">{{actor.name}}</h3>
            <div class="content ">{{actor.description}}<br>
            </div>
            <footer class="card-footer">
                <a v-bind:href="'/actor/'+ actor.slug +'/edit'" class="card-footer-item">Edit</a>
                <a href="#" class="card-footer-item">Delete</a>
            </footer>
        </div>
    </div>
</template>

<script>
    export default {
        name: "ActorComponent",

        data() {
            return {
                actor: {},
            }
        },

        props: {
            passedActor: {
                type: Object,
                required: true
            }
        },

        created() {
            this.actor = this.passedActor
        },
    }
</script>

<style scoped>

</style>
