<template>
  <div class='container'>
    <Header />
    <b-button variant='success' @click="proceedRequest" class="my-5">На главную</b-button>
  </div>
</template>

<script>
  import Header from '@/components/Header.vue'

export default {
  name: 'Cart',
  components: {
    Header,
  },
  methods:{
    proceedRequest(){
      this.$router.push('/')
    }
  }
}
</script>
