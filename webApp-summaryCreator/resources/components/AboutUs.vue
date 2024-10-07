<script>
import CreateBtn from "./UI/CreateBtn.vue"
export default {
    components: {
      CreateBtn,
    },
    data(){
        return{

        }
    }
}
</script>

<template>
    <div class="wrapper">
        <div class="aboutUs-column">
            <div class="text">
                ИИ <br>
                создаст резюме <br>
                по вашему запросу
            </div>
            <create-btn>
                Создать
            </create-btn>
        </div>
        <div class="aboutUs-column">
            <img src="../image/imageAboutUs.png" height="400" width="430"/>
        </div>

    </div>
</template>

<style scoped>
    .wrapper{
        display: flex;
        height: 100%;
        justify-content: space-between;
        align-items: center;
        width: 80%;
    }
    .aboutUs-column{
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        align-items: center;
        height: 50%;
    }
    .text{
        font-size: 70px;
        padding-bottom: 50px;
    }
</style>
