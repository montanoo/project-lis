<script setup>
import { Head, Link } from "@inertiajs/vue3";
import CardComponent from "../Components/CardComponent.vue";
import { ref } from "vue";
import HeaderComponent from "../Components/Header.vue";

const array = ref([
    "Ahorra hasta $10 en cualquier compra de [empresa]",
    "Ahorra hasta $30 en cualquier compra de [empresa]",
    "Ahorra hasta $40 en cualquier compra de [empresa]",
    "Ahorra hasta $15 en cualquier compra de [empresa]",
    "Ahorra hasta 50% en cualquier compra de [empresa]",
    "Ahorra hasta $45 en cualquier compra de [empresa]",
]);
defineProps({
    canLogin: {
        type: Boolean,
    },
    canRegister: {
        type: Boolean,
    },
    laravelVersion: {
        type: String,
        required: true,
    },
    phpVersion: {
        type: String,
        required: true,
    },
});
</script>

<template>
    <Head title="La Cuponera" />
    <HeaderComponent />

    <main class="main__Content">
        <section
            class="max-w-[1300px] mx-auto h-full flex flex-col gap-[15px] justify-end text-white pb-20 px-4"
        >
            <h1 class="text-[36px] font-bold max-w-[530px] font-lora">
                ¿Qué esperas para obtener los mejores descuentos de todo
                Internet?
            </h1>
            <div class="flex text-[15px] gap-[10px] text-[#E5E5E5] mb-[66px]">
                <div>01.10.2023</div>
                <div class="w-[30px] h-[1px] bg-white mt-[8px]"></div>
                <div class="w-[420px]">
                    La Cuponera me ha ahorrado más dinero del que puedo contar,
                    estoy agradecido con tan brillante idea.
                </div>
            </div>
            <div class="flex gap-[15px]">
                <div class="w-[8px] h-[8px] rounded-full bg-white"></div>
                <div class="w-[8px] h-[8px] rounded-full bg-white/60"></div>
                <div class="w-[8px] h-[8px] rounded-full bg-white/60"></div>
            </div>
        </section>
    </main>

    <div class="bg-[#E5E5E5]">
        <section class="max-w-[1300px] mx-auto">
            <div class="grid grid-cols-2 md:grid-cols-4 py-8 gap-5">
                <CardComponent
                    v-for="(name, id) in array"
                    :key="id"
                    :name="name"
                />
            </div>
        </section>
    </div>
</template>

<style setup>
@import url("https://fonts.googleapis.com/css2?family=Noto+Sans+Linear+B&display=swap");
.main__Content {
    background-image: url("../assets/main__image.png");
    height: 650px;
    background-size: cover;
}

.header {
    background: #00000033;
    padding: 25px 0;
    position: fixed;
    width: 100%;
}

.header__Title {
    color: white;
    font-family: "PT Sans";
    font-size: 24px;
    font-weight: 700;
    line-height: 22px;
    letter-spacing: 0em;
}

.header__Wrapper {
    max-width: 1300px;
    margin: 0 auto;
    display: flex;
    /* eje x */
    justify-content: space-between;
    /* eye y */
    align-items: center;
}

.header__Link {
    text-decoration: none;
    padding: 5px 0;
    margin-right: 15px;
    color: white;
    /* background: aqua; */
    transition: all 0.5s ease-in;
    font-family: Roboto;
    font-size: 14px;
    font-weight: 700;
    line-height: 14px;
}

.header__Link:hover {
    /* text-decoration: underline; */
    border-bottom: 1px solid #d4a373;
}
</style>
