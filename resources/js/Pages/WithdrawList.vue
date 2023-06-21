<template>
    <Head title="Profile" />

    <AuthenticatedLayout header="My Withdrawals">
        <div class="pb-20 pt-11">
            <div class="flex flex-wrap mt-4" style="margin-top: 7rem">
                <card-table
                    :title="'Withdrawals Table'"
                    :columns="columns"
                    color="dark"
                >
                    <tr :key="ent.id" v-for="ent in this.$page.props.withdraws.data">
                        <td
                            class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4"
                        >
                            <div>
                                <h2>$ {{ ent.amount }}</h2>
                            </div>
                        </td>
                        <td
                            class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4"
                        >
                            <div>
                                <h2>{{ ent.txn_id }}</h2>
                            </div>
                        </td>
                        <td
                            class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4"
                        >
                            <div>
                                <h2>{{ ent.withdrawal_address }}</h2>
                            </div>
                        </td>
                        <td
                            class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4"
                        >
                            <div>
                                <h2>{{ getStatusText(ent.status) }}</h2>
                            </div>
                        </td>
                        <td
                            class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4"
                        >
                            <div>
                                <h2>{{ getTime(ent.created_at) }}</h2>
                            </div>
                        </td>
                        <td
                            class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4 text-right"
                        >

                            <Link v-if="!ent.status" :href="route('withdraw.update', ent.id)" method="put">
                                <button
                                    title="approve"
                                    class="bg-green-500 hover:bg-green-400 text-white font-bold py-2 px-4 rounded"
                                >
                                    <i class="fa fa-check"></i>
                                </button>
                            </Link>
                            <Link :href="route('withdraw.show', ent.id)">
                                <button
                                    title="show"
                                    class="bg-blue-500 hover:bg-blue-400 text-white font-bold py-2 px-4 rounded"
                                >
                                    <i class="fa fa-eye"></i>
                                </button>
                            </Link>
                            <Link
                                v-if="!ent.status"
                                :href="route('withdraw.destroy', ent.id)"
                                method="delete"
                            >
                                <button
                                    title="delete"
                                    class="bg-red-500 hover:bg-red-400 text-white font-bold py-2 px-4 rounded"
                                >
                                    <i class="fa fa-trash"></i>
                                </button>
                            </Link>
                        </td>
                    </tr>
                </card-table>
                <pagination
                    class="mt-6 d-inline"
                    :style="{ alignContent: 'center' }"
                    :links="this.$page.props.withdraws.links"
                />
            </div>
        </div>
    </AuthenticatedLayout>
</template>
<script>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Head } from "@inertiajs/vue3";
import DepositForm from "@/Components/Forms/DepositForm.vue";
import DepositStep2 from "@/Components/Forms/DepositStep2.vue";
import CardTable from "@/Components/Cards/CardTable2.vue";
import { Link } from "@inertiajs/vue3";
import Pagination from "@/Components/Pagination.vue";

export default {
    data() {
        return {
            columns: [
                "Amount",
                "Transaction ID",
                "Withdrawal Address",
                "Status",
                "Requested At",
                "Actions",
            ],
        };
    },
    methods: {
        getTime(timestamp) {
            let datetime = new Date(timestamp);
            let options = { year: "numeric", month: "short", day: "numeric" };
            return datetime.toLocaleString("en-US", options);
        },
        getStatusText(status) {
            switch (status) {
                case 0:
                    return "Pending";
                case 1:
                    return "Approved";
                default:
                    return "Expired";
            }
        },
    },
    components: {
        Pagination,
        Link,
        CardTable,
        AuthenticatedLayout,
        Head,
        DepositForm,
        DepositStep2,
    },
};
</script>
<style scoped>
h2 {
    font-size: 20px;
    font-weight: bold;
    color: #63eea3;
    font-family: Menlo, Monaco, Consolas, Liberation Mono, Courier New,
        monospace;
}
button {
    margin-inline: 0.3rem;
}
</style>
