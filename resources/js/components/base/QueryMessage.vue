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
            source: {
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
                if (this.source === 'actor'){
                    setTimeout(function(){
                        window.location.href = '/actor';
                    }, this.timeToWait);
                }else if(this.source === 'film'){
                    setTimeout(function(){
                        window.location.href = '/film';
                    }, this.timeToWait);
                }
            }
        },
    }
</script>
