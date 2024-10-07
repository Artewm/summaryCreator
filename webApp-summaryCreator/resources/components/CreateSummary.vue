<script>
import CreateBtn from "./UI/CreateBtn.vue";
export default {
    components:{
      CreateBtn,
    },
    data(){
        return{
            parameters: '',
            resume: '',
            error: '',
        }
    },
    methods: {
        // async generateResume() {
        //     try {
        //         const response = await fetch('/generate-resume', { // Убедитесь, что путь совпадает с вашим маршрутом
        //             method: 'POST',
        //             headers: {
        //                 'Content-Type': 'application/json',
        //                 'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'), // Если необходимо
        //             },
        //             body: JSON.stringify({parameters: this.parameters}),
        //         });
        //         if (!response.ok) {
        //             throw new Error('Ошибка при генерации резюме');
        //         }
        //         const data = await response.json();
        //         this.resume = data.resume;
        //     } catch (error) {
        //         this.error = error.message;
        //     }
        // },
        async generateResume() {
            try {
                const response = await fetch('/generate-resume', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': this.csrfToken,
                    },
                    body: JSON.stringify({ parameters: this.parameters }),
                });
                console.log('Response status:', response.status); // Выводим статус ответа
                const data = await response.json();
                if (!response.ok) {
                    console.error('Response data:', data); // Выводим данные ответа
                    throw new Error('Ошибка при генерации резюме');
                }
                this.resume = data.resume;
            } catch (error) {
                this.error = error.message;
            }
        },
    },
}
</script>

<template>
    <div class="main">
        <div class="answer-gpt">
            <p></p>
        </div>
        <div class="setting">
            <div class="setting-column">
                <div class="setting-item">
                    <span class="item-title" >Имя</span>
                    <input type="text" class="item-text" placeholder="Введите имя" v-model="parameters">
                    <div v-if="error">{{ error }}</div>
                </div>
                <div class="setting-item">
                    <span class="item-title">Опыт работы</span>
                    <input type="text" class="item-text" placeholder="Опыт работы">
                </div>
            </div>
            <div class="setting-column">
                <div class="setting-item">
                    <span class="item-title">Должность</span>
                    <input type="text" class="item-text" placeholder="Должность">
                </div>
                <div class="setting-item">
                    <span class="item-title">Возраст</span>
                    <input type="text" class="item-text" placeholder="Введите Возраст">
                </div>
            </div>
        </div>
        <div class="btnCreate">
            <CreateBtn @click="generateResume">Создать</CreateBtn>
        </div>
    </div>
</template>

<style scoped>
    .main{
        display: flex;
        flex-direction: column;
        background-color: transparent;
        border: 2px solid #000;
        border-radius: 30px;
        height: 80%;
        width: 40%;
        justify-content: end;
    }
    .setting{
        display: flex;
        justify-content: end;
    }
    .setting-column{
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        align-items: end;
        padding: 20px;
    }
    .setting-item{
        padding: 20px;
        font-size: 18px;
        font-family: Calibri;
    }
    .item-text{
        margin-left: 20px;
        background-color: #d9d9d9;
        border: 1px solid #000;
        border-radius: 5px;
        height: 30px;
        text-align: center;
    }
    .item-title{
        font-size: 20px;
    }
    .btnCreate{
        display: flex;
        justify-content: center;
        align-items: center;
        margin-bottom: 20px;
    }
</style>
