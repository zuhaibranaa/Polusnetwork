<template>
    <div v-if="links.length > 3">
        <div class="flex align-middle -mb-1" style="align-content: center">
            <template v-for="(link, p) in links" :key="p">
                <div v-if="link.url === null" class="mr-1 mb-1 px-4 py-3 text-sm leading-4 text-gray-400 border rounded"
                     v-html="link.label" />
                <Link v-else
                              class="mr-1 text-emerald-500 mb-1 font-bold px-4 py-3 text-sm leading-4 border rounded hover:bg-emerald-700 hover:text-white focus:border-emerald-500 focus:text-indigo-500"
                              :class="{ 'bg-emerald-500 text-purple-900': link.active }" :href="link.url" v-html="link.label" />
            </template>
        </div>
    </div>
</template>
<script>
import { Link } from "@inertiajs/vue3";

export default {
    props: {
        links: Array
    },
    components:{
        Link
    }
}
</script>
