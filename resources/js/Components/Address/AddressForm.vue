<template>
    <SmallAddButton @clicked="displayAddress = !displayAddress" />
    <SmallAddButton
        @clicked="handleEditingOpen"
        editing
        v-if="addressToEdit.split('/')[0] != 'undefined'"
    />
    <AddressModal
        :displayAddress="displayAddress"
        :customerId="customerId"
        :neighborhoods="neighborhoods"
        @close="handleClose"
        @addressSaved="handleAddress"
        @addressEdited="handleEditing"
        :editing="editing"
        :addressToEdit="addressToEdit"
    />
</template>

<script setup>
import { ref } from "vue";
import AddressModal from "./AddressModal.vue";
import SmallAddButton from "@/Components/SmallAddButton.vue";

const editing = ref(false);

const props = defineProps({
    customerId: Number,
    neighborhoods: Array,
    addressToEdit: String,
});
const displayAddress = ref(false);

const emit = defineEmits(["addressSaved", "addressEdited"]);

function handleEditingOpen() {
    displayAddress.value = true;
    editing.value = true;
}

function handleEditing(form) {
    emit("addressEdited", form);
    displayAddress.value = false;
    editing.value = false;
}

function handleClose() {
    displayAddress.value = false;
    editing.value = false;
}

function handleAddress(address) {
    emit("addressSaved", address);

    displayAddress.value = false;
}
</script>

<style lang="scss" scoped></style>
