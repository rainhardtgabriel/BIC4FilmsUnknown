<template>
  <div class="container">
    <div class="columns is-multiline">
      <div class="card blog-card column is-half is-offset-one-quarter">
        <header class="card-header">
          <h1 class="card-header-title is-size-4 is-centered" v-text="'Search Actors'" />
        </header>
        <div class="card-content">
          <div class="content">
            <input
              type="text"
              class="input field is-primary is-outlined is-fullwidth"
              v-model="search"
              placeholder="search actors"
            />
            <table>
              <thead>
                <tr>
                  <th v-for="col in columnKeys" :key="col.id">{{col}}</th>
                </tr>
              </thead>
              <tbody>
                <tr v-for="row in filteredActors" :key="row.id">
                  <td v-for="col in columnKeys" :key="col.id">
                    <template v-if="col==='name'">
                      <a :href="'/actor/' + row.slug">
                        <i></i>
                        &nbsp;{{ row[col] }}
                      </a>
                    </template>
                    <template v-else>{{ row[col] }}</template>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: "ActorsSearch",
  data() {
    return {
      actors: [],
      columnKeys: ["name"],
      search: ""
    };
  },

  props: {},
  created() {
    this.fetchActors();
  },

  methods: {
    fetchActors() {
      fetch("/list/actor")
        .then(res => res.json())
        .then(res => {
          this.actors = res;
        });
    }
  },

  computed: {
    filteredActors: function() {
      return this.actors.filter(actor => {
        return actor.name.match(this.search);
      });
    }
  }
};
</script>

<style scoped>
table {
  font-family: "Open Sans", sans-serif;
  border-collapse: collapse;
  border: 3px solid #36ecbf;
}

table th {
  text-transform: uppercase;
  text-align: left;
  background: #36ecbf;
  color: #fff;
  padding: 8px;
  min-width: 30px;
}

table td {
  text-align: left;
  padding: 8px;
  border-right: 2px solid #36ecbf;
}

table td:last-child {
  border-right: none;
}

tr:nth-child(2n) td {
  background: #c2f5e8;
}

tr:hover td {
  background-color: #d2d6d5;
}

tr:hover:nth-child(2n) td {
  background: #d2d6d5;
}
</style>
