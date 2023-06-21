<script>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import {Head, Link} from "@inertiajs/vue3";
import DepositForm from "@/Components/Forms/DepositForm.vue";
import DepositStep2 from "@/Components/Forms/DepositStep2.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";

export default {
    components: {
        PrimaryButton, Link,
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
        getStatusText(status){
            if(status === 0){
                return 'Pending'
            }else if(status === 1){
                return 'Done'
            }else{
                return 'Expired'
            }
        },
        changeStep(e){
            this.step = 2
            console.log(e);
        }
    }
}
</script>
<template>
    <Head title="Withdraw" />

    <AuthenticatedLayout header="Withdraw">
        <div class="pb-20 pt-11">
            <div class="flex flex-wrap mt-4" style="margin-top: 7rem">
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
                    <div class="p-4 sm:p-8 bg-blueGray-800 shadow sm:rounded-lg">
                        <header>
                            <h2 class="text-lg font-medium text-white">Withdraw</h2>
                            <div class="grid justify-center items-center mb-6">
                                <p class="text-green-300 mt-4">Amount: {{ $page.props.data.amount }} USDT</p>
                                <p class="text-red-500 mt-4">Withdrawal Address: {{ $page.props.data.withdrawal_address }}</p>
                                <p class="text-green-300 mt-4">Transaction id: {{ $page.props.data.txn_id }}</p>
                                <p class="text-blueGray-400 mt-4">Note: {{ $page.props.data.note}}</p>
                                <p class="text-green-300 mt-4">Initiated At: {{ $page.props.data.created_at === $page.props.data.updated_at ? '': $page.props.data.updated_at}}</p>
                                <p class="text-orange-500 mt-4">Status: {{ getStatusText($page.props.data.status) }}</p>
                            </div>
                        </header>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
