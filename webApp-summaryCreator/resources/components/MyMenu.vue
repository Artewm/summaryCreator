<script>
import MenuLogo from './UI/MenuLogo.vue'
import MenuItem from './UI/MenuItem.vue'
import MenuSearch from './UI/MenuSearch.vue'
import CreateSummary  from "./CreateSummary.vue";
import AboutUs from "./AboutUs.vue";
export default {
    components:{
        MenuLogo, MenuItem, MenuSearch, CreateSummary, AboutUs,
    },
    data(){
        return{

        }
    },
    methods:{
        notifyChange(){
          this.$emit('change-component');
        },
        switchToComponent(component){
            this.$emit('change-component', component);
        }
    }
}
</script>

<template>
    <div class="wrapper">
        <menu-logo class="menuLogo"></menu-logo>
        <div class="menuItems">
            <menu-search class="menuItem"></menu-search>
            <menu-item @click.prevent="switchToComponent('AboutUs')" class="menuItem">
                О нас
            </menu-item>
            <menu-item @click.prevent="switchToComponent('CreateSummary')" class="menuItem">
                Создать
            </menu-item>
            <menu-item @click="console.log('link4')" class="menuItem">
                Вход
            </menu-item>
            <menu-item class="menuItem">
                Регистрация
            </menu-item>
        </div>

    </div>

</template>

<style scoped>
    .wrapper{
        display: flex;
        height: 50px;
        justify-content: space-between;
        align-items: center;
        width: 80%;
    }
    .menuItems{
        width: 40%;
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 15px;
        margin-top: 15px;
    }
</style>
