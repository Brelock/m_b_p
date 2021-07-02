<template>
  <div id="waves">
    <router-view/>
  </div>
</template>

<script>
import SineWaves from 'sine-waves'

/*
 * Demo of https://github.com/isuttell/sine-waves
 */

var waves = new SineWaves({
  el: document.getElementById('waves'),
  
  speed: 4,
  
  width: function() {
    return window.innerWidth;
  },
  
  height: function() {
    return window.innerHeight;
  },
  
  ease: 'SineInOut',
  
  wavesWidth: '70%',
  
  waves: [
    {
      timeModifier: 4,
      lineWidth: 1,
      amplitude: -25,
      wavelength: 25
    },
    {
      timeModifier: 2,
      lineWidth: 2,
      amplitude: -50,
      wavelength: 50
    },
    {
      timeModifier: 1,
      lineWidth: 1,
      amplitude: -100,
      wavelength: 100
    },
    {
      timeModifier: 0.5,
      lineWidth: 1,
      amplitude: -200,
      wavelength: 200
    },
    {
      timeModifier: 0.25,
      lineWidth: 2,
      amplitude: -400,
      wavelength: 400
    }
  ],
 
  // Called on window resize
  resizeEvent: function() {
    var gradient = this.ctx.createLinearGradient(0, 0, this.width, 0);
    gradient.addColorStop(0,"rgba(23, 210, 168, 0.2)");
    gradient.addColorStop(0.5,"rgba(255, 255, 255, 0.5)");
    gradient.addColorStop(1,"rgba(23, 210, 168, 0.2)");
    
    var index = -1;
    var length = this.waves.length;
	  while(++index < length){
      this.waves[index].strokeStyle = gradient;
    }
    
    // Clean Up
    index = void 0;
    length = void 0;
    gradient = void 0;
  }
});
</script>


<style>

  :root {
    --main-text-color: #002535;
    --bg-color: #00977d2e;
    --selector-bg-color: #00977d2e;
    --secondary-text-color: #3e5565c7;
    --btn-color-disabled: rgba(148, 39, 97, 0.904);
  }

  html, body, #app{
    height: 100%;
    width: 100%;
    margin: 0;
    padding: 0;
    color: var(--main-text-color);
    background-color: var(--bg-color);
  }
  #app label,
  .text,
  .item{
      font-family: 'Montserrat', sans-serif;
  }
.selection,
div.menu,
div.form-row input{
    background-color: var(--selector-bg-color)!important;
}
.item{
    border-top: none!important;
}
.default.text{
  color: #272727a8!important;
}
  td *{
        font-family: 'Multi', sans-serif;
  }

  #app {
    -webkit-font-smoothing: antialiased;
    -moz-osx-font-smoothing: grayscale;
    text-align: center;
    color: #2c3e50;
    margin-top: 60px;
  }

  div.selection div.text {
    width: 95%;
    overflow: hidden;
    white-space: nowrap;
  }

  label{
    position: relative;
  }

.field-required-lable{
    margin-left: auto!important;
    color: red;
}
.highlighted-input{
    outline: 0;
}
</style>


