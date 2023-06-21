<script>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import {Head} from "@inertiajs/vue3";
import SwapForm from "@/Components/Forms/UsdtToPlsSwapForm.vue";
import InputLabel from "@/Components/InputLabel.vue";

export default {
    components: {
        InputLabel,
        AuthenticatedLayout,
        Head,
        SwapForm
    }
}
</script>
<template>
    <Head title="Swap"/>

    <AuthenticatedLayout header="Swap">
        <div class="pt-10 mt-32">
            <div class="flex flex-wrap mt-4">
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
                    <div class="p-4 sm:p-8 bg-blueGray-800 shadow sm:rounded-lg">

                        <SwapForm/>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
