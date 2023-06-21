<script setup>
import GuestLayout from "@/Layouts/GuestLayout.vue";
import InputError from "@/Components/InputError.vue";
import InputLabel from "@/Components/InputLabel.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import TextInput from "@/Components/TextInput.vue";
import { Head, Link, useForm } from "@inertiajs/vue3";

const form = useForm({
    name: "",
    email: "",
    password: "",
    password_confirmation: "",
    refferal_code: "",
    terms: false,
});

const submit = () => {
    form.post(route("register"), {
        onFinish: () => form.reset("password", "password_confirmation"),
    });
};
</script>

<!-- <template>
    <GuestLayout>
        <Head title="Register" />

        <form @submit.prevent="submit">
            <div>
                <InputLabel for="name" value="Name" />

                <TextInput
                    id="name"
                    type="text"
                    class="mt-1 block w-full"
                    v-model="form.name"
                    required
                    autofocus
                    autocomplete="name"
                />

                <InputError class="mt-2" :message="form.errors.name" />
            </div>

            <div class="mt-4">
                <InputLabel for="email" value="Email" />

                <TextInput
                    id="email"
                    type="email"
                    class="mt-1 block w-full"
                    v-model="form.email"
                    required
                    autocomplete="username"
                />

                <InputError class="mt-2" :message="form.errors.email" />
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
                <InputLabel for="password_confirmation" value="Confirm Password" />

                <TextInput
                    id="password_confirmation"
                    type="password"
                    class="mt-1 block w-full"
                    v-model="form.password_confirmation"
                    required
                    autocomplete="new-password"
                />

                <InputError class="mt-2" :message="form.errors.password_confirmation" />
            </div>

            <div class="flex items-center justify-end mt-4">
                <Link
                    :href="route('login')"
                    class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                >
                    Already registered?
                </Link>

                <PrimaryButton class="ml-4" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                    Register
                </PrimaryButton>
            </div>
        </form>
    </GuestLayout>
</template> -->

<template>
    <GuestLayout>
        <Head title="Register" />
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
                                <small>Sign Up To Polus Network</small>
                            </div>
                            <form @submit.prevent="submit">
                                <div class="relative w-full mb-3">
                                    <label
                                        class="block uppercase text-purple-600 text-xs font-bold mb-2"
                                        htmlFor="grid-password"
                                    >
                                        Name
                                    </label>
                                    <input
                                        v-model="form.name"
                                        type="text"
                                        class="border-0 px-3 py-3 placeholder-purple-300 text-purple-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150"
                                        placeholder="Name"
                                    />
                                </div>

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
                                        v-model="form.password"
                                        type="password"
                                        class="border-0 px-3 py-3 placeholder-purple-300 text-purple-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150"
                                        placeholder="Password"
                                    />
                                </div>

                                <div class="relative w-full mb-3">
                                    <label
                                        class="block uppercase text-purple-600 text-xs font-bold mb-2"
                                        htmlFor="grid-password"
                                    >
                                        Confirm Password
                                    </label>
                                    <input
                                        v-model="form.password_confirmation"
                                        type="password"
                                        class="border-0 px-3 py-3 placeholder-purple-300 text-purple-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150"
                                        placeholder="Confirm Password"
                                    />
                                </div>

                                <div class="relative w-full mb-3">
                                    <label
                                        class="block uppercase text-purple-600 text-xs font-bold mb-2"
                                        htmlFor="grid-password"
                                    >
                                        Refference Code
                                    </label>
                                    <input
                                        v-model="form.refferal_code"
                                        type="text"
                                        class="border-0 px-3 py-3 placeholder-purple-300 text-purple-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150"
                                        placeholder="Refference Code (Optional)"
                                    />
                                </div>

                                <div>
                                    <label
                                        class="inline-flex items-center cursor-pointer"
                                    >
                                        <input
                                            v-model="form.terms"
                                            id="customCheckLogin"
                                            type="checkbox"
                                            class="form-checkbox border-0 rounded text-purple-700 ml-1 w-5 h-5 ease-linear transition-all duration-150"
                                        />
                                        <span
                                            class="ml-2 text-sm font-semibold text-black"
                                        >
                                            I agree with the
                                            <a
                                                href="javascript:void(0)"
                                                class="text-purple-500"
                                            >
                                                Privacy Policy
                                            </a>
                                        </span>
                                    </label>
                                </div>

                                <div class="text-center mt-6">
                                    <button
                                        class="bg-purple-600 text-white active:bg-purple-400 text-sm font-bold uppercase px-6 py-3 rounded shadow hover:shadow-lg outline-none focus:outline-none mr-1 mb-1 w-full ease-linear transition-all duration-150"
                                        type="submit"
                                    >
                                        Create Account
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </GuestLayout>
</template>
