<template>
    <article class="message"
             v-bind:class="{'is-success': success, 'is-danger': fail}"
             v-if="show()">
        <div class="message-body">
            {{message}}
        </div>
    </article>
</template>

<script>
    export default {
        name: "QueryMessage",

        props: {
            success:{
                type: Boolean,
                required: true
            },
            fail: {
                type: Boolean,
                required: true
            },
            message: {
                required: true
            },
            sourceUrl: {
                type: String,
                required: true
            }
        },

        data() {
            return {
                timeToWait : '2500'
            }
        },

        methods: {
            show() {
                if (this.success) {
                    this.navigateToList()
                }
                return (this.success || this.fail);
            },

            navigateToList(){
                    setTimeout(() =>{
                        window.location.href = '/' + this.sourceUrl;
                    }, this.timeToWait);
            }
        },
    }
</script>
