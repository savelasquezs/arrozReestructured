<template>
    <DialogModal :show="displayAddress" @close="handleClose">
        <template #title> Dirección</template>

        <template #content>
            {{ editing }}
            {{ addressToEdit }}
            <form @submit.prevent="handleSubmit">
                <div v-if="form.errors.address" class="text-red-500">
                    {{ form.errors.address }}
                </div>
                <div class="mb-7">
                    <TextInput v-model="form.address" title="Dirección" />
                    <p class="text-sm text-gray-500">
                        Incluye piso, apartamento, bloque, unidad y cualquier
                        ayuda adicional
                    </p>
                </div>
                <NeighborhoodForm
                    :neighborhoods="neighborhoods"
                    v-model="neighborhood_selected"
                />
                <div v-if="form.errors.shipping_value" class="text-red-500">
                    {{ form.errors.shipping_value }}
                </div>
                <TextInput
                    v-model="form.shipping_value"
                    title="Valor del domicilio"
                    type="number"
                />
                <div class="mt-10 flex gap-5 justify-end">
                    <PrimaryButton
                        v-if="
                            form.address?.length > 10 && neighborhood_selected
                        "
                        :disabled="form.processing"
                        >Aceptar</PrimaryButton
                    >
                    <SecondaryButton @click="handleClose">
                        Cancelar
                    </SecondaryButton>
                </div>
            </form>
        </template>
    </DialogModal>
</template>

<script setup>
import PrimaryButton from "@/Components/PrimaryButton.vue";
import SecondaryButton from "@/Components/SecondaryButton.vue";
import DialogModal from "@/Components/DialogModal.vue";
import TextInput from "@/Components/TextInput.vue";
import NeighborhoodForm from "../Neighborhood/NeighborhoodForm.vue";
import { useForm } from "@inertiajs/vue3";
import { ref, watch, computed } from "vue";

const props = defineProps({
    displayAddress: Boolean,
    customerId: Number,
    neighborhoods: Array,
    editing: Boolean,
    addressToEdit: String,
});

const idAddressSelected = ref();
const neighborhood_selected = ref();
const emit = defineEmits(["addressSaved", "close", "addressEdited"]);
const form = useForm({
    customer_id: props.customerId,
    neighborhood_id: null,
    address: null,
    shipping_value: null,
});

const editinLocal = computed(() => props.editing);

watch(editinLocal, (value) => {
    if (value) {
        const toReplace = props.addressToEdit.split("/");

        form.address = toReplace[0];
        neighborhood_selected.value = toReplace[1];
        setTimeout(() => {
            form.shipping_value = toReplace[2];
        }, 200);
        idAddressSelected.value = toReplace[3];
    }
});

function handleSubmit() {
    const { address, customer_id, neighborhood_id, shipping_value } = form;
    const formToSubmit = {
        address,
        customer_id,
        neighborhood_id,
        shipping_value,
    };
    const onSuccess = () => {
        emit(
            editinLocal.value ? "addressEdited" : "addressSaved",
            editinLocal.value ? formToSubmit : form.address
        );
        console.log(editinLocal.value ? "editado" : "guardado");
        form.reset();
    };

    const onError = (errors) => {
        console.log(errors);
    };

    if (editinLocal.value) {
        form.put(`/direcciones/${idAddressSelected.value}`, {
            onSuccess,
            onError,
        });
    } else {
        form.post("/direcciones", { onSuccess, onError });
    }
}

function handleClose() {
    form.reset();
    emit("close");
    neighborhood_selected.value = null;
}

watch(neighborhood_selected, () => {
    if (neighborhood_selected.value) {
        console.log(neighborhood_selected.value);
        const neighborhood = props.neighborhoods.find(
            (n) =>
                n.name.toLowerCase() ==
                neighborhood_selected.value.toLowerCase()
        );
        console.log(props.neighborhoods);
        form.neighborhood_id = neighborhood.id;
        form.shipping_value = neighborhood.shipping_value;
    }
});
</script>

<style lang="scss" scoped></style>
