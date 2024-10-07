<script  >
import {ref} from 'vue'
import MyMenu from "./MyMenu.vue";
import AboutUs from "./AboutUs.vue"
import CreateSummary from "./CreateSummary.vue"
const title = ref('Laravel')

export default {
    components:{
      MyMenu, AboutUs, CreateSummary,
    },
    data(){
        return{
            currentComponent: 'AboutUs',
        }
    },
    methods:{
      changeComponent(component){
          this.currentComponent = component;
      }
    },
}
</script>

<template>
    <div class="menu">
        <MyMenu @change-component="changeComponent"></MyMenu>
    </div>
    <div class="parentContainer">
<!--        <AboutUs></AboutUs>-->
<!--        <CreateSummary></CreateSummary>-->
<!--        <link-component @change-component="changeComponent"></link-component>-->
        <component :is="currentComponent"></component>
    </div>
</template>

<style>
    *{
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }
    .menu{
        display: flex;
        justify-content: center;
        border-bottom: solid 1px #D9D9D9;
    }
    .parentContainer{
        display: flex;
        justify-content: center;
        align-items: center;
        height: 90vh;
        flex-direction: column;
    }
    body{
        font-family: Calibri;
    }

</style>
