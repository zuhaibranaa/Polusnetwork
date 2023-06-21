<template>
    <Head title="Deposits" />

    <AuthenticatedLayout header="My Deposits">
        <div class="pt-11">
            <div class="flex flex-wrap mt-4" style="margin-top: 7rem">
                <card-table
                    :title="'Deposits Table'"
                    :columns="columns"
                    color="dark"
                >
                    <tr
                        :key="ent.id"
                        v-for="ent in this.$page.props.deposit.data"
                    >
                        <td
                            class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4"
                        >
                            <div>
                                <img
                                    :src="ent.qrcode_url"
                                    class="w-30 h-30 rounded-2xl border-2 border-purple-50 shadow"
                                />
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
                                <h2>{{ ent.amount }}</h2>
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
                            class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4 text-right"
                        >
                            <Link
                                :on-success="onSucces"
                                :href="route('deposit.update', ent.id)"
                                method="put"
                            >
                                <button
                                    title="refresh"
                                    class="bg-green-500 hover:bg-green-400 text-white font-bold py-2 px-4 rounded"
                                >
                                    <i class="fas fa-recycle"></i>
                                </button>
                            </Link>
                            <Link :href="route('deposit.show', ent.id)">
                                <button
                                    title="show"
                                    class="bg-blue-500 hover:bg-blue-400 text-white font-bold py-2 px-4 rounded"
                                >
                                    <i class="fa fa-eye"></i>
                                </button>
                            </Link>
                            <Link
                                :href="route('deposit.destroy', ent.id)"
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
                    :links="this.$page.props.deposit.links"
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
                "QR Code",
                "Transaction ID",
                "Amount",
                "Status",
                "Actions",
            ],
        };
    },
    methods: {
        onSucces(res) {
            console.log(res);
        },
        getStatusText(status) {
            switch (status) {
                case 0:
                    return "Pending";
                case 1:
                    return "Success";
                default:
                    return "Expired";
            }
        },
    },
    components: {
        Link,
        CardTable,
        AuthenticatedLayout,
        Head,
        DepositForm,
        DepositStep2,
        Pagination,
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
