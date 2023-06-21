<script setup>
import InputError from "@/Components/InputError.vue";
import InputLabel from "@/Components/InputLabel.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import TextInput from "@/Components/TextInput.vue";
import { Link, useForm, usePage } from "@inertiajs/vue3";

const props = defineProps({
    settings: Object,
});

const user = usePage().props.auth.user;

const form = useForm({
    settings: props.settings,
});
</script>

<template>
    <section>
        <form
            @submit.prevent="form.put(route('settings.update', [1]))"
            class="mt-6 space-y-6"
        >
            <div v-for="setting in settings" :key="setting.name">
                <InputLabel
                    :for="setting.name"
                    :value="setting.name.replaceAll('_', ' ').toUpperCase()"
                />

                <TextInput
                    :id="setting.name"
                    type="text"
                    class="mt-1 block w-full"
                    v-model="setting.value"
                />

                <InputError class="mt-2" :message="form.errors.name" />
            </div>

            <div class="flex items-center gap-4">
                <PrimaryButton v-if="false" @click.prevent="$emit('addNewSettingAction')"
                    >Add New Setting</PrimaryButton
                >
                <PrimaryButton :disabled="form.processing">Save</PrimaryButton>

                <Transition
                    enter-from-class="opacity-0"
                    leave-to-class="opacity-0"
                    class="transition ease-in-out"
                >
                    <p
                        v-if="form.recentlySuccessful"
                        class="text-sm text-purple-600"
                    >
                        Saved.
                    </p>
                </Transition>
            </div>
        </form>
    </section>
</template>

