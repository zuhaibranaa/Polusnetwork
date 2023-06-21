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
    amount: 0.00,
    note: '',
    withdrawal_address: ''
})
const submitData = (e) => {
    form.post(route('withdraw.store'), {
        preserveScroll: true,
        onSuccess: (data) => {
            console.log(data)
            form.reset();
        },
        onError: () => {
        },
    });
}
</script>
<template>
    <section>
        <header>
            <h2 class="text-lg font-medium text-white">Withdraw USDT</h2>

            <p class="mt-1 text-sm text-purple-300">
                Please enter your Withdrawal amount in $USD.
            </p>
        </header>

        <form @submit.prevent="submitData" class="mt-6 space-y-6 m-14">
            <div>
                <InputLabel for="amount" value="Withdrawal Amount" />
                <TextInput
                    id="amount"
                    ref="amount"
                    v-model="form.amount"
                    type="number"
                    step="0.1"
                    class="mt-1 block w-full"
                />

                <InputError :message="form.errors.amount" class="mt-2" />
            </div>
            <div>
                <InputLabel for="withdrawal_address" value="Withdrawal Address" />
                <TextInput
                    id="withdrawal_address"
                    ref="withdrawal_address"
                    v-model="form.withdrawal_address"
                    type="text"
                    class="mt-1 block w-full"
                />

                <InputError :message="form.errors.withdrawal_address" class="mt-2" />
            </div>
            <div>
                <InputLabel for="note" value="Withdrawal Note" />
                <TextInput
                    id="note"
                    ref="note"
                    v-model="form.note"
                    type="text"
                    class="mt-1 block w-full"
                />

                <InputError :message="form.errors.note" class="mt-2" />
            </div>

            <div class="flex items-center gap-4">
                <PrimaryButton :disabled="form.processing || form.amount === 0">Save</PrimaryButton>

                <Transition enter-from-class="opacity-0" leave-to-class="opacity-0" class="transition ease-in-out">
                    <p v-if="form.recentlySuccessful" class="text-sm text-gray-600">Saved.</p>
                </Transition>
            </div>
        </form>
    </section>
</template>
