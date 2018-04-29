<template lang="html">
   <section id="slider">
      <h3>Slider</h3>
      <!-- Make a frame wrapped slider -->
 <div style="width:70%;margin:20px auto;height:400px">
      <!-- Configuring slider components -->
      <slider ref="slider" :pages="pages" :sliderinit="sliderinit" @slide='slide' @tap='onTap' @init='onInit'>
          <!-- Set loading -->
          <div slot="loading">loading...</div>
      </slider>
 </div>
   </section>
</template>
<!-- https://drewjbartlett.com/demos/vue-flickity/ -->
<!-- https://warpcgd.github.io/vue-concise-slider/#/config?id=style -->
<!-- Might want to look at this: https://github.com/SSENSE/vue-carousel#installation -->
<script>
import slider from 'vue-concise-slider'// import slider components
export default {
   data () {
      return {
        //Image list
        pages:[
          {
          html: '<div class="slider1">slider1</div>',
          style: {
            'background': '#1bbc9b'
            }
          },
          {
            html: '<div class="slider2">slider2</div>',
            style: {
              'background': '#4bbfc3'
            }
          },
          {
            html: '<div class="slider3">slider3</div>',
            style: {
              'background': '#7baabe'
            }
          }
        ],
        //Sliding configuration [obj]
        sliderinit: {
          currentPage: 0,
          thresholdDistance: 500,
          thresholdTime: 100,
          autoplay:2000,
          effect: 'fade',
          loop:true,
          direction:'horizontal',
          infinite:1,
          slidesToScroll:1,
          timingFunction: 'ease',
          duration: 500
        }
      }
    },
    components: {
        slider
    },
    methods: {
      // Listener event
      slide (data) {
        //console.log(data)
      },
      onTap (data) {
        //console.log(data)
      },
      onInit (data) {
        //console.log(data)
      }
    }
}
</script>

<style lang="css">
</style>
