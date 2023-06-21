<script setup>
import PrimaryButton from "@/Components/PrimaryButton.vue";
import {Link} from "@inertiajs/vue3";
const callAction = (e) => {
    console.log(e)
}
const getStatusText = (status) => {
    switch (status) {
        case -1:
            return 'Expired';
        case 1:
            return 'Success';
        default:
            return 'Pending';
    }
}
</script>

<template>
    <section>
        <header>
            <h2 class="text-lg font-medium text-white">Make Deposit</h2>
            <p class="text-purple-600 mt-2 mb-5" >Scan Below QR Code For Payment Or Deposit Exact Amount In BEP-20 USDT At Given Address</p>
            <div class="flex justify-center items-center" >
                <img :src="$page.props.data.qrcode_url"/>
            </div>
            <div class="grid justify-center items-center mb-6">
                <p class="text-lightBlue-600 mt-4">Amount: USDT {{ $page.props.data.amount }}</p>
                <p class="text-purple-300 mt-4">Deposit Address: {{ $page.props.data.deposit_address }}</p>
                <p class="text-purple-300 mt-4">Transaction id: {{ $page.props.data.txn_id }}</p>
                <p class="text-orange-500 mt-4">Status: {{ getStatusText($page.props.data.status) }}</p>
            </div>
            <div class="flex items-center text-center gap-4">
                <Link :href="route('deposit.update', $page.props.data.id)" method="put">
                    <PrimaryButton type="button" @click="callAction">Check Transaction Status </PrimaryButton>
                </Link>
                <Transition
                    enter-from-class="opacity-0"
                    leave-to-class="opacity-0"
                    class="transition ease-in-out"
                >
                </Transition>
            </div>
        </header>
    </section>
</template>
