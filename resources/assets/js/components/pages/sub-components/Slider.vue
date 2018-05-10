<template lang="html">
   <section id="slider" appear>
      <!-- Make a frame wrapped slider -->
 <div style="width:100%; height:20em" class="slider-wrapper">
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
          html: `<div class="slider1">
            <a href="">
               <img src="../images/slider/opera-slider.jpg"
            </a>
          </div>`,

          },
          {
            html: `<div class="slider2">
             <a href="">
                <img src="../images/slider/Unbearables_2.jpg"
             </a>
           </div>`,

          },
          {
            html: `<div class="slider3">
             <a href="">
                <img src="../images/slider/writing.jpg"
             </a>
           </div>`

          }
        ],
        //Sliding configuration [obj]
        sliderinit: {
          currentPage: 0,
          thresholdDistance: 500,
          thresholdTime: 100,
          autoplay: 600,
          effect: 'fade',
          loop:true,
          url: '',
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
