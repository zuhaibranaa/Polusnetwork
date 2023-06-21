<script setup>
import { computed } from "vue";
import GuestLayout from "@/Layouts/GuestLayout.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import { Head, Link, useForm } from "@inertiajs/vue3";

const props = defineProps({
    status: String,
});

const form = useForm({});

const submit = () => {
    form.post(route("verification.send"));
};

const verificationLinkSent = computed(
    () => props.status === "verification-link-sent"
);
</script>

<template>
    <GuestLayout>
        <Head title="Email Verification" />

        <div class="container mx-auto px-4 h-full">
            <div class="flex content-center items-center justify-center h-full">
                <div class="w-full lg:w-6/12 px-4 py-5">
                    <div
                        class="relative flex flex-col min-w-0 break-words w-full mb-6 shadow-lg rounded-lg bg-purple-200 border-0"
                    >
                        <div class="flex-auto px-4 lg:px-10 py-10">
                            <!-- <div
                                class="text-purple-400 text-center mb-3 font-bold"
                            > -->
                            <div class="mb-4 text-sm text-gray-600">
                                Thanks for signing up! Before getting started,
                                could you verify your email address by clicking
                                on the link we just emailed to you? If you
                                didn't receive the email, we will gladly send
                                you another.
                            </div>

                            <div
                                class="mb-4 font-medium text-sm text-green-600"
                                v-if="verificationLinkSent"
                            >
                                A new verification link has been sent to the
                                email address you provided during registration.
                            </div>
                            <!-- </div> -->
                            <form @submit.prevent="submit">
                                <div
                                    class="mt-4 flex items-center justify-between"
                                >
                                    <PrimaryButton
                                        :class="{
                                            'opacity-25': form.processing,
                                        }"
                                        :disabled="form.processing"
                                    >
                                        Resend Verification Email
                                    </PrimaryButton>

                                    <Link
                                        :href="route('logout')"
                                        method="post"
                                        as="button"
                                        class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                                        >Log Out</Link
                                    >
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </GuestLayout>
</template>
