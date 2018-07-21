<template lang="html">
   <div class="menu-container">

      <nav id="mySidenav"
      class="menu sidenav"
      v-bind:class="{open: isActive}"
      >
         <div class="toggleNav"
         @click="toggleNav"
         >
             <div class="bar1"></div>
              <div class="bar2"></div>
              <div class="bar3"></div>
         </div>
               <ul>
                   <li @click="closeNav">
                      <router-link to="/">Home</router-link>
                   </li>
                   <li @click="closeNav">
                      <router-link :to="{ path: '/about' }">About</router-link>
                   </li>
                   <li @click="closeNav">
                      <router-link :to="{ path: '/contact' }">Contact</router-link>
                   </li>
                   <li @click="closeNav">
                      <router-link :to="{ path: '/blog' }">Blog</router-link>
                   </li>
               </ul>
      </nav>
   </div>
</template>

<script>
export default {
   data() {
      return {
         isActive: false
      }
   },
   methods: {
      toggleNav() {
         var main = document.getElementById('main-content');
         var mobileMenu = document.querySelector('#mySidenav');
         var headerTitle = document.getElementById('site-title');
         this.isActive = !this.isActive;

         if(this.isActive === true) {
            mobileMenu.style.width = "100%";
            main.style.width = "0";
            headerTitle.classList.add('mobile-menu-title');
         } else {
            mobileMenu.style.width = "0";
            main.style.width = "100%";
            headerTitle.classList.remove('mobile-menu-title');
         }

      },
      closeNav() {
         this.isActive = !this.isActive;
         var mobileMenu = document.getElementById('mySidenav');
         var main = document.getElementById('main-content');

         mobileMenu.style.width = "0";
         main.style.width = "100%";
      }
   }
}
</script>

<style lang="css" scoped>
.sidenav {
   height: 100%;
   width: 0;
   position: fixed;
   z-index: 1;
   top: 0;
   left: 0;
   background-color: #09021d;
   padding-top: 60px;
   transition: 0.5s;
}

.sidenav a {
   padding: 8px 8px 8px 32px;
   text-decoration: none;
   font-size: 25px;
   color: #fff;
   display: block;
   transition: 0.3s;
}

.sidenav a:hover {
   color: red;
}

.sidenav .closebtn {
   position: absolute;
   top: 0;
   right: 25px;
   font-size: 36px;
   margin-left: 50px;
}

.sidenav ul {
    height: 50%;
    top: 0;
    opacity: 0;
}

.sidenav ul li {
   list-style: none;
}

.sidenav.open ul {
   -webkit-transform: translateY(36%);
   transform: translateY(36%);
   opacity: 1;
   display: flex;
   -webkit-box-pack: start;
   justify-content: start;
   flex-direction: column;
}

/*Hamburger Icon*/
.toggleNav {
display: inline-block;
cursor: pointer;
z-index: 10000;
position: absolute;
top: 2.5%;
left: 0;
}

.bar1, .bar2, .bar3 {
width: 35px;
height: 5px;
background-color: #09021d;
margin: 6px 0;
transition: 0.4s;
}

.sidenav.open .toggleNav .bar1 {
   background-color: white;
   -webkit-transform: rotate(-45deg) translate(-9px, 6px);
   transform: rotate(-45deg) translate(-9px, 6px);
}

.sidenav.open .toggleNav .bar2 {
   background-color: white;
   opacity: 0;
}

.sidenav.open .toggleNav .bar3 {
   background-color: white;
   -webkit-transform: rotate(45deg) translate(-8px, -8px);
   transform: rotate(45deg) translate(-8px, -8px);
}

@media screen and (max-height: 450px) {
   .sidenav {padding-top: 15px;}
   .sidenav a {font-size: 18px; }
}

@media screen and (min-width: 600px ) {
   .toggleNav {
      display: none;
   }

   .sidenav .closebtn {
      display: none;
   }

   .sidenav[data-v-9b3828b6] {
      background-color: transparent;
      position: relative;
      width: auto !important;
   }

   .sidenav ul {
      display: flex;
      padding: 0;
   }

   .sidenav ul li {
      list-style: none;
   }

      .sidenav ul li a {
      list-style: none;
      padding: 8px 20px;
   }

}
</style>
