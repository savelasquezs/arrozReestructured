<template>
    <div v-for="expense in expenses">
        <h2 class="text-center my-2 text-2xl">
            {{ expense.expense_item.name }}
        </h2>
        <p class="text-center text-red-500">
            {{ expense.expense_item.measure_unit }}
        </p>

        <p>{{ expense.bank.name }}--{{ expense.bank.entity_type.name }}</p>
    </div>
</template>

<script setup>
defineProps({ expenses: Array });
</script>

<style lang="scss" scoped></style>
