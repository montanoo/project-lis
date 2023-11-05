<script setup>
import GuestLayout from "@/Layouts/GuestLayout.vue";
import InputError from "@/Components/InputError.vue";
import InputLabel from "@/Components/InputLabel.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import TextInput from "@/Components/TextInput.vue";
import { Head, Link, useForm } from "@inertiajs/vue3";
import { ref } from "vue";

const state = ref(1);

const form = useForm({
    name: "",
    email: "",
    password: "",
    password_confirmation: "",
    dui: "",
    username: "",
    lastname: "",
    birthdate: "",
    state: 1,
});

const company = useForm({
    cname: "",
    cnit: "",
    caddress: "",
    cphone: "",
    cemail: "",
    cuser: "",
    cpassword: "",
    cpassword_confirmation: "",
    state: 2,
});

const submit = () => {
    if (state.value === 2) {
        company.post(route("register"), {
            onFinish: () => company.reset("password", "password_confirmation"),
        });
    } else {
        form.post(route("register"), {
            onFinish: () => form.reset("password", "password_confirmation"),
        });
    }
};
</script>

<template>
    <GuestLayout>
        <Head title="Register" />
        <h2 class="text-white font-bold text-xl mt-4 mb-2">Choose your registration</h2>
        <div class="flex text-white">
            <ul class="flex mb-4 border rounded-[4px] overflow-hidden">
                <li
                    class="px-4 py-2 cursor-pointer"
                    :class="{ [`font-bold bg-white text-black`]: state === 1 }"
                    @click="state = 1"
                >
                    Client
                </li>
                <li
                    class="px-4 py-2 cursor-pointer"
                    :class="{ [`font-bold bg-white text-black`]: state === 2 }"
                    @click="state = 2"
                >
                    Company
                </li>
            </ul>
        </div>

        <form @submit.prevent="submit">
            <div v-if="state === 2">
                <div>
                    <InputLabel for="cname" value="Company Name" />

                    <TextInput
                        id="cname"
                        type="text"
                        class="mt-1 block w-full"
                        v-model="company.cname"
                        required
                        autofocus
                        autocomplete="name"
                    />

                    <InputError class="mt-2" :message="company.errors.cname" />
                </div>
                <div class="mt-4">
                    <InputLabel for="cnit" value="NIT" />

                    <TextInput
                        id="cnit"
                        type="text"
                        class="mt-1 block w-full"
                        v-model="company.cnit"
                        required
                        autocomplete="nit"
                    />

                    <InputError class="mt-2" :message="company.errors.cnit" />
                </div>
                <div class="mt-4">
                    <InputLabel for="caddress" value="Address" />

                    <TextInput
                        id="caddress"
                        type="text"
                        class="mt-1 block w-full"
                        v-model="company.caddress"
                        required
                        autocomplete="address"
                    />

                    <InputError
                        class="mt-2"
                        :message="company.errors.caddress"
                    />
                </div>
                <div class="mt-4">
                    <InputLabel for="cphone" value="Phone" />

                    <TextInput
                        id="cphone"
                        type="text"
                        class="mt-1 block w-full"
                        v-model="company.cphone"
                        required
                        autocomplete="phone"
                    />

                    <InputError class="mt-2" :message="company.errors.cphone" />
                </div>
                <div class="mt-4">
                    <InputLabel for="cemail" value="Email" />

                    <TextInput
                        id="cemail"
                        type="email"
                        class="mt-1 block w-full"
                        v-model="company.cemail"
                        required
                        autocomplete="email"
                    />

                    <InputError class="mt-2" :message="company.errors.cemail" />
                </div>
                <div class="mt-4">
                    <InputLabel for="cuser" value="Username" />

                    <TextInput
                        id="cuser"
                        type="text"
                        class="mt-1 block w-full"
                        v-model="company.cuser"
                        required
                        autocomplete="username"
                    />

                    <InputError class="mt-2" :message="company.errors.cuser" />
                </div>
                <div class="mt-4">
                    <InputLabel for="cpassword" value="Password" />

                    <TextInput
                        id="cpassword"
                        type="password"
                        class="mt-1 block w-full"
                        v-model="company.cpassword"
                        required
                        autocomplete="password"
                    />

                    <InputError
                        class="mt-2"
                        :message="company.errors.cpassword"
                    />
                </div>
                <div class="mt-4">
                    <InputLabel
                        for="cpassword_confirmation"
                        value="Confirm Password"
                    />

                    <TextInput
                        id="password_confirmation"
                        type="password"
                        class="mt-1 block w-full"
                        v-model="company.cpassword_confirmation"
                        required
                        autocomplete="new-password"
                    />

                    <InputError
                        class="mt-2"
                        :message="company.errors.cpassword_confirmation"
                    />
                </div>
            </div>
            <div v-else>
                <div>
                    <InputLabel for="username" value="Username" />

                    <TextInput
                        id="name"
                        type="text"
                        class="mt-1 block w-full"
                        v-model="form.username"
                        required
                        autofocus
                        autocomplete="username"
                    />

                    <InputError class="mt-2" :message="form.errors.username" />
                </div>

                  <div class="mt-4">
                    <InputLabel for="email" value="Email" />

                    <TextInput
                        id="email"
                        type="email"
                        class="mt-1 block w-full"
                        v-model="form.email"
                        required
                        autocomplete="email"
                    />

                    <InputError class="mt-2" :message="form.errors.email" />
                </div>

                <div class="mt-4">
                    <InputLabel for="name" value="Name" />

                    <TextInput
                        id="name"
                        type="text"
                        class="mt-1 block w-full"
                        v-model="form.name"
                        required
                        autocomplete="name"
                    />

                    <InputError class="mt-2" :message="form.errors.name" />
                </div>

                <div class="mt-4">
                    <InputLabel for="lastname" value="Lastname" />

                    <TextInput
                        id="lastname"
                        type="text"
                        class="mt-1 block w-full"
                        v-model="form.lastname"
                        required
                        autocomplete="lastname"
                    />

                    <InputError class="mt-2" :message="form.errors.lastname" />
                </div>

                <div class="mt-4">
                    <InputLabel for="dui" value="DUI" />

                    <TextInput
                        id="dui"
                        type="text"
                        class="mt-1 block w-full"
                        v-model="form.dui"
                        required
                        autocomplete="dui"
                    />

                    <InputError class="mt-2" :message="form.errors.dui" />
                </div>

                <div class="mt-4">
                    <InputLabel for="date" value="Birthdate" />

                    <TextInput
                        id="date"
                        type="date"
                        class="mt-1 block w-full"
                        v-model="form.birthdate"
                        required
                        autocomplete="date"
                    />

                    <InputError class="mt-2" :message="form.errors.date" />
                </div>

                <div class="mt-4">
                    <InputLabel for="password" value="Password" />

                    <TextInput
                        id="password"
                        type="password"
                        class="mt-1 block w-full"
                        v-model="form.password"
                        required
                        autocomplete="new-password"
                    />

                    <InputError class="mt-2" :message="form.errors.password" />
                </div>

                <div class="mt-4">
                    <InputLabel
                        for="password_confirmation"
                        value="Confirm Password"
                    />

                    <TextInput
                        id="password_confirmation"
                        type="password"
                        class="mt-1 block w-full"
                        v-model="form.password_confirmation"
                        required
                        autocomplete="new-password"
                    />

                    <InputError
                        class="mt-2"
                        :message="form.errors.password_confirmation"
                    />
                </div>
            </div>

            <div class="flex items-center justify-between mt-4 px-1">
                <Link
                    :href="route('login')"
                    class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800"
                >
                    Already registered?
                </Link>

                <PrimaryButton
                    class="ml-4"
                    :class="{ 'opacity-25': form.processing }"
                    :disabled="form.processing"
                >
                    Register
                </PrimaryButton>
            </div>
        </form>
    </GuestLayout>
</template>

<style>
.active {
    background-color: aqua;
    font-weight: bold;
}
</style>
