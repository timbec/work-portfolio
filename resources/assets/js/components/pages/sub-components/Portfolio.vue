<template lang="html">
   <section id="#portfolio">
      <h3>Portfolio</h3>
      <nav class="nav">
       <menu class="nav__controls">
         <icon class="nav__icon" use="#filter"></icon>

         <li v-for="(active, menu) in menus" class="nav__label"
           :class="{
             'nav__label--active' : active
           }" @click="setMenu(menu, active)">
           {{ menu }}
         </li>
         <li class="nav__label nav__label--clear" @click="clearAllFilters">Clear all</li>

       </menu>
      </nav>


      <menu v-for="(options, filter) in filters" class="filters"
        v-show="menus[filter]" ref="menu" :key="filter">
        <template>
          <li v-for="(active, option) in options" class="filters__item"
            :class="{ 'filters__item--active': active }"
            @click="setFilter(filter, option)">
            {{ option }}
          </li>
        </template>
      </menu>

     <li v-for="work in works">
         <figure>
            <img :src="'/images/' + work.featured_image" />
         </figure>
         <h3>{{ work.title }}</h3>
         <h6 span class="work-category">{{ work.work_category }}</h6>
         <ul class="tag__detials">
            <p>
               <h3>Tags</h3>
               <ul v-for="tag in work.tags">
                  {{ tag.name }}
               </ul>
            </p>
         </ul>
         <li>
          <label>Category</label>
          <div v-for="work_category in work.categories"> class="company__rating">
            <h6>{{ work_category.name }}</h6>
          </div>
        </li>
      </li>

   </section>
</template>
<!-- org/v2/examples/commits.html -->
<!-- https://snipcart.com/blog/vuejs-blog-demo -->
<!-- https://snipcart.com/blog/vuejs-transitions-animations -->
<script>
import Axios from 'axios';
// import PortfolioFilter from './PortfolioFilter.vue';
export default {
   data() {
      return {
         works: [],
         dropdown: { height: 0 },
         filters: { tags: {}, work_categories: {}},
         menus: { tags: false, work_categories: false },
         work: {
            title: '',
            featured_image: '',
            work_category: {
               name: ''
            }
         },
         tags: [],
         tag: {
            name: ''
         }
      }
   },
   computed: {
      activeMenu: function activeMenu() {
         var _this = this;

         return Object.keys(this.menus).reduce(function ($s, set, i) {
            return _this.menus[set] ? i : $s;
         }, -1);
      },
      list: function list() {
         var _this2 = this;

         var _activeFilters = this.activeFilters,
            tags = _activeFilters.tags,
            work_categories = activeFilters.work_categories;

         return this.works.filter(function(_ref) {
            var tag = _ref.tag,
                work_categories = _ref.work_cataegories;
         });
      },
      activeFilters: function activeFilters() {
         var _filters = this.filters,
            tags = _filters.tags,
            work_categories = _filters.work_categories;

         return {
            countries: Object.keys(tags).filter(function(c) {
               return tags[c];
            }),
            work_categories: Object.keys(work_categories).filter(function(c) {
               return work_categories[c];
            })
         };
      }
   },
   watch: {
      activeMenu: function activeMenu(index, from) {
         var _this3 = this;

         if(index === from) return;

         this.$nextTick(function() {
            if (!_this3.$refs.menu || !_this3.$refs.menu[index]) {
               _this3.dropdown.height = 0;
            } else {
               _this3.dropdown.height = _this3.$refs.menu[index].clientHeight + 16 + 'px';
            }
         });
      }
   },

   methods: {
       setFilter: function setFilter(filter, option) {
          var _this4 = this;

          if (filter === 'tags') {
           this.filters[filter][option] = !this.filters[filter][option];
          } else {
           setTimeout(function () {
              _this4.clearFilter(filter, option, _this4.filters[filter][option]);
           }, 100);
          }
       },
       clearFilter: function clearFilter(filter, except, active) {
          var _this5 = this;

           Object.keys(this.filters[filter]).forEach(function (option) {
              _this5.filters[filter][option] = except === option && !active;
           });
       },
       clearAllFilters: function clearAllFilters() {
          Object.keys(this.filters).forEach(this.clearFilter);
       },
       setMenu: function setMenu(menu, active) {
          var _this6 = this;

          Object.keys(this.menus).forEach(function (tab) {
           _this6.menus[tab] = !active && tab === menu;
          });
       }
   },
   components: {
    'icon': { template: '<svg><use :xlink:href="use"/></svg>', props: ['use'] }
   },
   beforeMount: function beforeMount() {
      var _this7 = this;

      Axios.get('/works').then(response =>
         this.works = response.data.data);

      // works.forEach(function (_ref2) {
      //   var tag = _ref2.tag,
      //       work_categories = _ref2.work_categories,
      //       rating = _ref2.rating;
      //
      //   _this7.$set(_this7.filters.works, country, false);
      //
      //   work_categories.forEach(function (category) {
      //     _this7.$set(_this7.filters.categories, category, false);
      //   });
      //});
   }
   // created() {
   //    Axios.get('/works').then(response =>
   //        this.works = response.data.data);
   //
   //    //then(response => console.log(response.data));
   // }
}
</script>

