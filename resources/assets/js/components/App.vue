<template>
        <div id="page">
            <app-header></app-header>
            <div id="main-content">
               <router-view></router-view>
               <app-footer></app-footer>
            </div><!--#main-content-->
            <app-back-to-top></app-back-to-top>
         </div>
</template>

<script>
    export default {

    }
</script>
