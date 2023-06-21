<script>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Head } from "@inertiajs/vue3";
import DepositForm from "@/Components/Forms/DepositForm.vue";
import DepositStep2 from "@/Components/Forms/DepositStep2.vue";

export default {
    components: {
        AuthenticatedLayout,
        Head,
        DepositForm,
        DepositStep2
    },
    data() {
        return {
            step: 1
        }
    },
    methods: {
        changeStep(e){
            this.step = 2
            console.log(e);
        }
    }
}
</script>
<template>
    <Head title="Deposit" />

    <AuthenticatedLayout header="Deposit">
        <div class="pt-10 mt-32">
            <div class="flex flex-wrap mt-4">
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
                    <div class="p-4 sm:p-8 bg-blueGray-800 shadow sm:rounded-lg">
                        <DepositForm @changeStep="changeStep" />
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
