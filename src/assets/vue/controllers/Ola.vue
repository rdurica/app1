<template>
  <div style="background-color: deepskyblue">{{ name }} <span v-if="status"> - {{ status }} </span></div>
  <button @click="fetchData">GetData</button>
</template>


<script>
export default {
  props: {
    name: String,
    fetchUrl: String
  },
  data() {
    return {
      status: ''
    }
  },
  methods: {
    async fetchData() {

      const response = await fetch("/fetch");
      try {
        const data = await response.json();

        this.status = data.status;
        console.log(response)
      }
      catch(err) {
        this.status = 'Oops. Something went wrong';
      }
    }
  },
  beforeMount() {
    this.fetchData()
  },
}
</script>
<style scoped>
button {
  padding: 10px;
  background-color: lightgray;
  border: none;
  cursor: pointer;
}

button:hover {
  background-color: darkgray;
}
</style>
