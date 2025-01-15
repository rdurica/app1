<template>
  <div style="background-color: red">{{ name }} <span v-if="status"> - {{ status }} </span></div>
  <button @click="fetchData">GetData</button>
</template>


<script>
import axios from 'axios';
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
  }
}
</script>
