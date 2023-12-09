<script setup>
import Modal from "@/Components/Modal.vue";
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Head, useForm, router } from "@inertiajs/vue3";
import { ref } from "vue";
import { format } from "date-fns";

const props = defineProps({
    company: { required: true, type: Object },
});

const offer = useForm({
    title: "",
    price: "",
    offer_price: "",
    start_date: "",
    end_date: "",
    amount: "",
    description: "",
    active: "",
});

const active = ref(false);

const submit = () => {
    console.log(offer);
    console.log(props.company);
    router.post("/coupons", {
        company_id: props.company.id,
        title: offer.title,
        price: offer.price,
        offer_price: offer.offer_price,
        start_offer: offer.start_date,
        end_offer: offer.end_date,
        amount: offer.amount,
        description: offer.description,
        active: offer.active,
    });
    active.value = false;
    // offer.post();
};
</script>

<template>
    <Head title="Dashboard" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Panel de control de {{ company.name }}
            </h2>
        </template>
        {{ console.log(company) }}

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900 grid grid-cols--4">
                        <div v-if="!company.active">
                            Tu compañía está deshabilitada, consulta con un
                            administrador.
                        </div>
                        <div v-else>
                            <h2 class="text-5xl font-bold">
                                Tus
                                <span class="italic text-blue-950"
                                    >cupones</span
                                >
                            </h2>
                            <p>
                                Tu compañía posee una comisión del
                                {{ company.tax }}%
                            </p>
                            <div class="grid grid-cols-4 gap-4 mt-4">
                                <div
                                    class="h-[250px] w-full bg-gray-300 rounded-md flex items-center justify-center cursor-pointer"
                                    @click="active = true"
                                >
                                    <p class="text-9xl text-gray-600">+</p>
                                </div>
                                <div
                                    v-for="(coupon, id) in company.coupons"
                                    :key="id"
                                    class="h-[250px] rounded-md flex flex-col items-left px-8 py-6"
                                    :class="{
                                        'bg-blue-100': coupon.active,
                                        'bg-gray-300': !coupon.active,
                                    }"
                                >
                                    {{ console.log(coupon) }}
                                    <p class="font-bold text-2xl">
                                        {{ coupon.title }}
                                    </p>
                                    <div class="flex gap-8">
                                        <p class="flex flex-col">
                                            <span class="font-bold text-lg"
                                                >Precio:</span
                                            >
                                            ${{ coupon.price.toFixed(2) }}
                                        </p>
                                        <p class="flex flex-col">
                                            <span class="font-bold text-lg"
                                                >Precio oferta:</span
                                            >
                                            ${{ coupon.offer_price.toFixed(2) }}
                                        </p>
                                    </div>
                                    <p class="flex flex-col">
                                        <span class="font-bold text-lg"
                                            >Descripción</span
                                        >
                                        {{ coupon.description }}
                                    </p>
                                    <div class="flex gap-4">
                                        <p class="flex flex-col">
                                            <span class="font-bold text-lg"
                                                >Empieza el</span
                                            >
                                            {{
                                                format(
                                                    new Date(
                                                        coupon.start_offer
                                                    ),
                                                    "d/MM/yyyy"
                                                )
                                            }}
                                        </p>
                                        <p class="flex flex-col">
                                            <span class="font-bold text-lg"
                                                >Termina el</span
                                            >
                                            {{
                                                format(
                                                    new Date(coupon.end_offer),
                                                    "d/MM/yyyy"
                                                )
                                            }}
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <Modal
                                :show="active"
                                @close="active = false"
                                class="py-2 px-4"
                            >
                                <form
                                    class="flex flex-col gap-4"
                                    @submit.prevent="submit"
                                >
                                    <h3 class="text-2xl">Crea tu oferta</h3>
                                    <div class="flex flex-col">
                                        <label for="title">Título</label>
                                        <input
                                            name="title"
                                            type="text"
                                            class="rounded-md text-sm"
                                            v-model="offer.title"
                                        />
                                    </div>
                                    <div class="flex flex-col">
                                        <label for="price"
                                            >Precio regular</label
                                        >
                                        <input
                                            name="price"
                                            type="number"
                                            class="rounded-md text-sm"
                                            v-model="offer.price"
                                        />
                                    </div>
                                    <div class="flex flex-col">
                                        <label for="price">Precio oferta</label>
                                        <input
                                            name="price"
                                            type="number"
                                            class="rounded-md text-sm"
                                            v-model="offer.offer_price"
                                        />
                                    </div>
                                    <div class="flex flex-col">
                                        <label for="price">Inicio fecha</label>
                                        <input
                                            name="date"
                                            type="date"
                                            class="rounded-md text-sm"
                                            v-model="offer.start_date"
                                        />
                                    </div>
                                    <div class="flex flex-col">
                                        <label for="price">Fin fecha</label>
                                        <input
                                            name="date"
                                            type="date"
                                            class="rounded-md text-sm"
                                            v-model="offer.end_date"
                                        />
                                    </div>
                                    <div class="flex flex-col">
                                        <label for="price"
                                            >Cantidad de cupones</label
                                        >
                                        <input
                                            name="date"
                                            type="number"
                                            class="rounded-md text-sm"
                                            v-model="offer.amount"
                                        />
                                    </div>
                                    <div class="flex flex-col">
                                        <label for="price">Descripcion</label>
                                        <textarea
                                            name="date"
                                            type="date"
                                            class="rounded-md resize-y text-sm"
                                            v-model="offer.description"
                                        />
                                    </div>
                                    <div class="flex flex-col">
                                        <label for="price">Estado</label>
                                        <select v-model="offer.active">
                                            <option :value="1">Activo</option>
                                            <option :value="0">
                                                Deshabilitado
                                            </option>
                                        </select>
                                    </div>
                                    <button
                                        class="w-full bg-black text-white py-2 border border-black hover:border-gray-600 rounded-md hover:bg-white hover:text-black transition-all duration-300"
                                    >
                                        Crear
                                    </button>
                                </form>
                            </Modal>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
