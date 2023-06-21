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
    <Head title="Single Plan" />

    <AuthenticatedLayout header="Single Plan">
        <div class="pb-20 pt-11">
            <div class="flex flex-wrap mt-4" style="margin-top: 7rem">
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
                    <div class="p-4 sm:p-8 bg-blueGray-800 shadow sm:rounded-lg">
                        <header>
                            <h1 class="text-center text-xl text-purple-400 font-medium font-bold">{{$page.props.data.name}}</h1>
                            <h1>Duration in Days: {{$page.props.data.duration_days}}</h1>
                            <h1>Per Day Reward: {{$page.props.data.per_day_reward}}</h1>
                            <h1>Status: {{$page.props.data.status ? 'Active': 'Inactive'}}</h1>
                            <h1>Staking Currency: {{$page.props.data.staking_currency}}</h1>
                            <h1>Rewarding Currency: {{$page.props.data.rewarding_currency}}</h1>
                        </header>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