<style lang="css">
nav ul li {
   cursor: pointer;
}

.company {
  position: relative;
  width: calc(100% / 2 - 1rem);
  display: inline-flex;
  flex-direction: column;
  justify-content: space-between;
  margin-left: 1rem;
  margin-top: 1rem;
  padding-top: 0.75rem;
  border-radius: 6px;
  background-color: white;
  box-shadow: 0 0 0 1px #c5d0d1;
  -webkit-backface-visibility: hidden;
          backface-visibility: hidden;
  -webkit-transform-origin: 10% 50%;
          transform-origin: 10% 50%;
  z-index: 1;
}
@media (min-width: 800px) {
  .company {
    width: calc(100% / 3 - 1rem);
  }
}
.company-move {
  transition: all 600ms ease-in-out 50ms;
}
.company-enter-active {
  transition: all 300ms ease-out;
}
.company-leave-active {
  transition: all 200ms ease-in;
  position: absolute;
  z-index: 0;
}
.company-enter, .company-leave-to {
  opacity: 0;
}
.company-enter {
  -webkit-transform: scale(0.9);
          transform: scale(0.9);
}
.company__data {
  line-height: 1.3;
}
.company__label {
  font-size: 0.8rem;
}
.company__rating {
  text-align: center;
}
.company__info {
  padding: 0 0.75rem;
  text-align: center;
}
.company__logo {
  width: 3rem;
  height: 3rem;
  margin: 0 auto;
}
.company__name {
  height: 2.5rem;
  margin: 0.75rem 0;
  font-size: 1.3rem;
  font-weight: 200;
  text-align: center;
}
.company__slogan {
  height: 2rem;
  text-align: center;
  font-weight: 400;
  text-transform: capitalize;
}
.company__details {
  display: flex;
  justify-content: space-between;
  margin-top: 1.5rem;
  padding: 0.5rem 0.75rem;
  background-color: rgba(197, 208, 209, 0.1);
  border-top: 1px solid #c5d0d1;
}
.company__country:hover {
  text-decoration: underline;
  cursor: pointer;
}

.nav {
  display: flex;
  justify-content: space-between;
  align-items: center;
  white-space: nowrap;
  margin: 0 1rem;
  padding: 2rem 0.5rem 1rem;
  border-bottom: 1px solid #c5d0d1;
}
.nav__controls {
  display: flex;
}
.nav__icon {
  width: 1rem;
  height: 1rem;
  fill: currentColor;
}
.nav__label {
  position: relative;
  margin-left: 1rem;
  text-transform: capitalize;
  z-index: 1;
  cursor: pointer;
}
.nav__label::after {
  content: '\00d7';
  display: inline-block;
  color: transparent;
  width: 0.5rem;
  font-weight: 400;
  -webkit-transform: scale(0);
          transform: scale(0);
  transition: -webkit-transform 150ms ease-in-out;
  transition: transform 150ms ease-in-out;
  transition: transform 150ms ease-in-out, -webkit-transform 150ms ease-in-out;
}
.nav__label--clear {
  color: #f68185;
  opacity: 0;
  -webkit-transform: translate3d(-25%, 0, 0);
          transform: translate3d(-25%, 0, 0);
  pointer-events: none;
  transition: all 275ms ease-in-out;
}
.nav__label--filter ~ .nav__label--clear {
  opacity: 1;
  -webkit-transform: translate3d(0, 0, 0);
          transform: translate3d(0, 0, 0);
  pointer-events: auto;
}
.nav__label--filter::after, .nav__label--active::after {
  -webkit-transform: scale(1);
          transform: scale(1);
}
.nav__label--filter::after {
  content: '\2022';
  color: #46d2c4;
}
.nav__label--active::after {
  content: '\00d7';
  color: #f68185;
}

.dropdown {
  position: relative;
  height: 0;
  overflow: hidden;
  transition: height 350ms;
}
.dropdown::after {
  content: '';
  position: absolute;
  bottom: 0;
  left: 0;
  width: 100%;
  height: 1rem;
  background-image: linear-gradient(to top, white, rgba(255, 255, 255, 0));
}
.dropdown-enter, .dropdown-leave-to {
  opacity: 0;
}
.dropdown-leave, .dropdown-enter-to {
  opacity: 1;
}
.dropdown-enter-active, .dropdown-leave-active {
  position: absolute;
  width: 100%;
  transition: opacity 200ms ease-in-out;
}
.dropdown-enter-active {
  transition-delay: 100ms;
}

.filters {
  padding: 0 1rem;
  display: flex;
  flex-wrap: wrap;
  align-items: flex-start;
}
.filters__item {
  margin-top: 0.5rem;
  margin-right: 0.5rem;
  padding: 0.25rem 0.5rem;
  border: 1px solid #c5d0d1;
  border-radius: 6px;
  font-size: 0.8rem;
  line-height: 1.35;
  cursor: pointer;
  transition: all 275ms;
}
.filters__item:hover {
  border-color: #379a93;
}
.filters__item--active {
  color: white;
  border-color: #379a93;
  background-color: #379a93;
}
</style>
