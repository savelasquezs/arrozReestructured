<template>
    <!--Tabs navigation-->
    <div class="flex items-center mb-4">
        <input
            id="default-radio-1"
            type="radio"
            value=""
            name="default-radio"
            class="hidden"
        />
        <label for="default-radio-1" class="tab">Default tab</label>
    </div>
    <div class="flex items-center">
        <input
            checked
            id="default-radio-2"
            type="radio"
            value=""
            name="default-radio"
            class="hidden"
        />
        <label for="default-radio-2" class="tab">Checked tab</label>
    </div>

    <!--Tabs content-->
</template>

<script setup></script>

<style scoped>
input[type="radio"]:checked + label {
    border-color: #2563eb;
    font-weight: bold;
    color: #2563eb; /* Cambia el color del texto cuando está seleccionado */
}
</style>
