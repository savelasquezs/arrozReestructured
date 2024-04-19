<template>
    <SmallAddButton @clicked="displayCustomer = !displayCustomer" />
    <CustomerModal
        :displayCustomer="displayCustomer"
        :neighborhoods="neighborhoods"
        @customerSaved="handleCustomer"
        @close="displayCustomer = false"
    />
</template>

<script setup>
import { ref } from "vue";
import SmallAddButton from "@/Components/SmallAddButton.vue";
import CustomerModal from "./CustomerModal.vue";

const emit = defineEmits(["addressSaved", "customerSaved"]);
const props = defineProps({ neighborhoods: Array });
const displayCustomer = ref(false);

function handleCustomer(customer) {
    displayCustomer.value = false;
    emit("customerSaved", customer);
}
</script>

<style lang="scss" scoped></style>
