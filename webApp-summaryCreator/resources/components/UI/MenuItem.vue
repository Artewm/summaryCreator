<script >
export default {
    data(){
        return{
            isHovered: false,
            isClicked: false,
        }
    }

}
</script>

<template>
    <div class="menuItem">
        <a
           @mouseover="isHovered = true"
           @mouseleave="isHovered = false"
           @mousedown="isClicked = true"
           @mouseup="isClicked = false"
           :class="{ 'red-underline': isHovered || isClicked }"
           href="#" class="menuBtn">
            <slot></slot>
        </a>
    </div>

</template>

<style scoped>
    .menuItem{

    }
    .menuBtn{
        text-decoration: none;
        color: #000;
        font-size: 20px;
        font-family: Calibri;
        font-weight: 500;
        letter-spacing: 1.5px;
    }
    .red-underline {
        text-decoration: underline;
        text-decoration-color: #FF0000;
    }
</style>
