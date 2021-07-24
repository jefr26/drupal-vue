<template>
  <div class="content">
    <button @click="getNodes">get nodes</button>
    <div v-for="(nodeInfo, index) in nodeList" :key="index">
      <h1>{{ nodeInfo.title }}</h1>
      <div v-html="nodeInfo.body"></div>
    </div>
  </div>
</template>

<script>
import axios from 'axios';

export default {
  name: "Content",
  data: function () {
    return {
      basePath: '',
      nodeList: [],
      nodeData: []
    }
  },
  created: function() {
    this.basePath = window.drupalSettings.vueBlock.basePath
  },
  methods: {
    getNodes: function() {
      axios.get(this.basePath + '/nodes',
      {params: { '_format': 'json' }, headers: { 'Authoriaztion': 'Bearer kajshbfkajsdhf' }},)
      .then((response) => {
        this.nodeList = response.data
      })
    },
  }
};
</script>
