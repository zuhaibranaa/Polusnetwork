<template>
    <div
        class="relative flex flex-col min-w-0 break-words w-full mb-6 shadow-lg rounded"
    >
        <div class="rounded-lg mb-0 px-4 py-3 hover:shadow-lg shadow-2xl hover:text-yellow-600 bg-purple-900 overflow-hidden">
            <div class="flex flex-wrap items-center">
                <div class="relative w-full max-w-full flex-grow flex-1">
                    <slot/>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
export default {
};
</script>
