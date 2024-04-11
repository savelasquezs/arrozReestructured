<template>
    <div class="p-8 bg-gray-100 min-h-screen">
        <DataTable :orders="orders.data" />
    </div>
</template>

<script setup>
import DataTable from "@/Components/DataTable.vue";
const props = defineProps({ orders: Object });
console.log(props.orders);
</script>

<style lang="scss" scoped></style>
