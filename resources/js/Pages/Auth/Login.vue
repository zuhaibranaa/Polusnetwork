<script setup>
import Checkbox from "@/Components/Checkbox.vue";
import GuestLayout from "@/Layouts/GuestLayout.vue";
import InputError from "@/Components/InputError.vue";
import InputLabel from "@/Components/InputLabel.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import TextInput from "@/Components/TextInput.vue";
import { Head, Link, useForm } from "@inertiajs/vue3";
import {ref} from "vue";
import Alert from "@/Components/Alerts/Alert.vue";

defineProps({
    canResetPassword: Boolean,
    status: String,
});
const message = ref(0);
const setMessage = (val) => {
    message.value = val
}
const type = ref(0);
const setType = (val) => {
    type.value = val
}

const form = useForm({
    email: "",
    password: "",
    remember: false,
});

const submit = () => {
    form.post(route("login"), {
        onFinish: () => form.reset("password"),
        onError: (res) => {
            setMessage(res.email)
            setType('red')
            form.reset("password")
        }
    });
};
</script>

<template>
    <GuestLayout>
        <Head title="Log in" />
        <div v-if="status" class="mb-4 font-medium text-sm text-green-600">
            {{ status }}
        </div>
        <Alert v-if="message" :message="message" :alert-type="type" />
        <div class="container mx-auto px-4 h-full">
            <div class="flex content-center items-center justify-center h-full">
                <div class="w-full lg:w-4/12 px-4">
                    <div
                        class="relative flex flex-col min-w-0 break-words w-full mb-6 shadow-lg rounded-lg bg-purple-200 border-0"
                    >
                        <div class="flex-auto px-4 lg:px-10 py-10 pt-0">
                            <div
                                class="text-purple-400 text-center mb-3 font-bold"
                            >
                                <small>Sign in to Polus Network</small>
                            </div>
                            <form @submit.prevent="submit">
                                <div class="relative w-full mb-3">
                                    <label
                                        class="block uppercase text-purple-600 text-xs font-bold mb-2"
                                        htmlFor="grid-password"
                                    >
                                        Email
                                    </label>
                                    <input
                                        v-model="form.email"
                                        type="email"
                                        class="border-0 px-3 py-3 placeholder-purple-300 text-purple-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150"
                                        placeholder="Email"
                                    />
                                </div>

                                <div class="relative w-full mb-3">
                                    <label
                                        class="block uppercase text-purple-600 text-xs font-bold mb-2"
                                        htmlFor="grid-password"
                                    >
                                        Password
                                    </label>
                                    <input
                                        type="password"
                                        v-model="form.password"
                                        class="border-0 px-3 py-3 placeholder-purple-300 text-purple-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150"
                                        placeholder="Password"
                                    />
                                </div>
                                <div>
                                    <label
                                        class="inline-flex items-center cursor-pointer"
                                    >
                                        <input
                                            v-model="form.remember"
                                            id="customCheckLogin"
                                            type="checkbox"
                                            class="form-checkbox border-0 rounded text-purple-700 ml-1 w-5 h-5 ease-linear transition-all duration-150"
                                        />
                                        <span
                                            class="ml-2 text-sm font-semibold text-purple-600"
                                        >
                                            Remember me
                                        </span>
                                    </label>
                                </div>

                                <div class="text-center mt-6">
                                    <button
                                        :disabled="form.processing"
                                        class="bg-purple-600 text-white active:bg-purple-400 text-sm font-bold uppercase px-6 py-3 rounded shadow hover:shadow-lg outline-none focus:outline-none mr-1 mb-1 w-full ease-linear transition-all duration-150"
                                        type="submit"
                                    >
                                        Sign In
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="flex flex-wrap mt-6 relative">
                        <div class="w-1/2">
                            <Link
                                :href="route('password.request')"
                                class="text-purple-200"
                            >
                                <small>Forgot password?</small>
                            </Link>
                        </div>
                        <div class="w-1/2 text-right">
                            <Link
                                :href="route('register')"
                                class="text-purple-200"
                            >
                                <small>Create new account</small>
                            </Link>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </GuestLayout>
</template>
