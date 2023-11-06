<script setup>
import ApplicationLogo from "@/Components/ApplicationLogo.vue";
import HeaderComponent from "../Components/Header.vue";
</script>

<template>
    <div
        class="min-h-screen flex flex-col sm:justify-center bg-dots-lighter items-center pt-6 sm:pt-0"
    >
        <HeaderComponent />

        <div
            class="w-full sm:max-w-md mt-6 px-6 py-4 bg-gray-300 text-gray-900 shadow-md overflow-hidden sm:rounded-lg"
        >
            <slot />
        </div>
    </div>
</template>

<style>
.bg-dots-lighter {
    background-color: #ffffff;
    opacity: 0.8;
    background-image: radial-gradient(
        #000000 1.7000000000000002px,
        #ffffff 1.7000000000000002px
    );
    background-size: 34px 34px;
}
</style>
