<template>
    <div class="container">
        <hero main-title="Categories"></hero>
        <div class="columns is-multiline">
            <div class="column is-three-fifths is-offset-one-fifth">
                <div class="box custom-box" v-if="hasActors">
                    <actor-list :all-actors="actors"></actor-list>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import ActorList from "./ActorListComponent";

    export default {
        components:{
            ActorList,
        },

        name: "ActorsComponent",
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

        created() {
            this.actors = this.allActors;
        },

        computed: {
            hasActors() {
                return !!this.actors.length;
            },
            showSuccessMessage() {
                return this.successMessage !== '';
            }
        }
    }
</script>

<style scoped>

</style>
