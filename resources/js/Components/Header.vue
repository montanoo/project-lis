<script setup>
import { Link } from "@inertiajs/vue3";
</script>

<template>
    <div class="fixed w-full top-0 left-0 z-20 text bg-black/30">
        <div
            class="max-w-[1300px] mx-auto flex py-4 gap-[15px] justify-between text-white px-4"
        >
            <Link
                href="/"
                class="font-semibold text-white mr-4 hover:text-white/90 focus:outline hover:underline hover:underline-offset-4 focus:outline-2"
                >La Cuponera</Link
            >
            <div>
                <Link
                    v-if="$page.props.auth.user"
                    :href="route('dashboard')"
                    class="font-semibold text-white hover:text-white/90 hover:underline hover:underline-offset-4 focus:outline focus:outline-2"
                    >Dashboard</Link
                >
                <template v-else>
                    <Link
                        :href="route('login')"
                        class="font-semibold text-white mr-4 hover:text-white/90 focus:outline hover:underline hover:underline-offset-4 focus:outline-2"
                        >Inicia sesión</Link
                    >

                    <Link
                        :href="route('register')"
                        class="font-semibold text-white hover:text-white/90 hover:underline hover:underline-offset-4 focus:outline focus:outline-2"
                        >Registrate</Link
                    >
                </template>
            </div>
        </div>
    </div>
</template>
