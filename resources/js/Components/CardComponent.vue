<template>
    <div
        class="bg-white rounded-[5px] pb-4"
        @click="$page.props.auth.user ? (active = true) : ''"
        :class="{ 'cursor-pointer': $page.props.auth.user }"
    >
        <div class="relative max-w-[310px]">
            <img src="../assets/card__image.png" alt="" />
            <div class="px-4 py-4 flex flex-col gap-4">
                <p class="font-bold text-xl">
                    {{ coupon.title }} de
                    <span class="italic text-blue-950">{{
                        coupon.company.name
                    }}</span>
                </p>
                <div class="flex gap-8">
                    <p class="flex flex-col">
                        <span class="font-bold">Precio:</span>
                        ${{ coupon.price.toFixed(2) }}
                    </p>
                    <p class="flex flex-col">
                        <span class="font-bold">Precio oferta:</span>
                        ${{ coupon.offer_price.toFixed(2) }}
                    </p>
                </div>
                <p class="flex flex-col">
                    <span class="font-bold">Descripción</span>
                    {{ coupon.description }}
                </p>
                <div class="flex gap-4">
                    <p class="flex flex-col">
                        <span class="font-bold">Empieza el</span>
                        {{ format(new Date(coupon.start_offer), "d/MM/yyyy") }}
                    </p>
                    <p class="flex flex-col">
                        <span class="font-bold">Termina el</span>
                        {{ format(new Date(coupon.end_offer), "d/MM/yyyy") }}
                    </p>
                </div>
                <p class="font-lora text-[12px] text-[#6C757D]">
                    ¿Qué esperas para ahorrar?
                </p>
            </div>
        </div>
        <Modal :show="active" @close="active = false" class="py-2 px-4">
            <form class="flex flex-col gap-4" @submit.prevent="submit">
                <h3 class="text-2xl">
                    Compra
                    {{ coupon.title }} de
                    <span class="italic text-blue-950">{{
                        coupon.company.name
                    }}</span>
                    $({{ coupon.price }})
                </h3>
                <div class="flex flex-col">
                    <label for="title">Número de tarjeta</label>
                    <input
                        name="title"
                        type="number"
                        class="rounded-md text-sm"
                        v-model="form.card"
                    />
                </div>
                <div class="flex flex-col">
                    <label for="price">Fecha de expiración</label>
                    <input
                        name="price"
                        type="date"
                        class="rounded-md text-sm"
                        :min="format(new Date(), 'yyyy-mm-d')"
                        v-model="form.expiration_date"
                    />
                    <span class="text-red-500" v-if="error[0]?.expiration">{{
                        error[0]?.expiration
                    }}</span>
                </div>
                <div class="flex flex-col">
                    <label for="price">CVV</label>
                    <input
                        name="price"
                        type="number"
                        class="rounded-md text-sm"
                        v-model="form.cvv"
                    />
                </div>
                <div class="flex flex-col">
                    <label for="price">Cantidad a comprar</label>
                    <input
                        name="date"
                        type="number"
                        class="rounded-md text-sm"
                        max="5"
                        v-model="form.amount"
                    />
                </div>
                <button
                    type="submit"
                    class="w-full bg-black text-white py-2 border border-black hover:border-gray-600 rounded-md hover:bg-white hover:text-black transition-all duration-300"
                >
                    Comprar
                </button>
            </form>
        </Modal>
    </div>
</template>

<script setup>
import { differenceInDays, format } from "date-fns";
import Modal from "./Modal.vue";
import { useForm } from "@inertiajs/vue3";
import { ref } from "vue";

const active = ref(false);

const form = useForm({
    card: "",
    expiration_date: "",
    cvv: "",
    amount: "",
});

defineProps({
    coupon: { required: true, type: String },
});

const error = ref([]);

function submit() {
    if (differenceInDays(new Date(), new Date(form.expiration_date)) > 0) {
        error.value.push({ expiration: "Fecha invalida" });
    }
    if (differenceInDays(new Date(), new Date(form.expiration_date)))
        console.log(form);
    console.log(format(new Date(), "yyyy-mm-dd"));
}
</script>
