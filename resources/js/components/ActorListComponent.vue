<template>
    <div class="container">
    <ActorComponent v-for="actor in actors" v-bind:key="actor.id" :passed-actor="actor"></ActorComponent>
    </div>
</template>

<script>
    import ActorComponent from "./ActorComponent";

    export default {
        components: {ActorComponent},
        name: "ActorListComponent",

        data() {
            return {
                actors: [],
            }
        },
        props: {
            allActors: {
                type: Array,
                required: true
            }
        },
        methods: {
        },
        created() {
            this.actors=this.allActors
        },
    }
</script>

<style scoped>

</style>
