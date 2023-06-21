<template>
  <div v-if="alertOpen" :key="alertKey" :class="`text-white px-6 py-4 border-0 mr-5 ml-5 rounded relative mb-4 bg-${alertType}-500`">
    <span class="text-xl inline-block mr-5 align-middle">
      <i :class="iconClass"></i>
    </span>
    <span class="inline-block align-middle mr-8">
      {{message}}
    </span>
    <button class="absolute bg-transparent text-2xl font-semibold leading-none right-0 top-0 mt-4 mr-6 outline-none focus:outline-none" v-on:click="closeAlert()">
      <span>×</span>
    </button>
  </div>
</template>

<script>
export default {
  name: "alert",
  props:{
      alertType: {
          type: String,
          default: 'emerald'
      },
      message: {
          type: String,
          required: true
      },
      alertKey: String,
      iconClass: {
          type: String,
          default: 'fas fa-bell'
      }
  },
  data() {
    return {
      alertOpen: true
    }
  },
  methods: {
    closeAlert: function(){
      this.alertOpen = false;
      this.$emit('close',123);
    }
  }
}
</script>
