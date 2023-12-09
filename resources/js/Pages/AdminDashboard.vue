<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Head, router } from "@inertiajs/vue3";

const props = defineProps({
    companies: { required: true },
});

function handleDeleteCompany(id) {
    const response = router.delete(`/company/${id}`);
    console.log(response);
}

function handleEditCompany(id) {
    console.log(props.companies[id]);
    const response = router.put(`/company/${props.companies[id].id}`, {
        tax: props.companies[id].tax,
        active: props.companies[id].active,
    });
    console.log(response);
}
</script>

<template>
    <Head title="Dashboard" />

    {{ console.log(companies) }}
    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Admin Dashboard
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        <form
                            v-for="(company, id) in companies"
                            :key="id"
                            class="border border-blue-950 rounded-md mt-4 py-4 px-6 flex justify-between"
                        >
                            <div>
                                <h3 class="text-lg font-bold">
                                    {{ company.name }}
                                </h3>
                                <p>{{ company.address }}</p>
                                <p class="mt-2">
                                    <span class="font-bold">Teléfono:</span>
                                    {{ company.phone }}
                                </p>
                                <p class="mt-2">
                                    <span class="font-bold">NIT:</span>
                                    {{ company.nit }}
                                </p>
                            </div>
                            <div class="flex gap-4 items-center">
                                <div class="flex flex-col">
                                    <div>Comisión (%):</div>
                                    <input
                                        type="number"
                                        class="text-sm rounded-md"
                                        min="1"
                                        v-model="company.tax"
                                    />
                                    <div>Estado:</div>
                                    <select
                                        class="rounded-md text-sm"
                                        v-model="company.active"
                                    >
                                        <option :value="1">Activa</option>
                                        <option :value="0">
                                            Deshabilitada
                                        </option>
                                    </select>
                                </div>
                                <div class="flex flex-col gap-2">
                                    <button
                                        @click="handleEditCompany(id)"
                                        type="button"
                                        class="bg-blue-950 text-white px-4 py-2 mt-6 font-bold rounded-md"
                                    >
                                        Aplicar
                                    </button>
                                    <button
                                        type="button"
                                        @click="handleDeleteCompany(company.id)"
                                        class="bg-red-950 text-white px-4 py-2 font-bold rounded-md"
                                    >
                                        Borrar
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
