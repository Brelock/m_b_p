<template>
  <div>
    <div class="ui-slider">
      <div class="mslider-title">
        <span class="mslider-day">{{ val }}</span>
        <span class="mslider-formData">{{ messages[lang].days }}</span>
      </div>
      <div id="bottom-slide-panel" data-name="slide-panel" class="item-slide slider-common"></div>
      <div class="mslider-marking">
        <p class="mark-hide">1 {{ messages[lang].day }}</p>
        <p class="mark-hide">30 {{ messages[lang].days }}</p>
      </div>
    </div>
    <div id="slider" ref="slider"></div>
  </div>
</template>

<script>

import { lang } from '../../mixins';
import { messages } from '../../helpers/messages';

export default {
 mixins: [ lang ],

	data() {
    return {
      val: null,
      slider: {
        min: 1,
        max: 30,
        start: 1,
        step: 1
      }        
    }
  },

  computed: {
		messages: () => messages,
	},

  mounted() {
		this.setLang();

    noUiSlider.create(slider, {
      start: [this.slider.start],
      step: this.slider.step,
      connect: [true, false],
      range: {
        'min': this.slider.min,
        'max': this.slider.max
      }
    }); 
            
    slider.noUiSlider.on('update',(values, handle) => {
      this.val = values[0].split(".")[0]
      this.$emit('updateSlider', this.val);
    }); 

	},
}
</script>
