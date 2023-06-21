<template>
    <!-- Header -->
    <div class="px-4 md:px-10 mx-auto w-full">
        <div>
            <!-- Card stats -->
            <div
                v-if="route('dashboard') === $page.props.ziggy.location"
                class="flex flex-wrap"
            >
                <div class="w-full lg:w-6/12 xl:w-3/12 px-4 mt-20">
                    <!--                        <card-stats-->
                    <!--                            statSubtitle="PERFORMANCE"-->
                    <!--                            statTitle="49,65%"-->
                    <!--                            statArrow="up"-->
                    <!--                            statPercent="12"-->
                    <!--                            statPercentColor="text-emerald-500"-->
                    <!--                            statDescripiron="Since last month"-->
                    <!--                            statIconName="fas fa-percent"-->
                    <!--                            statIconColor="bg-emerald-500"-->
                    <!--                        />-->
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import CardStats from "@/Components/Cards/CardStats.vue";

export default {
    components: {
        CardStats,
    },
};
</script>
