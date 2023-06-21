<script>
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';

export default {
    components: {
        InputError,
        InputLabel,
        PrimaryButton,
        TextInput
    },
    methods: {
    }
}
</script>
<script setup>
import {useForm} from "@inertiajs/vue3";
const form = useForm({
    deposit_amount: 0.00
})
const submitData = (e) => {
    form.post(route('deposit.store'), {
        preserveScroll: true,
        onSuccess: (data) => {
            form.reset();
            this.$emit('changeStep', e)
        },
        onError: () => {
        },
    });
}
</script>
<template>
    <section>
        <header>
            <h2 class="text-lg font-medium text-white">Deposit USDT</h2>

            <p class="mt-1 text-sm text-purple-300">
                Please enter your deposit amount in $USD.
            </p>
        </header>

        <form @submit.prevent="submitData" class="mt-6 space-y-6 m-14">
            <div>
                <InputLabel for="deposit_amount" value="Deposit Amount" />
                <TextInput
                    id="deposit_amount"
                    ref="deposit_amount"
                    v-model="form.deposit_amount"
                    type="number"
                    step="0.1"
                    class="mt-1 block w-full"
                />

                <InputError :message="form.errors.deposit_amount" class="mt-2" />
            </div>

            <div class="flex items-center gap-4">
                <PrimaryButton :disabled="form.processing || form.deposit_amount === 0">Save</PrimaryButton>

                <Transition enter-from-class="opacity-0" leave-to-class="opacity-0" class="transition ease-in-out">
                    <p v-if="form.recentlySuccessful" class="text-sm text-gray-600">Saved.</p>
                </Transition>
            </div>
        </form>
    </section>
</template>
