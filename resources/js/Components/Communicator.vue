<template>
    <div>{{ $emit("datart", data) }}</div>
</template>
<script>
export default {
    props: {
        data: null,
    },
};
</script>
