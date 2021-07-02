<template>
  <header class="mainHeader header-calc">
    <div class="mcontainer">
      <div class="main-header-wrap flex">
        <div class="main-header__left-content">
          <div class="logo-header">
            <a href="/">
              <img src="@/assets/img/ESS_logo.svg" alt="" />
            </a>
          </div>
        </div>

        <div class="navs-wrap">
          <div class="feedback-header">
            <div class="feedback-header__phone">
              <img src="@/assets/img/phone-call.svg" alt="" />
              <a href="tel:380681537303">068 153 73 03</a>
            </div>
            <div class="feedback-header__question">
              <a href="tel:380681537303" class="feedback-header__btn">есть вопросы?</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </header>
</template>

<script>

export default {
  name: "Header",
  props: {
  },
  data() {
    return {
    };
  },
  components: {
  },
};
</script>

<style scoped>
p {
  margin: 0 !important;
  padding: 0.2em 1em !important;
}
@media print {
  .noprint {
    display: none;
  }
}
</style>
