<template>
<div class="mainWrapper">
  <div class="contentWrapper">
    <Header />
    <div class='container'>
      <Banner />

      <Form/>
      <Footer/>
    </div>
  </div>
</div>
</template>

<script>
  import Form from '@/components/cart/Form.vue'
  import Header from '@/components/Header.vue'
  import Footer from '@/components/Footer.vue'
  import Banner from '@/components/Banner.vue'

export default {
  name: 'Cart',
  components: {
    Form,
    Header,
    Footer,
    Banner,
  },
  computed : {
  },
  mounted(){
    window.scrollTo(0, 0);
  }
}
</script>
