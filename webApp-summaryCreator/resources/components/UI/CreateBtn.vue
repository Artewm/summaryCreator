<script>
export default {
    methods:{
        logs(){
            console.log('Button clicked');
        }
    },
    data(){
        return{
            isHovered: false,
            isClicked: false
        }
    }
}
</script>

<template>
    <button class="AboutUsBtn" @click="logs"
            @mouseover="isHovered = true"
            @mouseleave="isHovered = false"
            @mousedown="isClicked = true"
            @mouseup="isClicked = false"
            :class="{ 'active-button': isHovered || isClicked }"
    >
        <slot></slot>
    </button>

</template>

<style scoped>
    .AboutUsBtn{
        border: none;
        background-color: #FF0000;
        border-radius: 40px;
        padding: 18px 35px;
        color: white;
        font-size: 22px;
    }
    .active-button {
        background-color: white;
        color: #FF0000;
        border: 2px solid #FF0000;
    }
</style>
