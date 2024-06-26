<script setup>
import InputError from "@/Components/InputError.vue";
import InputLabel from "@/Components/InputLabel.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import TextInput from "@/Components/TextInput.vue";
import { Link, useForm, usePage } from "@inertiajs/vue3";

const props = defineProps({
    mustVerifyEmail: Boolean,
    status: String,
});

const user = usePage().props.auth.user;
console.log(user);
const form = useForm({
    withdrawal_address: user.withdrawal_address,
    refferal_code: user.refferal_code,
    refference_code: user.refference_code,
});
</script>

<template>
    <section>
        <header>
            <h2 class="text-lg font-medium text-white">
                Additional Profile Information
            </h2>

            <p class="mt-1 text-sm text-purple-300">
                Update your account's Additional information.
            </p>
        </header>

        <form
            @submit.prevent="form.patch(route('profile.update.additional'))"
            class="mt-6 space-y-6"
        >
            <div>
                <InputLabel
                    for="withdrawal_address"
                    value="Withdrawal Address"
                />

                <TextInput
                    id="withdrawal_address"
                    type="text"
                    class="mt-1 block w-full"
                    v-model="form.withdrawal_address"
                    required
                    autofocus
                />

                <InputError
                    class="mt-2"
                    :message="form.errors.withdrawal_address"
                />
            </div>

            <div>
                <InputLabel for="refferal_code" value="Refferal Code" />

                <TextInput
                    id="refferal_code"
                    type="text"
                    class="mt-1 block w-full"
                    v-model="form.refferal_code"
                />

                <InputError class="mt-2" :message="form.errors.refferal_code" />
            </div>

            <div>
                <InputLabel
                    for="refference_code"
                    value="Your Refference Code"
                />

                <TextInput
                    id="refference_code"
                    type="text"
                    class="mt-1 block w-full"
                    v-model="form.refference_code"
                    disabled
                />
            </div>

            <div
                v-if="props.mustVerifyEmail && user.email_verified_at === null"
            >
                <p class="text-sm mt-2 text-gray-800">
                    Your email address is unverified.
                    <Link
                        :href="route('verification.send')"
                        method="post"
                        as="button"
                        class="underline text-sm text-purple-600 hover:text-purple-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                    >
                        Click here to re-send the verification email.
                    </Link>
                </p>

                <div
                    v-show="props.status === 'verification-link-sent'"
                    class="mt-2 font-medium text-sm text-green-600"
                >
                    A new verification link has been sent to your email address.
                </div>
            </div>

            <div class="flex items-center gap-4">
                <PrimaryButton :disabled="form.processing">Save</PrimaryButton>

                <Transition
                    enter-from-class="opacity-0"
                    leave-to-class="opacity-0"
                    class="transition ease-in-out"
                >
                    <p
                        v-if="form.recentlySuccessful"
                        class="text-sm text-gray-600"
                    >
                        Saved.
                    </p>
                </Transition>
            </div>
        </form>
    </section>
</template>
