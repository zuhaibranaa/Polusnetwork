<script>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Head } from "@inertiajs/vue3";
import InputLabel from "@/Components/InputLabel.vue";
import TextInput from "@/Components/TextInput.vue";
import InputError from "@/Components/InputError.vue";
import Form from "@/Pages/Settings/Form.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import Modal from "@/Components/Modals/Modal.vue";
export default {
    components: {
        PrimaryButton,
        Form,
        AuthenticatedLayout,
        Head,
        InputLabel,
        TextInput,
        InputError,
        Modal,
    },
    methods: {
        toggleModal() {
            this.createModal = !this.createModal;
        },
    },
    data: () => ({
        createModal: false,
        settings: null,
    }),
};
</script>
<script setup>
import { useForm } from "@inertiajs/vue3";
const form = useForm({
    name: undefined,
    value: undefined,
});
</script>

<template>
    <Head title="Settings" />

    <AuthenticatedLayout header="Settings">
        <div>
            <div class="flex flex-wrap mt-4" style="margin-top: 7rem">
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
                    <div
                        class="p-4 sm:p-8 bg-blueGray-800 shadow sm:rounded-lg"
                    >
                        <header>
                            <h2 class="text-lg font-medium text-white">
                                Manage Settings {{ settings }}
                            </h2>

                            <p class="mt-1 text-sm text-purple-300">
                                Update settings related to this Application.
                            </p>
                        </header>
                        <div class="mt-6 space-y-6">
                            <Form
                                @add-new-setting-action="toggleModal"
                                :settings="$page.props.settings"
                            />
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <Modal
            :showModal="createModal"
            :title="'Add New Settings'"
            :success-text="'Save'"
            :close-text="'Close'"
            :submit-disabled="form.processing"
            @save="
                () => {
                    form.post(route('settings.store'));
                    this.toggleModal();
                    form.reset();
                }
            "
            @toggleModal="toggleModal"
        >
            <InputLabel for="name" value="NAME" />
            <TextInput
                id="name"
                type="text"
                class="block w-full"
                v-model="form.name"
            />
            <InputError class="mt-2" :message="form.errors.name" />
            <InputLabel for="value" value="VALUE" />
            <TextInput
                id="value"
                type="text"
                class="block w-full"
                v-model="form.value"
            />
            <InputError class="mt-2" :message="form.errors.value" />
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
        </Modal>
    </AuthenticatedLayout>
</template>
