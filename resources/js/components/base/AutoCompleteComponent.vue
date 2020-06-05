<template>
    <div class="autocomplete ">
        <label>
            <input
                type="text"
                @input="onChange"
                v-model="search"
                class="input"
            />
        </label>
        <ul
            id="autocomplete-results"
            v-show="isOpen"
            class="autocomplete-results"
        >
            <li
                class="loading"
                v-if="hasNoResult"
            >
                No results...
            </li>
            <li
                v-else
                v-for="(result, i) in results"
                :key="i"
                @click="setResult(result)"
                class="autocomplete-result"
            >
                {{ result.name }}
            </li>
        </ul>
    </div>
</template>

<script>
    export default {
        name: "AutoCompleteComponent",

        props: {
            items: {
                type: Array,
                required: true,
            },
        },
        data() {
            return {
                search: '',
                results: [],
                isOpen: false,
                hasNoResult: false,
            };
        },
        methods: {
            onChange() {
                this.isOpen = true;
                this.filterResults();
            },
            filterResults() {
                /*lowercase the typed text and each element of the array for a more accurate result.*/
                this.hasNoResult = true
                this.results = this.items.filter(item => item.name.toLowerCase().indexOf(this.search.toLowerCase()) > -1);
                if (this.results.length) {
                    this.hasNoResult = false;
                }
            },
            setResult(result) {
                this.search = result.name;
                this.isOpen = false;
                this.$emit('change', result);
                /*no need for and eventlistener when an item was selected */
                document.removeEventListener('click', this.handleClickOutside)
            },

            handleClickOutside(evt) {
                if (!this.$el.contains(evt.target)) {
                    this.isOpen = false;
                    this.search = '';
                    this.results = [];
                }
            }
        },
        mounted() {
            document.addEventListener('click', this.handleClickOutside)
        },
        destroyed() {
            document.removeEventListener('click', this.handleClickOutside)
        }
    }
</script>

<style scoped>
    .autocomplete {
        width: auto;
    }

    .autocomplete-results {
        padding: 0;
        margin: 0;
        border: 1px solid #eeeeee;
        height: 120px;
        overflow: auto;

    }

    .autocomplete-result {
        list-style: none;
        text-align: left;
        width: 500px;
        padding: 4px 2px;
        cursor: pointer;
    }

    .autocomplete-result:hover {
        background-color: #4AAE9B;
        color: white;
    }
</style>

