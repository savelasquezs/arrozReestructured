<template>
    <DialogModal :show="displayCustomer" @close="handleClose">
        <template #title> Cliente</template>

        <template #content>
            <form @submit.prevent="handleSubmit">
                <div v-if="form.errors.address" class="text-red-500">
                    {{ form.errors.address }}
                </div>
                <div v-if="form.errors.name" class="text-red-500">
                    {{ form.errors.name }}
                </div>
                <div class="mb-7">
                    <TextInput v-model="form.name" title="Nombre" />
                </div>
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
                        v-if="form.name?.length > 3"
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
import NeighborhoodForm from "@/Components/Neighborhood/NeighborhoodForm.vue";
import { useForm } from "@inertiajs/vue3";
import { ref, watch, computed } from "vue";
import { usePage } from "@inertiajs/vue3";
const page = usePage();

const props = defineProps({
    displayCustomer: Boolean,
    neighborhoods: Array,
});

const customerId = computed(() => page.props.flash.CustomerId);
const neighborhood_selected = ref();

const emit = defineEmits(["customerSaved", "close"]);

const form = useForm({
    name: null,
    customer_id: null,
    neighborhood_id: null,
    address: null,
    shipping_value: null,
});

function handleAddressSaved() {}

function handleSubmit() {
    form.post("/clientes", {
        onSuccess: () => {
            form.customer_id = customerId.value;
            form.post("/direcciones", {
                onSuccess: () => {
                    emit("customerSaved", form.name);
                    form.reset();
                },
                onError: (errors) => {
                    console.log(errors);
                },
            });
        },
        onError: (errors) => {
            console.log(errors);
        },
    });
}

function handleClose() {
    form.reset();
    emit("close");
    neighborhood_selected.value = null;
}

watch(neighborhood_selected, () => {
    if (neighborhood_selected.value) {
        const neighborhood = props.neighborhoods.find(
            (n) => n.name == neighborhood_selected.value
        );
        console.log(neighborhood);
        form.neighborhood_id = neighborhood.id;
        form.shipping_value = neighborhood.shipping_value;
    }
});
</script>

<style lang="scss" scoped></style>
