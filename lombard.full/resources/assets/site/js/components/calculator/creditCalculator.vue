<template>
 <div class="calculatorWrapForm main-page shell-form">
  <div class="leftSection">

    <div class="toggle-blocks">
      <div class="title">Розрахувати свiй кредит</div>
  
      <div class="panel-tabs">
        <div @click="showOthers('showGold')"  :class="[{ active: showGold }, calcItem]">Пiд Золото</div>
        <div @click="showOthers('showSilver')" :class="[{ active: showSilver }, calcItem]">Пiд Срiбло</div>
        <div @click="showOthers('showTech')" :class="[{ active: showTech }, calcItem]">Пiд Технiку</div>
      </div>

      <form action="#" class="calc-form">
        <form-gold v-if="showGold"></form-gold>
        <form-silver v-if="showSilver"></form-silver>
        <form-tech v-if="showTech"></form-tech>
      </form>

    </div>
  </div>

  <div class="result-blocks">
    <div class="splash-screen"></div>
  </div>

</div>
</template>

<script>

export default {

  data() {
    return {
      showGold: true,
      showSilver: false,
      showTech: false,

      calcItem: "calc-tab"
    };
  },

  props: ['categoryId'],

  methods: {

    showOthers(formName) {
      this.showGold = false;
      this.showSilver = false;
      this.showTech = false;

      this[formName] = true;
    },

  },

  computed: {
    // setHeightOfCollapsedBlock() {
    //   return this.isShouldCollapse ? 102 : this.filtersLength * 28 - 10; // 28 = option height
    // }
  },

  created() {
    // this.setIsShouldCollapse();
  },

  mounted() {
  //   this.setLang(); 
  },
}
</script>