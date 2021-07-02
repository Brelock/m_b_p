<template>
  <div id="myContainer" :class="{'pos-relative' : is_mobile}">
    <div class='m-1 ml-auto'>
      <!-- Our triggering (target) element -->
      <a href="https://energosave.in.ua" target="_blank" class='ml-auto'>
        <b-button id="exPopoverReactive1" variant="primary" ref="button">
            <img class='img-fluid' src="../../public/logo.png" alt="">
        </b-button>
      </a>
    </div>

    <b-popover
      target="exPopoverReactive1"
      triggers="hover focus"
      :show.sync="popoverShow"
      placement="auto"
      container="myContainer"
      ref="popover"
    >
      <p>{{comp_name}}</p>
      <p>{{comp_addr1}}, {{comp_addr2}}</p>
      <p v-for='(p, ind) in comp_phones' :key="ind">
        {{p}}
      </p>
      <p v-for='(e, ind) in comp_emails' :key="ind">
        {{e}}
      </p>
    </b-popover>
  </div>
</template>

<script>
  export default {
    data() {
      return {
        popoverShow: false,
        comp_name : this.$store.state.company.name,
        comp_addr1 : this.$store.state.company.address_line1,
        comp_addr2 : this.$store.state.company.address_line2,
        comp_emails : this.$store.state.company.email,
        comp_phones : this.$store.state.company.phone,
        is_mobile : this.$store.state.is_mobile,
      }
    },
    methods: {
      onClose() {
        this.popoverShow = false
      },
    }
  }
</script>

<style scoped>
img{
    max-width: 10em
}
#myContainer{
    position: relative; 
    left: 50%;
    transform: translateX(-50%);
}
.pos-relative{
    position: relative!important;
}
#exPopoverReactive1{
    border: none;
    background-color: transparent;
    outline: none!important;
    -webkit-appearance: none;
    -moz-appearance: none;
    appearance: none;
}
#exPopoverReactive1:focus,
#exPopoverReactive1:hover{
    outline: none!important;
    -webkit-appearance: none;
    -moz-appearance: none;
    appearance: none;
}
p{
margin: 0!important;
white-space: nowrap;
}
</style>
