<template>
    <div>
        <header class="card-header mb-9">
            <h1 class="card-header-title is-size-4 is-centered is-paddingless">{{actor.name}}</h1>
        </header>
        <div class="card content">
            <div class="content is-text-with-padding">{{actor.description}}<br>
            </div>
            <footer class="card-footer">
                <a v-bind:href="'/actor/'+ actor.slug +'/edit'" class="card-footer-item">Edit</a>
                <a href="#" class="card-footer-item">Delete</a>
            </footer>
        </div>
        <br/>
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
